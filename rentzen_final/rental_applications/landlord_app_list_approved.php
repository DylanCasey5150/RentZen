<?php include '../view/header.php'; ?>

<div class ="container">
    <div class="row">
        <h2>Approved Rental Applications <br><br></h2>
    </div>
    <div class ='row'>    
        <div class="col-md-3 text-center">
        <h5>Applicant</h5>
        </div>
        <div class="col-md-4 text-center">
         <h5>Property</h5>
        </div>
        <div class="col-md-4 text-center">
         <h5>Phone</h5>
        </div>

    </div>
    <?php  foreach($approved_rental_applications as $r){  ?>
    <div class="row">
        <div class="col-md-3 text-center">
            <?php 
            $user_info = getUserInfo($r['renter_id']);
            echo $user_info['firstname']." ".$user_info['lastname'];
            ?>
        </div>
        <div class="col-md-4 text-center">
            <?php echo $r['street']  ?>
        </div>
        <div class="col-md-4 text-center">
            <?php echo $user_info['phone']  ?>
        </div>

    </div><br>
    <?php };?>
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-info btn-block" href="<?php echo $base_path;?>/rental_applications?pending">See Pending Applications</a>
        </div>
    </div>

</div>
       
<?php include '../view/footer.php'; ?>
