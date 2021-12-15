   
<?php 
$todayDate = date("F j, Y"); 


$getReceipt = $_GET["TRUE"];



 
    $selsds = mysqli_query($conn, "SELECT * FROM daily_sales 

     WHERE receipt_no='$getReceipt' 
     AND active='yes'  
      ");


    

if (mysqli_num_rows($selsds) > 0) {


    

  $todayss = date("Y-m-d");



$getTotal = mysqli_query($conn, "SELECT SUM(total) AS total 


   FROM daily_sales 

     WHERE receipt_no='$getReceipt' 
     AND active='yes'  ");
$getRow23 = mysqli_fetch_assoc($getTotal);
$total = $getRow23["total"];


 

$countPay = mysqli_query($conn, "SELECT count(*) AS toite  FROM daily_sales 

     WHERE receipt_no='$getReceipt' 
     AND active='yes'  ");

$getcounttoite = mysqli_fetch_array($countPay);
$countDentors = $getcounttoite['toite'];


 

  ?>





<div class="page-inner">
  <!-- .page-title-bar -->
  <header class="page-title-bar"> 
    <!-- page title stuff goes here -->
    <h1 class="page-title">Receipt #: <?php echo $getReceipt ?></h1>

    <h1 class="page-title"> Total amount :  GH&#8373;  <?php echo number_format($total, 2) ?></h1>
    <h1 class="page-title"> Number of Items  :   <?php echo $countDentors ?></h1>


    <!-- <button class="btn btn-primary"> KEPP ITEM </button> -->

    <button type="button" class="btn btn-outline-success btn-rounded" onclick="keepItemFunc('<?php echo $getReceipt ?>')"><i class="uil-cloud-computing"></i>  KEPP ITEM  </button>


    <button type="button" class="btn btn-outline-warning btn-rounded" onclick="pickUpItemFunc('<?php echo $getReceipt ?>')"><i class="uil-cloud-computing"></i>  PICK ITEM  </button>

  </header><!-- /.page-title-bar -->
 


</div><!-- /.section-block -->

  <hr class="hr">



 


<div class="alert alert-primary" role="alert">
    <h1>Items Bought Are;</h1>

    <?php 


    while ($fetW=mysqli_fetch_assoc($selsds)) {
      


       $tabid = $fetW["id"];
       $customer_id = $fetW["customer_id"];
       $itemid = $fetW["itemid"];
       $itemname = $fetW["itemname"];
       $itemprice = $fetW["itemprice"];
       $quantity = $fetW["quantity"];
       $total = $fetW["total"];
       $receipt_no = $fetW["receipt_no"];
       $theDate = $fetW["theDate"];
       $status = $fetW["status"];
       $pickup = $fetW["pickup"];
       $date_added = $fetW["date_added"];
       $staff = $fetW["staff"];



            echo "<h4>

              $itemname  <> $quantity , 

          </h4>";




    }





     ?>
</div>



</div>


<?php 





?>



  <?php




} else {

  ?>
  <script type="text/javascript">
    window.location.href='.home.login-successful';

  </script>

  <?php


  die();


}








 ?>









<script type="text/javascript">
  
/*-------------------------Keep item---------------*/

function keepItemFunc(getReceipt) {
  
      Swal.fire({
        title: 'Are you sure you want to Keep items?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Keep Them!' 
      }).then((result) => {


        if (result.value) {

          $.post(".esgapehtllaroftsopxajaehtsitaht..ajaxpost?CHECKPOST=keepItemPost",{getReceipt:getReceipt},function (showOutPut) {


            



            if (showOutPut.includes("inserterror")) {
              Swal.fire({
                title: "Error",
                text: "An error occured in keeping item? Please try again later",
                type: "warning",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Ok",
                closeOnConfirm: false,
                closeOnCancel: false

              });


            
            }else if (showOutPut.includes("keepexist")) {
              Swal.fire({
                title: "Error",
                text: "Items are already in keeping mode",
                type: "warning",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Ok",
                closeOnConfirm: false,
                closeOnCancel: false

              });


            
            }else{




              Swal.fire({
                title: "Successfull",
                text: "Item Kept Successfully" ,
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




// itempick up


function pickUpItemFunc(getReceipt) {
  
      Swal.fire({
        title: 'Are you sure you want to Pick Up items?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Pick Up Items!' 
      }).then((result) => {


        if (result.value) {

          $.post(".esgapehtllaroftsopxajaehtsitaht..ajaxpost?CHECKPOST=pickUpItemPost",{getReceipt:getReceipt},function (showOutPut) {


            



            if (showOutPut.includes("inserterror")) {
              Swal.fire({
                title: "Error",
                text: "An error occured in keeping item? Please try again later",
                type: "warning",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Ok",
                closeOnConfirm: false,
                closeOnCancel: false

              });


            
            }else if (showOutPut.includes("pickupexist")) {
              Swal.fire({
                title: "Error",
                text: "Items are already Picked up",
                type: "warning",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Ok",
                closeOnConfirm: false,
                closeOnCancel: false

              });


            
            }else{




              Swal.fire({
                title: "Successfull",
                text: "Item Pick Up Successfully" ,
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