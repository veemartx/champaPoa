<?php

require 'connect.php';

$user = $_POST['userId'];


$delete = "DELETE FROM users WHERE userId='$user'";

if (mysqli_query($con, $delete)) {

    echo "User Deleted Successfully";
    
} else {

    echo mysqli_error($con);
}
