
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Delivery Transportation Expensive v2.0</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="icon" href="img/icon.png">
  </head>
  <style>
    .card{
        box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
    }
    body{
      background-color: whitesmoke
    }
    #show_data_exp{
      overflow-y: scroll;
      min-height: 50vh;
    }
  </style>
  <body class="bg-dark">

<!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-primary text-light">
                <h5 class="modal-title" id="exampleModalLabel">Receivable Amount</h5>
              </div>
              <div class="modal-body">
                <div id="showEditData">

                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="handleUpdate()">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid">
            <div class="row">

            </div>
            <div class="row">
                <div class="col-lg-3 my-2">
                    <div class="card p-2 bg-secondary">
                        <div class="card-header bg-primary text-light">
                            <span class="fw-bold">Enter Details</span>
                        </div>
                        <div class="card-body">
                            <form onsubmit="hundleSubmit()" method="POST">
                                 <div class="input-group mb-3">
                                    <span class="input-group-text"><b>Date:</b></span>
                                    <input type="date" id="date" min="<?= date('Y-m-01')?>" class="form-control"  required>
                                  </div>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text"><b>Driver:</b></span>
                                    <input type="text" id="driverName" class="form-control"  required>
                                  </div>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text"><b>Loader:</b></span>
                                    <input type="text" id="loaderName" class="form-control"  required>
                                  </div>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text"><b>Sector:</b></span>
                                    <input type="text" id="sectorName" class="form-control"  required>
                                  </div>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text"><b>Veh No:</b></span>
                                    <input type="text" id="vehNo" class="form-control"  required>
                                  </div>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text"><b>Toll Tax:</b></span>
                                    <input type="number" id="tollTax" onchange="totalExpense()" min="0" class="form-control"  required>
                                  </div>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text"><b>Food:</b></span>
                                    <input type="number" id="food" onchange="totalExpense()" min="0" class="form-control"  required>
                                  </div>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text"><b>Tyre Puncture:</b></span>
                                    <input type="number" id="tyreP" onchange="totalExpense()" min="0" class="form-control"  required>
                                  </div>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text"><b>Traffic Challan:</b></span>
                                    <input type="number" id="trafficChallan" onchange="totalExpense()" min="0" class="form-control"  required>
                                  </div>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text"><b>Misc:</b></span>
                                    <input type="number" id="misc" min="0" onchange="totalExpense()" class="form-control"  required>
                                  </div>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text"><b>Total:</b></span>
                                    <input type="number" id="total" min="0" class="form-control"  disabled>
                                  </div>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text"><b>Given Amount:</b></span>
                                    <input type="number" id="givenAmount" onchange="getReceivableAmount()" min="0" class="form-control"   required>
                                  </div>
                                  <div class="input-group mb-3">
                                    <span class="input-group-text"><b>Receivable Amount:</b></span>
                                    <input type="number" id="receivableAmount"  class="form-control"  disabled>
                                  </div>
                                  <button class="btn btn-primary w-100">Add Record</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 my-2">
                    <div class="card p-2 bg-secondary" style="height:830px">
                        <div class="card-header bg-primary text-light fw-bold">
                            <span >All Record</span>
                        </div>
                        <div class="card-body ">
                          <div class="row">
                            <span class="text-light text-center pb-3" style="font-size:22px">ضروری ہدایت: براہ کرم پہلاے تاریخ کا انتخاب  کرے- شکریہ</span>
                            <div class="col-lg-4">
                                <label class="text-white fw-bold">From Date:</label>
                                <input type="date" id="fromDate"  class="form-control mb-2">
                            </div>
                            <div class="col-lg-4">
                              <label class="text-white fw-bold">To Date:</label>
                              <input type="date" id="toDate" class="form-control mb-2">
                            </div>
                            <div class="col-lg-4">

                                <label class="text-white fw-bold">Driver Name:</label>
                                <input type="text" id="searchDriverName" placeholder="Enter driver name" class="form-control mb-2">

                            </div>
                            <div class="col-lg-4">

                                <label class="text-white fw-bold">Sector Name:</label>
                                <input type="text" id="searchSectorName" placeholder="Enter sector name" class="form-control mb-2">

                            </div>
                            <div class="col-lg-4">

                                <label class="text-white fw-bold">Veh No:</label>
                                <input type="text" id="searchVehNo" placeholder="Enter vehicle no" class="form-control mb-2">

                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-4 offset-lg-4">
                              <button class="btn btn-primary w-100" onclick="handleSearch()">Search</button>
                            </div>
                          </div>
                          <hr>
                          <div class="col-lg-12" id="showData">
                            <div class="table-responsive rounded" style="height:380px; overflow-y:scroll;">
                              <table class="table table-striped table-hover">
                                <thead style="position:sticky">
                                  <tr >
                                    <th>Sr</th>
                                    <th>Date</th>
                                    <th>Driver <br/> Name</th>
                                    <th>Loader <br/> Name</th>
                                    <th>Sector</th>
                                    <th>Veh No.</th>
                                    <th>Total</th>
                                    <th>Given <br/> Amount</th>
                                    <th>Receivable</th>
                                    <th class="text-center">Action</th>
                                  </tr>
                                  </thead>

                                    <tbody id="show_data_exp">
                                    </tbody>

                              </table>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="card-footer text-light bg-primary" id="showTotalValues">

                        </div>
                    </div>
                </div>

            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="jquery.js"></script>
    <script src="script.js"></script>
  </body>
</html>
