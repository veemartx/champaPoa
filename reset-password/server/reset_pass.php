<?php

    require 'connect.php';

    // get the sent data
    $pass=$_POST['pass'];

    $email=$_POST['email'];

    // 1
    $status='pending';

    // check if there is a pending password request from the user
    $sel="SELECT * FROM password_reset WHERE reset_user='$email' AND reset_status='$status'";

    // echo 'subra';
    // query
    $selQUery=mysqli_query($con,$sel);
    if($row=mysqli_fetch_assoc($selQUery)){

        // there exists the row

        // hash the new pass
        $pass=password_hash($pass,PASSWORD_DEFAULT);
        // update the passowrd
        $update="UPDATE users SET password='$pass' WHERE user_email='$email'";

        // query
        if(mysqli_query($con,$update)){

            // success
            $status="complete";
            // update the pass reset
            $update="UPDATE password_reset SET reset_status='$status'";

            // query
            if(mysqli_query($con,$update)){
                // success
                echo "success";
            }else{
                // error
                echo "error";
            }

        }else{
            // error
        }   
    }else{
        // 
        // there is no request from this user
        echo "No Pending Password Reset Request.";

    }