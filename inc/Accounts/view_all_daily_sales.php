<?php 

$min = 1000;
$max = 9999;
$last_four_rand = rand($min, $max);

$tdate = date("Y-m-d");
 

$getFromDate = @$_GET["FROM"];
$getToDate = @$_GET["TO"];

 


if ($getFromDate AND $getToDate) {

    $froDD = $getFromDate;
    $toDD = $getToDate;

}else{

  $froDD = date("Y-m-d");
    $toDD = date("Y-m-d");


}


$Thestatus = "Cash Sales";
$Thestatus2 = "Credit Sales";



if ($getFromDate AND $getToDate) {
    
     /*-----------------get total cash sales ----------------*/
    $getCashTtl = mysqli_query($conn, "SELECT SUM(total) AS total FROM daily_sales WHERE active='yes'  AND status='$Thestatus' AND theDate BETWEEN '$getFromDate' AND '$getToDate'
        ORDER BY id DESC 

       ");
    $getRow2 = mysqli_fetch_assoc($getCashTtl);
    $totalAmountCS = $getRow2["total"];

    $cashSDesc = "CASH SALES";
    $cashSDate = "$getFromDate  =>  $getToDate";



               /*-----------------get total credit sales ----------------*/
    $getCreditSalesAcc = mysqli_query($conn, "SELECT SUM(total) AS total FROM daily_sales WHERE active='yes'  AND status='$Thestatus2' AND theDate BETWEEN '$getFromDate' AND '$getToDate'   ");
    $getRow5Acc = mysqli_fetch_assoc($getCreditSalesAcc);
    $totalRealCreditSales = $getRow5Acc["total"];



    $ccreddDesc = "CREDIT SALES";
    $ccreddSDate = "$getFromDate  =>  $getToDate";




        /*-----------------get total credit sales for initail payment ----------------*/
    $getCashTtl2 = mysqli_query($conn, "SELECT SUM(initial_amount) AS initial_amount FROM debtors_list_history WHERE active='yes'  AND theDate BETWEEN '$getFromDate' AND '$getToDate'
        ORDER BY id DESC 


       ");
    $getRow23 = mysqli_fetch_assoc($getCashTtl2);
    $initial_amountAmountCS = $getRow23["initial_amount"];



    /*-----------------get total credit sales ----------------*/
        $getCreSales = mysqli_query($conn, "SELECT SUM(amount_paying) AS amount_paying FROM pay_debt WHERE active='yes' AND date_paid BETWEEN '$getFromDate' AND '$getToDate'
        ORDER BY id DESC    ");
        $getRow3 = mysqli_fetch_assoc($getCreSales);
        $totalAmountCRS = $getRow3["amount_paying"];

        $credSDesc = "DEBT PAID";
        $credSDate = "$getFromDate  =>  $getToDate";


        $revDesc = "REVENUE";
        $revDate = "$getFromDate  =>  $getToDate";




} else {
  

         /*-----------------get total cash sales ----------------*/
    $getCashTtl = mysqli_query($conn, "SELECT SUM(total) AS total FROM daily_sales WHERE active='yes' AND theDate='$tdate' AND status='$Thestatus'   ");
    $getRow2 = mysqli_fetch_assoc($getCashTtl);
    $totalAmountCS = $getRow2["total"];

    $cashSDesc = "TODAY'S CASH SALES";
    $cashSDate = $tdate;





                /*-----------------get total credit sales ----------------*/
    $getCreditSalesAcc = mysqli_query($conn, "SELECT SUM(total) AS total FROM daily_sales WHERE active='yes' AND theDate='$tdate' AND status='$Thestatus2'   ");
    $getRow5Acc = mysqli_fetch_assoc($getCreditSalesAcc);
    $totalRealCreditSales = $getRow5Acc["total"];



    $ccreddDesc = "TODAY'S CREDIT SALES";
    $ccreddSDate = "$getFromDate  =>  $getToDate";




    /*-----------------get total credit sales for initail payment ----------------*/
    $getCashTtl2 = mysqli_query($conn, "SELECT SUM(initial_amount) AS initial_amount FROM debtors_list_history WHERE active='yes' AND theDate='$tdate'   ");
    $getRow23 = mysqli_fetch_assoc($getCashTtl2);
    $initial_amountAmountCS = $getRow23["initial_amount"];





    /*-----------------get total credit sales ----------------*/
        $getCreSales = mysqli_query($conn, "SELECT SUM(amount_paying) AS amount_paying FROM pay_debt WHERE active='yes' AND date_paid='$tdate'   ");
        $getRow3 = mysqli_fetch_assoc($getCreSales);
        $totalAmountCRS = $getRow3["amount_paying"];

        $credSDesc = "TODAY'S DEBT PAID";
        $credSDate = "$getFromDate  =>  $getToDate";



        $revDesc = "TODAY'S REVENUE";
        $revDate = "$getFromDate  =>  $getToDate";
}

 




$totalCashSalesForToday = $totalAmountCS + $initial_amountAmountCS;
$totalCreditForToday = $totalRealCreditSales - $initial_amountAmountCS;





$totalRevenue = $totalCashSalesForToday + $totalAmountCRS;

 ?>



<div class="content">

<?php include 'date_at_top.php'; ?>
<div class="page-title thePageTitle"> Sales | Daily sales for <?php echo date("Y-m-d H:m:s") ?></div>

<hr class="hr">


<!-- start page title -->
<div class="row">
    <div class="col-12">

      <h6>Search Sales by date</h6>
        <div class="page-title-box">
            <div class="page-title-left">

                    <div class="form-group form-inline">

                        <div class="input-group">

                          <label style="padding-right: 20px;">From: </label>
                            <input type="date" class="form-control fromDate form-control-light" id="dash-daterange" value="<?php echo $froDD ?>"  >
                            <div class="input-group-append">
                                <span class="input-group-text bg-primary border-primary text-white">
                                    <i class="mdi mdi-calendar-range font-13"></i>
                                </span>
                            </div>
                        </div>


                        <div class="input-group">

                            <label style="padding-left: 40px; padding-right: 20px;">To: </label>
                            <input type="date" class="form-control toDate form-control-light" id="dash-daterange" value="<?php echo $toDD ?>">
                            <div class="input-group-append">
                                <span class="input-group-text bg-primary border-primary text-white">
                                    <i class="mdi mdi-calendar-range font-13"></i>
                                </span>
                            </div>
                        </div>

                        <button style="margin: 10px;" class="btn btn-rounded btn-primary" onclick="searchSAlesByDate()" >Search
                            <i class="mdi mdi-autorenew"></i>
                        </button>

                       


                    </div>
                   
            </div>
            <div class="page-title thePageTitle"></div>
        </div>
    </div>
</div>
<hr class="hr">
<!-- end page title -->    



    <div class="container">




          <div class="row">
              <div class="col-xl-3 col-lg-3">
                  <div class="card widget-flat">
                      <div class="card-body">
                          <div class="float-right">
                              <i class="mdi mdi-currency-btc widget-icon bg-danger rounded-circle text-white"></i>
                          </div>
                          <h5 class="text-muted font-weight-normal mt-0" title="TODAY'S CASH SALES"><?php echo $cashSDesc ?></h5>
                          <h3 class="mt-3 mb-3"> GH&#8373; <?php echo number_format($totalCashSalesForToday,2) ?>  </h1>
                          <p class="mb-0 text-muted">
                              <span class="badge badge-info mr-1">
                                  <i class="mdi mdi-arrow-down-bold"></i> <?php echo $cashSDate ?></span>
                          </p>
                      </div>
                  </div>
              </div> <!-- end col-->

              <div class="col-xl-3 col-lg-3">
                  <div class="card widget-flat bg-primary text-white">
                      <div class="card-body">
                          <div class="float-right">
                              <i class="mdi mdi-pulse widget-icon"></i>
                          </div>
                          <h5 class=" font-weight-normal mt-0 text-white" title="TODAY'S CREDIT SALES"><?php echo $credSDesc ?></h5>

                          <i class="mdi mdi-currency-usd widget-icon bg-light-lighten rounded-circle text-white"></i>


                          <h3 class="mt-3 mb-3">GH&#8373; <?php echo number_format($totalAmountCRS,2) ?></h1>
                          <p class="mb-0 text-muted">
                              <span class="badge badge-info mr-1">
                                  <i class="mdi mdi-arrow-down-bold"></i> <?php echo $credSDate ?></span>
                          </p>
                      </div>
                  </div>
              </div> <!-- end col-->

              <div class="col-xl-3 col-lg-3">
                  <div class="card widget-flat bg-success text-white">
                      <div class="card-body">
                          <div class="float-right">
                              <i class="mdi mdi-account-multiple widget-icon bg-white text-success"></i>
                          </div>
                          <h5 class="text-uppercase mt-0" title="Customers"><?php echo $revDesc ?></h5>
                          <h3 class="mt-3 mb-3">GH&#8373; <?php echo number_format($totalRevenue,2) ?></h1>
                          <p class="mb-0 text-muted">
                              <span class="badge badge-info mr-1">
                                  <i class="mdi mdi-arrow-down-bold"></i> <?php echo $revDate ?></span>
                          </p>
                      </div>
                  </div>
              </div> <!-- end col-->



              <div class="col-xl-3 col-lg-3">
                  <div class="card widget-flat bg-primary text-white">
                      <div class="card-body">
                          <div class="float-right">
                              <i class="mdi mdi-pulse widget-icon"></i>
                          </div>
                          <h5 class=" font-weight-normal mt-0 text-white" title="TODAY'S CREDIT SALES"><?php echo $ccreddDesc ?></h5>

                          <i class="mdi mdi-currency-usd widget-icon bg-light-lighten rounded-circle text-white"></i>


                          <h3 class="mt-3 mb-3">GH&#8373; <?php echo number_format($totalCreditForToday,2) ?></h1>
                          <p class="mb-0 text-muted">
                              <span class="badge badge-info mr-1">
                                  <i class="mdi mdi-arrow-down-bold"></i> <?php echo $ccreddSDate ?></span>
                          </p>
                      </div>
                  </div>
              </div> <!-- end col-->


         <!--      <div class="col-xl-3 col-lg-6">
                  <div class="card widget-flat bg-primary text-white">
                      <div class="card-body">
                          <div class="float-right">
                              <i class="mdi mdi-currency-usd widget-icon bg-light-lighten rounded-circle text-white"></i>
                          </div>
                          <h5 class="font-weight-normal mt-0" title="Revenue">Revenue</h5>
                          <h3 class="mt-3 mb-3 text-white">$10,245</h3>
                          <p class="mb-0">
                              <span class="badge badge-info mr-1">
                                  <i class="mdi mdi-arrow-up-bold"></i> 17.26%</span>
                              <span class="text-nowrap">Since last month</span>
                          </p>
                      </div>
                  </div>
              </div>  -->
          </div>
          <!-- end row-->









          <div class="accordion custom-accordion" id="custom-accordion-one">
              <div class="card mb-0">
                  <div class="card-header" id="headingFour">
                      <h5 class="m-0">
                          <a class="custom-accordion-title d-block py-1"
                              data-toggle="collapse" href="#collapseFour"
                              aria-expanded="true" aria-controls="collapseFour">
                              CASH SALES SUMMARY <i
                                  class="mdi mdi-chevron-down accordion-arrow"></i>
                          </a>
                      </h5>
                  </div>
                      
                  <div id="collapseFour" class="collapse show"
                      aria-labelledby="headingFour"
                      data-parent="#custom-accordion-one">
                      <div class="card-body">
                          

                <div class="row">
                    
                    <div class="col-12">
                        <div class="card">
                          <div class="card-body">

                    
                              <div class="col-lg-12">
                        <!-- <table id="alternative-page-datatable " class="table table-striped dt-responsive nowrap w-100"> -->

                              <table id="alternative-page-datatable" class="display table  table-striped">

                              <thead>
                                  <tr>
                                      <th>SN.</th>
                                      <th>Item Name</th>
                                      <th>Qty</th>
                                      <th>Price</th>
                                      <th>Total</th>
                                      <!-- <th>Receipt #</th> -->
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




                      if ($getFromDate AND $getToDate) {

                  
                          $seleDail = mysqli_query($conn, "SELECT  ds.*, stf.* FROM daily_sales ds, staff stf


                               WHERE ds.staff = stf.id
                               AND ds.active = 'yes'
                               AND stf.active = 'yes'
                               AND ds.theDate BETWEEN '$getFromDate' AND '$getToDate'
                               AND status='$Thestatus'
                               -- AND ds.staff = '$login_session'

                                ORDER BY ds.id DESC


                                 ");

                              }else{


                                $seleDail = mysqli_query($conn, "SELECT  ds.*, stf.* FROM daily_sales ds, staff stf


                               WHERE ds.staff = stf.id
                               AND ds.active = 'yes'
                               AND stf.active = 'yes'
                               AND ds.theDate = '$tdate'
                               AND status='$Thestatus'
                               -- AND ds.staff = '$login_session'

                                ORDER BY ds.id DESC


                                 ");


                              }



                                

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









                      </div>
                  </div>
              </div>



              <div class="card mb-0">
                  <div class="card-header" id="headingFive">
                      <h5 class="m-0">
                          <a class="custom-accordion-title collapsed d-block py-1"
                              data-toggle="collapse" href="#collapseFive"
                              aria-expanded="false" aria-controls="collapseFive">
                              DEBT PAID SUMMARY <i
                                  class="mdi mdi-chevron-down accordion-arrow"></i>
                          </a>
                      </h5>
                  </div>
                  <div id="collapseFive" class="collapse"
                      aria-labelledby="headingFive"
                      data-parent="#custom-accordion-one">
                      <div class="card-body">
                             <div class="row">
                    
                    <div class="col-12">
                        <div class="card">
                          <div class="card-body">

                    
                              <div class="col-lg-12">
                        <!-- <table id="alternative-page-datatable " class="table table-striped dt-responsive nowrap w-100"> -->

                              <table id="alternative-page-datatable" class="display table dt-responsive  table-striped">

                              <thead>
                                  <tr>
                                      <th>SN.</th>
                                      <th> Name</th>
                                      <th>Amount</th>
                                      <th>Balance</th>
                                      <th>Date</th>
                                      <th>Staff</th>

                                  </tr>
                              </thead>


                              <tbody>


                              <?php 

                                  $no=1;



                                    if ($getFromDate AND $getToDate) {

                  
                          $seleDail = mysqli_query($conn, "SELECT  ds.*, stf.* FROM daily_sales ds, staff stf


                               WHERE ds.staff = stf.id
                               AND ds.active = 'yes'
                               AND stf.active = 'yes'
                               AND ds.theDate BETWEEN '$getFromDate' AND '$getToDate'
                               -- AND ds.staff = '$login_session'

                                ORDER BY ds.id DESC


                                 ");



                           $seleDail1 = mysqli_query($conn, "SELECT  pd.*, cus.*, stf.* FROM pay_debt pd, debtors_list cus, staff stf


                               WHERE pd.staff = stf.id
                               AND pd.customer_id = cus.customerID
                               AND pd.active = 'yes'
                               AND cus.active = 'yes'
                               AND stf.active = 'yes'
                               AND pd.date_paid BETWEEN '$getFromDate' AND '$getToDate'

                                ORDER BY pd.id DESC


                                 ");

                              }else{


                                $seleDail1 = mysqli_query($conn, "SELECT  pd.*, cus.*, stf.* FROM pay_debt pd, debtors_list cus, staff stf


                               WHERE pd.staff = stf.id
                               AND pd.customer_id = cus.customerID
                               AND pd.active = 'yes'
                               AND cus.active = 'yes'
                               AND stf.active = 'yes'
                               AND pd.date_paid = '$tdate'

                                ORDER BY pd.id DESC


                                 ");


                              }


                               

                                if (mysqli_num_rows($seleDail1) > 0) {
                                      



                                 while ($gett = mysqli_fetch_assoc($seleDail1)) {


                                 $id = $gett["id"];
                                 $Cusname = $gett["name"];
                                 $amount_paying = $gett["amount_paying"];
                                 $balance = $gett["balance"];
                                 $date_paid = $gett["date_paid"];
                                 $staff = $gett["fullname"];




                                 echo "



                              
                                  <tr>
                                      <td>$no</td>
                                      <td>$Cusname</td>
                                      <td>$amount_paying</td>
                                      <td>$balance</td>
                                      <td>$date_paid</td>
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
                      </div>
                  </div>
              </div>











              <div class="card mb-0">
                  <div class="card-header" id="headingFour">
                      <h5 class="m-0">
                          <a class="custom-accordion-title d-block py-1"
                              data-toggle="collapse" href="#collapseFourB"
                              aria-expanded="false" aria-controls="collapseFourB">
                              CREDIT SALES SUMMARY <i
                                  class="mdi mdi-chevron-down accordion-arrow"></i>
                          </a>
                      </h5>
                  </div>
                      
                  <div id="collapseFourB" class="collapse"
                      aria-labelledby="headingFour"
                      data-parent="#custom-accordion-one">
                      <div class="card-body">
                          

                <div class="row">
                    
                    <div class="col-12">
                        <div class="card">
                          <div class="card-body">

                    
                              <div class="col-lg-12">
                        <!-- <table id="alternative-page-datatable " class="table table-striped dt-responsive nowrap w-100"> -->

                              <!-- <table id="alternative-page-datatable" class="display table dt-responsive  table-striped"> -->
                              <table id="alternative-page-datatable" class="display table   table-striped">

                              <thead>
                                  <tr>
                                      <th>SN.</th>
                                      <th>Item Name</th>
                                      <th>Qty</th>
                                      <th>Price</th>
                                      <th>Total</th>
                                      <!-- <th>Receipt #</th> -->
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




                      if ($getFromDate AND $getToDate) {

                  
                          $seleDail = mysqli_query($conn, "SELECT  ds.*, stf.* FROM daily_sales ds, staff stf


                               WHERE ds.staff = stf.id
                               AND ds.active = 'yes'
                               AND stf.active = 'yes'
                               AND ds.theDate BETWEEN '$getFromDate' AND '$getToDate'
                               AND status='$Thestatus2'
                               -- AND ds.staff = '$login_session'

                                ORDER BY ds.id DESC


                                 ");

                              }else{


                                $seleDail = mysqli_query($conn, "SELECT  ds.*, stf.* FROM daily_sales ds, staff stf


                               WHERE ds.staff = stf.id
                               AND ds.active = 'yes'
                               AND stf.active = 'yes'
                               AND ds.theDate = '$tdate'
                                AND status='$Thestatus2'
                               -- AND ds.staff = '$login_session'

                                ORDER BY ds.id DESC


                                 ");


                              }



                                

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









                      </div>
                  </div>
              </div>


             
          </div>


          
   </div> <!-- end containr -->
</div>

<hr>
<hr>


<script type="text/javascript">
  // $('#alternative-page-datatable').DataTable();


  // Sort by 3rd column first, and then 4th column
$(document).ready( function() {
  $('#alternative-page-datatable').dataTable( {
    "order": []
    "aaSorting": []



  } );
} );
 

</script>


<script type="text/javascript">


</script>