<?php
    // require connection
    require 'connect.php';
    
    //result object
    $resObj=new stdClass();

    // echo 'success';
    $username=$_POST['username'];
    $password=$_POST['password'];

    //check userExist
    $checkExists="SELECT * FROM users WHERE user_name='$username'";

    // query
    $checkExistsQuery=mysqli_query($con,$checkExists);

    // fetch
    if($row=mysqli_fetch_assoc($checkExistsQuery)){
        //exists
        $resObj->exists=true;
        // userid
        $resObj->user_id=$row['user_id'];

        // stored password
        $hashedPass=$row['password'];
        //verify pass
        if(password_verify($password,$hashedPass)){
            // they match
            $resObj->login=true;
        }else{
            // they dont match
            $resObj->login=false;
        }
    }else{
        //no such admin
        $resObj->exists=false;

    }

    //encode to json and echo the json
    echo json_encode($resObj);