<?php 

$min = 1000;
$max = 9999;
$last_four_rand = rand($min, $max);



$tdate = date("Y-m-d");

                    $no = 1;
                    $myALl = 0;
$seleDail = mysqli_query($conn, "SELECT  st.*, cat.*, scat.* FROM stocks st, item_category cat, item_sub_category scat


                 WHERE st.category = cat.category_id
                 AND st.subcategories = scat.sub_category_id
                 AND st.active = 'yes'
                 ORDER BY scat.sname DESC


                   ");

 ?>



<div class="content">

<?php include 'date_at_top.php'; ?>
<div class="page-title thePageTitle"> STOCKS | View All Stocks</div>

<hr class="hr">

    <div class="container">



      <div class="row">
          
          <div class="col-12">
              <div class="card">
                <div class="card-body">

          
                    <div class="col-lg-12">
              <!-- <table id="alternative-page-datatable " class="table table-striped dt-responsive nowrap w-100"> -->

                <table id="alternative-page-datatable" class="display table   table-striped">

                <thead>
                    <tr>
                        <!-- <th>Customer</th> -->
                        <th>SN.</th>
                        <th>Category</th>
                        <th>Item ID</th>
                        <th>Item Name</th>
                        <th>Price</th>
                        <th>Qty Left</th>
                        <th>Total </th>
                        <th >Action</th>
                 

                    </tr>
                </thead>


                <tbody>


                <?php 




                  if (mysqli_num_rows($seleDail) > 0) {
                        



                   while ($gett = mysqli_fetch_assoc($seleDail)) {


                   $id = $gett["id"];
                   $sub_category_id = $gett["sub_category_id"];
                   $name = $gett["name"];
                   $sname = $gett["sname"];
                   $quantity = $gett["quantity"];
                   $price = $gett["price"];
                   $stock_id = $gett["stock_id"];

                   $totalForEahc2 = $price * $quantity;
                   $totalForEahc = number_format($totalForEahc2, 2);

                   $price = number_format($price, 2);

                   $myALl += $totalForEahc2;



                   echo "


                
                    <tr>
                        <td>$no</td>
                        <td>$name</td>
                        <td>$sub_category_id</td>
                        <td>$sname</td>
                        <td>$price</td>
                        <td>$quantity</td>
                        <td>$totalForEahc</td>

                        ";


                        if ($roleDB==="1") {
                          echo "

                              <td id=\"$stock_id\"  title=\"Edit Price\" style=\"cursor:pointer;\" onclick=\"editPriceFOrStock(this.id,$price)\" > 


                        <a style=\"color: #fff;\" data-toggle=\"modal\" data-target=\"#editStockPrice\" class=\"btn btn-primary\">

                                <i class=\"uil-edit\"></i>

                        </a>


 
                        

                        </td>


                          ";
                        }
                        



                        

                    echo "  
             
                    </tr>

                    
                   
               



                   ";




                   $no++;
      


                }




                  echo "


                     <div class=\"row\">
        

                       <div class=\"col-xl-3 col-lg-6\">
                          <div class=\"card widget-flat bg-primary text-white\">
                              <div class=\"card-body\">
                                  <div class=\"float-right\">
                                      <i class=\"mdi mdi-currency-usd widget-icon bg-light-lighten rounded-circle text-white\"></i>
                                  </div>
                                  <h5 class=\"font-weight-normal mt-0\" title=\"Revenue\">TOTAL AMOUNT FOR ALL STOCKS</h5>
                                  <h1 class=\"mt-3 mb-3 text-white\">GH&#8373; " . number_format($myALl,2)  ."    </h1>
                                  <p class=\"mb-0\">
                                      <span class=\"badge badge-info mr-1\">
                                          <i class=\"mdi mdi-arrow-up-bold\"></i> </span>
                                      <span class=\"text-nowrap\"></span>
                                  </p>
                              </div>
                          </div>
                      </div> 

              </div>

                  ";






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

<?php include 'edit_stock_modal.php'; ?>

<script type="text/javascript">
  
////////////////////////edit stock price

function editPriceFOrStock(stock_id,price) {
  
    // var stockID = $(".stockID").val();
    // var CurrentPriceClass = $(".price").val();

    $(".stockID").val(stock_id);
    $(".CurrentPriceClass").val(price);

}


</script>

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