
<!-- aria-labelledby="myLargeModalLabel" -->

 


<div id="creditSAlesModalModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="primary-header-modalLabel">CREDIT SALES DIALOG</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                
                    <div class="text-center mt-2 mb-4">
                    <a  class="text-success">
                        <span> SELECT EXISTING CUSTOMER  </span>
                    </a>
                </div>

                <div class="form-row">


                <input class="itemIDClass form-control" type="hidden" >

                    
                    <div class="form-group col-md-4 col-lg-12">
                        <label for="eCustomer" class="col-form-label">Select Existing Customer</label>
                        <select id="eCustomer" class="eCustomer form-control">


                             <?php 

                                     echo' <option value="" selected> Choose Customer...</option>';

                                   $squery = "SELECT * FROM debtors_list WHERE active='yes'";
                                   $sresults = mysqli_query($conn, $squery);
                                   $scount = mysqli_num_rows($sresults);
                                   if ($scount > 0) {
                                    
                                     while ($srow = mysqli_fetch_array($sresults)) {
                                      $name = $srow["name"];
                                      echo'<option value="'.$srow["customerID"].'" >'.$name.'</option>';
                                    }

                                  }  

                              ?>


                        </select>
                    </div>
                    
              



                <div class="text-center mt-2 mb-12 col-lg-12">
                    <a  class="text-primary">
                        <span> OR  ENTER NEW CUSTOMER </span>
                    </a>

                    <br>
                <br>

                </div>
                




                    <div class="form-group col-md-4 col-lg-4">
                        <label for="name">Full Name</label>
                        <input class="fullname form-control" type="text" id="name" required="" placeholder="Agyei Dacosta">
                    </div>

                    <div class="form-group col-md-4 col-lg-4">
                        <label for="mobile">Mobile</label>
                        <input class="mobile form-control" type="text" id="mobile" required="" placeholder="0548157455">
                    </div>

                    <div class="form-group col-md-4 col-lg-4">
                        <label for="location">Location</label>
                        <input class="location form-control" type="text" required="" id="location" placeholder="Enter location. eg. Abotanso-Goaso">
                    </div>
<!-- 
                   

                    <div class="form-group text-center">
                        <button class="btn btn-primary" type="submit">Done</button>
                    </div> -->


                    <div class="text-center mt-2 mb-12 col-lg-12">
                    <a  class="text-warning">
                        <span> ENTER NEW INITIAL AMOUNT </span>
                    </a>
                </div>
                <br>
                <br>



                    <hr class="hr">


                      <div class="form-group col-md-4 col-lg-12">
                        <label for="initial_amount">Initial Amount</label>
                        <input class="initial_amount form-control" type="text" id="initial_amount" required="" placeholder="100" onkeyup="checkPrice(this)" >
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="creditSalesFinishPay()">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->







