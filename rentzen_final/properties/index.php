    
<?php
//include all database configuration and functions
include '../common/configuration.php';
include '../common/functions.php';
include '../model/database.php';
include '../model/properties_db.php';
include '../model/rental_apps_db.php';
include '../model/users_db.php';

session_start();

//This is properties/index.php
//$properties = getProperties();
//get default values
$message = "";
//$property_id = 308;

$feature_types = getFeatureTypes();
$states = getStates();
$property_types = getPropertyTypes();
$occupanciesall = getOccupancyTypes();
$occupanciesadd   = array_slice($occupanciesall,0,2);
//get out all session variables
if (!isset($_SESSION['USERNAME'])){ 
$_SESSION['USERNAME'] = null;
$_SESSION['RENTER_ID'] = null;
$_SESSION['LANDLORD_ID'] = null;
} else {
    $username = $_SESSION['USERNAME'];
    $renter_id = $_SESSION['RENTER_ID']; //take renter_id out of session and put in variable
    $landlord_id = $_SESSION['LANDLORD_ID'];
}
//get values from add_property form
    $street = filter_input(INPUT_POST,'street');
     $city = filter_input(INPUT_POST,'city');
     $state = filter_input(INPUT_POST,'state');
     $zip = filter_input(INPUT_POST,'zip');
     $beds= filter_input(INPUT_POST,'bed', FILTER_VALIDATE_FLOAT);
     $baths= filter_input(INPUT_POST,'bath', FILTER_VALIDATE_FLOAT);
     $sqft= filter_input(INPUT_POST,'sqft', FILTER_VALIDATE_FLOAT);
     $type_id= filter_input(INPUT_POST,'type', FILTER_VALIDATE_INT);
     $occupancy= filter_input(INPUT_POST,'occ', FILTER_VALIDATE_INT); //propstat_id
     $income= filter_input(INPUT_POST,'income', FILTER_VALIDATE_FLOAT);
     $credit= filter_input(INPUT_POST,'credit', FILTER_VALIDATE_FLOAT);
     $rentalfee= filter_input(INPUT_POST,'rent', FILTER_VALIDATE_FLOAT);
     //$features= filter_input(INPUT_POST, 'features_list', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
     $description= filter_input(INPUT_POST,'description');
     $property_id= filter_input(INPUT_POST,'property_id', FILTER_VALIDATE_INT);
     
     
// if the list token was not provided, go back to the landing page
if (!isset($_SESSION['LOGGED_IN'])){
    header('../index.php');
    exit();
}

// if the logout button was clicked....
if (isset($_POST['btn_logout'])){
    header('Location: ../people/people_logout.php');
    exit();
}


//Section B: Landlord

if ($_SESSION['TYPE'] == 'landlord' && isset($_GET['prop_add'])){
    include 'property_add.php';
    exit();
}
if ($_SESSION['TYPE'] == 'landlord' && isset($_POST['property_add'])){
    include('property_add.php');}

