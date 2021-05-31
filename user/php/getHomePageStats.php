<?php

require 'connect.php';
$res = new stdClass();

$user = $_POST['user'];

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



// my stats 


// my contributions
$sel = "SELECT * FROM users WHERE userId='$user'";

$selQuery = mysqli_query($con, $sel);

if ($u = mysqli_fetch_assoc($selQuery)) {

    $fullname = $u['fullname'];
} else {
    $fullname = "default";
}


$sel = "SELECT * FROM contributions WHERE user='$fullname'";

$selQuery = mysqli_query($con, $sel);

$res->myContributions = mysqli_num_rows($selQuery);


// my contributions amount
$myContributionsTotal = 0;

while ($m = mysqli_fetch_assoc($selQuery)) {

    $amount = $m['amount'];

    $myContributionsTotal = $myContributionsTotal + $amount;
}

$res->myContributionsAmount = $myContributionsTotal;




// my dispersals 

$sel = "SELECT * FROM dispersals WHERE user='$fullname'";

$selQuery = mysqli_query($con, $sel);

$res->myDispersals = mysqli_num_rows($selQuery);


// myDispersals Amount

$myDispersalsTotal = 0;


while ($m = mysqli_fetch_assoc($selQuery)) {

    $amount = $m['amount'];

    $myDispersalsTotal = $myDispersalsTotal + $amount;
}

$res->myDispersalsAmount = $myDispersalsTotal;




echo json_encode($res);
