<?php

require 'connect.php';

// get sent data 
$frequency = $_POST['frequency'];

$amount = $_POST['amount'];


$update = "UPDATE contributionSettings SET amount='$amount', frequency='$frequency'";

if (mysqli_query($con, $update)) {

    echo "Settings Updated Successfully";

} else {

    echo mysqli_error($con);
}
