<?php

require 'connect.php';

// get sent data 
$transactionId = $_POST['transactionId'];

$paymentMethod = $_POST['paymentMethod'];

$amount = $_POST['amount'];


$contributor = $_POST['contributor'];

$round = $_POST['round'];

// check if this contribution has been made 
$sel = "SELECT * FROM contributions WHERE user='$contributor' AND roundNo='$round' OR roundNo>'$round'";

$selQuery = mysqli_query($con, $sel);

if ($r = mysqli_fetch_assoc($selQuery)) {

    echo "The user has already contributed to this round";
} else {


    // get anyone with the same round 
    $selr = "SELECT * FROM contributions WHERE roundNo='$round'";

    $selrQuery = mysqli_query($con, $selr);

    if ($s = mysqli_fetch_assoc($selrQuery)) {

        // take that code
        $code = $s['code'];
    } else {

        // generate code 
        $code = "CD-" . substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'), 0, 4);
    }


    $contributionId = uniqid();

    $status = "complete";

    // insert 
    $insert = "INSERT INTO contributions (contributionId,user,code,roundNo,amount,paymentMethod,status) 
    VALUES ('$contributionId','$contributor','$code','$round','$amount','$paymentMethod','$status')";

    if (mysqli_query($con, $insert)) {

        echo "Contribution Added Successfully";
    } else {

        echo mysqli_error($con);
    }
}
