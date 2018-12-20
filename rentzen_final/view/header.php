<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="UTF-8">
    <title>Rent Zen</title>
    
<!-- Put in viewport + Bootstrap 4 + jQuery -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" ></script>

<!-- Local CSS specific to the application -->
    <link rel="stylesheet" href="<?php echo $base_path . '/css/rentzen.css';?>"> 

    <!-- Link to image for the favicon -->
    <link rel="icon" href="<?php echo $base_path . '/images/favicon.png';?>"> 
</head>

<body>
<?php
    //learn from avclub's request_list
    if($_SESSION['TYPE'] == 'visitor') {
?>
<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
    <!-- Logo -->
      <a class ="navbar-brand" aria-label="Home Page" href="<?php echo $base_path;?>/index.php">
          <img alt="RentZen Logo" src="<?php echo $base_path;?>/images/favicon.png" style="width:40px;">
      </a>

    <!-- Toggler Icon for responsiveness -->
    <button aria-label="toggler-icon" id="toggle-icon" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <!--Menu sets on the left-->
        <ul class="navbar-nav mr-auto">
        </ul>
    <!--Menu sets on the right-->    
        <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                <a class="nav-link" href="<?php echo $base_path;?>/users?signup">Sign Up</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo $base_path;?>/users?signin">Sign In</a>
                </li>
        </ul>
    </div>  
</nav>

        <?php
            };
        ?>
        
<?php        
    if($_SESSION['TYPE'] == 'renter') {
        $renter_id = $_SESSION['RENTER_ID'];
        $renter_info = getUserInfo($renter_id);
?>      
<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
    <!-- Logo -->
      <a class ="navbar-brand" href="<?php echo $base_path;?>/users?renter_main">
          <img alt="RentZen Logo" src="<?php echo $base_path;?>/images/favicon.png" style="width:40px;">
      </a>

    <!-- Toggler Icon for responsiveness -->
    <button aria-label="toggler-icon" id="toggle-icon" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <!--Menu sets on the left-->
        <ul class="navbar-nav mr-auto">
            <!-- Search bar -->
            <!--<form class="form-inline" action="<?php echo $base_path;?>/properties" method = 'get'>
            <input class="form-control mr-sm-2" type="text" name='search' placeholder="Search" id="search" aria-label="Search">
            <input class="btn btn-secondary" type="submit" value="Search">
            </form>-->
            
            <!--<li class="nav-item">
            <a class="nav-link" href="<?php //echo $base_path;?>/users?signup">Left link</a>
          </li>-->
        </ul>
    <!--Menu sets on the right-->    
        <ul class="navbar-nav ml-auto">
                <!--<li class="nav-item">
                <a class="nav-link" href="<?php echo $base_path;?>/properties?search">Hello, renter</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo $base_path;?>/properties?search">Search</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo $base_path;?>/users?logout">Logout</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo $base_path;?>/users?renter_profile">Profile</a>
                </li>-->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $base_path;?>/users?renter_main"><i class="fas fa-user"></i> Renter <?php echo $renter_info['firstname'];?>
                    </a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $base_path;?>/users?logout"><i class="fas fa-sign-out-alt"></i>Logout</a>
                </li>

<!--                <li class="nav-item">
                  <a class="nav-link" href="<?php echo $base_path;?>/site_info/aboutus.php">About Us</a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo $base_path;?>/site_info/help.php">Help</a>
                </li>-->
        </ul>
    </div>  
</nav>

        <?php
            };
        ?>
        
        <?php        
            if($_SESSION['TYPE'] == 'landlord') {
            $landlord_id = $_SESSION['LANDLORD_ID'];
            $landlord_info = getUserInfo($landlord_id);
            //$user_info = $_SESSION['USER_INFO'];
        ?>      
<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
    <!-- Logo -->
      <a class ="navbar-brand" href="<?php echo $base_path;?>/users?landlord_main">
          <img alt="RentZen Logo" src="<?php echo $base_path;?>/images/favicon.png" style="width:40px;">
      </a>

    <!-- Toggler Icon for responsiveness -->
    <button aria-label="toggler-icon" id="toggle-icon" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <!--Menu sets on the left-->
        <ul class="navbar-nav mr-auto">
            <!-- Search bar -->
            <!--<form class="form-inline" action="<?php echo $base_path;?>/properties" method = 'get'>
            <input class="form-control mr-sm-2" type="text" name='search' placeholder="Search" id="search" aria-label="Search">
            <input class="btn btn-secondary" type="submit" value="Search">
            </form>-->
            
            <!--<li class="nav-item">
            <a class="nav-link" href="<?php //echo $base_path;?>/users?signup">Left link</a>
          </li>-->
        </ul>
    <!--Menu sets on the right-->    
        <ul class="navbar-nav ml-auto">
                <!--<li class="nav-item">
                <a class="nav-link" href="<?php echo $base_path;?>/users/landlord_profile.php">Hello, landlord</a>
                </li>-->
                <!--<li class="nav-item">
                <a class="nav-link" href="<?php echo $base_path;?>/properties?search">Search</a>
                </li>-->
                <!--<li class="nav-item">
                  <a class="nav-link" href="<?php echo $base_path;?>/properties?prop_add">Add a property</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo $base_path;?>/users?landlord_profile">Profile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo $base_path;?>/rental_applications?list">Applications</a>
                </li>
                <!--<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More
                    </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo $base_path;?>/site_info/aboutus.php">About Us</a>
              <a class="dropdown-item" href="<?php echo $base_path;?>/site_info/help.php">Help</a>
              <!--<div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>-->
            
                
                
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $base_path;?>/users?landlord_main"><i class="fas fa-user"></i> Landlord <?php echo $landlord_info['firstname'];?>
                    </a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $base_path;?>/users?logout"><i class="fas fa-sign-out-alt"></i>Logout</a>
                </li>
        </ul>
    </div>  
</nav>

              
        <?php
            };
        ?>
            
           
        
    <br><br><br><br>

<!--Start container for BS4 (Bootstrap 4) formatting-->
<div class="container-fluid" style="min-height: 600px">
    
     
 
    
