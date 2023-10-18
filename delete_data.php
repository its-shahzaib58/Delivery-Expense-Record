<?php
include 'conn.php';

$id = $_REQUEST['id'];
$query = "DELETE FROM `expense_table` WHERE `id`='$id'";

if($conn->query($query))
{
 echo 1;
 
}else{
    echo 0;
}
?>