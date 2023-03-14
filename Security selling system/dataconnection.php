<?php
    $connect = mysqli_connect("localhost","root","","security");

if($connect->connect_error)
{
    die("Connection failed: " . $connect->connect_error);
}

?>
