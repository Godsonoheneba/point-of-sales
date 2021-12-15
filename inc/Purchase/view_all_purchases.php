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


 
 ?>





<div class="content">

<?php include 'date_at_top.php'; ?>
<div class="page-title thePageTitle"> Purchase | View All Purchases / Sales</div>

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

                        <button style="margin: 10px;" class="btn btn-rounded btn-primary" onclick="searchPurcByDate()" >Search
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



<!-- <div class="alert alert-primary" role="alert">
    <strong>SALES - </strong>View All sales 
</div>
 -->
    <div class="container">

      <div class="row">
          
          <div class="col-12">
              <div class="card">
                <div class="card-body">

          
                    <div class="col-lg-12">
              <!-- <table id="alternative-page-datatable " class="table table-striped dt-responsive nowrap w-100"> -->

                <!-- <table id="alternative-page-datatable" class="display table dt-responsive  table-striped"> -->
                <table id="alternative-page-datatable" class="display table  table-striped">

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





                      if ($getFromDate AND $getToDate) {

                  
                          $seleDail = mysqli_query($conn, "SELECT  ds.*, stf.* FROM daily_sales ds, staff stf


                               WHERE ds.staff = stf.id
                               AND ds.active = 'yes'
                               AND stf.active = 'yes'
                               AND ds.theDate BETWEEN '$getFromDate' AND '$getToDate'
                               -- AND ds.staff = '$login_session'

                                ORDER BY ds.id DESC


                                 ");



                              }else{


                  $seleDail = mysqli_query($conn, "SELECT  ds.*, stf.* FROM daily_sales ds, staff stf


                 WHERE ds.staff = stf.id
                 AND ds.active = 'yes'
                 AND stf.active = 'yes'
                 AND ds.theDate = '$tdate'

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
          
   </div> <!-- end containr -->
</div>




<script type="text/javascript">
  // $('#alternative-page-datatable').DataTable();


  // Sort by 3rd column first, and then 4th column
$(document).ready( function() {
  $('#alternative-page-datatable').dataTable( {
    "order": []
    "aaSorting": []



    // aaSorting: [[2, 'asc']],
    //     bPaginate: false,
    //     bFilter: false,
    //     bInfo: false,
    //     bSortable: true,
    //     bRetrieve: true,
    //     aoColumnDefs: [
    //         { "aTargets": [ 0 ], "bSortable": true },
    //         { "aTargets": [ 1 ], "bSortable": true },
    //         { "aTargets": [ 2 ], "bSortable": true },
    //         { "aTargets": [ 3 ], "bSortable": false }
    //     ]




  } );
} );
 


// No initial sorting
// $(document).ready( function() {
//   $('#alternative-page-datatable').DataTable( {
//     "aaSorting": []
//   } );
// } );


</script>