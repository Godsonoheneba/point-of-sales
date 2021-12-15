   
<?php 
$todayDate = date("F j, Y"); 

$getLoanBy = $_GET["BY"];
$getBalance = $_GET["BALANCE"];
$getLoanID = $_GET["LOANGET"];
$getPersonID = $_GET["TRUE"];
$getTOTAL = $_GET["TOTAL"];



$selectCust21 = mysqli_query($conn, "SELECT * FROM debtors_list WHERE active ='yes' AND id='$getLoanID' AND customerID='$getPersonID' LIMIT 1 ");

if (mysqli_num_rows($selectCust21) > 0) {


  $getdac1 = mysqli_fetch_assoc($selectCust21);


      $tabid = $getdac1["id"];
       $customerID = $getdac1["customerID"];
       $name = $getdac1["name"];
       $mobile = $getdac1["mobile"];
       $location = $getdac1["location"];
       $amount_owing = $getdac1["amount_owing"];
       $amount_paid = $getdac1["amount_paid"];
       $balance = $getdac1["balance"];


       $current_balance_show = number_format($balance, 2);



  // if ($last_date_paid==="") {
  //   $last_date_paid = "Have not started paying yet?";
  // } else {
  //   $last_date_paid = $last_date_paid;
  // }
  


  $todayss = date("Y-m-d");


 


} else {

  ?>
  <script type="text/javascript">
    window.location.href='.home.login-successful';

  </script>

  <?php


  die();


}








 ?>








<div class="page-inner">
  <!-- .page-title-bar -->
  <header class="page-title-bar"> 
    <!-- page title stuff goes here -->
    <h1 class="page-title"> Pay Debt for <?php echo $getLoanBy ?></h1>

    <h1 class="page-title"> Total Debt to Pay :  GH&#8373;  <?php echo number_format($amount_owing, 2) ?></h1>
    <h1 class="page-title"> Amount Paid  : GH&#8373;  <?php echo number_format($amount_paid, 2) ?></h1>
    <h1 class="page-title"> Current Balance  : GH&#8373;  <?php echo number_format($balance, 2) ?></h1>
    <!-- <h1 class="page-title"> Last Date of Payment  : <?php echo $last_date_paid ?></h1> -->

  </header><!-- /.page-title-bar -->
  <!-- .page-section -->
  <div class="page-section">
    <!-- .section-block -->
    <div class="section-block">
      <!-- page content goes here -->
      <p> Select to make a transaction</p>
    </div><!-- /.section-block -->
  </div><!-- /.page-section -->



</div><!-- /.section-block -->
<!-- grid row -->
<div class="row">
  <!-- grid column -->



  <div class="col-md-4">
    <div class="card">
        <div class="card-header">
            PAY
        </div>
        <div class="card-body">
            <a style="color: #fff;" data-toggle="modal" data-target="#payLoanModal" class="btn btn-primary">PAY DEBT</a>
        </div>
        <div class="card-footer text-muted">
            Click to pay debt
        </div>
    </div> <!-- end card-->
</div> <!-- end col-->


  </div><!-- /grid row -->


</div>


<?php 

include 'pay_debt_modal.php';




?>



<script type="text/javascript">
  
/*-------------------------quit loan by customer---------------*/

function quitCustomerLoan(getLoanID,getPersonID) {
  


      Swal.fire({
        title: 'Are you sure you want to Pay Off the loan',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Pay Off Loan!' 
      }).then((result) => {


        if (result.value) {

          $.post(".esgapehtllaroftsopxajaehtsitaht..ajaxpost?CHECKPOST=quitLoanPost",{getLoanID:getLoanID,getPersonID:getPersonID},function (showOutPut) {




            if (showOutPut.includes("ERROR")) {
              Swal.fire({
                title: "Error",
                text: "Amount filed cannot be empty",
                type: "warning",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Ok",
                closeOnConfirm: false,
                closeOnCancel: false

              });


            
            }else{




              Swal.fire({
                title: "Successfull",
                text: "Successfully Quit" ,
                type: "success",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Ok",
                closeOnConfirm: false,
                closeOnCancel: false

              }).then((result) => {
                if (result.value) {


                  location.reload();

                } 
              })


            






            }


            });

        }


      });





}


</script>