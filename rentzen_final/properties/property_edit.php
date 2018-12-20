<?php include '../view/header.php';?>

<script>
       "use strict"
    
    var validate_login = function(event){
        var street = document.getElementById('street').value;
        var city = document.getElementById('city').value;
        var state = document.getElementById('state').value;
        var zip = document.getElementById('zip').value;
        var beds = document.getElementById('bed').value;
        var baths = document.getElementById('bath').value;
        var square_footage = document.getElementById('sqft').value;
        var property_type = document.getElementById('property_type').value;
        var occupancy = document.getElementById('occ').value;
        var income = document.getElementById('income').value;
        var credit = document.getElementById('credit').value;
        var rental_fee = document.getElementById('rent').value;
        var description = document.getElementById('description').value;
       
       
        var error_message = '';
        
          if(street == ''){
              error_message = error_message + '<li> Street address must be provided</li>';
          }
          
          if(city == ''){
              error_message = error_message + '<li>City must be provided</li>';
          }
          
         if(state == ''){
             error_message = error_message + '<li>State must be provided</li>';
         }
         
         if(zip.length < 5 || zip.length > 10){
             error_message = error_message + '<li>Zip must be between 5 and 10 characters</li>';
         }
         
         if(beds < 1){
             error_message = error_message + '<li>Bedrooms must be a number greater than 1</li>';
         }
         
         if(baths < 1){
             error_message = error_message + '<li>Baths must be a number greater than 1</li>';
         }
         
         if(square_footage < 100){
             error_message = error_message + '<li>Square footage must be a number greater than 100</li>';
         }
         
         if(property_type == ''){
             error_message = error_message + '<li>Type of property must be provided</li>';
         }
         
         if(occupancy == ''){
             error_message = error_message + '<li>Occupancy must be provided</li>';
         }
         
         if(income < 0){
             error_message = error_message + '<li>Income Requirements must be positive number';
         }
         
         if(credit < 300 || credit > 850){
             error_message = error_message + '<li>Credit Score Requirement should be between 300 and 850</li>'
         }
         
         if(rental_fee < 0){
             error_message = error_message + '<li>rental Fee should be a positive number</li>';
         }
          
         if(description == ''){
             error_message = error_message + '<li>Please Describe your property</li>';
         }
         
        if(error_message !== ''){
            event.preventDefault();
            document.getElementById('message').innerHTML = '<ul class ="bg-danger">' + error_message + '</ul>';
            }
          
    }
    
    window.onload = function(){
        document.getElementById("editproperty").onsubmit = function(event){
            validate_login(event);
        }
    }
</script>
        
<div class ="container-fluid">
    <!row for Page Title-->
    <div class ="row">
    <div class="col-md-auto" align="left"><h2>Edit a Property</h2></div>
    </div>
    <br>

<form class='form-control' action="index.php" method="post" id="editproperty">
 <!row for Street Address--> 
 <div class="form-group row" align='left'>
    <div class="col-md-5">
        <label for="street">Street Address:</label>
        <input type="text" class="form-control" id="street" name="street" value='<?php echo $property_record['street'];?>'>
    </div>
    <div class="col-md-3">
    <label for="city">City:</label>
    <input type="text" class="form-control" id="city" name="city" value='<?php echo $property_record['city'];?>'>
    </div>
    <div class="col-md-2">
        <label for="state">State:</label>
        <select class="form-control" id="state" name='state'>
            <option value=''>Please choose</option>
            <?php foreach($states as $s){ 
                $state = $s['state_name'];
                $state_id = $s['state_id'];
                $selected = is_selected($state_id, $property_record['state_id']);
                echo "<option $selected value='$state_id'>$state</option>";
                } 
            ?>
        </select>
    </div>
    <div class="col-md-2">
        <label for="zip">Zip:</label>
        <input type="text" class="form-control" id="zip" name="zip" value='<?php echo $property_record['zip'];?>'>
    </div>
 </div>
 <br>
 
 <!column for Attributes-->
