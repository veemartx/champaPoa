<?php

require 'connect.php';

// 
$user = $_POST['userId'];


$status = "Suspended";

$update = "UPDATE users SET status='$status' WHERE userId='$user'";

if (mysqli_query($con, $update)) {

    echo "User Suspended ";

} else {

    echo mysqli_error($con);
}
