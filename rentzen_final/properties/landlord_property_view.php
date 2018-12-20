<?php include '../view/header.php';?>


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
    <div class="col-md-2"></div>
</div>
 

</div><!--close the container-->    

<?php include '../view/footer.php'?>
