<?php

require 'connect.php';

$sel = "SELECT * FROM contributions ORDER BY id DESC";

$selQuery = mysqli_query($con, $sel);

$res = [];

$no = 1;
while ($r = mysqli_fetch_assoc($selQuery)) {

    $cont = new stdClass();

    $cont->no = $no;

    $cont->user = $r['user'];

    $cont->code = $r['code'];

    $cont->round = $r['roundNo'];

    $cont->amount = $r['amount'];

    $cont->date = $r['date'];

    $cont->status = $r['status'];


    array_push($res, $cont);

    $no = $no + 1;
}


echo json_encode($res);
