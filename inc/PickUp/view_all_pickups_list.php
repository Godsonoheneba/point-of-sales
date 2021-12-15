<?php 

$min = 1000;
$max = 9999;
$last_four_rand = rand($min, $max);



$tdate = date("Y-m-d");





 ?>



<div class="content">

<?php include 'date_at_top.php'; ?>
<div class="page-title thePageTitle"> PICKUPS / KEEPINGS | View All List</div>

<hr class="hr">

    <div class="container">

      <div class="row">
          
          <div class="col-12">
              <div class="card">
                <div class="card-body">

          
                    <div class="col-lg-12">
              <!-- <table id="alternative-page-datatable " class="table table-striped dt-responsive nowrap w-100"> -->

                <!-- <table id="alternative-page-datatable" class="display table dt-responsive  "> -->
                <table id="alternative-page-datatable" class="display table ">

                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Receipt #</th>
                        <th>Status</th>
                        <th>Date </th>
                        <th>Done By</th>

                    </tr>
                </thead>


                <tbody>


                <?php 


                    $no = 1;

                $selDeb = mysqli_query($conn, "SELECT * FROM pickups WHERE active ='yes'   ORDER BY id DESC ");




                  if (mysqli_num_rows($selDeb) > 0) {
                        



                   while ($gett = mysqli_fetch_assoc($selDeb)) {


                   $id = $gett["id"];
                   $receipt_no = $gett["receipt_no"];
                   $status = $gett["status"];
                   $Pdate = $gett["date"];
                   $done_by = $gett["done_by"];


                  $selStaff = mysqli_query($conn, "SELECT * FROM staff WHERE active ='yes'  AND id='$done_by'   ");

                  $gettSt = mysqli_fetch_assoc($selStaff);


                   $fullname = $gettSt["fullname"];

                   if ($status==="Keeping") {
                      
                      $badge = "<span class=\"badge badge-outline-success\">$status</span>";
                   } else {
                     $badge = "<span class=\"badge badge-outline-danger\">$status</span>";
                   }
                   


                   
                   echo "



                
                    <tr>
                        <td>$no</td>
                        <td>$receipt_no</td>
                        <td>$badge</td>
                        <td>$Pdate</td>
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