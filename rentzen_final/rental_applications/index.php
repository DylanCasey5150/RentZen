<?php
/*rental_applications controller*/

/*include everything in common + necessary files in model*/
include '../common/configuration.php';
include '../common/functions.php';
include '../model/database.php';
include '../model/properties_db.php';
include '../model/rental_apps_db.php';
include '../model/users_db.php';

$message = "";

session_start();

//get out all session variables
if ($_SESSION['TYPE'] == 'visitor'){
    $message = "Please log in first";
    header('Location:../users?signin');
} else {
    $username = $_SESSION['USERNAME'];
    $renter_id = $_SESSION['RENTER_ID'];
    $landlord_id = $_SESSION['LANDLORD_ID'];
}

//log in account for renter: esmith@email.com - esmith123

//get default values
$properties = ""; //getProperties($a, $b, $c);
$property_id = filter_input(INPUT_POST,'property_id'); //Get input from property_view
$property_info = getPropertyInfo($property_id);
$pending_rental_applications = getRentalApps($landlord_id,1);
$rejected_rental_applications = getRentalApps($landlord_id,2);

// if the list token was not provided, go back to the landing page
if (!isset($_SESSION['LOGGED_IN'])){
    header('../index.php');
    exit();
}

// if the logout button was clicked....
if (isset($_POST['btn_logout'])){
    header('Location: ../users?logout');
    exit();
}

//Common for both LANDLORDS and RENTERS
$app_view_id = filter_input(INPUT_GET,'rental_app_id', FILTER_VALIDATE_INT);
if (!empty($app_view_id)){
    $app_view = getRentalApp($app_view_id);
    if ($_SESSION['TYPE'] == 'landlord') {
    //sort($pending_list);
    include 'app_view.php';
    exit();
    
    } elseif ($_SESSION['TYPE'] == 'renter') {
    //sort($pending_list);
    include 'renter_app_view.php';
    exit(); 
    }
}


//Landlord Controls
if($_SESSION['TYPE'] == 'landlord' && isset($_GET['list'])) {
    include 'landlord_app_list_pending.php';
    exit();
}

if($_SESSION['TYPE'] == 'landlord' && isset($_GET['pending'])) {
    include 'landlord_app_list_pending.php';
    exit();
}

if($_SESSION['TYPE'] == 'landlord' && isset($_GET['approved'])) {
    $approved_rental_applications = getRentalAppsSmall($landlord_id,4);
    include 'landlord_app_list_approved.php';
    exit();
}


$reject_app_id = filter_input(INPUT_GET,'reject',FILTER_VALIDATE_INT);
if (($_SESSION['TYPE'] == 'landlord') && (!empty($reject_app_id))){
    changeRentalAppStatus($reject_app_id, 2);
    include 'landlord_app_list_pending.php';
    exit();
}

$approve_app_id = filter_input(INPUT_GET,'approve',FILTER_VALIDATE_INT);
if (($_SESSION['TYPE'] == 'landlord') && (!empty($approve_app_id))){
    changeRentalAppStatus($approve_app_id, 4);
    $pending_rental_applications = getRentalApps($landlord_id,1);
    include 'landlord_app_list_pending.php';
    exit();
}

//Renter Control
//Submit rental applications
if ($_SESSION['TYPE'] == 'renter' && (isset($_POST['SUBMIT']))) {
    //Validation (from avclub/requests/index.php)
    $move_in_date = filter_input(INPUT_POST,'movein');
    $renter_message = filter_input(INPUT_POST,'renter_message');
    if ((empty($renter_id)) && empty($move_in_date)) {
        $message = "<div class='alert alert-danger'>One or more required fields are missing.</div>";
        include('app_submit.php');
        exit();
    } else {
        $confirmation = submitApp($renter_id,$property_id,$move_in_date,$renter_message);
        if ($confirmation != false)
        {
            include 'app_confirm.php';
            exit();
        }   else {
            $message = "<div class='alert alert-danger'>An unexpected error occurred.</div>";
        }
    }
}

//Take POST form from property_view
if ($_SESSION['TYPE'] == 'renter' && (isset($_POST['APPLY']))) {
    $renter_info = getUserInfo($renter_id);
    include 'app_submit.php';
    exit();
}

if (($_SESSION['TYPE'] == 'renter') && ISSET($_GET['view_apps'])){
    //$renter_app_list = RenterGetRentalApps($renter_id,1);
    include 'renter_app_list.php';
    exit();
}


?>

