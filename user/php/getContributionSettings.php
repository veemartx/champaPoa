<?php

require 'connect.php';

$res = new stdClass();

$sel = "SELECT * FROM contributionSettings";

$selQuery = mysqli_query($con, $sel);

if ($r = mysqli_fetch_assoc($selQuery)) {

    $res->frequency = $r['frequency'];

    $res->amount = $r['amount'];
}


echo json_encode($res);
