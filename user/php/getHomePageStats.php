<?php

require 'connect.php';
$res = new stdClass();


// get users 
$sel = "SELECT * FROM users";

$selQuery = mysqli_query($con, $sel);

$res->users = mysqli_num_rows($selQuery);


// contributions
$sel = "SELECT * FROM contributions";

$selQuery = mysqli_query($con, $sel);

$res->contributions = mysqli_num_rows($selQuery);


// current round 
$sel = "SELECT  DISTINCT roundNo FROM contributions";

$selQuery = mysqli_query($con, $sel);

$res->currentRound = mysqli_num_rows($selQuery);


// balance 

$sel = "SELECT * FROM contributions";

$selQuery = mysqli_query($con, $sel);

$totalContributions = 0;

while ($r = mysqli_fetch_assoc($selQuery)) {

    $amount = $r['amount'];

    $totalContributions = $totalContributions + $amount;
}




$sel = "SELECT * FROM dispersals";

$selQuery = mysqli_query($con, $sel);

$totalDispersals = 0;

while ($r = mysqli_fetch_assoc($selQuery)) {

    $amount = $r['amount'];

    $totalDispersals = $totalDispersals + $amount;
}


$res->balance = $totalContributions - $totalDispersals;


echo json_encode($res);
