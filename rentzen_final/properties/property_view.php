<?php include '../view/header.php';?>

<div></div>

<div class ="container" id="mycontainer">
    <div class="row">
        <h2>Property on <?php echo ucwords($property_info['street']);?><br></h2>
    </div>
    <div class='row'>
            <div class='col-md-12'>
        <img class='img-fluid rounded' src='<?php echo $property_info['picture'];?>' alt='home' style='width: 100%'>
            </div>
        </div>
    
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-3">
            <b>Description:  </b>
            </div>
            <div class="col-md-7">
                <p><?php echo $property_info['description'];?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
            <b>City:  </b>
            </div>
            <div class="col-md-7">
                <p><?php echo $property_info['city'];?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
            <b>Beds:  </b>
            </div>
            <div class="col-md-7">
                <p><?php echo $property_info['beds'];?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
            <b>Baths:  </b>
            </div>
            <div class="col-md-7">
                <p><?php echo $property_info['baths'];?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
            <b>Square Feet:  </b>
            </div>
            <div class="col-md-7">
                <p><?php echo $property_info['sqft'];?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
            <b>Monthly Rent:  </b>
            </div>
            <div class="col-md-7">
                <p><?php echo $property_info['rental_fee'];?></p>
            </div>
        </div>

    </div>
</div>
 
<form action="../rental_applications/index.php" method="post">
    <div class="row">
        <div class=" col-md-4 text-center"></div>
        <div class=" col-md-4 text-center">
                <div id="buttons">
                <input class="btn btn-primary btn-block" type="submit" value="Apply" name="APPLY"> 
                <input type="hidden" value="<?php echo $selected_property_id;?>" name="property_id">
                <br>
                </div>
        </div>
    </div>
</form>
    </div>    
       
        <div class="col"></div>
        
    <div class='row'>
        <div class='col-md-4'>

        </div>
        <div class='col-md-4'>
            

            
        </div>
        <div class='col-md-4'>
            
        </div>   
    </div>
        
        <form id="form-container" class="form-container">
            <label for="street">&nbsp;</label>
            <input type="hidden" id="street" value="<?php echo $property_info['street'];?>">
            <label for="city">&nbsp;</label>
            <input type="hidden" id="city" value="<?php echo $property_info['city'];?>">
        </form>
        
        <hr>
        <h2 id="address" class="address">Property Street View</h2>
        <img class="photo" id="photo"/>
          
   <script>
       $(document).ready(function(){
          loadData();     
       });
       
   function loadData() {
   var street = $('#street').val();
   var city = $('#city').val();
   var address = street + " , " + city;
   var streetviewURL = 'http://maps.googleapis.com/maps/api/streetview?size=600x400&key=AIzaSyBkYy3QdqyYgHr8_jUiX8WEePPE5DGIQy8&location=' + address + '';
   $('#photo').attr("src", streetviewURL);
   
   return false;
   
    };
   
        
        </script>
<br>

<?php include '../view/footer.php'?>
