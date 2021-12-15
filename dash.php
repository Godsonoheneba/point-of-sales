


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



  /*-----------------get total credit sales ----------------*/
$seCnt = mysqli_query($conn, "SELECT COUNT(1)  FROM debtors_list WHERE active='yes'   ");
$getRow34 = mysqli_fetch_array($seCnt);
$totalCustomers = $getRow34[0];


 ?>






<div class="content">

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <form class="form-inline">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control form-control-light" id="dash-daterange">
                            <div class="input-group-append">
                                <span class="input-group-text bg-primary border-primary text-white">
                                    <i class="mdi mdi-calendar-range font-13"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <a href="javascript: void(0);" class="btn btn-primary ml-2">
                        <i class="mdi mdi-autorenew"></i>
                    </a>
                    <a href="javascript: void(0);" class="btn btn-primary ml-1">
                        <i class="mdi mdi-filter-variant"></i>
                    </a>
                </form>
            </div>
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
</div>
<!-- end page title -->    

<div class="row">
    <div class="col-xl-5 col-lg-6">

        <div class="row">
            <div class="col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="mdi mdi-account-multiple widget-icon"></i>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0" title="TODAY'S CASH SALES">TODAY'S CASH SALES</h5>
                        <h3 class="mt-3 mb-3">GH&#8373; <?php echo number_format($totalAmountCS,2) ?></h3>
                        <p class="mb-0 text-muted">
                            <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i> <?php echo $tdate ?></span>
                              
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="mdi mdi-cart-plus widget-icon bg-success-lighten text-success"></i>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0" title="TODAY'S CREDIT SALES">TODAY'S CREDIT SALES</h5>
                        <h3 class="mt-3 mb-3">GH&#8373; <?php echo number_format($totalAmountCRS,2) ?></h3>
                        <p class="mb-0 text-muted">
                            <span class="text-danger mr-2"><i class="mdi mdi-arrow-down-bold"></i> <?php echo $tdate ?></span>
                            
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div> <!-- end row -->

        <div class="row">
            <div class="col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="mdi mdi-currency-usd widget-icon bg-success-lighten text-success"></i>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0" title="TODAY'S REVENUE">TODAY'S REVENUE</h5>
                        <h3 class="mt-3 mb-3">GH&#8373; <?php echo number_format($totalRevenue,2) ?></h3>
                        <p class="mb-0 text-muted">
                            <span class="text-danger mr-2"><i class="mdi mdi-arrow-down-bold"></i> <?php echo $tdate ?></span>
                            
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-lg-6">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-right">
                            <i class="mdi mdi-pulse widget-icon"></i>
                        </div>
                        <h5 class="text-muted font-weight-normal mt-0" title="NUMBER OF CUSTOMERS">CUSTOMERS</h5>
                        <h3 class="mt-3 mb-3"><?php echo $totalCustomers ?></h3>
                        <p class="mb-0 text-muted">
                            <span class="text-success mr-2"><i class="mdi mdi-arrow-up-bold"></i> All customers </span>
                      
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div> <!-- end row -->

    </div> <!-- end col -->















<?php 

if($stmt = $conn->query("SELECT name, id  FROM debtors_list")){

  echo "No of records : ".$stmt->num_rows."<br>";
$php_data_array = Array(); // create PHP array
 
//   echo "<table>
// <tr> <th>Name</th><th>ID</th></tr>";
while ($row = $stmt->fetch_row()) {
   // echo "<tr><td>$row[0]</td><td>$row[1]</td></tr>";
   $php_data_array[] = $row; // Adding to array
   }
// echo "</table>";
}else{
echo $conn->error;
}
//print_r( $php_data_array);
// You can display the json_encode output here. 
echo json_encode($php_data_array); 

// Transfor PHP array to JavaScript two dimensional array 
echo "<script>
        var my_2d = ".json_encode($php_data_array)."
</script>";
?>


<div id="chart_div"></div>
<br><br>

<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->

<script type="text/javascript" src="assets/js/daco_charts.js"></script>


