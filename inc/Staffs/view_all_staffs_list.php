<?php 



// if ($roleDB==='1') {
  


  /*-------------count STAFF-------------------*/
  $cStaff = mysqli_query($conn, "SELECT count(*) AS cStf  FROM staff WHERE active='yes'   ");
  $getcStaff = mysqli_fetch_array($cStaff);
  $totalStaff = $getcStaff['cStf'];



    /*-------------count CONFIRM STAFF-------------------*/
  $cCStaff = mysqli_query($conn, "SELECT count(*) AS cCStf  FROM staff WHERE active='yes' AND confirm='yes'   ");
  $getcCStaff = mysqli_fetch_array($cCStaff);
  $confirmedSTaff = $getcCStaff['cCStf'];



    /*-------------count NON CONFIRM STAFF-------------------*/
  $cNCStaff = mysqli_query($conn, "SELECT count(*) AS cNCStf  FROM staff WHERE active='yes' AND confirm='no'   ");
  $getcNCStaff = mysqli_fetch_array($cNCStaff);
  $NonConfirmed = $getcNCStaff['cNCStf'];



  ?>







<div class="content">

<?php include 'date_at_top.php'; ?>
<div class="page-title thePageTitle"> Staffs | View All Staff</div>

<hr class="hr">

    <div class="container">




          <div class="row">
              <div class="col-xl-3 col-lg-4">
                  <div class="card widget-flat">
                      <div class="card-body">
                          <div class="float-right">
                              <i class="mdi mdi-currency-btc widget-icon bg-danger rounded-circle text-white"></i>
                          </div>
                          <h5 class="text-muted font-weight-normal mt-0" title="TODAY'S CASH SALES">TOTAL STAFF</h5>
                          <h1 class="mt-3 mb-3"> <?php echo $totalStaff ?>  </h1>
                          
                      </div>
                  </div>
              </div> <!-- end col-->

              <div class="col-xl-3 col-lg-4">
                  <div class="card widget-flat bg-primary text-white">
                      <div class="card-body">
                          <div class="float-right">
                              <i class="mdi mdi-pulse widget-icon"></i>
                          </div>
                          <h5 class=" font-weight-normal mt-0 text-white" title="TODAY'S CREDIT SALES">CONFIRMED STAFFS</h5>

                          <i class="mdi mdi-currency-usd widget-icon bg-light-lighten rounded-circle text-white"></i>


                          <h1 class="mt-3 mb-3"><?php echo $confirmedSTaff ?></h1>
                         
                      </div>
                  </div>
              </div> <!-- end col-->

              <div class="col-xl-3 col-lg-4">
                  <div class="card widget-flat bg-success text-white">
                      <div class="card-body">
                          <div class="float-right">
                              <i class="mdi mdi-account-multiple widget-icon bg-white text-success"></i>
                          </div>
                          <h5 class="text-uppercase mt-0" title="Customers">NON-CONFIRMED</h5>
                          <h1 class="mt-3 mb-3"><?php echo $NonConfirmed ?></h1>
                         
                      </div>
                  </div>
              </div> <!-- end col-->

            
          </div>
          <!-- end row-->









<!-- <div class="accordion custom-accordion" id="custom-accordion-one"> -->

    <?php 



      $tabID="";
      $seleStaff = mysqli_query($conn, "SELECT * FROM staff WHERE active='yes' ");

      while ($getttt = mysqli_fetch_assoc($seleStaff)) {
   
      $tabID = $getttt["id"];
      $staffID = $getttt["staffID"];
      $username = $getttt["username"];
      $fullname = $getttt["fullname"];
      $Staffrole = $getttt["role"];
      $mobile = $getttt["mobile"];
      $date_added = $getttt["sdate_added"];
      $sstatus = $getttt["sstatus"];
      $confirm = $getttt["confirm"];


 if ($Staffrole==="1") {
        $Staffrole = "Administrator";
    } else {
        $Staffrole = "Staff";
       
    }
        


        ?>


             <div class="card ">
              <div class="card-header d-block" id="<?php echo $username ?> ">
                  <h5 >  <?php echo strtoupper($fullname) ?> 
                   &nbsp;&nbsp;&nbsp;&nbsp;
                   &nbsp;&nbsp;&nbsp;&nbsp;
                   &nbsp;&nbsp;&nbsp;&nbsp;
                   &nbsp;&nbsp;&nbsp;&nbsp;




                    <span class="badge badge-outline-dark badge-pill"><?php echo $username ?></span>
                    <span class="badge badge-outline-dark badge-pill"><?php echo $mobile ?></span>
                    <span class="badge badge-outline-dark badge-pill">Confirm : <?php echo $confirm ?></span>
                    <span class="badge badge-outline-dark badge-pill"><?php echo $sstatus ?></span>
                    <span class="badge badge-outline-dark badge-pill"><?php echo $date_added ?></span>
                    <span class="badge badge-outline-dark badge-pill"><?php echo $Staffrole ?></span>




                </h5>



                      <a class="custom-accordion-title d-block py-1 " >   </a>

                      <button type="button" class="btn btn-outline-warning btn-rounded" id="<?php echo $tabID ?>" onclick="viewStaffI(this.id)">View Staff</button>


                       <button type="button" class="btn btn-outline-primary btn-rounded" id="<?php echo $tabID ?>" onclick="resetPassword(this.id)">Reset Password</button>

                      <button type="button" id="<?php echo $tabID ?>" data-toggle="modal" data-target="#changeRole" onclick="changeClick(this.id)" class="btn btn-outline-success btn-rounded"><i class="uil-cloud-computing" data-toggle="modal" ></i> Change Role</button>

                   


                      <?php 

                        if ($confirm==='no') {
                          
                          ?>


                               <button type="button" class="btn btn-outline-info btn-rounded" id="<?php echo $tabID ?>" onclick="confirmStaff(this.id)">Confirm Staff</button>

                          <?php
                        }





                       ?>


                       <button type="button" class="btn btn-outline-danger btn-rounded" id="<?php echo $tabID ?>" onclick="deleteStaff(this.id)">Delete Staff</button>



              </div>
                  
              <div id="<?php echo $username ?> " class="collapse"
                  aria-labelledby="headingFour"
                  data-parent="#custom-accordion-one">
                  <div class="card-body">
                      


                    <div class="row">
                        
                        <div class="col-12">
                            <div class="card">
                              <div class="card-body">

                                  <div class="col-lg-12">
                      
                                   </div>

                            </div>
                          </div>
                      </div>

                     </div>



                  </div>
              </div>
          </div>


        <?php




   }
     ?>
         



   
