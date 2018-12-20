<?php include '../view/header.php'?>


<!--<div class="row justify-content-md-center"> <!--Variable width content BS4-->
    <div class="row text-center">
        <div class="col-md-12">
        <h2 class="text-center">Dashboard</h2>
        </div>
    </div>

    <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active"><b>Properties</b></a>
                    <a href="<?php echo $base_path;?>/rental_applications?pending" class="list-group-item list-group-item-action">Manage Rental Applications<i class="fas fa-angle-double-right pull-right"></i></a>
                    <a href="<?php echo $base_path;?>/properties/index.php?prop_add" id="manage" name="manage" class="list-group-item list-group-item-action">Add a property<i class="fas fa-angle-double-right pull-right"></i></a>
                    <a href="<?php echo $base_path;?>/properties/index.php?manage" id="manage" name="manage" class="list-group-item list-group-item-action">Manage Properties<i class="fas fa-angle-double-right pull-right"></i></a>
                    <br>
                    <a href="#" class="list-group-item list-group-item-action active"> <b>Account</b></a>
                    <a href="<?php echo $base_path;?>/users?landlord_profile" class="list-group-item list-group-item-action">Update Profile<i class="fas fa-angle-double-right pull-right"></i></a>
                    <a href="<?php echo $base_path;?>/users?logout" class="list-group-item list-group-item-action">Log Out<i class="fas fa-angle-double-right pull-right"></i></a><br>
                    
                    <a href="#" class="list-group-item list-group-item-action active"><b>Other menus</b></a>
                    <a href="<?php echo $base_path;?>/site_info?help" class="list-group-item list-group-item-action">Help<i class="fas fa-angle-double-right pull-right"></i></a>
                    <a href="<?php echo $base_path;?>/site_info?aboutus" class="list-group-item list-group-item-action">About Us<i class="fas fa-angle-double-right pull-right"></i></a>
                </div>
            </div>
            <!--<div class="col-md-2"></div>
            <div class="col-md-5">-->

            </div>
        
        </div>
    <div class="col-md-2"></div>
    </div>

<br>
<div class="row">
    <div class="col-md-12 text-center">
    <div id="message">
        <?php echo $message;?>
    </div>
    </div>
</div>    

    
<?php include '../view/footer.php'?>