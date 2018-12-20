<?php include '../view/header.php'; ?>

<script>
    var my_new_button_builder = function(id){
        var result = '<a class="btn btn-success btn-block" href="index.php?approve=' + id + '">Approve</a>' +'</div>';
        result = result + '<div class="col-md-2">' + '<a class="btn btn-danger btn-block" href="index.php?reject=' + id + '">Reject</a>'+'</div>';        
        result = result + '<div class="col-md-2">' + '<a class="btn btn-info btn-block" href="index.php?rental_app_id=' + id + '">View</a>'
        return result;
    };

var my_new_row_builder = function(row){
    var result = '<div class="row">';
    result = result + '<div class="col-md-2 text-center">' + row['firstname'] + ' ' + row['lastname'] + '</div>';
    result = result + '<div class="col-md-2 text-center">' + row['street'] + '</div>';
    result = result + '<div class="col-md-2 text-center">' + row['phone'] + '</div>';
    result = result + '<div class="col-md-2">' + my_new_button_builder(row['rental_application_id']) + '</div>';
    result = result + '</div><br>';
    return result;
};
    
$(document).ready(function(){    
    //here's where we populate the table with data
        $.getJSON('../services?pending',function(data){
            for(var i=0;i<data.length;i++) {
                var my_new_row = my_new_row_builder(data[i]);
                $("#rental_applications_buttons").append(my_new_row);
            }
        });
});

</script>

<div class ="container" id="mycontainer">
    <div class="row">
        <div class="col-md-12">
        <h2>All Pending Rental Applications <br></h2>
        </div>
    </div>
    <div class ='row'>    
        <div class="col-md-2 text-center">
        <h5>Applicant</h5>
        </div>
        <div class="col-md-2 text-center">
         <h5>Property</h5>
        </div>
        <div class="col-md-2 text-center">
         <h5>Phone</h5>
        </div>
        <div class="col-md-6 text-center">
         <h5>Action</h5>
        </div>
    </div>
    <div class="container" id="rental_applications_buttons">
        
    </div>
    

    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-info btn-block" href="<?php echo $base_path;?>/rental_applications?approved">See Approved Applications</a>
        </div>
    </div>
</div>
       
<?php include '../view/footer.php'; ?>
