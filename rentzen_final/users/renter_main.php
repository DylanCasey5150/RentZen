<?php include '../view/header.php'?>

<div class="row justify-content-md-center"> <!--Variable width content BS4-->
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12 text-center">
            <h2>Renter Dashboard</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
            <div id="message">
                <?php echo $message;?>
            </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="list-group">
                    <a href="" class="list-group-item list-group-item-action active"><b>Properties</b></a>
                    <a href="<?php echo $base_path;?>/properties?search" class="list-group-item list-group-item-action">Search for Properties<i class="fas fa-angle-double-right pull-right"></i></a>
                    <a href="<?php echo $base_path;?>/rental_applications?view_apps" class="list-group-item list-group-item-action">My Rental Applications<i class="fas fa-angle-double-right pull-right"></i></a>
                    <br>
                    <a href="" class="list-group-item list-group-item-action active"> <b>Account</b></a>
                    <a href="<?php echo $base_path;?>/users?renter_profile" class="list-group-item list-group-item-action">Update Profile<i class="fas fa-angle-double-right pull-right"></i></a>
                    <a href="<?php echo $base_path;?>/users?logout" class="list-group-item list-group-item-action">Log Out<i class="fas fa-angle-double-right pull-right"></i></a><br>
                    
                    <a href="" class="list-group-item list-group-item-action active"><b>Other Menus</b></a>
                    <a href="<?php echo $base_path;?>/site_info?help" class="list-group-item list-group-item-action">Help<i class="fas fa-angle-double-right pull-right"></i></a>
                    <a href="<?php echo $base_path;?>/site_info?aboutus" class="list-group-item list-group-item-action">About Us<i class="fas fa-angle-double-right pull-right"></i></a>
                </div>
            </div>
         
        </div>
    </div>
    <div class="col-md-2"></div>
</div>
<br>
<?php include '../view/footer.php'?>