</div>


          
   </div> <!-- end containr -->
</div>





<div id="changeRole" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <a href="index.html" class="text-success">
                        <span><img src="assets/images/logo-dark.png" alt="" height="18"></span>
                    </a>
                </div>



                <div class="holders">
                  
                </div>

  


            </div>
        </div>
    </div>
</div>






  <?php



 







// } else {



//   include 'view_staff_info.php';
// }






 ?>



<script type="text/javascript">
  
  function changeClick(id) {
        
       


    $.post(".esgapehtllaroftsopxajaehtsitaht..ajaxpost?CHECKPOST=changeRoleClick",{id:id},function (showOutPut) {

      $(".holders").html(showOutPut);


    });

            



          
  }


  function SavechangeRole(tabID) {
    
    var assign_role = $(".assign_role").val();

       Swal.fire({
          title: 'Are you sure you want to Assign Role? ',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, Assign Role!'
        }).then((result) => {


          if (result.value) {


              $.post(".esgapehtllaroftsopxajaehtsitaht..ajaxpost?CHECKPOST=SavechangeRole",{tabID:tabID,assign_role:assign_role},function (showOutPut) {


                if (showOutPut.includes("error")) {
                  Swal.fire({
                    title: "error",
                    text: "An error occured, please try again later!!!",
                    type: "warning",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Ok",
                    closeOnConfirm: false,
                    closeOnCancel: false

                  });



                }else{


                Swal.fire(
                  'Successfull!',
                  ' Successfully changed the role',
                  'success'
                  ).then((result) =>{


                   location.reload();
                    



                  })

 

                }


              });

            



          }


           });

 
  }







/////////////////reset password////
function resetPassword(tabID) {
  


       Swal.fire({
          title: 'Are you sure you want to Reset Password? ',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, Reset Password!'
        }).then((result) => {


          if (result.value) {


              $.post(".esgapehtllaroftsopxajaehtsitaht..ajaxpost?CHECKPOST=resetPasswordPost",{tabID:tabID,},function (showOutPut) {


                if (showOutPut.includes("error")) {
                  Swal.fire({
                    title: "error",
                    text: "An error occured, please try again later!!!",
                    type: "warning",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Ok",
                    closeOnConfirm: false,
                    closeOnCancel: false

                  });



                }else{


                Swal.fire(
                  'Successfull!',
                  ' Successfully Reset Password to Username...',
                  'success'
                  ).then((result) =>{


                   location.reload();
                    



                  })

 

                }


              });

            



          }


           });

 
  


}




/////////////////confirm Staff////
function confirmStaff(tabID) {
  

       Swal.fire({
          title: 'Are you sure you want to Confrim the Staff? ',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, Confrim!'
        }).then((result) => {


          if (result.value) {


              $.post(".esgapehtllaroftsopxajaehtsitaht..ajaxpost?CHECKPOST=confrimStaffPost",{tabID:tabID,},function (showOutPut) {


                if (showOutPut.includes("error")) {
                  Swal.fire({
                    title: "error",
                    text: "An error occured, please try again later!!!",
                    type: "warning",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Ok",
                    closeOnConfirm: false,
                    closeOnCancel: false

                  });



                }else{


                Swal.fire(
                  'Successfull!',
                  ' Successfully Confrimed...',
                  'success'
                  ).then((result) =>{


                   location.reload();
                    



                  })

 

                }


              });

            



          }


           });

 
  


}






/////////////////confirm Staff////
function deleteStaff(tabID) {
  

       Swal.fire({
          title: 'Are you sure you want to Delete the Staff? ',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, Delete!'
        }).then((result) => {


          if (result.value) {


              $.post(".esgapehtllaroftsopxajaehtsitaht..ajaxpost?CHECKPOST=deleteStaffPost",{tabID:tabID,},function (showOutPut) {


                if (showOutPut.includes("error")) {
                  Swal.fire({
                    title: "error",
                    text: "An error occured, please try again later!!!",
                    type: "warning",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Ok",
                    closeOnConfirm: false,
                    closeOnCancel: false

                  });



                }else{


                Swal.fire(
                  'Successfull!',
                  ' Successfully Deleted...',
                  'success'
                  ).then((result) =>{


                   location.reload();
                    



                  })

 

                }


              });

            



          }


           });

 
  


}












function viewStaffI(tabID) {

  $.post(".esgapehtllaroftsopxajaehtsitaht..ajaxpost?CHECKPOST=viewStaffInfoPageAtAdmin",{tabID:tabID,},function (showOutPut) {


    // alert(showOutPut);

    showOutPut.trim();

    location.replace(showOutPut)



  });

}







</script>