 

<?php 

  

?>
<!-- ---------------------------MORE INFO MODAL------------- -->

<!-- .modal -->
<div class="modal fade" id="payLoanModal" tabindex="-1" role="dialog" aria-labelledby="payLoanModalLabel" aria-hidden="true">
  <!-- .modal-dialog --> 
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <!-- .modal-content -->
    <div class="modal-content">
      <!-- .modal-header -->
      <div class="modal-header text-center">
        <h6 id="payLoanModalLabel" class="modal-title">Pay <?php echo $getLoanBy ?>'s Debt</h6><br>
        <h6 id="payLoanModalLabel" class="modal-title">Current Balance : GH&#8373;  <?php echo number_format($getBalance, 2) ?></h6>
      </div><!-- /.modal-header -->
      <!-- .modal-body -->
      <div class="modal-body px-0">
        <!-- .list-group -->
        <div class="list-group list-group-flush list-group-divider">
          <!-- .list-group-item -->
          <div class="list-group-item">

          </div><!-- /.list-group-item -->
          <!-- .list-group-item -->






          <div class="" >




           <div class="col-md-12 mb-3">
            <label for="Amount">Amount <abbr title="Required">*</abbr></label> <input type="text"  onkeyup="checkMobiles(this)" maxlength="10" class="form-control payLoanAmountClass" id="Amount" placeholder="Amount "  required=""  >
          </div>





          <div class="form-actions col-md-10 mb-3">
             <button type="submit" class="btn btn-primary payFees_buts" onclick="payDebt('<?php echo $getLoanID ?>','<?php echo $getPersonID ?>' )"> Pay </button>


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