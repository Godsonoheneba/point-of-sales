


<?php 
 


$tdate = date("Y-m-d");
$Thestatus = "Cash Sales";
$Thestatus2 = "Credit Sales";


           /*-----------------get total cash sales ----------------*/
    $getCashTtl = mysqli_query($conn, "SELECT SUM(total) AS total FROM daily_sales WHERE active='yes' AND theDate='$tdate' AND status='$Thestatus'   ");
    $getRow2 = mysqli_fetch_assoc($getCashTtl);
    $totalAmountCS = $getRow2["total"];





           /*-----------------get total credit sales ----------------*/
    $getCreditSales = mysqli_query($conn, "SELECT SUM(total) AS total FROM daily_sales WHERE active='yes' AND theDate='$tdate' AND status='$Thestatus2'   ");
    $getRow5 = mysqli_fetch_assoc($getCreditSales);
    $totalAmountCreS = $getRow5["total"];



       /*-----------------get total credit sales for initail payment ----------------*/
    $getCashTtl2 = mysqli_query($conn, "SELECT SUM(initial_amount) AS initial_amount FROM debtors_list_history WHERE active='yes' AND theDate='$tdate'   ");
    $getRow23 = mysqli_fetch_assoc($getCashTtl2);
    $initial_amountAmountCS = $getRow23["initial_amount"];


  /*-----------------get total debt paid ----------------*/
$getDebtP = mysqli_query($conn, "SELECT SUM(amount_paying) AS amount_paying FROM pay_debt WHERE active='yes' AND date_paid='$tdate'   ");
$getRow3 = mysqli_fetch_assoc($getDebtP);
$totalDebtPaid = $getRow3["amount_paying"];





  /*-----------------get total customers ----------------*/
$seCnt = mysqli_query($conn, "SELECT COUNT(1)  FROM debtors_list WHERE active='yes'   ");
$getRow34 = mysqli_fetch_array($seCnt);
$totalCustomers = $getRow34[0];



  /*-----------------get total staffs ----------------*/
$seStaf = mysqli_query($conn, "SELECT COUNT(1)  FROM staff WHERE active='yes'   ");
$getRow3422 = mysqli_fetch_array($seStaf);
$totalStafffs = $getRow3422[0];





$totalCashSalesForToday = $totalAmountCS + $initial_amountAmountCS;
$totalCreditForToday = $totalAmountCreS - $initial_amountAmountCS;

$totalRevenue = $totalCashSalesForToday + $totalDebtPaid;



 ?>




 

<div class="content">

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <form class="form-inline">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-light" id="dash-daterange">
                            <div class="input-group-append">
                                <span class="input-group-text bg-primary border-primary text-white">
                                    <i class="mdi mdi-calendar-range font-13"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <a href="javascript: void(0);" class="btn btn-primary ml-2">
                        <i class="mdi mdi-autorenew"></i>
                    </a>
                    <a href="javascript: void(0);" class="btn btn-primary ml-1">
                        <i class="mdi mdi-filter-variant"></i>
                    </a>
                </form>
            </div>
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
</div>
<!-- end page title -->    

