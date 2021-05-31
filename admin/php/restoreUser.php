<?php

require 'connect.php';

// 
$user = $_POST['userId'];


$status = "active";

$update = "UPDATE users SET status='$status' WHERE userId='$user'";

if (mysqli_query($con, $update)) {

    echo "User Restored ";

} else {

    echo mysqli_error($con);
}
