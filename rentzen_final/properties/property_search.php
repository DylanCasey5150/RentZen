<?php include '../view/header.php';?>
<script>
        "use strict";

        var validate = function(event){

            var city = $('#city').val();
            var highendprice = $('#HE').val();
            var error_message = '';
            
            $('#message').html("");

            if (city === "" || city.length < 2)
                    {
                    error_message += "<li>You must provide a city.</li>";
                    }
            if (highendprice === "" || highendprice < 100)
                    {
                    error_message += "<li>You must provide a reasonable price.</li>";
                    }
                    
            if (error_message != ''){
                event.preventDefault();
                $("#message").html("<div class='alert alert-danger'><ul>" + error_message +  "</ul></div>");
            }

        };

        //tell the browser what to do when the document gets loaded

        $(document).ready(function() {

            $("#form2").submit(function(event){
                validate(event);
               }
            ); //end submit 
         $.getJSON('../services?cities', function(cities){
            for(var i=0;i<cities.length;i++) {
                var my_new_option = '<option value ="' + cities[i]['city'] + '">' + '</option>';
                $('#cities').append(my_new_option);
            }
        })   

        }); // end ready
</script>
<div class="text-center">
    <img class="img-fluid rounded" src="../images/city.png" alt="city" style='width: 100%'>
    <p></p>
    <h1>Find your home</h1>
    <small>Only listed properties can be found here.</small>
</div>

<div class="row justify-content-md-center"> <!--Variable width content BS4-->
    
    <div class="col-md-3"></div>
    <div class="col-md-auto">
    <form method="POST" action="index.php" id="form2">
    <br>
        <div class="form-group">
            <label for="city">City </label><br>
            <input type="text" class="form-control" id="city" name="city" list="cities" value="Philadelphia">
            <datalist id="cities">
            </datalist>
        </div>
        
        <div class="form-group">
            <label for="HE">Max Rental Fee </label>
            <input type="text" class="form-control" id='HE' name='rent' value="999999">
        </div>
        <div id="button" class="text-center">
            <button class="btn btn-primary" name="submit-search">Search</button>
        </div>
    </form>
    </div>
    <div class="col-md-3"></div>

</div><br>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="text-center" id="message"><?php echo $message;?></div>
    </div>
    <div class="col-md-2"></div>
</div>
<?php include '../view/footer.php'?>