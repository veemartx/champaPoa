<?php

require 'connect.php';


$fullname = $_POST['name'];

$email = $_POST['email'];

$phone = $_POST['phone'];

$position = $_POST['position'];

$idNo = $_POST['idNo'];


$userId = $_POST['userId'];


$edit = "UPDATE users SET fullname='$fullname',email='$email',phone='$phone',idNo='$idNo',position='$position' WHERE userId='$userId'";

if (mysqli_query($con, $edit)) {

    echo "User Edit Successful";
} else {

    echo mysqli_error($con);
}
