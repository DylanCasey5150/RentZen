<?php include "common/configuration.php";?>
<?php 
if (!isset($_SESSION)){
    session_start();
    if (!isset($_SESSION['TYPE'])){
        $_SESSION['TYPE'] = 'visitor';
    }
}
if ($_SESSION['TYPE'] == 'landlord'){
    header('Location: users?landlord_main');
    exit();
} 
if ($_SESSION['TYPE'] == 'renter'){
    header('Location: users?renter_main');
    exit();
}
?>
<?php include 'view/header.php'?>
            <!--<div class="main-body">-->
<img class="img-fluid rounded" src="images/city.png" alt="city" style="width: 100%">

<div class='container'>
    <div class="row">
        <div class="col-md-12">
        <h2 class="text-center">Welcome to RentZen</h2><br>
        <div class="text-center"><p><b>Our mission?</b> Bring <em>zen</em> to renting.</p>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
        <p>RentZen provides a digital experience for landlords to find qualified tenants and renters to find the home of their dreams without the hassle of in-person showings. It's an all-in-one platform 
        for renting homes and apartments. RentZen connects landlords and renters 
        via an easy to use platform that reduces in-person visits to properties,
        reviews user qualifications, and streamlines communication between landlords 
        and renters​</p>
        </div>
        <div class="col-md-1"></div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="text-center">  
            <a class="btn btn-primary" aria-label="sign_up" href="<?php echo $base_path;?>/users?signup">Sign up</a>
            <a class="btn btn-primary" aria-label="sign_up" href="<?php echo $base_path;?>/users?signin">Sign In</a>
        </div>
        </div>
    </div>
</div>
<?php include 'view/footer.php'?>