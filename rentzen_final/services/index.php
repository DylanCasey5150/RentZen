<?php
include '../common/configuration.php';
include '../common/functions.php';
include '../model/database.php';
include '../model/users_db.php';
include '../model/properties_db.php';
include '../model/rental_apps_db.php';

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

if (isset($_GET['pending'])){
    $pending_list = getRentalAppsSmall($landlord_id,1);
    //sort($pending_list);
    include 'app_list_pending.php';
    exit();
}

if (isset($_GET['renter_pending'])){
    $pending_list = RenterGetRentalApps($renter_id,1);
    //sort($pending_list);
    include 'renter_app_list_pending.php';
    exit();
}

if (isset($_GET['propertytypes'])){
    $property_typess = getPropertyTypes();
    include 'request_property_types.php';
    exit();
}

if (isset($_GET['list'])){
    include 'request_property_list.php';
    exit();
}

if (isset($_GET['states'])){
    $states = getStates();
    include 'states.php';
    exit();
}


if (isset($_GET['cities'])) {
    $cities = getCities();
    include 'request_city_datalist.php';
    exit();
}
?>
