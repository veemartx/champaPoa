<?php

require 'connect.php';

// get sent data 
$firstName = $_POST['fname'];

$lastName = $_POST['lname'];

$fullname = $firstName . ' ' . $lastName;

$username = substr(strtolower($firstName), 0, 1) . strtolower($lastName);

$password = password_hash('0000', PASSWORD_DEFAULT);

$email = $_POST['email'];

$phone = $_POST['phone'];

$position = $_POST['position'];


$idNo=$_POST['idNo'];

$accNo = substr(str_shuffle('1234567890'), 0, 8);


// check if the user exists 
$sel = "SELECT * FROM users WHERE email='$email'";

$selQuery = mysqli_query($con, $sel);

if ($u = mysqli_fetch_assoc($selQuery)) {

    echo "This user  email is already registered";
} else {

    $status = 'active';

    $userId = uniqid();

    $insert = "INSERT INTO users (userId,username,fullname,email,phone,idNo,accNo,position,password,status) 
    
    VALUES ('$userId','$username','$fullname','$email','$phone','$idNo','$accNo','$position','$password','$status')";

    if (mysqli_query($con, $insert)) {

        echo "User Added Successfully";
    } else {

        echo mysqli_error($con);
    }
}