<div class="row" >
    <div class="col-xl-12 col-lg-12">

            <div class="row">
            <div class="col-lg-4">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="mdi mdi-account-multiple widget-icon"></i>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0" title="TODAY'S CASH SALES">TODAY'S CASH SALES</h5>
                        <h3 class="mt-3 mb-3">GH&#8373; <?php echo number_format($totalCashSalesForToday,2) ?></h3>
                        <p class="mb-0 text-muted">
                            <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i> <?php echo $tdate ?></span>
                              
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-lg-4">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="mdi mdi-cart-plus widget-icon bg-success-lighten text-success"></i>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0" title="TODAY'S CREDIT SALES">TODAY'S DEBT PAID</h5>
                        <h3 class="mt-3 mb-3">GH&#8373; <?php echo number_format($totalDebtPaid,2) ?></h3>
                        <p class="mb-0 text-muted">
                            <span class="text-danger mr-2"><i class="mdi mdi-arrow-down-bold"></i> <?php echo $tdate ?></span>
                            
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-lg-4">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="mdi mdi-currency-usd widget-icon bg-success-lighten text-success"></i>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0" title="TODAY'S REVENUE">TODAY'S REVENUE</h5>
                        <h3 class="mt-3 mb-3">GH&#8373; <?php echo number_format($totalRevenue,2) ?></h3>
                        <p class="mb-0 text-muted">
                            <span class="text-danger mr-2"><i class="mdi mdi-arrow-down-bold"></i> <?php echo $tdate ?></span>
                            
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-lg-4">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="mdi mdi-cart-plus widget-icon bg-success-lighten text-success"></i>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0" title="TODAY'S CREDIT SALES">TODAY'S CREDIT SALES</h5>
                        <h3 class="mt-3 mb-3">GH&#8373; <?php echo number_format($totalCreditForToday,2) ?></h3>
                        <p class="mb-0 text-muted">
                            <span class="text-danger mr-2"><i class="mdi mdi-arrow-down-bold"></i> <?php echo $tdate ?></span>
                            
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->



             <div class="col-lg-4">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="mdi mdi-pulse widget-icon"></i>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0" title="NUMBER OF CUSTOMERS">CUSTOMERS</h5>
                        <h3 class="mt-3 mb-3"><?php echo $totalCustomers ?></h3>
                        <p class="mb-0 text-muted">
                            <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i> All customers </span>
                      
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->



            <div class="col-lg-4">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="mdi mdi-pulse widget-icon"></i>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0" title="NUMBER OF CUSTOMERS">STAFFS</h5>
                        <h3 class="mt-3 mb-3"><?php echo $totalStafffs ?></h3>
                        <p class="mb-0 text-muted">
                            <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i> All Staffs </span>
                      
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

         

        </div>

    </div> <!-- end col -->

</div>
<!-- end row -->





