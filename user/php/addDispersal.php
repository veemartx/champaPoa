<?php

require 'connect.php';

// get sent data 
$user = $_POST['recipient'];

$code = $_POST['code'];

$transactionId = $_POST['transactionId'];


// calculate the amount
$sel = "SELECT * FROM contributions WHERE code='$code'";

$selQuery = mysqli_query($con, $sel);


$totalAmount = 0;

while ($r = mysqli_fetch_assoc($selQuery)) {

    // get the contrubtion amount 
    $amount = $r['amount'];

    $round = $r['roundNo'];

    $totalAmount = $totalAmount + $amount;
}


// $insert 
$dispersalId = uniqid();

$status = "Complete";

// 
$insert = "INSERT INTO dispersals (dispersalId,user,code,roundNo,amount,transactionId,status) 

VALUES ('$dispersalId','$user','$code','$round','$totalAmount','$transactionId','$status')";


if (mysqli_query($con, $insert)) {

    echo  "Round " . $round . " Dispersed Successfully";
    
} else {

    echo mysqli_error($con);
}
