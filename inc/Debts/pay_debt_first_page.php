   
 

<div class="page-inner">
  <!-- .page-title-bar -->
  <header class="page-title-bar"> 
    <!-- page title stuff goes here -->
    <h1 class="page-title"> Debt Payment </h1>
  </header><!-- /.page-title-bar -->
  <!-- .page-section -->
  <div class="page-section"> 
    <!-- .section-block -->
    <div class="section-block">
      <!-- page content goes here -->
      <p> Search by Customer ID  / name / mobile</p>
    </div><!-- /.section-block -->
  </div><!-- /.page-section -->







  <!-- .top-bar-item -->
  <div class="top-bar-item top-bar-item-full ">
    <!-- .top-bar-search -->
    
    <div class="row col-xl-12" >

      <!-- grid column -->
      <div class="col-xl-12">
        <!-- .card -->
        <div class="card card-fluid">

          <br>

          <!-- ----------------------------the search input ------------------ -->
          <div class="input-group input-group-search dropdown col-xl-12">
            <div class="input-group-prepend">
              <span class="input-group-text"><span class="oi oi-magnifying-glass"></span></span>
            </div>
            <input type="text" class="form-control seachresultInput" data-toggle="dropdown" aria-label="Search" placeholder="Search customer eg. 3012525021478 / agyei dacosta / 0548878554" name="seachresultInput"  onkeyup="searchPersonToPayDebt()"> 

          </div><!-- /.input-group -->

          <br>

          <div class="theResultsDivForSearch" >






          </div>





        </div>
      </div>


    </div>

  </div><!-- /.top-bar-item -->

</div><!-- /.page-inner -->



 


<script type="text/javascript">

  function searchPersonToPayDebt() {

    var seachresultInput = $(".seachresultInput").val();
    var theResultsDivForSearch = $(".theResultsDivForSearch");

    if (seachresultInput!=="") {


      $.post(".esgapehtllaroftsopxajaehtsitaht..ajaxpost?CHECKPOST=searchLoanPersonLivePost" , {seachresultInput:seachresultInput},function (showOutput) {



        theResultsDivForSearch.html(showOutput);


      })






    } else {

      /*-----------------------do nothing--------------------*/
    }
  }




</script>