<div class='form-group row'>
 <div class="form-group column col-md-12">
    <div class='form-group row'>
        <label for="bed" class='col-md-3 col-form-label'>Number of Bedrooms:</label>
        <div class ='col-md-5'>   
        <input type="text" class="form-control" id="bed" name="bed" value="<?php echo $property_record['beds'];?>">
        </div>
    </div>
    <div class='form-group row'>
     <label for="bath" class='col-md-3 col-form-label'>Number of Baths:</label>
    <div class="col-md-5">
        <input type="text" class="form-control" id="bath" name="bath" value="<?php echo $property_record['baths'];?>">
    </div>
    </div>
    <div class='form-group row'>
    <label for="sqft" class='col-md-3 col-form-label'>Square Footage:</label>
    <div class='col-md-5'>
        <input type="text" class="form-control" id="sqft" name="sqft" value="<?php echo $property_record['sqft'];?>">
    </div> 
    </div>
    <div class="form-group row"> 
        <label for="property_type" class='col-md-3 col-form-label'>Type of Property:</label>
        <div class='col-md-5'>   
        <select class="form-control" id="property_type" name="type">
            <option value=''>Please choose</option>
            <?php foreach($property_types as $pt){ 
                $typename = $pt['typename'];
                $pt_id = $pt['propertytype_id'];
                $selected = is_selected($pt_id, $property_record['type_id']);
                echo "<option $selected value='$pt_id'>$typename</option>";
                } 
            ?>
        </select>
       </div>
    </div>
     <div class="form-group row"> 
     <label for="occ" class='col-md-3 col-form-label'>Occupancy:</label>
     <div class='col-md-5'>
     <select class="form-control" id="occ" name='occ' <?php echo is_disabled(403, $property_record['propstat_id']); ?> >
            <option value=''>Please choose</option>
            <?php foreach($occupanciesall as $o){ 
                $propertystat = ucwords($o['propertystat']);
                $propstat_id = $o['propstat_id'];
                $selected = is_selected($propstat_id, $property_record['propstat_id']);
                echo "<option $selected value='$propstat_id'>$propertystat</option>";
                } 
            ?>
     </select>
    </div>
    </div>
    <div class="form-group row"> 
     <label for="income" class='col-md-3 col-form-label'>Income Requirement:</label>
     <div class='col-md-5'>   
     <input type="text" class="form-control" id="income" name='income' value="<?php echo $property_record['income_requirement'];?>">
    </div>
    </div>
     <div class="form-group row"> 
     <label for="credit" class='col-md-3 col-form-label'>Credit Score Requirement:</label>
     <div class='col-md-5'>   
     <input type="text" class="form-control" id="credit" name='credit' value="<?php echo $property_record['credit_requirement'];?>">
    </div>
    </div>
     <div class="form-group row"> 
     <label for="rent" class='col-md-3 col-form-label'>Rental Fee:</label>
     <div class='col-md-5'>   
     <input type="text" class="form-control" id="rent" name='rent' value="<?php echo $property_record['rental_fee'];?>">
     
     <input type="hidden" name='property_id' value="<?php echo $propidfunction;?>">
     
    </div>
    </div>
    <div class="form-group row"> 
        <label for="description" class='col-md-3 col-form-label'>Description:</label>
        <div class='col-md-5'>   
            <textarea rows="5" class="form-control" id="description" name='description'><?php echo $property_record['description'];?></textarea>
        </div>
    </div>
 </div>

 
<!column-2 for features-->     
<!--<div class="col-md-3" id="features_list">Not in use</div>-->
 </div>


 
    <div class="text-center"><button type="submit" name= "editproperty" class="btn btn-primary">Continue</button>
    </div>
 </form>
    
 <div id="message"><?php echo $message;?></div>

    
    
</div>