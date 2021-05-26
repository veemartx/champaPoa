<?php
// require connection
require 'connect.php';

date_default_timezone_set('Africa/Nairobi');

//result object
$resObj = new stdClass();

// echo 'success';
$username = $_POST['username'];
$password = $_POST['password'];

//check userExist
$checkExists = "SELECT * FROM users WHERE username='$username'";

// query
$checkExistsQuery = mysqli_query($con, $checkExists);

// fetch
if ($row = mysqli_fetch_assoc($checkExistsQuery)) {
    //exists
    $resObj->exists = true;
    // userid
    $resObj->userId = $row['userId'];

    // stored password
    $hashedPass = $row['password'];

    //verify pass
    if (password_verify($password, $hashedPass)) {
        // they match
        $resObj->login = true;


    } else {
        // they dont match
        $resObj->login = false;

        $resObj->message = "Incorrect username Or Password";
    }
} else {
    //no such user
    $resObj->exists = false;

    $resObj->message = "Invalid username Or Password";
}

//encode to json and echo the json
echo json_encode($resObj);


