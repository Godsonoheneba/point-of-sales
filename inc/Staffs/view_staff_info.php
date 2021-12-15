<?php 


if (@$_GET["d13f6bb08e4138e4cb5fe099b36bc69bd"]) {
      
      $login_session = $_GET["d13f6bb08e4138e4cb5fe099b36bc69bd"];
}


  ////////////////////////////SHOW STAFF PROFILE//////////////


    $queryInfo22 = mysqli_query($conn, "SELECT * FROM staff WHERE id='$login_session' AND active='yes' AND confirm='yes' ");


    $fetch =mysqli_fetch_assoc($queryInfo22);
    $table_id = $fetch["id"];
    $staffID = $fetch["staffID"];
    $username = $fetch["username"];
    $password = $fetch["password"];
    $real_password = $fetch["real_password"];
    $fullname = $fetch["fullname"];
    $roleDB = $fetch["role"];
    $mobile = $fetch["mobile"];
    $status = $fetch["sstatus"];
    $sdate_added = $fetch["sdate_added"];
    $last_login = $fetch["last_login"];
 

    if ($roleDB==="1") {
        $role = "Administrator";
    } else {
        $role = "Staff";
       
    }







  ?>







<div class="row">
  <div class="col-xl-4 col-lg-3">
      <div class="card text-center">
          <div class="card-body">
              <img src="assets/images/users/avatar-1.jpg" class="rounded-circle avatar-lg img-thumbnail"
              alt="profile-image">

              <h4 class="mb-0 mt-2"><?php echo strtoupper($fullname) ?></h4>
              <p class="text-muted font-14"><?php echo $role ?></p>

              <button type="button" class="btn btn-success btn-sm mb-2">Follow</button>
              <button type="button" class="btn btn-danger btn-sm mb-2">Message</button>

              <div class="text-left mt-3">
                  <h4 class="font-13 text-uppercase">About Me :</h4>
                  <!-- <p class="text-muted font-13 mb-3">
                      Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                      1500s, when an unknown printer took a galley of type.
                  </p> -->
                  <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ml-2"><?php echo strtoupper($fullname) ?></span></p>

                      <p class="text-muted mb-2 font-13"><strong>Username :</strong> <span class="ml-2 "><?php echo $username ?></span></p>

                  <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ml-2"><?php echo $mobile ?></span></p>

              

                  <p class="text-muted mb-1 font-13"><strong>Date Added :</strong> <span class="ml-2"><?php echo $sdate_added ?></span></p>



                  <p class="text-muted mb-1 font-13"><strong>Status :</strong> <span class="ml-2"><?php echo $status ?></span></p>



                  <p class="text-muted mb-1 font-13"><strong>Last Login :</strong> <span class="ml-2"><?php echo $last_login ?></span></p>




              </div>

          
          </div> <!-- end card-body -->
      </div> <!-- end card -->

   

  </div> <!-- end col-->

  <div class="col-xl-8 col-lg-9">
      <div class="card">
          <div class="card-body">
              <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                  <li class="nav-item">
                      <a href="#Sales" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0 active">
                          Sales 
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="#Payment" data-toggle="tab" aria-expanded="true" class="nav-link rounded-0 ">
                          Payment
                      </a>
                  </li>

                   <li class="nav-item">
                      <a href="#PickUps" data-toggle="tab" aria-expanded="true" class="nav-link rounded-0 ">
                          Pick Ups
                      </a>
                  </li>


                  <li class="nav-item">
                      <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                          Settings
                      </a>
                  </li>
              </ul>
              <div class="tab-content">
                  <div class="tab-pane active" id="Sales">

                      <h5 class="text-uppercase"><i class="mdi mdi-briefcase mr-1"></i>
                          ALL SALES MADE BY <span class="text-danger"><?php echo strtoupper($fullname) ?></span> </h5>




                    <?php 



                      $tdate = date("Y-m-d");


                        /*-----------------get total cash sales ----------------*/
                      $getCashTtl = mysqli_query($conn, "SELECT SUM(total) AS total FROM daily_sales WHERE active='yes' AND theDate='$tdate'   ");
                      $getRow2 = mysqli_fetch_assoc($getCashTtl);
                      $totalAmountCS = $getRow2["total"];




                        /*-----------------get total credit sales ----------------*/
                      $getCreSales = mysqli_query($conn, "SELECT SUM(amount_paying) AS amount_paying FROM pay_debt WHERE active='yes' AND date_paid='$tdate'   ");
                      $getRow3 = mysqli_fetch_assoc($getCreSales);
                      $totalAmountCRS = $getRow3["amount_paying"];


                      $totalRevenue = $totalAmountCS + $totalAmountCRS;










                     ?>




            <div class="row">
              <div class="col-xl-3 col-lg-4">
                  <div class="card widget-flat">
                      <div class="card-body">
                          <div class="float-right">
                              <i class="mdi mdi-currency-btc widget-icon bg-danger rounded-circle text-white"></i>
                          </div>
                          <h6 class="text-muted font-weight-normal mt-0" title="TODAY'S CASH SALES">TODAY'S CASH SALES</h6>
                          <h3 class="mt-3 mb-3"> GH&#8373; <?php echo number_format($totalAmountCS,2) ?>  </h3>
                          
                      </div>
                  </div>
              </div> <!-- end col-->

              <div class="col-xl-3 col-lg-4">
                  <div class="card widget-flat bg-primary text-white">
                      <div class="card-body">
                          <div class="float-right">
                              <i class="mdi mdi-pulse widget-icon"></i>
                          </div>
                          <h6 class=" font-weight-normal mt-0 text-white" title="TODAY'S CREDIT SALES">TODAY'S CREDIT SALES</h6>

                          <i class="mdi mdi-currency-usd widget-icon bg-light-lighten rounded-circle text-white"></i>


                          <h3 class="mt-3 mb-3">GH&#8373; <?php echo number_format($totalAmountCRS,2) ?></h3>
                         <!--  <p class="mb-0 text-muted">
                              <span class="badge badge-info mr-1">
                                  <i class="mdi mdi-arrow-down-bold"></i> <?php echo $tdate ?></span>
                          </p> -->
                      </div>
                  </div>
              </div> <!-- end col-->

              <div class="col-xl-3 col-lg-4">
                  <div class="card widget-flat bg-success text-white">
                      <div class="card-body">
                          <div class="float-right">
                              <i class="mdi mdi-account-multiple widget-icon bg-white text-success"></i>
                          </div>
                          <h6 class="text-uppercase mt-0" title="Customers">TODAY'S REVENUE</h6>
                          <h3 class="mt-3 mb-3">GH&#8373; <?php echo number_format($totalRevenue,2) ?></h3>
                         <!--  <p class="mb-0 text-muted">
                              <span class="badge badge-info mr-1">
                                  <i class="mdi mdi-arrow-down-bold"></i> <?php echo $tdate ?></span>
                          </p> -->
                      </div>
                  </div>
              </div> <!-- end col-->

            
            </div>
            <!-- end todays sales amount-->




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

                                $seleDail = mysqli_query($conn, "SELECT  ds.*, stf.* FROM daily_sales ds, staff stf


                               WHERE ds.staff = stf.id
                               AND ds.active = 'yes'
                               AND stf.active = 'yes'
                               AND ds.staff = '$login_session'

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
                                 $DBdate_added = $gett["date_added"];
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
                                      <td>$DBdate_added</td>
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





      </div> <!-- end tab-pane -->
                 























                  <div class="tab-pane show " id="Payment">

                       <div class="row">
          
          <div class="col-12">
              <div class="card">
                <div class="card-body">

          
            <div class="col-lg-12">


                <table id="alternative-page-datatable" class="display table dt-responsive  ">

                <thead>
                    <tr>
                        <th>SN></th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Amount Paid</th>
                        <th>Balance Before</th>
                        <th>Receipt #</th>
                        <th>Date </th>
                  

                    </tr>
                </thead>


                <tbody>


                <?php 


                    $no = 1;

                $selDeb = mysqli_query($conn, "SELECT * FROM pay_debt


                 WHERE active ='yes'  AND staff='$login_session' ORDER BY id DESC ");




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




                   echo "



                
                    <tr>
                        <td>$no</td>
                        <td>$name</td>
                        <td>$mobile</td>
                        <td>$amount_paying</td>
                        <td>$dbalance</td>
                        <td>$receipt_no</td>
                        <td>$date_added</td>
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
                  <!-- end timeline content-->



                  <div class="tab-pane show " id="PickUps">


                       <h5 class="text-uppercase"><i class="mdi mdi-briefcase mr-1"></i>
                          ALL PICKUPS MADE BY <span class="text-danger"><?php echo strtoupper($fullname) ?></span> </h5>




                        <div class="row">
          
          <div class="col-12">
              <div class="card">
                <div class="card-body">

          
                    <div class="col-lg-12">
              <!-- <table id="alternative-page-datatable " class="table table-striped dt-responsive nowrap w-100"> -->

                <table id="alternative-page-datatable" class="display table dt-responsive  ">

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

                $selDeb = mysqli_query($conn, "SELECT * FROM pickups WHERE active ='yes' AND done_by='$login_session'    ORDER BY id DESC ");




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

              
     </div>
                  <!-- end timeline content-->


                  <div class="tab-pane" id="settings">

                          <h5 class="mb-4 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle mr-1"></i> Personal Info</h5>
                          <div class="row">




                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="Username">Username </label>
                                <input class="username form-control" type="Username " id="Username" required placeholder="Enter your Username .eg. dacosta " value="<?php echo $username ?>" onkeyup="checkUsername(this)" >
                            </div>
                          </div>




                             <div class="col-md-6">
                               <div class="form-group">
                                <label for="fullname">Full Name</label>
                                <input class="fullname form-control"  type="text" id="fullname" placeholder="Enter your name" required value="<?php echo $fullname ?>">
                            </div>
                          </div>


                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="Mobile">Mobile</label>
                                <input class="mobile form-control"   type="text" required id="Mobile" placeholder="Enter your Mobile" onkeyup="checkMobiles(this)" maxlength ="10" value="<?php echo $mobile ?>">
                            </div>
                          </div>
                            



                            


                          <div class="text-right">
                            
                              <button onclick="updateStaffInfo('<?php echo $login_session ?>')" type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save" ></i> Update User Info</button>
                          </div>



                          </div> <!-- end row -->





                      
                          <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building mr-1"></i> Change Password / Security</h5>

                          <div class="row">

                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="password">Old Password</label>
                                      <input class="old_password form-control" type="password" required id="password" placeholder="Enter your password">
                                   </div>

                              </div>



                              <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input class="new_password form-control" type="password" required id="password" placeholder="Confirm your password">
                                   </div>


                              </div> <!-- end col -->



                            <div class="text-right">
                              <button type="submit" onclick="changePassword('<?php echo $login_session ?>')" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Change Password</button>
                          </div>



                          </div> <!-- end row -->

                        
              
                         
                  
                  </div>
                  <!-- end settings content-->

              </div> <!-- end tab-content -->
          </div> <!-- end card body -->
      </div> <!-- end card -->
  </div> <!-- end col -->
</div>
<!-- end row-->




<script type="text/javascript">
  function checkUsername(checkit) {

  var check = /[^A-Z a-z]/g;  
  checkit.value = checkit.value.replace(check, "");
}












</script>







  <?php
  





