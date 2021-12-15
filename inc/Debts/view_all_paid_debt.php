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
<div class="page-title thePageTitle"> DEBTORS | View Paid Debts</div>


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

                        <button style="margin: 10px;" class="btn btn-rounded btn-primary" onclick="searchPaidDebtByDate()" >Search
                            <i class="mdi mdi-autorenew"></i>
                        </button>

                       


                    </div>
                   
            </div>
            <div class="page-title thePageTitle"></div>
        </div>
    </div>
</div>
<hr class="hr">


    <div class="container">





      <div class="row">
          
          <div class="col-12">
              <div class="card">
                <div class="card-body">

          
            <div class="col-lg-12">


                <!-- <table id="alternative-page-datatable" class="display table dt-responsive  "> -->
                <table id="alternative-page-datatable" class="display table   ">

                <thead>
                    <tr>
                        <th>SN></th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Amount Paid</th>
                        <th>Balance Before</th>
                        <th>Receipt #</th>
                        <th>Date </th>
                        <th>Staff </th>
                  

                    </tr>
                </thead>


                <tbody>


                <?php 


                    $no = 1;



                 if ($getFromDate AND $getToDate) {


                  $selDeb = mysqli_query($conn, "SELECT * FROM pay_debt


                 WHERE active ='yes' AND date_paid BETWEEN '$getFromDate' AND '$getToDate' ORDER BY id DESC ");




                }else{

                  $selDeb = mysqli_query($conn, "SELECT * FROM pay_debt


                 WHERE active ='yes' AND date_paid='$tdate' ORDER BY id DESC ");


                }

                




                  if (mysqli_num_rows($selDeb) > 0) {
                        



                   while ($gett = mysqli_fetch_assoc($selDeb)) {


                   $id = $gett["id"];
                   $debt_id = $gett["debt_id"];
                   $customer_id = $gett["customer_id"];
                   $amount_paying = $gett["amount_paying"];
                   $dbalance = $gett["dbalance"];
                   $date_paid = $gett["date_paid"];
                   $receipt_no = $gett["receipt_no"];
                   $staff = $gett["staff"];
                   $date_added = $gett["date_added"];

              

                   $amount_paying = number_format($amount_paying, 2);
                   $dbalance = number_format($dbalance, 2);


                   $selDDD = mysqli_query($conn, "SELECT * FROM debtors_list


                 WHERE active ='yes'  AND customerID='$customer_id' ");


                   $gett222 = mysqli_fetch_assoc($selDDD);


                   $name = $gett222["name"];
                   $mobile = $gett222["mobile"];
                   $location = $gett222["location"];
                   $amount_owing = $gett222["amount_owing"];


                  $selStaff = mysqli_query($conn, "SELECT * FROM staff WHERE active ='yes'  AND id='$staff'   ");

                  $gettSt = mysqli_fetch_assoc($selStaff);


                   $fullname = $gettSt["fullname"];
  




                   echo "



                
                    <tr>
                        <td>$no</td>
                        <td>$name</td>
                        <td>$mobile</td>
                        <td>$amount_paying</td>
                        <td>$dbalance</td>
                        <td>$receipt_no</td>
                        <td>$date_added</td>
                        <td>$fullname</td>
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




  } );
} );
 


</script>