<h4 class="header-title mt-2">Recent Selling Products</h4>
<div class="row">
          
          <div class="col-12">
              <div class="card">
                <div class="card-body">

          
                    <div class="col-lg-12">
              <!-- <table id="alternative-page-datatable " class="table table-striped dt-responsive nowrap w-100"> -->

                <table id="alternative-page-datatable" class="display table   table-striped">

                <thead>
                    <tr>
                        <th>SN.</th>
                        <th>Item Name</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Receipt #</th>
                        <th>Status</th>
                        <th>Pick Up</th>
                        <th>Date</th>
                        <th>Staff</th>

                    </tr>
                </thead>


                <tbody>


                <?php 

                    $no=1;
                    $customerName = "";

          $seleDail = mysqli_query($conn, "SELECT  ds.*, stf.* FROM daily_sales ds, staff stf


                 WHERE ds.staff = stf.id
                 AND ds.active = 'yes'
                 AND stf.active = 'yes'
                 AND ds.theDate = '$tdate'

                  ORDER BY ds.id DESC


                   ");

                  if (mysqli_num_rows($seleDail) > 0) {
                        



                   while ($gett = mysqli_fetch_assoc($seleDail)) {


                   $id = $gett["id"];
                   $customer_id = $gett["customer_id"];
                   $itemid = $gett["itemid"];
                   $itemname = $gett["itemname"];
                   $itemprice = $gett["itemprice"];
                   $quantity = $gett["quantity"];
                   $total = $gett["total"];
                   $receipt_no = $gett["receipt_no"];
                   $status = $gett["status"];
                   $pickup = $gett["pickup"];
                   $date_added = $gett["date_added"];
                   $staffid = $gett["staff"];
                   $staff = $gett["fullname"];






                   if ($customer_id==="110") {
                      
                      $customerName = "Cash Sale Customer";
                   } else {}
                   

                   


                   echo "



                
                    <tr>
                        <td>$no</td>
                        <td>$itemname</td>
                        <td>$quantity</td>
                        <td>$itemprice</td>
                        <td>$total</td>
                        <td>$receipt_no</td>
                        <td>$status</td>
                        <td>$pickup</td>
                        <td>$date_added</td>
                        <td>$staff</td>
                    </tr>
                   
               



                   ";
      
                   $no++;

                }



                  } else {
                    echo "No Data Yet";
                  }
                  




                 ?>

                   
                   </tbody>

                </table>
              </div>

              </div>
            </div>
          </div>

</div>
<!-- end row -->




 <div class="content">
                        
                
<h4 class="page-title">Calendar</h4>
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <div class="row">
                   <!--      <div class="col-lg-3">
                            <a href="#" data-toggle="modal" data-target="#add-category" class="btn btn-lg font-16 btn-primary btn-block  ">
                                <i class="mdi mdi-plus-circle-outline"></i> Create New Event
                            </a>
                            <div id="external-events" class="m-t-20">
                                <br>
                                <p class="text-muted">Drag and drop your event or click in the calendar</p>
                                <div class="external-event bg-success" data-class="bg-success">
                                    <i class="mdi mdi-checkbox-blank-circle mr-2 vertical-middle"></i>New Theme Release
                                </div>
                                <div class="external-event bg-info" data-class="bg-info">
                                    <i class="mdi mdi-checkbox-blank-circle mr-2 vertical-middle"></i>My Event
                                </div>
                                <div class="external-event bg-warning" data-class="bg-warning">
                                    <i class="mdi mdi-checkbox-blank-circle mr-2 vertical-middle"></i>Meet manager
                                </div>
                                <div class="external-event bg-danger" data-class="bg-danger">
                                    <i class="mdi mdi-checkbox-blank-circle mr-2 vertical-middle"></i>Create New theme
                                </div>
                            </div>

                            <div class="custom-control custom-checkbox mt-3">
                                <input type="checkbox" class="custom-control-input" id="drop-remove">
                                <label class="custom-control-label" for="drop-remove">Remove after drop</label>
                            </div>

                            <div class="mt-5 d-none d-xl-block">
                                <h5 class="text-center">How It Works ?</h5>

                                <ul class="pl-3">
                                    <li class="text-muted mb-3">
                                        It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                    </li>
                                    <li class="text-muted mb-3">
                                        Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage.
                                    </li>
                                    <li class="text-muted mb-3">
                                        It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                                    </li>
                                </ul>
                            </div>
                        </div>  -->

                        <div class="col-lg-12">
                            <div id="calendar"></div>
                        </div> <!-- end col -->

                    </div>  <!-- end row -->
                </div> <!-- end card body-->
            </div> <!-- end card -->

            <!-- Add New Event MODAL -->
            <div class="modal fade" id="event-modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header pr-4 pl-4 border-bottom-0 d-block">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Add New Event</h4>
                        </div>
                        <div class="modal-body pt-3 pr-4 pl-4">
                        </div>
                        <div class="text-right pb-4 pr-4">
                            <button type="button" class="btn btn-light " data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success save-event  ">Create event</button>
                            <button type="button" class="btn btn-danger delete-event  " data-dismiss="modal">Delete</button>
                        </div>
                    </div> <!-- end modal-content-->
                </div> <!-- end modal dialog-->
            </div>
            <!-- end modal-->

            <!-- Modal Add Category -->
            <div class="modal fade" id="add-category" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header border-bottom-0 d-block">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Add a category</h4>
                        </div>
                        <div class="modal-body p-4">
                            <form>
                                <div class="form-group">
                                    <label class="control-label">Category Name</label>
                                    <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Choose Category Color</label>
                                    <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                        <option value="primary">Primary</option>
                                        <option value="success">Success</option>
                                        <option value="danger">Danger</option>
                                        <option value="info">Info</option>
                                        <option value="warning">Warning</option>
                                        <option value="dark">Dark</option>
                                    </select>
                                </div>

                            </form>

                            <div class="text-right">
                                <button type="button" class="btn btn-light " data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary ml-1   save-category" data-dismiss="modal">Save</button>
                            </div>

                        </div> <!-- end modal-body-->
                    </div> <!-- end modal-content-->
                </div> <!-- end modal dialog-->
            </div>
            <!-- end modal-->
        </div>
        <!-- end col-12 -->
    </div> <!-- end row -->
    
</div> <!-- End Content -->





</div> <!-- End Content -->

 