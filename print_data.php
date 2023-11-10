<?php
include 'conn.php';
$id = $_GET['id'];

$query = "SELECT * FROM `expense_table` WHERE `id` = '$id'";
$data = $conn->query($query);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Delivery Transportation Expensive v2.0</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="icon" href="img/icon.png">
    <link rel="stylesheet" href="print.css" media="print">
  </head>

  <body>
        <main>
        <div class="container-fluid">
          <div class="col-12 p-3 my-2">
            <div class="row">
              <h1 class="text-center py-3"><u>Delivery Transportation Expenses</u></h1>
              <?php
              foreach($data as $value)
              {
              ?>
            <div class="row py-2">
              <div class="col-6">
                <h3>Sector: <u><?=$value['sector_name']?></u></h3>
                <h3>Driver Name: <u><?=$value['driver_name']?></u></h3>
                  <h3>Loader Name: <u><?=$value['loader_name']?></u></h3>
              </div>
              <div class="col-6">
                <h3>Date: <u><?=$value['date']?></u></h3>
                <h3>Vehicle No: <u><?=$value['veh_no']?></u></h3>
              </div>

            </div>
            <hr>
            <div class="row mt-3">
              <div class="col-12">
              <ol>
               <h1><li>Toll Plaza Chargers&nbsp;&nbsp;&nbsp;&nbsp;Rs: <u><b><?=$value['toll_tax']?></u></b></li></h1>
               <h1><li>Food Chargers&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs: <u><b><?=$value['food_exp']?></b></u></li></h1>
               <h1><li>Tyre Puncture&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs: <u><b><?=$value['tyre_puncture']?></b></u></li></h1>
               <h1><li>Traffic Challan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs: <u><b><?=$value['traffice_challan']?></b></u></li></h1>
               <h1><li>Misc&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs: <u><b><?=$value['misc']?></b></u></li></h1>
               <br>
               <h1><li><b>Total</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs: <u><b><?=$value['total_exp']?></b></u></li></h1>
              </ol>
              </div>
            </div>
            <div class="row mt-5">
                  <div class="col-4 ">
                  <span><b>Prepared By:_____________</b></span>
                  </div>
                  <div class="col-4 text-center">
                  <span><b>Driver Signature:_____________</b></span>
                  </div>
                  <div class="col-4 text-center">
                  <span><b>Approved By:_____________</b></span>
                  </div>
            </div>
            <?php
              }
            ?>
          </div>
        </div>
        </main>
        <footer class="py-2">
        <button onclick="window.print()" class="btn btn-primary w-50 offset-3" id="print-btn">Print</button>
          <p class="text-center "><b>Delivery Transportation <img src="img/icon.png" class="img-fluid" width="20px"/> Expenses v2.0 &copy; Developed by M.Shahzaib Ramzan</b></p>
        </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="jquery.js"></script>
    <script src="script.js"></script>
  </body>
</html>
