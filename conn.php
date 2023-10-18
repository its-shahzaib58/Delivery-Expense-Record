<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "driverexpense";

$conn = new mysqli($host, $username, $password, $db);

if($conn->connect_error)
{
    die("Db Connection Failed".$conn->connect_error);
}

?>