if ($_SESSION['TYPE'] == 'landlord' && isset($_POST['addproperty'])){
    if (!empty($street)  && !empty($city) && !empty($state)& !empty($zip)& !empty($beds)& !empty($baths)& !empty($sqft)& !empty($type_id)& !empty($occupancy)& !empty($income)& !empty($credit)& !empty($rentalfee) && !empty($description)){ 
         addProperty($street, $city, $state, $zip, $beds, $baths, $sqft, $type_id, $occupancy, $income, $credit, $rentalfee, $description, $landlord_id);
        $landproperties = getLandProperties($landlord_id);
        include 'property_landlordlist.php';
        exit();
    } else {
        $message = "<div class='alert alert-danger'>Submit failed. Please check fields and try again</div>";
         include ('property_add.php');
         exit();
        }
}
if ($_SESSION['TYPE'] == 'landlord' && isset($_POST['editproperty'])){
    //echo('[' . $street)  ; echo('[' . $city) ; echo('[' . $state) ; echo('[' . $zip) ; echo('[' . $beds) ; echo('[' . $baths) ; echo('[' . $sqft); echo('[' . $type_id) ; echo('[' . $occupancy) ; echo('[' . $income) ; echo('[' . $credit) ; echo('[' . $rentalfee) ; echo('[' . $description); 
    //exit();
    if (empty($occupancy)){
        $occupancy = 403;
    }
    
    if (!empty($street) && !empty($city) && !empty($state)& !empty($zip)  && !empty($beds)  && !empty($baths)  && !empty($sqft)  && !empty($type_id)  && !empty($occupancy)  && !empty($income)  && !empty($credit)  && !empty($rentalfee) && !empty($description)){ 
        editProperty($street, $city, $state, $zip, $beds, $baths, $sqft, $type_id, $occupancy, $income, $credit, $rentalfee, $description, $landlord_id, $property_id);
        $landproperties = getLandProperties($landlord_id);
        include 'property_landlordlist.php';
        exit();
    } else {
        $message = "<div class='alert alert-danger'>Update failed. Please check fields and try again</div>";
         include ('property_edit.php');
         exit();
        }
}

if ($_SESSION['TYPE'] == 'landlord' && isset($_GET['manage'])){
    $landproperties = getLandProperties($landlord_id);
    include 'property_landlordlist.php';
    exit();
}
    
if ($_SESSION['TYPE'] == 'landlord' && isset($_POST['list'])){
    $propidfunction = filter_input(INPUT_POST,'propid');
    listProperty($propidfunction);
    $landproperties = getLandProperties($landlord_id);
    include 'property_landlordlist.php';
    exit();    
}
if ($_SESSION['TYPE'] == 'landlord' && isset($_POST['remove'])){
    $propidfunction = filter_input(INPUT_POST,'propid');
    removeProperty($propidfunction);
    $landproperties = getLandProperties($landlord_id);
    include 'property_landlordlist.php';
    exit();    
}
         
if ($_SESSION['TYPE'] == 'landlord' && isset($_POST['edit'])){
    $propidfunction = filter_input(INPUT_POST,'propid');
    $property_record = getProperty($propidfunction);
    include 'property_edit.php';
    exit();
}

$landlord_property_id = filter_input(INPUT_GET,'lid',FILTER_VALIDATE_INT);
if ($_SESSION['TYPE'] == 'landlord'){
    $property_info = getPropertyInfo($landlord_property_id);
    include 'landlord_property_view.php';
    exit();
}
if ($_SESSION['TYPE'] == 'landlord'){
    header("Location:../users?landlord_main");
    exit();
}



//Section C: Renter
if (($_SESSION['TYPE'] == 'renter') && ISSET($_GET['search'])){
    include 'property_search.php';
    exit();
}


if (($_SESSION['TYPE'] == 'renter') && isset($_POST['submit-search'])) {
if(empty($city) || empty($rentalfee)){
    $message = "<div class='alert alert-danger'>Both the city and maximum rental fee fields must be entered.</div>";
    include 'property_search.php';
    exit();
    } else if (!is_numeric($rentalfee)) {
        $message = "<div class='alert alert-danger'>Your rental fee must be a number, dope.</div>";
        include 'property_search.php';
        exit();
    }
    else if(count(getProperties($city, $rentalfee))==0) {
        $message = "<div class='alert alert-danger'>There are no destinations with your specifications. Please try again.</div>";
        include 'property_search.php';
        exit();
    } 
    else {
        $searchedprop = getProperties($city, $rentalfee);
        include('property_list.php');
        exit();
    }
}


$selected_property_id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
if (($_SESSION['TYPE'] == 'renter') && (!empty($selected_property_id))){
    $property_info = getPropertyInfo($selected_property_id);
    include 'property_view.php';
    exit();
}

   
?> 
