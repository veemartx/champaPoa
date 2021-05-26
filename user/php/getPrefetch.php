<?php

require 'connect.php';

$res = new stdClass();

$users = [];

$sel = "SELECT * FROM users ORDER BY fullname ASC";

$selQuery = mysqli_query($con, $sel);


while ($r = mysqli_fetch_assoc($selQuery)) {

    array_push($users, $r['fullname']);
}


// get the  amount to make contribution
$sel = "SELECT * FROM contributionSettings";

$selQuery = mysqli_query($con, $sel);

if ($u = mysqli_fetch_assoc($selQuery)) {

    $amount = $u['amount'];
}

// get all the codes not in the dispersal
$sel = "SELECT DISTINCT code FROM contributions";

$selQuery = mysqli_query($con, $sel);

$codes = [];

while ($c = mysqli_fetch_assoc($selQuery)) {

    $code = $c['code'];


    // check if the code has already been dispersd 
    $selc = "SELECT * FROM dispersals WHERE code='$code'";

    $selcQuery = mysqli_query($con, $selc);

    // 
    if ($co = mysqli_fetch_assoc($selcQuery)) {
    } else {

        array_push($codes, $code);
    }
}


$res->users = $users;

$res->amount = $amount;

$res->codes = $codes;


echo json_encode($res);
