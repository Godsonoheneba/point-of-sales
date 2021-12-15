  
<?php 

include '../cores/config.php';
include '../cores/phpfunctions.php';

$todayDate = date("Y-m-d"); 

$min = 1000;
$max = 9999;
$last_four_rand = rand($min, $max);


$Fromdate = date("Y-01-01");
$ToDate = date("Y-m-d");


 
//////////////////////backupPost///

if ($_GET["CHECKPOST"]=="backupPost") {

  //MySQL server and database
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'cshop';
$tables = '*';

//Call the core function
backup_tables($dbhost, $dbuser, $dbpass, $dbname, $tables);
    // backupDB() ;

}





//////////////////////regitser staff///

if ($_GET["CHECKPOST"]=="registerStaff") {

     $fullname = stripcslashes(htmlentities(strip_tags($_POST["fullname"])));
     $mobile = stripcslashes(htmlentities(strip_tags($_POST["mobile"])));
     $assign_role = $_POST["assign_role"];
     $username = $_POST["username"];
     $password = $_POST["password"];

     $encryPss = md5($password);

     $username = strtolower($username);

        $getFirstletter = substr($fullname, 0,3);
        $theStaffID = strtoupper($getFirstletter . $last_four_rand);

      $selSregsiStaff = mysqli_query($conn, "SELECT * FROM staff WHERE active ='yes' ");


      $userNameDb = "";
      $confirm = "";
      $mobileDb = "";
      while ($getdac = mysqli_fetch_assoc($selSregsiStaff)) {
      $userNameDb = $getdac["username"];
      $confirm = $getdac["confirm"];
      $mobileDb = $getdac["mobile"];

      }



      if ($userNameDb === $username) {

        if ($confirm==="no") {
          echo "no";
        } else {
          echo "yes";
        }
        
      }elseif ($mobileDb === $mobile) {
        echo "mobileexist";
      }else {

      if (

        $studentInsert = mysqli_query($conn, "INSERT INTO staff 

        (staffID , username , password, real_password, fullname , role , mobile) 

        VALUES('$theStaffID','$username','$encryPss','$password','$fullname','$assign_role','$mobile')")) {
        echo "done";
      } else {
        echo "error";
      }
      

       



        


      }
      
      
   

}






////////////////////////////STOCK
////////////ADD NEW STOC///////////

if ($_GET["CHECKPOST"]=="addNewStock") {

 
     $Category = $_POST["Category"];
     $subcategories = $_POST["subcategories"];
     $price = $_POST["price"];
     $quantity = $_POST["quantity"];


     $toMont = date("m");
     $toyear = date("Y");


    $theStockID = strtoupper($toyear .'_'. $toMont .'_'. $last_four_rand);



    $seleStock = mysqli_query($conn, "SELECT  * FROM stocks WHERE category='$Category' AND subcategories='$subcategories' AND active='yes' ");


    if (mysqli_num_rows($seleStock) === 1) {
      
        $gett = mysqli_fetch_assoc($seleStock);

        $quantityDB = $gett["quantity"];
        $priceDB = $gett["price"];

        $newQuantity = $quantityDB + $quantity;
        // $newPrice = $priceDB + $price;


        if (



          mysqli_query($conn, "UPDATE stocks SET

            quantity='$newQuantity',price='$price'

            WHERE category='$Category' 
            AND subcategories='$subcategories' 
            AND active='yes' 

         ")



        ) {



           //////////////////////insert into stock history////////


        $status = "Top Up Stock";

          mysqli_query($conn, "INSERT INTO stocks_history 
        
        (category_id   , subcategories_id, quantity, price,status , added_by) 

        VALUES('$Category','$subcategories','$quantity','$price','$status','$login_session')");
          
          echo "topStock";

        } else {
          
          echo "ErroUpdate";


        }
        
        



    } else {


      if (

        mysqli_query($conn, "INSERT INTO stocks 
        
        (stock_id , category , subcategories, quantity, price) 

        VALUES('$theStockID','$Category','$subcategories','$quantity','$price')")

      ) {
        

          //////////////////////insert into stock history////////


        $status = "New Stock";

          mysqli_query($conn, "INSERT INTO stocks_history 
        
        (category_id   , subcategories_id, quantity, price,status , added_by) 

        VALUES('$Category','$subcategories','$quantity','$price','$status','$login_session')");

        echo "newStock";

      } else {
        

        echo "ErroInsert";
      }
      

      
    }
    



}

////////////////ENDS ADD NEW STOCK

///////////////////////ENDS STOCK








/////////////////////PURCAHSE
////////////ADD NEW purchase TO CART///////////

if ($_GET["CHECKPOST"]=="addNewPurchaseToCart") {

 
     $Category = $_POST["Category"];
     $subcategories = $_POST["subcategories"];
     $quantity = $_POST["quantity"];
     $last_four_rand = $_POST["last_four_rand"];



    $SELEsTTT = mysqli_query($conn, "SELECT  * FROM stocks WHERE category='$Category' AND subcategories='$subcategories' AND active='yes' ");


        $gett = mysqli_fetch_assoc($SELEsTTT);

        $quantityDB = $gett["quantity"];
        $priceDB = $gett["price"];
        $totals = $priceDB * $quantity;




      $selCatt = mysqli_query($conn, "SELECT  * FROM item_category WHERE category_id='$Category'  AND active='yes' ");
      $catFE  = mysqli_fetch_assoc($selCatt);
      $nameDB = $catFE["name"];



      $ssCatt = mysqli_query($conn, "SELECT  * FROM item_sub_category WHERE category_id='$Category' AND sub_category_id='$subcategories' AND active='yes' ");
      $sFetch  =  mysqli_fetch_assoc($ssCatt);
      $snameDB = $sFetch["sname"];
      
     $itemNameDB = $nameDB . ' ('  . $snameDB  . ')';

        if (mysqli_num_rows($SELEsTTT) > 0) {
          


            if ($quantity <= $quantityDB) {
                      

                if (mysqli_query($conn, "INSERT INTO get_items_to_cart (

                  itemid,
                  item_code,
                  itemname,
                  itemprice,
                  quantity,
                  total

                  )

                  VALUES(
                  '$last_four_rand',
                  '$subcategories',
                  '$itemNameDB',
                  '$priceDB',
                  '$quantity',
                  '$totals'
                  ) 


                  ")) {


                      $selStu1 = mysqli_query($conn, "SELECT * FROM get_items_to_cart WHERE  active='yes' AND notbuy='no' AND itemid='$last_four_rand'  ORDER BY id DESC ");



                        /*-----------------get total overal amount  ----------------*/
              $getTotalInteresr2 = mysqli_query($conn, "SELECT SUM(total) AS total FROM get_items_to_cart WHERE  active='yes' AND notbuy='no' AND itemid='$last_four_rand'  ");
              $getRow2483 = mysqli_fetch_assoc($getTotalInteresr2);
              $OveraltotalAmount = $getRow2483["total"];


              $OveraltotalAmount = number_format($OveraltotalAmount, 2);
              

              if (mysqli_num_rows($selStu1) > 0) {
           
            
              

                echo "

                     <table class=\"table  table-centered mb-0  dt-responsive nowrap\" id=\"scroll-vertical-datatable\">
                      <thead>
                          <tr>
                              <th>Name</th>
                              <th>Qty</th>
                              <th>Price</th>
                              <th>Amount</th>
                              <th>Action</th>
                          </tr>
                      </thead>


                ";





              while ($getAlls = mysqli_fetch_assoc($selStu1)) {

               $id = $getAlls["id"];
               $itemname = $getAlls["itemname"];
               $itemprice = $getAlls["itemprice"];
               $quantity = $getAlls["quantity"];
  

               $totalAmountForEachItem = $itemprice * $quantity;

               $itemprice = number_format($itemprice, 2);
               $totalAmountForEachItem = number_format($totalAmountForEachItem, 2);

               echo "


                    <tbody>
                      <tr>
                        <td class=\"table-user\"> $itemname </td>
                        <td>$quantity</td>
                        <td>GH&#8373;  $itemprice</td>
                        <td>GH&#8373;  $totalAmountForEachItem</td>
                        <td class=\"table-action\">
                            <a  class=\"action-icon\"  onclick=\"deleteFromCart($id,$last_four_rand)\"> <i class=\"mdi mdi-delete\"></i></a>
                        </td>
                      </tr>


                  </tbody>



               ";



             }





             echo"


             </table>
             ";







              echo "


              <div class=\"card\">
                <div class=\"border p-3 mt-4 mt-lg-0 rounded\">
                    <h4 class=\"header-title mb-3\"> Summary</h4>

                    <div class=\"table-responsive\">
                        <table class=\"table mb-0\">
                            <tbody>
                    
                                <tr style=\"font-size: 20px;\">
                                    <th>Total :</th>
                                    <th>GH&#8373; $OveraltotalAmount</th>
                                </tr>
                            </tbody>
                        </table>

                        <div class=\"form-group col-lg-12\">

                          <button type=\"button\" onclick=\"cashSalespay($last_four_rand)\" class=\"btn btn-outline-info btn-rounded\"><i class=\"uil-circuit\"></i> Cash Sale</button>

                          <button style=\"float: right;\" type=\"button\" class=\"btn btn-outline-success btn-rounded\" onclick=\"creditSAleButClick($last_four_rand)\" data-toggle=\"modal\" data-target=\"#creditSAlesModalModal\"  ><i class=\"uil-money-withdrawal\"></i> Credit Sale</button>

                </div>
              </div>
                    
                </div>
            </div>




              ";





                } else {
                

                // echo "<h6>Cart</h6>";

                   ?>

                <center>
                  <h4>Cart is Empty.</h4>
                <img src="images/cart_empty.gif" width="60%">
                </center>

              <?php
              }





                } else {

                  echo "error";

                }


              } else {
            echo "lessQty";
          }
          




    } else {
    echo "noStock";
  }


  include '../inc/Purchase/csalesmodal.php';

}

////////////////ENDS purchase TO CART/












/*-------------------------DELETE FROM CART------------------------*/


/*==========================CHANGE EMPLOYMENT TYPE=============================*/

if ($_GET["CHECKPOST"]=="deleteFromCrtPost") {

  $id = $_POST["id"];
  $last_four_rand = $_POST["last_four_rand"];


  if (mysqli_query($conn, "DELETE FROM  get_items_to_cart  WHERE id='$id' AND active='yes' LIMIT 1 " )) {







            $selStu1 = mysqli_query($conn, "SELECT * FROM get_items_to_cart WHERE  active='yes' AND notbuy='no' AND itemid='$last_four_rand'  ORDER BY id DESC ");



                        /*-----------------get total overal amount  ----------------*/
              $getTotalInteresr2 = mysqli_query($conn, "SELECT SUM(total) AS total FROM get_items_to_cart WHERE  active='yes' AND notbuy='no' AND itemid='$last_four_rand'  ");
              $getRow2483 = mysqli_fetch_assoc($getTotalInteresr2);
              $OveraltotalAmount = $getRow2483["total"];


              $OveraltotalAmount = number_format($OveraltotalAmount, 2);
                

              if (mysqli_num_rows($selStu1) > 0) {


                echo "

                     <table class=\"table  table-centered mb-0  dt-responsive nowrap\" id=\"scroll-vertical-datatable\">
                      <thead>
                          <tr>
                              <th>Name</th>
                              <th>Qty</th>
                              <th>Price</th>
                              <th>Amount</th>
                              <th>Action</th>
                          </tr>
                      </thead>


                ";





              while ($getAlls = mysqli_fetch_assoc($selStu1)) {

               $id = $getAlls["id"];
               $itemname = $getAlls["itemname"];
               $itemprice = $getAlls["itemprice"];
               $quantity = $getAlls["quantity"];
  

               $totalAmountForEachItem = $itemprice * $quantity;

               $itemprice = number_format($itemprice, 2);
               $totalAmountForEachItem = number_format($totalAmountForEachItem, 2);

               echo "


                    <tbody>
                      <tr>
                        <td class=\"table-user\"> $itemname </td>
                        <td>$quantity</td>
                        <td>GH&#8373;  $itemprice</td>
                        <td>GH&#8373;  $totalAmountForEachItem</td>
                        <td class=\"table-action\">
                            <a  class=\"action-icon\"  onclick=\"deleteFromCart($id,$last_four_rand)\"> <i class=\"mdi mdi-delete\"></i></a>
                        </td>
                      </tr>


                  </tbody>



               ";



             }





             echo"


             </table>
             ";







              echo "


              <div class=\"card\">
                <div class=\"border p-3 mt-4 mt-lg-0 rounded\">
                    <h4 class=\"header-title mb-3\"> Summary</h4>

                    <div class=\"table-responsive\">
                        <table class=\"table mb-0\">
                            <tbody>
                    
                                <tr style=\"font-size: 20px;\">
                                    <th>Total :</th>
                                    <th>GH&#8373; $OveraltotalAmount</th>
                                </tr>
                            </tbody>
                        </table>

                        <div class=\"form-group col-lg-12\">

                          <button type=\"button\" onclick=\"cashSalespay($last_four_rand)\" class=\"btn btn-outline-info btn-rounded\"><i class=\"uil-circuit\"></i> Cash Sale</button>

                          <button style=\"float: right;\" type=\"button\" class=\"btn btn-outline-success btn-rounded\" onclick=\"creditSAleButClick($last_four_rand)\" data-toggle=\"modal\" data-target=\"#creditSAlesModalModal\"  ><i class=\"uil-money-withdrawal\"></i> Credit Sale</button>

                </div>
              </div>
                    
                </div>
            </div>




              ";


            }else{

              // echo "<h6>Cart</h6>";
              ?>

                <center>
                  <h4>Cart is Empty.</h4>
                <img src="images/cart_empty.gif" width="60%">
                </center>

              <?php
            }



  } else {
  echo "errorinupdate";
}


  include '../inc/Purchase/csalesmodal.php';

}









/////////////////////////cash sales payment

 

if ($_GET["CHECKPOST"]=="cashSalesPayments") {

  // $customer_id_encrypt = $_POST["customer_id_encrypt"];
  $itemID = $_POST["itemID"];

      $customer_id_encrypt = "110";

      $selecItemsAtCart = mysqli_query($conn, "SELECT * FROM get_items_to_cart WHERE active='yes' AND itemid='$itemID' ");



       $selre = mysqli_query($conn, "SELECT id FROM daily_sales ORDER BY id DESC LIMIT 1 ");

       $getlastID = mysqli_fetch_assoc($selre);
       $ids = $getlastID["id"] + 1;

       $firstID = 1;
       $preamble = '000000';

       if (mysqli_num_rows($selre) >0) {

         if($ids<=9){
           $receiptNumber ='000000'.$ids;
         }else if($ids<=99){
           $receiptNumber ='00000'.$ids;
         }else if($ids<=999){
           $receiptNumber ='0000'.$ids;
         }else if($ids<=9999){
           $receiptNumber ='000'.$ids;
         }else if($ids<=99999){
           $receiptNumber ='00'.$ids;
         }else if($ids<=999999){
           $receiptNumber ='0'.$ids;
         }else {
           $receiptNumber =$ids;
         }
       } else {
        $receiptNumber = $preamble . $firstID;
      }



      while ($getAlls = mysqli_fetch_assoc($selecItemsAtCart)) {


       $item_code = $getAlls["item_code"];
       $itemname = $getAlls["itemname"];
       $itemprice = $getAlls["itemprice"];
       $quantity = $getAlls["quantity"];

       $totalItm = $itemprice * $quantity;

       $date_ad = date("Y-m-d");

       $status = "Cash Sales";




      $seCaaaa = mysqli_query($conn, "SELECT * FROM stocks WHERE active='yes' AND subcategories='$item_code' LIMIT 1 ");

      $fettt = mysqli_fetch_assoc($seCaaaa);


       $quantityStck = $fettt["quantity"];

       $newQty = $quantityStck - $quantity;







       if (mysqli_query($conn, "INSERT INTO daily_sales (

         customer_id,
         itemid,
         itemname,
         itemprice,
         quantity,
         total,
         receipt_no,
         theDate,
         status,
         staff   

         ) VALUES( 

         '$customer_id_encrypt',
         '$itemID',
         '$itemname',
         '$itemprice',
         '$quantity',
         '$totalItm',
         '$receiptNumber',
         '$ToDate',
         '$status',
         '$login_session'



         )  



         ")) {


        $todayss = date("Y-m-d : H:i:s");


      mysqli_query($conn, "DELETE FROM  get_items_to_cart  WHERE itemid='$itemID' AND active='yes' " );



        mysqli_query($conn, "UPDATE  stocks SET

          quantity='$newQty'

          WHERE subcategories = '$item_code' LIMIT 1

          ");



   
       } else {
        echo "erorininsertitem";
      }




      }


}










////////////////////////////////credit sales////




if ($_GET["CHECKPOST"]=="creditSalesPayments") {

  $itemIDClass = $_POST["itemIDClass"];
  $eCustomer = $_POST["eCustomer"];
  $fullname = $_POST["fullname"];
  $mobile = $_POST["mobile"];
  $location = $_POST["location"];
  $initial_amount = $_POST["initial_amount"];


  $initial_amount = (float) $initial_amount;


  /*-----------------get total loans given ----------------*/
$getTOtAmntt = mysqli_query($conn, "SELECT SUM(total) AS total FROM get_items_to_cart WHERE active='yes' AND itemid='$itemIDClass'   ");
$getRow2 = mysqli_fetch_assoc($getTOtAmntt);
$totalAmount = $getRow2["total"];





  if ($eCustomer!=="") {
    $expNamee = explode("-", $eCustomer);

    $theCustID = current($expNamee);
    $fullname = next($expNamee);


   $sdsww = mysqli_query($conn, "SELECT * FROM debtors_list WHERE active='yes' AND customerID='$theCustID' LIMIT 1 ");

      $getAllssdsd = mysqli_fetch_assoc($sdsww);

       $mobile = $getAllssdsd["mobile"];
       $location = $getAllssdsd["location"];
       $amount_owing = $getAllssdsd["amount_owing"];
       $amount_paid = $getAllssdsd["amount_paid"];
       $balance = $getAllssdsd["balance"];

       $new_amount_owing = $amount_owing + $totalAmount;
       $new_amount_paid = $amount_paid + $initial_amount;
       $new_balance = $new_amount_owing - $new_amount_paid;

          mysqli_query($conn, "UPDATE  debtors_list SET

          amount_owing='$new_amount_owing',
          amount_paid='$new_amount_paid',
          balance='$new_balance'

          WHERE customerID = '$theCustID' LIMIT 1


          "

        );


        mysqli_query($conn, "INSERT INTO debtors_list_history (

         customerID,
         itemID,
         initial_amount,
         theDate,
         staff

         ) VALUES( 

         '$theCustID',
         '$itemIDClass',
         '$initial_amount',
         '$todayDate',
         '$login_session'

         )  

         " );


  } else {
      
       $fullname = strtoupper($fullname);
      $getFirstletter = substr($fullname, 0,2);
      $theCustID = strtoupper($getFirstletter . $last_four_rand);

      $new_amount_owing = $totalAmount;
       $new_amount_paid = $initial_amount;
       $new_balance = $new_amount_owing - $new_amount_paid;


         mysqli_query($conn, "INSERT INTO debtors_list (

         customerID,
         name,
         mobile,
         location,
         amount_owing,
         amount_paid,
         balance

         ) VALUES( 

         '$theCustID',
         '$fullname',
         '$mobile',
         '$location',
         '$new_amount_owing',
         '$new_amount_paid',
         '$new_balance'



         )  



         " );



          mysqli_query($conn, "INSERT INTO debtors_list_history (

         customerID,
         itemID,
         initial_amount,
         staff

         ) VALUES( 

         '$theCustID',
         '$itemIDClass',
         '$initial_amount',
         '$login_session'

         )  

         " );

  }
  
   








     

      $customer_id_encrypt = $theCustID;



       $selre = mysqli_query($conn, "SELECT id FROM daily_sales ORDER BY id DESC LIMIT 1 ");

       $getlastID = mysqli_fetch_assoc($selre);
       $ids = $getlastID["id"] + 1;

       $firstID = 1;
       $preamble = '000000';

       if (mysqli_num_rows($selre) >0) {

         if($ids<=9){
           $receiptNumber ='000000'.$ids;
         }else if($ids<=99){
           $receiptNumber ='00000'.$ids;
         }else if($ids<=999){
           $receiptNumber ='0000'.$ids;
         }else if($ids<=9999){
           $receiptNumber ='000'.$ids;
         }else if($ids<=99999){
           $receiptNumber ='00'.$ids;
         }else if($ids<=999999){
           $receiptNumber ='0'.$ids;
         }else {
           $receiptNumber =$ids;
         }
       } else {
        $receiptNumber = $preamble . $firstID;
      }



      $selecItemsAtCart = mysqli_query($conn, "SELECT * FROM get_items_to_cart WHERE active='yes' AND itemid='$itemIDClass' ");

      while ($getAlls = mysqli_fetch_assoc($selecItemsAtCart)) {


       $item_code = $getAlls["item_code"];
       $itemname = $getAlls["itemname"];
       $itemprice = $getAlls["itemprice"];
       $quantity = $getAlls["quantity"];

       $totalItm = $itemprice * $quantity;

       $date_ad = date("Y-m-d");
 
       $status = "Credit Sales";




      $seCaaaa = mysqli_query($conn, "SELECT * FROM stocks WHERE active='yes' AND subcategories='$item_code' LIMIT 1 ");

      $fettt = mysqli_fetch_assoc($seCaaaa);


       $quantityStck = $fettt["quantity"];

       $newQty = $quantityStck - $quantity;








       if (mysqli_query($conn, "INSERT INTO daily_sales (

         customer_id,
         itemid,
         itemname,
         itemprice,
         quantity,
         total,
         receipt_no,
         theDate,
         status,
         staff   

         ) VALUES( 

         '$customer_id_encrypt',
         '$itemIDClass',
         '$itemname',
         '$itemprice',
         '$quantity',
         '$totalItm',
         '$receiptNumber',
         '$ToDate',
         '$status',
         '$login_session'



         )  



         ")) {





          mysqli_query($conn, "DELETE FROM  get_items_to_cart  WHERE itemid='$itemIDClass' AND active='yes' " );


        mysqli_query($conn, "UPDATE  stocks SET

          quantity='$newQty'

          WHERE subcategories = '$item_code' LIMIT 1


          "

        );





        //////////////////////////////the receipt/////////////////



          //////////////////////////////End Receipt//////////////////////////




       } else {
        echo "erorininsertitem";
      }





      }









}







/////////////////////////PRINT CASH SALES RECEIPT

if ($_GET["CHECKPOST"]=="printcreditSalesReceipt") {

  $itemIDClass = $_POST["itemIDClass"];


   $selRe = mysqli_query($conn, "SELECT * FROM daily_sales WHERE itemid='$itemIDClass'  ");

  $getr = mysqli_fetch_assoc($selRe);

  $receiptNumberDB = $getr["receipt_no"];
  $status = $getr["status"];

    $date_ad = date("Y-m-d");

       $statusWord = "Credit Sales";



          /*-----------------get total  ----------------*/
$getTOtAmntt11 = mysqli_query($conn, "SELECT SUM(total) AS total FROM daily_sales WHERE active='yes' AND itemid='$itemIDClass'   ");
$getRow223 = mysqli_fetch_assoc($getTOtAmntt11);
$totalAmount = $getRow223["total"];




       if ($status === $statusWord) {
         

      $selRe1 = mysqli_query($conn, "SELECT initial_amount FROM debtors_list_history WHERE itemID='$itemIDClass'  ");

      $getr11 = mysqli_fetch_assoc($selRe1);

      $initial_amount = $getr11["initial_amount"];


        $gTotal = $totalAmount;
        $iniPayment = $initial_amount;
        $fTotal = $gTotal - $iniPayment;

        $totalTab = 

            "

             <tr class=\"text-right\">
              <td>
                  GRAND TOTAL: GH&#8373;  $gTotal
              </td>
              
               <td>

               INITAL PAYMENT: GH&#8373;  $iniPayment
              </td>

               <td>
               TOTAL: GH&#8373;  $fTotal
              </td>
              
          </tr>

          ";

        




       } else {
         

          $totalTab = 

            "
             <tr class=\"text-right\">
              <td>
                  <h5 style=\"font-size:20px; padding:10px;\" class=\"m-0\"> TOTAL: GH&#8373;  $totalAmount </h5>
              </td>
              </tr>


          ";
       }
       

          echo "

<style type=\"text/css\">
    
    {
    font-size: 12px;
    font-family: \"Times New Roman\";
}


.centered {
    text-align: center;
    align-content: center;
}


</style>

<link href=\"../assets/css/boostrap.css\" rel=\"stylesheet\" id=\"bootstrap-css\">





<div class=\"ticket\">
            <p class=\"centered\">OFFICIAL RECEIPT
                <br>JO-ROCk Company Limited
                <br>Goaso - Kukuom Road 
                <br>0548878554
                <br>RECEIPT NO. : $receiptNumberDB 
                <br>STATUS. : $status 
                <br>DATE : $date_ad 

                </p>


            



            <table class=\"table\" width=\"100%\" style=\"width:100%;\">

                <thead>
               
                    <tr style=\"width:100%;\">
                        <th class=\"border-0 text-uppercase small font-weight-bold\">Item</th>
                        <th class=\"border-0 text-uppercase small font-weight-bold\">Qty</th>
                        <th class=\"border-0 text-uppercase small font-weight-bold\">Price</th>
                        <th class=\"border-0 text-uppercase small font-weight-bold\">Total</th>
                    </tr>
                  

                </thead>

                <tbody>



  " ;




  

  $sn=1;

     $selre22 = mysqli_query($conn, "SELECT * FROM daily_sales WHERE itemid='$itemIDClass' ORDER BY id DESC  ");

      while ($getthem = mysqli_fetch_assoc($selre22)) {
       
      $customer_id = $getthem["customer_id"];
      $itemid = $getthem["itemid"];
      $itemname = $getthem["itemname"];
      $itemprice = $getthem["itemprice"];
      $quantity = $getthem["quantity"];
      $total = $getthem["total"];
      $receipt_no = $getthem["receipt_no"];
      $theDate = $getthem["theDate"];
      $status = $getthem["status"];
      $staff = $getthem["staff"];



       $totalItm = $itemprice * $quantity;




      echo "     



       
          <tr style=\"width:100%;\">
              <td>$itemname</td>
              <td>$quantity</td>
              <td>$itemprice</td>
              <td>$totalItm</td>
              
          </tr>
      ";




          $sn++;


      }


      echo "



          </tbody> 
         

            $totalTab
            


            </table>


            <span>************************************************</span><br>

              <p class=\"centered\"> Developed By GOAD INC.  | 0548157455 / 0548878554...</p>

        </div>



          " ;



        
             
     

}

///////////////////////ENDS PURCAHSE




/////////////////////////////////////DEBTORS

/*--------------------------------------------PAY DEBT----------------------*/

/*-------------------LIVE SEARCH TO PAY DEBT-----------------------------------*/



if ($_GET["CHECKPOST"]=="searchLoanPersonLivePost") {


  $seachresultInput = htmlentities(strip_tags(stripcslashes($_POST["seachresultInput"])));

  if (!empty($seachresultInput)) {


    $searchStatusMember = mysqli_query($conn, "SELECT * FROM debtors_list 

     WHERE balance!='0' 
     AND active='yes'  
     AND (name LIKE '%".$seachresultInput."%' OR customerID LIKE '%".$seachresultInput."%' OR mobile LIKE '%".$seachresultInput."%' OR location LIKE '%".$seachresultInput."%'  ) ORDER BY id DESC  ");


    if(mysqli_num_rows($searchStatusMember) > 0){


      while ( $getdac = mysqli_fetch_assoc($searchStatusMember)) {


       $tabid = $getdac["id"];
       $customerID = $getdac["customerID"];
       $name = $getdac["name"];
       $mobile = $getdac["mobile"];
       $location = $getdac["location"];
       $amount_owing = $getdac["amount_owing"];
       $amount_paid = $getdac["amount_paid"];
       $balance = $getdac["balance"];


       $current_balance_show = number_format($balance, 2);






     echo "


     <div class=\"col-lg-12\">
     <div class=\"card card-fluid\">
     <div class=\"list-group list-group-flush list-group-divider\">

     <a  onclick=\"window.location.href='homepage.php?CHECKER=PROCEED_TO_PAY_DEBT&&BY=$name&&BALANCE=$balance&&LOANGET=$tabid&&TRUE=$customerID&&TOTAL=$amount_owing '  \" class=\"list-group-item list-group-item-action\" style=\"cursor:pointer;\">


     <div class=\"list-group-item-body\">
     <h4 class=\"list-group-item-title\"> $name</h4>
     <p class=\"list-group-item-text text-truncate\">
     Mobile : $mobile <br>
     BALANCE : GH&#8373; $current_balance_show
     </p>
     </div>

     </a> 

     </div>
     </div>
     </div>


     ";


   }







 }else{



 }

    }


}









/*--------------------------PAY DEBTS-----------------*/

if ($_GET["CHECKPOST"]=="payDebtsPost") {

  if (isset($_POST["getLoanID"]) && isset($_POST["getPersonID"]) && isset($_POST["payLoanAmountClass"])  ) {

    $getLoanID = $_POST["getLoanID"];
    $getPersonID = $_POST["getPersonID"];
    $payLoanAmountClass = $_POST["payLoanAmountClass"];



    if ($payLoanAmountClass!=="" ) {


      if ($payLoanAmountClass!==0) {

       $stf = mysqli_query($conn, "SELECT * FROM staff WHERE active ='yes' AND id='$login_session'");

       $getdac3 = mysqli_fetch_assoc($stf);

       $staffID = $getdac3["staffID"];

       $TOdated = date("jS F, Y");

       $TOdated2 = date("Y-m-d");

       $selre = mysqli_query($conn, "SELECT id FROM pay_debt ORDER BY id DESC LIMIT 1 ");

       $getlastID = mysqli_fetch_assoc($selre);
       $ids = $getlastID["id"] + 1;

       $firstID = 1;
       $preamble = '000000';

       if (mysqli_num_rows($selre) >0) {

         if($ids<=9){
           $receiptNumber ='000000'.$ids;
         }else if($ids<=99){
           $receiptNumber ='00000'.$ids;
         }else if($ids<=999){
           $receiptNumber ='0000'.$ids;
         }else if($ids<=9999){
           $receiptNumber ='000'.$ids;
         }else if($ids<=99999){
           $receiptNumber ='00'.$ids;
         }else if($ids<=999999){
           $receiptNumber ='0'.$ids;
         }else {
           $receiptNumber =$ids;
         }
       } else {
        $receiptNumber = $preamble . $firstID;
      }



      $selectCust = mysqli_query($conn, "SELECT * FROM debtors_list WHERE active ='yes' AND customerID='$getPersonID' AND id='$getLoanID' LIMIT 1  ");

      $getdac = mysqli_fetch_assoc($selectCust);

       $id = $getdac["id"];
       $customerID = $getdac["customerID"];
       $name = $getdac["name"];
       $mobile = $getdac["mobile"];
       $location = $getdac["location"];
       $amount_owing = $getdac["amount_owing"];
       $amount_paid = $getdac["amount_paid"];
       $current_balance = $getdac["balance"];


      $amount_paid += $payLoanAmountClass;
      $current_balance -= $payLoanAmountClass;

      $TOdatess = date("Y-m-d");

      if ($current_balance > 0) {


        if (mysqli_query($conn, " UPDATE debtors_list SET amount_paid='$amount_paid', balance='$current_balance'  WHERE active ='yes' AND customerID='$getPersonID' AND id='$getLoanID' LIMIT 1  ")) {




          mysqli_query($conn, "INSERT INTO pay_debt (

            debt_id,
            customer_id,
            amount_paying,
            dbalance,
            date_paid,
            receipt_no,
            staff
        
            ) 



            VALUES(

            '$getLoanID',
            '$getPersonID',
            '$payLoanAmountClass',
            '$current_balance',
            '$TOdatess',
            '$receiptNumber',
            '$login_session'
       

          )");

 

          echo "ViewPDFS/Debts/print_debts_receipt.php?PRINT=PRINT_DEBTS_PAYMENT_RECEIPT&&DATEPAY=$TOdated&&MY_LOAN=$getLoanID&&TRUE=$getPersonID&&RECEIPT=$receiptNumber";



        } else {


          echo "paymentErrors";

        }



      } else {


        echo "balanceiszero";
      }


    } else {

      echo "zeroamount";

    }


  }else {
    echo "empty";
  }




} 

}









 
////////////////////////////////////////PICK UP SEARCH

if ($_GET["CHECKPOST"]=="searchReciptIdLive") {


  $seachresultInput = htmlentities(strip_tags(stripcslashes($_POST["seachresultInput"])));

  if (!empty($seachresultInput)) {



    $seled = mysqli_query($conn, "SELECT DISTINCT receipt_no,date_added FROM daily_sales 

     WHERE receipt_no='$seachresultInput' 
     AND active='yes'  
      ");




    if(mysqli_num_rows($seled) > 0){


      while ( $getdac = mysqli_fetch_array($seled)) {


       $receipt_no = $getdac["receipt_no"];
       $date_added = $getdac["date_added"];

           

     echo "


     <div class=\"col-lg-12\">
     <div class=\"card card-fluid\">
     <div class=\"list-group list-group-flush list-group-divider\">


    <a  onclick=\"window.location.href='homepage.php?CHECKER=PROCEED_TO_PICKUP&&TRUE=$receipt_no '  \" class=\"list-group-item list-group-item-action\" style=\"cursor:pointer;\">

     <div class=\"list-group-item-body\" style=\"margin:20px;\">
     <h4 class=\"list-group-item-title\"> $receipt_no</h4>
     <p class=\"list-group-item-text text-truncate\">
     DATE : $date_added
     </p>
     </div>

     </a> 

     </div>
     </div>
     </div>


     ";


   }




  // }


 }else{



 }

    }


}






///////////////////////KEEP ITEM

if ($_GET["CHECKPOST"]=="keepItemPost") {

      $receiptNumber = $_POST["getReceipt"];


      $status = "Keeping";


      $seleRec = mysqli_query($conn, "SELECT * FROM pickups WHERE active ='yes' AND receipt_no='$receiptNumber' AND status='$status' LIMIT 1  ");


      if (mysqli_num_rows($seleRec)>0) {

          echo "keepexist";

     
        }else{

          $status = "Keeping";
          
          if ( mysqli_query($conn, "INSERT INTO pickups (

            receipt_no,
            status,
            done_by
        
            ) 



            VALUES(

            '$receiptNumber',
            '$status',
            '$login_session'
       

          )")) {
           

            $pickup = "no";
            mysqli_query($conn, " UPDATE daily_sales SET pickup='$pickup' WHERE active ='yes' AND receipt_no='$receiptNumber'   ");



          } else {
            echo "inserterror";
          }
          


        }



}





///////////////////////PICKUP ITEM

if ($_GET["CHECKPOST"]=="pickUpItemPost") {

      $receiptNumber = $_POST["getReceipt"];


      $status = "Pick Up";


      $seleRec = mysqli_query($conn, "SELECT * FROM pickups WHERE active ='yes' AND receipt_no='$receiptNumber' AND status='$status' LIMIT 1  ");


      if (mysqli_num_rows($seleRec)>0) {

          echo "pickupexist";

     
        }else{

          $status = "Pick Up";
          
          if ( mysqli_query($conn, "INSERT INTO pickups (

            receipt_no,
            status,
            done_by
        
            ) 



            VALUES(

            '$receiptNumber',
            '$status',
            '$login_session'
       

          )")) {
           

            $pickup = "yes";
            mysqli_query($conn, " UPDATE daily_sales SET pickup='$pickup' WHERE active ='yes' AND receipt_no='$receiptNumber'   ");



          } else {
            echo "inserterror";
          }
          


        }



}

















///////////////////////changeRoleClick

if ($_GET["CHECKPOST"]=="changeRoleClick") {

      $id = $_POST["id"];



      $seleRec = mysqli_query($conn, "SELECT * FROM staff WHERE active ='yes' AND id='$id'  LIMIT 1  ");

      $getSt = mysqli_fetch_assoc($seleRec);

      $roleDB = $getSt["role"];

    if ($roleDB==="1") {
        $roleDBTxt = "Administrator";
    } else {
        $roleDBTxt = "Staff";
       
    }
      

      if (mysqli_num_rows($seleRec)>0) {

          ?>


                    <div class="form-group">
                      <label for="example-select">Assign Role</label>
                      <select class="assign_role form-control" id="example-select">
                          <option value="<?php echo $roleDB ?>"><?php echo $roleDBTxt ?></option>
                          <option value="1">Administrator</option>
                          <option value="2">Staff</option>
                       
                      </select>
                  </div>

                   

                   
                    <div class="form-group text-center">
                        <button class="btn btn-rounded btn-primary" type="submit" onclick="SavechangeRole('<?php echo $id ?>')">Change Role</button>
                    </div>


          <?php

     
        }else{


        }



}





////////////////////////////////SAVE CHANGE ROLE/////////////


///////////////////////changeRoleClick

if ($_GET["CHECKPOST"]=="SavechangeRole") {

      $tabID = $_POST["tabID"];
      $assign_role = $_POST["assign_role"];


      if (mysqli_query($conn, "UPDATE staff SET

            role='$assign_role'

            WHERE id='$tabID' 
            AND active='yes' 
            LIMIT 1

         ")) {
        echo "done";
      } else {
        echo "error";
      }
      




}






///////////////////////VIEW STAFF INFO FOR ADMIN

if ($_GET["CHECKPOST"]=="viewStaffInfoPageAtAdmin") {

      $tabID = $_POST["tabID"];

      $login_session = $tabID;

      // echo "$tabID >>>>> ";

      // echo "$login_session";

      echo "homepage.php?CHECKER=VIEW_STAFF_ADMIN&&d13f6bb08e4138e4cb5fe099b36bc69bd13f6bb08e4138e4cb5fe099b36bc69bd13f6bb08e4138e4cb5fe099b36bc69bd13f6bb08e4138e4cb5fe099b36bc69bd13f6bb08e4138e4cb5fe099b36bc69bd13f6bb08e4138e4cb5fe099b36bc69bd13f6bb08e4138e4cb5fe099b36bc69bd13f6bb08e4138e4cb5fe099b36bc69bd13f6bb08e4138e4cb5fe099b36bc69bd13f6bb08e4138e4cb5fe099b36bc69bd13f6bb08e4138e4cb5fe099b36bc69bd13f6bb08e4138e4cb5fe099b36bc69bd13f6bb08e4138e4cb5fe099b36bc69bd13f6bb08e4138e4cb5fe099b36bc69bd13f6bb08e4138e4cb5fe099b36bc69bd13f6bb08e4138e4cb5fe099b36bc69bd13f6bb08e4138e4cb5fe099b36bc69bd13f6bb08e4138e4cb5fe099b36bc69bd13f6bb08e4138e4cb5fe099b36bc69bd13f6bb08e4138e4cb5fe099b36bc69b&&d13f6bb08e4138e4cb5fe099b36bc69bd=$tabID&&THEREAL=d13f6bb08e4138e4cb5fe099b36bc69bd13f6bb08e4138e4cb5fe099b36bc69bd13f6bb08e4138e4cb5fe099b36bc69b ";





}


///////////////////////resetPassword

if ($_GET["CHECKPOST"]=="resetPasswordPost") {

      $tabID = $_POST["tabID"];


      $seleRec = mysqli_query($conn, "SELECT * FROM staff WHERE active ='yes' AND id='$tabID'  LIMIT 1  ");

      $getSt = mysqli_fetch_assoc($seleRec);

      $username = $getSt["username"];

      $encryPass = md5($username);


      if (mysqli_query($conn, "UPDATE staff SET

            password='$encryPass',
            real_password='$username'

            WHERE id='$tabID' 
            AND active='yes' 
            LIMIT 1

         ")) {
        echo "done";
      } else {
        echo "error";
      }
      




}







///////////////////////confrimStaffPost

if ($_GET["CHECKPOST"]=="confrimStaffPost") {

      $tabID = $_POST["tabID"];


      $confrimS = 'yes';


      if (mysqli_query($conn, "UPDATE staff SET

            confirm='$confrimS'

            WHERE id='$tabID' 
            AND active='yes' 
            LIMIT 1

         ")) {
        echo "done";
      } else {
        echo "error";
      }
      




}









///////////////////////deleteStaffPost

if ($_GET["CHECKPOST"]=="deleteStaffPost") {

      $tabID = $_POST["tabID"];


      $activeS = 'no';


      if (mysqli_query($conn, "UPDATE staff SET

            active='$activeS'

            WHERE id='$tabID' 
            AND active='yes' 
            LIMIT 1

         ")) {
        echo "done";
      } else {
        echo "error";
      }
      




}








////////////////////////////////UPDATE STAFF INFO


//////////////////////regitser staff///

if ($_GET["CHECKPOST"]=="updateStaffInfo") {

     $username = stripcslashes(htmlentities(strip_tags($_POST["username"])));
     $fullname = stripcslashes(htmlentities(strip_tags($_POST["fullname"])));
     $mobile = stripcslashes(htmlentities(strip_tags($_POST["mobile"])));
     $username = strtolower($username);

     $tabID = $_POST["tabID"];

      


       
     if (mysqli_query($conn, "UPDATE staff SET

          username='$username',
          fullname='$fullname',
          mobile='$mobile'

          WHERE id='$tabID'
          LIMIT 1


      ")) {
       echo "done";
     } else {
       echo "error";
     }
     
   

}









//////////////////////regitser staff///

if ($_GET["CHECKPOST"]=="changePasswordPost") {

     $tabID = $_POST["tabID"];
     $old_password = $_POST["old_password"];
     $new_password = $_POST["new_password"];


     $newPassenc = md5($new_password);

    

      $seSTaff = mysqli_query($conn, "SELECT * FROM staff WHERE active ='yes' AND id='$tabID' LIMIT 1 ");


      $getdac = mysqli_fetch_assoc($seSTaff);
      $real_password = $getdac["real_password"];


      if ($real_password===$old_password) {
            

          if (mysqli_query($conn, "UPDATE staff SET

          password='$newPassenc',
          real_password='$new_password'

          WHERE id='$tabID'
          LIMIT 1


              ")) {
               echo "done";
             } else {
               echo "error";
             }
             



      } else {
       echo "passnotmatch";
      }
      


       
   
   

}





if ($_GET["CHECKPOST"]=="searchSalesByDAtePost") {

      
      if (isset($_POST["fromDate"]) && isset($_POST["toDate"]) ) {

    $fromDate  = $_POST["fromDate"];
    $toDate  = $_POST["toDate"];


    if (!empty($fromDate) && !empty($toDate)) {


     if ($fromDate <= $toDate) {
 

      $selesalesDate = mysqli_query($conn, "SELECT * FROM daily_sales WHERE active ='yes' AND 
        theDate
        BETWEEN '$fromDate' AND '$toDate'
        ORDER BY id DESC 

        "); 



  }else{


    echo "mismatch";


  }



}else{

  echo "empty";

}
}

}

?>