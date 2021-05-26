<?php

require 'connect.php';

// get sentdata 
$lia = $_POST['lia'];


$res = new stdClass();

// echo $lia;
$sel = "SELECT * FROM users WHERE userId='$lia'";

$selQuery = mysqli_query($con, $sel);

if ($r = mysqli_fetch_assoc($selQuery)) {

    $res->name = $r['fullname'];

    $res->phone = $r['phone'];

    $res->username = $r['username'];

    $res->email = $r['email'];

    $res->position = $r['position'];

    $res->phone = $r['phone'];

    $res->status = $r['status'];
}


echo  json_encode($res);
