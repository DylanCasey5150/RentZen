<?php include '../view/header.php'; ?>


<script>

function ucwords (str) {
    return (str + '').replace(/^([a-z])|\s+([a-z])/g, function ($1) {
        return $1.toUpperCase();
    });
}

var my_new_button_builder = function(id){
        var result = '<a class="btn btn-info btn-block" href="index.php?rental_app_id=' + id + '">View</a>'
        return result;
    };

var my_new_row_builder = function(row){
    var result = '<div class="row">';
    result = result + '<div class="col-md-1 text-center"></div>'
    result = result + '<div class="col-md-2 text-center">' + ucwords(row['street']) + '</div>';
    result = result + '<div class="col-md-2 text-center">' + row['firstname'] + ' ' + row['lastname'] + '</div>';
    result = result + '<div class="col-md-2 text-center"> $' + row['rental_fee'] + '</div>';
    result = result + '<div class="col-md-2 text-center">' + ucwords(row['app_status_name']) + '</div>';
    result = result + '<div class="col-md-2">' + my_new_button_builder(row['rental_application_id']) + '</div>';
    result = result + '</div><br>';
    return result;
};
    
$(document).ready(function(){    
    //here's where we populate the table with data
        $.getJSON('../services?renter_pending',function(data){
            if (data.length !==0){
            for(var i=0;i<data.length;i++) {
                var my_new_row = my_new_row_builder(data[i]);
                $("#rental_applications_list").append(my_new_row);
            }
        } else {
            $("#rental_applications_list").html("<div class='alert alert-info'>You have no pending applications. Let's go find some properties.</div>")
        }
        });
});

</script>

<div class ="container" id="mycontainer">
    <div class="row">
        <h2>My Pending Rental Applications <br></h2>
    </div>

    <div class="container" id="rental_applications_list">
        <div class ='row'>    
        <div class="col-md-1 text-center"></div>
        <div class="col-md-2 text-center">
         <h5>Property</h5>
        </div>
        <div class="col-md-2 text-center">
        <h5>Landlord</h5>
        </div>
        <div class="col-md-2 text-center">
        <h5>Rental Fee</h5>
        </div>
        <div class="col-md-2 text-center">
         <h5>Status</h5>
        </div>
        <div class="col-md-2 text-center">
         <h5>Action</h5>
        </div>
    </div>
    </div>
    

</div>
<?php include '../view/footer.php'; ?>
