<?php 

$min = 1000;
$max = 9999;
$last_four_rand = rand($min, $max);



$tdate = date("Y-m-d");





 ?>



<div class="content">

<?php include 'date_at_top.php'; ?>
<div class="page-title thePageTitle"> DEBTORS | View All Debtors</div>

<hr class="hr">

    <div class="container">

      <div class="row">
          
          <div class="col-12">
              <div class="card">
                <div class="card-body">

          
                    <div class="col-lg-12">
              <!-- <table id="alternative-page-datatable " class="table table-striped dt-responsive nowrap w-100"> -->

                <!-- <table id="alternative-page-datatable" class="display table dt-responsive  "> -->
                <table id="alternative-page-datatable" class="display table  ">

                <thead>
                    <tr>
                        <th>SN></th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Location</th>
                        <th>Amount Owing</th>
                        <th>Amount Paid</th>
                        <th>Balance</th>
                  

                    </tr>
                </thead>


                <tbody>


                <?php 


                    $no = 1;

                $selDeb = mysqli_query($conn, "SELECT * FROM debtors_list WHERE active ='yes'   ORDER BY id DESC ");




                  if (mysqli_num_rows($selDeb) > 0) {
                        



                   while ($gett = mysqli_fetch_assoc($selDeb)) {


                   $id = $gett["id"];
                   $customerID = $gett["customerID"];
                   $name = $gett["name"];
                   $mobile = $gett["mobile"];
                   $location = $gett["location"];
                   $amount_owing = $gett["amount_owing"];
                   $amount_paid = $gett["amount_paid"];
                   $current_balance = $gett["balance"];

                   $amount_owing = number_format($amount_owing, 2);
                   $amount_paid = number_format($amount_paid, 2);
                   $current_balance = number_format($current_balance, 2);



                   echo "



                
                    <tr>
                        <td>$no</td>
                        <td>$name</td>
                        <td>$mobile</td>
                        <td>$location</td>
                        <td>$amount_owing</td>
                        <td>$amount_paid</td>
                        <td>$current_balance</td>
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