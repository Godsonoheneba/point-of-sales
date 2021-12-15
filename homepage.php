<?php include 'header.php'; ?>




        
        <!-- Start Content-->
        <div class="container-fluid">

            <!-- Begin page -->
            <div class="wrapper">

                <!-- ========== Left Sidebar Start ========== -->
               

               <?php include 'left_side_bar.php'; ?>
                <!-- Left Sidebar End -->


                <div class="content-page">
                   <div class="content">



                        <?php 

                        $MYTOPGET = $_GET["CHECKER"];




                        /*----------------STOCKING-----------------*/

                        /*-=======================ADD STOCK================*/

                        if ($MYTOPGET==="ADD_NEW_STOCK") {

                         include 'inc/Stock/add_new_stock.php';
                         

                       }



                          /*-=======================VIEW_STOCKS================*/

                       else if ($MYTOPGET==="VIEW_STOCKS") {

                         include 'inc/Stock/view_all_stocks.php';
                         

                       }









 /*----------------PURCHASE-----------------*/

                        /*-=======================ADD PURCHASE================*/

                       else if ($MYTOPGET==="ADD_NEW_PURCHASE") {

                         include 'inc/Purchase/add_new_purchase.php';
                         

                       }



                       /*-=======================VIEW PURCHASE================*/

                       else if ($MYTOPGET==="VIEW_PURCHASE") {

                         include 'inc/Purchase/view_all_purchases.php';
                         

                       }
                       /*-=======================ENDS PURCHASE================*/






                       /*-=======================DEBTORS================*/
                       /*-=======================PAY DEBT================*/

                       else if ($MYTOPGET==="PAY_DEBT") {

                         include 'inc/Debts/pay_debt_first_page.php';
                         

                       }


                       
                       else if ($MYTOPGET==="PROCEED_TO_PAY_DEBT") {

                         include 'inc/Debts/proceed_to_pay_debts.php';
                         

                       }



                           else if ($MYTOPGET==="VIEW_ALL_PAID_DEBTS") {

                         include 'inc/Debts/view_all_paid_debt.php';
                         

                       }




                       else if ($MYTOPGET==="VIEW_ALL_DEBTORS") {

                         include 'inc/Debts/view_all_debtors.php';
                         

                       }

                       /*-=======================ENDS DENTORS================*/




                          /*-=======================PICK UP================*/

                       else if ($MYTOPGET==="ADD_NEW_PICKUP") {

                         include 'inc/PickUp/add_new_pickup.php';
                         

                       }




                              /*-=======================PICK UP================*/

                       else if ($MYTOPGET==="PROCEED_TO_PICKUP") {

                         include 'inc/PickUp/proceed_to_pickup.php';
                         

                       }





                                 /*-=======================VIEW ALL PICK UP================*/

                       else if ($MYTOPGET==="VIEW_ALL_PICKUPS") {

                         include 'inc/PickUp/view_all_pickups_list.php';
                         

                       }




                                   /*-======================ACCOUNTS===============*/
                                   /*-=======================VIEW TODAYS SALES================*/

                       else if ($MYTOPGET==="VIEW_TODAY_SALES") {

                         include 'inc/Accounts/view_all_daily_sales.php';
                         

                       }




                        /*-=======================VIEW  STAFF / MY PROFILE================*/

                       else if ($MYTOPGET==="VIEW_STAFF_ADMIN") {

                         include 'inc/Staffs/view_staff_info.php';
                         

                       }



                               /*-=======================VIEW  STAFF / MY PROFILE================*/

                       else if ($MYTOPGET==="VIEW_STAFF_INFO") {

                         include 'inc/Staffs/view_staff_info.php';
                         

                       }





                         /*-=======================VIEW ALL STAFFS ================*/

                       else if ($MYTOPGET==="VIEW_ALL_STAFFS") {

                         include 'inc/Staffs/view_all_staffs_list.php';
                         

                       }




                       else{

                        include 'dashboard.php';


                       } 



                       ?>



                   </div>
                    <!-- End Content -->

                <!-- </div> -->


<?php include 'footer.php'; ?>