<script>
 google.charts.load('current', {'packages':['corechart']});
     // Draw the pie chart when Charts is loaded.
      google.charts.setOnLoadCallback(draw_my_chart);
      // Callback that draws the pie chart
      function draw_my_chart() {
        // Create the data table .
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'language');
        data.addColumn('number', 'Nos');
        for(i = 0; i < my_2d.length; i++)
    data.addRow([my_2d[i][0], parseInt(my_2d[i][1])]);
// above row adds the JavaScript two dimensional array data into required chart format
    var options = {title:'plus2net.com : How the tutorials are distributed',
                       width:600,
                       height:500};

        // Instantiate and draw the chart
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
</script>


















    <div class="col-xl-7  col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="dropdown float-right">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                    </div>
                </div>
                <h4 class="header-title mb-3">Projections Vs Actuals</h4>

                <div id="high-performing-product" class="apex-charts"
                    data-colors="#536de6,#e3eaef"></div>

                <!-- <div style="height: 263px;" class="chartjs-chart">
                    <canvas id="high-performing-product"></canvas>
                </div> -->
            </div> <!-- end card-body-->
        </div> <!-- end card-->

    </div> <!-- end col -->
</div>
<!-- end row -->

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="dropdown float-right">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                    </div>
                </div>
                <h4 class="header-title mb-3">Revenue</h4>

                <div class="chart-content-bg">
                    <div class="row text-center">
                        <div class="col-md-6">
                            <p class="text-muted mb-0 mt-3">Current Week</p>
                            <h2 class="font-weight-normal mb-3">
                                <small class="mdi mdi-checkbox-blank-circle text-primary align-middle mr-1"></small>
                                <span>$58,254</span>
                            </h2>
                        </div>
                        <div class="col-md-6">
                            <p class="text-muted mb-0 mt-3">Previous Week</p>
                            <h2 class="font-weight-normal mb-3">
                                <small class="mdi mdi-checkbox-blank-circle text-success align-middle mr-1"></small>
                                <span>$69,524</span>
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="dash-item-overlay d-none d-md-block">
                    <h5>Today's Earning: $2,562.30</h5>
                    <p class="text-muted font-13 mb-3 mt-2">Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui.
                        Etiam rhoncus...</p>
                    <a href="javascript: void(0);" class="btn btn-outline-primary">View Statements
                        <i class="mdi mdi-arrow-right ml-2"></i>
                    </a>
                </div>

                <div id="revenue-chart" class="apex-charts mt-3" 
                    data-colors="#536de6,#10c469"></div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->

    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="dropdown float-right">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                    </div>
                </div>
                <h4 class="header-title">Revenue By Location</h4>
                <div class="mb-4 mt-4">
                    <div id="world-map-markers" style="height: 224px"></div>
                </div>

                <h5 class="mb-1 mt-0 font-weight-normal">New York</h5>
                <div class="progress-w-percent">
                    <span class="progress-value font-weight-bold">72k </span>
                    <div class="progress progress-sm">
                        <div class="progress-bar" role="progressbar" style="width: 72%;" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

                <h5 class="mb-1 mt-0 font-weight-normal">San Francisco</h5>
                <div class="progress-w-percent">
                    <span class="progress-value font-weight-bold">39k </span>
                    <div class="progress progress-sm">
                        <div class="progress-bar" role="progressbar" style="width: 39%;" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

                <h5 class="mb-1 mt-0 font-weight-normal">Sydney</h5>
                <div class="progress-w-percent">
                    <span class="progress-value font-weight-bold">25k </span>
                    <div class="progress progress-sm">
                        <div class="progress-bar" role="progressbar" style="width: 39%;" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

                <h5 class="mb-1 mt-0 font-weight-normal">Singapore</h5>
                <div class="progress-w-percent mb-0">
                    <span class="progress-value font-weight-bold">61k </span>
                    <div class="progress progress-sm">
                        <div class="progress-bar" role="progressbar" style="width: 61%;" aria-valuenow="61" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<!-- end row -->


