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
    

<br>

<body>
<form action="" method="post">
    <input type='hidden' value='<?php $property_info['street'].''.$property_info['city'].''.$property_info['zip'];?>' />
    <input type='text' name='address' placeholder='89 Locust Street' />
    <input type='submit' value='Geocode!' />
</form>






<?php function geocode($address){
 
    // url encode the address
    $address = urlencode($address);
     
    // google map geocode api url
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=AIzaSyBkYy3QdqyYgHr8_jUiX8WEePPE5DGIQy8";
 
    // get the json response
    $resp_json = file_get_contents($url);
     
    // decode the json
    $resp = json_decode($resp_json, true);
 
    // response status will be 'OK', if able to geocode given address 
    if($resp['status']=='OK'){
 
        // get the important data
        $lati = isset($resp['results'][0]['geometry']['location']['lat']) ? $resp['results'][0]['geometry']['location']['lat'] : "";
        $longi = isset($resp['results'][0]['geometry']['location']['lng']) ? $resp['results'][0]['geometry']['location']['lng'] : "";
        $formatted_address = isset($resp['results'][0]['formatted_address']) ? $resp['results'][0]['formatted_address'] : "";
         
        // verify if data is complete
        if($lati && $longi && $formatted_address){
         
            // put the data in the array
            $data_arr = array();            
             
            array_push(
                $data_arr, 
                    $lati, 
                    $longi, 
                    $formatted_address
                );
             
            return $data_arr;
             
        }else{
            return false;
        }
         
    }
 
    else{
        echo "<strong>ERROR: {$resp['status']}</strong>";
        return false;
    }
}?>
<?php
if($_POST){
 
    // get latitude, longitude and formatted address
    $data_arr = geocode($_POST['address']);
 
    // if able to geocode the address
    if($data_arr){
         
        $latitude = $data_arr[0];
        $longitude = $data_arr[1];
        $formatted_address = $data_arr[2];
                     
    ?>
 
    <!-- google map will be shown here -->
    <div id="gmap_canvas">Loading map...</div>
    <div id='map-label'>Map shows approximate location.</div>
 
    <!-- JavaScript to show google map -->
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyBkYy3QdqyYgHr8_jUiX8WEePPE5DGIQy8"></script>   
    <script type="text/javascript">
        function init_map() {
            var myOptions = {
                zoom: 14,
                center: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
            marker = new google.maps.Marker({
                map: map,
                position: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>)
            });
            infowindow = new google.maps.InfoWindow({
                content: "<?php echo $formatted_address; ?>"
            });
            google.maps.event.addListener(marker, "click", function () {
                infowindow.open(map, marker);
            });
            infowindow.open(map, marker);
        }
        google.maps.event.addDomListener(window, 'load', init_map);
    </script>
 
    <?php
 
    // if unable to geocode the address
    }else{
        echo "No map found.";
    }
}
?>


</body>


<?php include '../view/footer.php'?>
