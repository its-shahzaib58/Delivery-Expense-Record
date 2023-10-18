<?php
include 'conn.php';

$date = $_REQUEST["date"];
$driverName = $_REQUEST["driverName"];
$loaderName = $_REQUEST["loaderName"];
$sectorName = $_REQUEST["sectorName"];
$vehNo = $_REQUEST["vehNo"];
$tollTax = $_REQUEST["tollTax"];
$food = $_REQUEST["food"];
$tyreP = $_REQUEST["tyreP"];
$trafficChallan = $_REQUEST["trafficChallan"];
$misc = $_REQUEST["misc"];
$total = $_REQUEST["total"];
$givenAmount = $_REQUEST["givenAmount"];
$receivableAmount = $_REQUEST["receivableAmount"];

$query = "INSERT INTO `expense_table`(`date`,`driver_name`,`loader_name`,`sector_name`,`veh_no`,`toll_tax`,`food_exp`,`tyre_puncture`,`traffice_challan`,`misc`,`total_exp`,`given_amount`,`recevieable_amount`) VALUES('$date','$driverName','$loaderName','$sectorName','$vehNo','$tollTax','$food','$tyreP','$trafficChallan','$misc','$total','$givenAmount','$receivableAmount')";

if($conn->query($query))
{
    echo 1;
}else{
    echo 0;
}

?>
