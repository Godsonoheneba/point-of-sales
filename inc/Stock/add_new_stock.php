
<div class="content">

<?php include 'date_at_top.php'; ?>
<div class="page-title thePageTitle">Stock | Add New Stock</div>

<hr class="hr">


 
       <div class="container">
            <div class="row">
                <div class="form-group col-md-4 col-lg-6">
                    <label for="Category" class="col-form-label">Select Category</label>
                    <select id="Category" class="Category form-control" onchange="getChange(this.id, 'subcategories')">


                    <?php 

                     $squery = "SELECT * FROM item_category WHERE active='yes'";
                     $sresults = mysqli_query($conn, $squery);
                     $scount = mysqli_num_rows($sresults);
                     if ($scount > 0) {
                       echo' <option value=""> Choose...</option>';
                       while ($srow = mysqli_fetch_array($sresults)) {
                        $category_id = $srow["category_id"];
                        $name = $srow["name"];
                       
                        echo'<option value="'.$category_id.'" >'.$name.'</option>';
                      }

                    }  

                    ?>


                       <!--  <option value="">Select...</option>
                        <option value="binding_wire">Binding Wire</option>
                        <option value="cement">Cement</option>
                        <option value="door">Door</option>
                        <option value="iron_rod">Iron Rod</option>
                        <option value="nails">Nails</option>
                        <option value="plywood">Plywood</option>
                        <option value="roofing_sheet">Roofing Sheet</option>
             -->
                      
                    </select>
                </div>






                 <div class="form-group  col-lg-6">
                    <label for="subcategories" class="col-form-label">Select Type</label>


                    <select id="subcategories" class="subcategories form-control" >
                      
                    </select>
                </div>



                <div class="form-group col-lg-6">
                    <label for="Price" class="col-form-label">Unit Price</label>
                    <input type="text" onkeyup="checkPrice(this)" class="price form-control" id="Price" placeholder="Unit Price. eg. 200">
                </div>


                 <div class="form-group col-lg-6">
                    <label for="Quantity" class="col-form-label"> Quantity</label>
                    <input type="text" onkeyup="checkPrice(this)" class="quantity form-control" id="Quantity" placeholder="Quantity. eg. 20">
                </div>


                 <div class="form-group col-lg-12">
                     <button type="button" class="btn btn-outline-primary right" onclick="addNewStock()"><i class="uil-google-play"></i> Add</button>
                </div>


               


            </div> <!-- end col-->

          
        </div> <!-- end row -->
</div>


<script type="text/javascript">
    







      /////////////////////////////////Auto change of categories//////////////////////////////////////
  function getChange(s1,s2){
    var s1 = document.getElementById('Category');
    var s2 = document.getElementById('subcategories');

    s2.innerHTML="";

    if (s1.value == "BW_0001") {

      var optionArray = ["BW10001|Binding Wire",];

    }else if (s1.value == "C_0002") {

      var optionArray = ["C10001|Type 1","C10002|Type 2","C10003|Type 3",];

    }else if (s1.value == "D_0003") {
      var optionArray = ["D10001|Single","D10002|Double","D10003|Bathroom","D10004|One and Half",];


    }else if (s1.value == "IR_0004") {
      var optionArray = ["IR10001|5.5 mm","IR10002|7.5 mm","IR10003|10 mm","IR10004|11.5 mm","IR10005|12 mm","IR10006|14 mm","IR10007|16 mm",];


    }else if (s1.value == "N_0005") {
      var optionArray = ["N10001|1 inc","N10002|1.5 inc","N10003|2 inc","3N10004|3 inc","N10005|4 inc",];

    }else if (s1.value == "P_0006") {
      var optionArray = ["P10001|4 mm","P10002|12 mm","P10003|18 mm",];

    }else if (s1.value == "RS_0007") {
      var optionArray = ["RS10001|Circular","RS10002|Aluzinc (A) ","RS10003|Aluzinc (B)","RS10004|Roofing Caps","RS10005|Roofing Nails","RS10006|Holders","RS10007|Holes",];
    }else{
      
    }

    for(var option in optionArray){

      var pair = optionArray[option].split("|");
      var newOption = document.createElement("option");
      newOption.value = pair[0];
      newOption.innerHTML = pair[1];

      s2.options.add(newOption);
    }

  }   





</script>