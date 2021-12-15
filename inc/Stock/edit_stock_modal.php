 

<?php 

  

?>

<!-- ---------------------------MORE INFO MODAL------------- -->

<!-- .modal -->
<div class="modal fade" id="editStockPrice" tabindex="-1" role="dialog" aria-labelledby="editStockPriceLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h6 id="editStockPriceLabel" class="modal-title">CHANGE PRICE</h6><br>
        <h6 id="editStockPriceLabel" class="modal-title"></h6>
      </div>
      <div class="modal-body px-0">
        <div class="list-group list-group-flush list-group-divider">
         
          <div class="list-group-item">

          </div><!-- /.list-group-item -->

          <div class="" >


            <input type="hidden"  class="form-control stockID" id="stockID" placeholder="Current Price "  required=""  >

           <div class="col-md-12 mb-3">
            <label for="CurrentPrice">Current Price <abbr title="Required">*</abbr></label> 
            <input type="text"  onkeyup="checkPrice(this)" maxlength="10" class="form-control CurrentPriceClass" id="CurrentPrice" placeholder="Current Price "  required=""  readonly="">
          </div>



          <div class="col-md-12 mb-3">
            <label for="CurrentPrice">New Price <abbr title="Required">*</abbr></label> <input type="text"  onkeyup="checkPrice(this)" maxlength="10" class="form-control NewPriceClass" id="NewPrice" placeholder="New Price . eg. 50 "  required=""  >
          </div>



     





          <div class="form-actions col-md-10 mb-3">
             <button type="submit" class="btn btn-primary payFees_buts" onclick="changeStockPrice()"> Change </button>


          </div><!-- /.form-actions -->

        </div>





      </div><!-- /.list-group -->
      <!-- .loading -->

    </div><!-- /.modal-body -->
    <!-- .modal-footer -->
    <div class="modal-footer">
      <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
    </div><!-- /.modal-footer -->
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">







</script>