<div class="row">
    <div class="col-xl-6 col-lg-12 order-lg-2 order-xl-1">
        <div class="card">
            <div class="card-body">
                <a href="#" class="btn btn-sm btn-link float-right mb-3">Export
                    <i class="mdi mdi-download ml-1"></i>
                </a>
                <h4 class="header-title mt-2">Top Selling Products</h4>

                <div class="table-responsive">
                    <table class="table table-centered table-nowrap table-hover mb-0">
                        <tbody>
                            <tr>
                                <td>
                                    <h5 class="font-14 my-1 font-weight-normal">ASOS Ridley High Waist</h5>
                                    <span class="text-muted font-13">07 April 2018</span>
                                </td>
                                <td>
                                    <h5 class="font-14 my-1 font-weight-normal">$79.49</h5>
                                    <span class="text-muted font-13">Price</span>
                                </td>
                                <td>
                                    <h5 class="font-14 my-1 font-weight-normal">82</h5>
                                    <span class="text-muted font-13">Quantity</span>
                                </td>
                                <td>
                                    <h5 class="font-14 my-1 font-weight-normal">$6,518.18</h5>
                                    <span class="text-muted font-13">Amount</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5 class="font-14 my-1 font-weight-normal">Marco Lightweight Shirt</h5>
                                    <span class="text-muted font-13">25 March 2018</span>
                                </td>
                                <td>
                                    <h5 class="font-14 my-1 font-weight-normal">$128.50</h5>
                                    <span class="text-muted font-13">Price</span>
                                </td>
                                <td>
                                    <h5 class="font-14 my-1 font-weight-normal">37</h5>
                                    <span class="text-muted font-13">Quantity</span>
                                </td>
                                <td>
                                    <h5 class="font-14 my-1 font-weight-normal">$4,754.50</h5>
                                    <span class="text-muted font-13">Amount</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5 class="font-14 my-1 font-weight-normal">Half Sleeve Shirt</h5>
                                    <span class="text-muted font-13">17 March 2018</span>
                                </td>
                                <td>
                                    <h5 class="font-14 my-1 font-weight-normal">$39.99</h5>
                                    <span class="text-muted font-13">Price</span>
                                </td>
                                <td>
                                    <h5 class="font-14 my-1 font-weight-normal">64</h5>
                                    <span class="text-muted font-13">Quantity</span>
                                </td>
                                <td>
                                    <h5 class="font-14 my-1 font-weight-normal">$2,559.36</h5>
                                    <span class="text-muted font-13">Amount</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5 class="font-14 my-1 font-weight-normal">Lightweight Jacket</h5>
                                    <span class="text-muted font-13">12 March 2018</span>
                                </td>
                                <td>
                                    <h5 class="font-14 my-1 font-weight-normal">$20.00</h5>
                                    <span class="text-muted font-13">Price</span>
                                </td>
                                <td>
                                    <h5 class="font-14 my-1 font-weight-normal">184</h5>
                                    <span class="text-muted font-13">Quantity</span>
                                </td>
                                <td>
                                    <h5 class="font-14 my-1 font-weight-normal">$3,680.00</h5>
                                    <span class="text-muted font-13">Amount</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5 class="font-14 my-1 font-weight-normal">Marco Shoes</h5>
                                    <span class="text-muted font-13">05 March 2018</span>
                                </td>
                                <td>
                                    <h5 class="font-14 my-1 font-weight-normal">$28.49</h5>
                                    <span class="text-muted font-13">Price</span>
                                </td>
                                <td>
                                    <h5 class="font-14 my-1 font-weight-normal">69</h5>
                                    <span class="text-muted font-13">Quantity</span>
                                </td>
                                <td>
                                    <h5 class="font-14 my-1 font-weight-normal">$1,965.81</h5>
                                    <span class="text-muted font-13">Amount</span>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div> <!-- end table-responsive-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->

    <div class="col-xl-3 col-lg-6 order-lg-1">
        <div class="card">
            <div class="card-body">
                <div class="dropdown float-right">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                    </div>
                </div>
                <h4 class="header-title">Total Sales</h4>

                <div id="average-sales" class="apex-charts mb-4 mt-4"
                    data-colors="#536de6,#10c469,#ff5b5b,#f9c851"></div>
                

                <div class="chart-widget-list">
                    <p>
                        <i class="mdi mdi-square text-primary"></i> Direct
                        <span class="float-right">$300.56</span>
                    </p>
                    <p>
                        <i class="mdi mdi-square text-danger"></i> Affilliate
                        <span class="float-right">$135.18</span>
                    </p>
                    <p>
                        <i class="mdi mdi-square text-success"></i> Sponsored
                        <span class="float-right">$48.96</span>
                    </p>
                    <p class="mb-0">
                        <i class="mdi mdi-square text-warning"></i> E-mail
                        <span class="float-right">$154.02</span>
                    </p>
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->

    <div class="col-xl-3 col-lg-6 order-lg-1">
        <div class="card">
            <div class="card-body">
                <div class="dropdown float-right">
                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                        <i class="mdi mdi-dots-vertical"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                    </div>
                </div>
                <h4 class="header-title mb-2">Recent Activity</h4>

                <div data-simplebar style="max-height: 424px;">
                    <div class="timeline-alt pb-0">
                        <div class="timeline-item">
                            <i class="mdi mdi-upload bg-info-lighten text-info timeline-icon"></i>
                            <div class="timeline-item-info">
                                <a href="#" class="text-info font-weight-bold mb-1 d-block">You sold an item</a>
                                <small>Paul Burgess just purchased “Hyper - Admin Dashboard”!</small>
                                <p class="mb-0 pb-2">
                                    <small class="text-muted">5 minutes ago</small>
                                </p>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <i class="mdi mdi-airplane bg-primary-lighten text-primary timeline-icon"></i>
                            <div class="timeline-item-info">
                                <a href="#" class="text-primary font-weight-bold mb-1 d-block">Product on the Bootstrap Market</a>
                                <small>Dave Gamache added
                                    <span class="font-weight-bold">Admin Dashboard</span>
                                </small>
                                <p class="mb-0 pb-2">
                                    <small class="text-muted">30 minutes ago</small>
                                </p>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <i class="mdi mdi-microphone bg-info-lighten text-info timeline-icon"></i>
                            <div class="timeline-item-info">
                                <a href="#" class="text-info font-weight-bold mb-1 d-block">Robert Delaney</a>
                                <small>Send you message
                                    <span class="font-weight-bold">"Are you there?"</span>
                                </small>
                                <p class="mb-0 pb-2">
                                    <small class="text-muted">2 hours ago</small>
                                </p>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <i class="mdi mdi-upload bg-primary-lighten text-primary timeline-icon"></i>
                            <div class="timeline-item-info">
                                <a href="#" class="text-primary font-weight-bold mb-1 d-block">Audrey Tobey</a>
                                <small>Uploaded a photo
                                    <span class="font-weight-bold">"Error.jpg"</span>
                                </small>
                                <p class="mb-0 pb-2">
                                    <small class="text-muted">14 hours ago</small>
                                </p>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <i class="mdi mdi-upload bg-info-lighten text-info timeline-icon"></i>
                            <div class="timeline-item-info">
                                <a href="#" class="text-info font-weight-bold mb-1 d-block">You sold an item</a>
                                <small>Paul Burgess just purchased “Hyper - Admin Dashboard”!</small>
                                <p class="mb-0 pb-2">
                                    <small class="text-muted">16 hours ago</small>
                                </p>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <i class="mdi mdi-airplane bg-primary-lighten text-primary timeline-icon"></i>
                            <div class="timeline-item-info">
                                <a href="#" class="text-primary font-weight-bold mb-1 d-block">Product on the Bootstrap Market</a>
                                <small>Dave Gamache added
                                    <span class="font-weight-bold">Admin Dashboard</span>
                                </small>
                                <p class="mb-0 pb-2">
                                    <small class="text-muted">22 hours ago</small>
                                </p>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <i class="mdi mdi-microphone bg-info-lighten text-info timeline-icon"></i>
                            <div class="timeline-item-info">
                                <a href="#" class="text-info font-weight-bold mb-1 d-block">Robert Delaney</a>
                                <small>Send you message
                                    <span class="font-weight-bold">"Are you there?"</span>
                                </small>
                                <p class="mb-0 pb-2">
                                    <small class="text-muted">2 days ago</small>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- end timeline -->
                </div> <!-- end slimscroll -->
            </div>
            <!-- end card-body -->
        </div>
        <!-- end card-->
    </div>
    <!-- end col -->

</div>
<!-- end row -->


</div> <!-- End Content -->
