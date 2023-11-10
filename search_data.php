<?php
include 'conn.php';


 $fromDate = $_REQUEST["fromDate"];
 $toDate = $_REQUEST["toDate"];
 $searchDriverName = $_REQUEST["searchDriverName"];
 $searchSectorName = $_REQUEST["searchSectorName"];
 $searchVehNo = $_REQUEST["searchVehNo"];

 $query = "SELECT * FROM `expense_table` WHERE DATE(`date`) BETWEEN '$fromDate' AND '$toDate' AND `driver_name` LIKE '%$searchDriverName%' AND `sector_name` LIKE '%$searchSectorName%' AND `veh_no` LIKE '%$searchVehNo%' ORDER BY `date` DESC";

 $getData  = $conn->query($query);
    $sendData = "";
    $sr = 1;
if($getData->num_rows > 0)
{
   foreach($getData as $data)
   {

      $sendData .='
      <tr>
      <td>'.$sr++.'</td>
      <td>'.$data['date'].'</td>
      <td>'.$data['driver_name'].'</td>
      <td>'.$data['loader_name'].'</td>
      <td>'.$data['sector_name'].'</td>
      <td>'.$data['veh_no'].'</td>
     <input type="hidden" class="toll_tax" value="'.$data['toll_tax'].'"/>
      <td class="totalReceiveable">'.$data['total_exp'].'</td>
      <td>'.$data['given_amount'].'</td>
      <td>'.$data['recevieable_amount'].'</td>
      <td class="text-center"><a href="print_data.php?id='.$data['id'].'" target="_blank"><button class="btn btn-link text-primary btn-sm mb-1"><i class="bi bi-eye-fill"></i></button></a>
      <button class="btn btn-link text-success btn-sm mb-1" onclick="handleEdit('.$data['id'].')"><i class="bi bi-pencil-square"></i></button>
      <button class="btn btn-link text-danger btn-sm mb-1" onclick="handleDelete('.$data['id'].')"><i class="bi bi-trash-fill"></i></button></td>
    </tr>
      ';
  }
  echo $sendData;
}else{
   echo "Not Result Found!";
}

?>
