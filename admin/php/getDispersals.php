<?php

require 'connect.php';

$sel = "SELECT * FROM dispersals ORDER BY id DESC";

$selQuery = mysqli_query($con, $sel);

$res = [];

$no = 1;
while ($r = mysqli_fetch_assoc($selQuery)) {

    $dis = new stdClass();

    $dis->no = $no;

    $dis->user = $r['user'];

    $dis->code = $r['code'];


    $dis->transaction = $r['transactionId'];

    $dis->round = $r['roundNo'];

    $dis->amount = $r['amount'];

    $dis->date = $r['date'];

    $dis->status = $r['status'];


    array_push($res, $dis);

    $no = $no + 1;
}


echo json_encode($res);
