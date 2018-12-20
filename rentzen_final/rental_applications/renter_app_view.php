<?php include '../view/header.php'; ?>


<div class ="container" id="mycontainer">
    <div class="row">
        <div class="col-md-12 text-center">
        <h2>Rental Application for <?php echo $app_view['street'];?><br></h2>
        </div>
    </div>

<div class="row">
    <div class="col-md-5">
        <img class='img-fluid rounded' src='<?php echo $app_view['picture'];?>' alt='home' style='width: 100%'>
    </div>
    <div class="col-md-7">
        <div class="row">
            <div class="col-md-4">
                <b>Applicant</b>
            </div>
            <div class="col-md-5">
                <p><?php echo $app_view['firstname']." ".$app_view['lastname'];?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <b>Income</b>
            </div>
            <div class="col-md-3">
                <p>$<?php echo $app_view['income'];?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <b>Credit Score</b>
            </div>
            <div class="col-md-3">
                <p><?php echo $app_view['credit_rating'];?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <b>Move-in Date</b>
            </div>
            <div class="col-md-3">
                <p><?php echo $app_view['move_in_date'];?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <b>Phone Number</b>
            </div>
            <div class="col-md-3">
                <p><?php echo $app_view['phone'];?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <b>Email</b>
            </div>
            <div class="col-md-3">
                <p><?php echo $app_view['username'];?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <b>Message</b>
            </div>
            <div class="col-md-3">
                <p><?php echo $app_view['renter_message'];?></p>
            </div>
        </div>

    </div><!--close 11-span row-->
</div><br><!--close big row-->

    
    <div class="container" id="rental_applications"></div>
    
    <div class="row">

        <div class="col-md-5"></div>
        <div class="col-md-7">
            <a class="btn btn-info btn-block" href='<?php echo $base_path;?>/rental_applications?view_apps'>Pending Applications</a>
        </div>

    </div><br>

</div>
       
<?php include '../view/footer.php'; ?>
