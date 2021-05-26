<?php

    require 'connect.php';

    // get the sent data
    $fullname=$_POST['fullName'];

    $username=$_POST['username'];

    $email=$_POST['email'];

    $phone=$_POST['phone'];

    $orgType=$_POST['orgType'];

    $orgName=$_POST['orgName'];

    $password=$_POST['password'];

    $position=$_POST['position'];

   
    // abstract
    $string="1234567890";

    $id="USR-".substr(str_shuffle($string),0,3);


    // hash the password
    $password=password_hash($password,PASSWORD_DEFAULT);

    // check if this guy exists
    $sel="SELECT user_email FROM users WHERE user_email='$email'";

    // query
    $selQuery=mysqli_query($con,$sel);

    if($row=mysqli_fetch_assoc($selQuery)){

        // the quy exists
        echo 'exists';
    }else{

        // register
        $insert="INSERT INTO users (user_id,full_name,user_name,password,user_email,user_phone,user_position,org_type,org_name,user_status)
        
        VALUES('$id','$fullname','$username','$password','$email','$phone','$position','$orgType','$orgName','pending')";


        // query
        if(mysqli_query($con,$insert)){

            echo 'success';

        }else{

            echo mysqli_error($con);
        }
    }

