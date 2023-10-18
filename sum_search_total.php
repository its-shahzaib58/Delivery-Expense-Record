<?php
include 'conn.php';
$fromDate = $_REQUEST["fromDate"];
 $toDate = $_REQUEST["toDate"];
 $searchDriverName = $_REQUEST["searchDriverName"];
 $searchSectorName = $_REQUEST["searchSectorName"];
 $searchVehNo = $_REQUEST["searchVehNo"];
$query = "SELECT SUM(`toll_tax`) as toll_tax, SUM(`food_exp`) as food_exp, SUM(`tyre_puncture`) as tyre_puncture, SUM(`traffice_challan`) as traffice_challan, SUM(`misc`) as misc, SUM(`total_exp`) as total_exp FROM `expense_table` WHERE DATE(`date`) BETWEEN '$fromDate' AND '$toDate' AND `driver_name` LIKE '%$searchDriverName%' AND `sector_name` LIKE '%$searchSectorName%' AND `veh_no` LIKE '%$searchVehNo%'";

// $query = "SELECT SUM(toll_tax) as toll_tax FROM `expense_table`";


$getData  = $conn->query($query);
    $sendData = "";
 foreach($getData as $data)
 {
    $sendData .='
      <span>Toll Tax: <b id="showTotalTollTax">'.$data['toll_tax'].'</b>, </span>
      <span>Food: <b id="showTotalTollTax">'.$data['food_exp'].'</b>, </span>
      <span>Tyre Puncture: <b id="showTotalTollTax">'.$data['tyre_puncture'].'</b>,</span>
      <span>Traffic Challan: <b id="showTotalTollTax">'.$data['traffice_challan'].'</b>, </span>
      <span>Misc: <b id="showTotalTollTax">'.$data['misc'].'</b>, </span>
      <br>
      <span class="text-warning float-end">Grand Total: <b id="showTotalTollTax">'.$data['total_exp'].'</b> </span>
    
    ';
 }
if($getData)
{
 echo $sendData;
 
}else{
    echo 0;
}
?>