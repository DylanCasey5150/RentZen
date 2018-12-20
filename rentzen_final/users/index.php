<?php 
include '../common/configuration.php';
include '../common/functions.php';
include '../model/database.php';
include '../model/users_db.php';
include '../model/properties_db.php';
include '../model/rental_apps_db.php';

/* starting the session is a little more tricky on the user controller */
if (!isset($_SESSION)){
    session_start();
    if (!isset($_SESSION['TYPE'])){
        $_SESSION['TYPE'] = 'visitor';
    }
}
//This is Users/index
//let's do $type = 'renter' and $type = 'landlord'

//SECTION A: SIGN IN FOR BOTH LANDLORDS AND RENTERS
$message = "";

if (isset($_GET['logout'])){
    include 'users_logout.php';
    exit();
}


if (isset($_POST['suLandlord'])){
    include 'users_signup_landlord.php';
    exit();
}


if (isset($_POST['suRenter'])){
    include 'users_signup_renter.php';
    exit();
}
$usernameR = filter_input(INPUT_POST,'usernameR', FILTER_VALIDATE_EMAIL);
$usernameL = filter_input(INPUT_POST,'usernameL', FILTER_VALIDATE_EMAIL);
$passwordR = filter_input(INPUT_POST,'passwordR');
$passwordL = filter_input(INPUT_POST,'passwordL');
$credit_score = filter_input(INPUT_POST,'credit_scoreR', FILTER_VALIDATE_INT);
$income = filter_input(INPUT_POST,'incomeR', FILTER_VALIDATE_INT);


if (isset($_POST['confirmationR'])){
    if ((empty($usernameR)) || empty($passwordR)){
        $message = "<div class='alert alert-danger'>You can't leave any field blank. Please try again.</div>";
        include 'users_signup_renter.php';
    } else {
    addUser($usernameR, $passwordR, 101);
    include 'users_confirmation_signup.php';
    exit();
}
}

if (isset($_POST['confirmationL'])){
    if ((empty($usernameL)) || empty($passwordL)){
    $message = "<div class='alert alert-danger'>Sign up failed. Please try again.</div>";
    include 'users_signup_landlord.php';
} else {
    addUser($usernameL, $passwordL, 102);
    include 'users_confirmation_signup.php';
    exit();
}
}

if (isset($_POST['sign-in-renter'])) 
{
    $username = filter_input(INPUT_POST,'username',FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST,'password');
    if (empty($username) || empty($password)){
        $message = "<div class='alert alert-danger'>Please don't leave any field blank. Please try again.</div>";
        include 'users_signin.php';
        exit();
    } else {
    $renter_id = loginPeople($username,$password,101);
    //$renter_info = getUserInfo($renter_id);
    if (!empty($renter_id)){
        //session_start();
        $_SESSION['LOGGED_IN']='OK';
        $_SESSION['TYPE']='renter';
        $_SESSION['RENTER_ID'] = $renter_id; //assign value into session variable
        $_SESSION['LANDLORD_ID'] = null;
        $_SESSION['USERNAME'] = $username;
        //$_SESSION['RENTER_INFO'] = $renter_info;
        include 'renter_main.php';
        exit();
    } else
    {
        $message = "<div class='alert alert-danger'>Login failed. Please try again.</div>";
        include 'users_signin.php';
        exit();
    }
}
}


if (isset($_POST['sign-in-landlord'])) {
    $username = filter_input(INPUT_POST,'username', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST,'password');
    if (empty($username) || empty($password)){
        $message = "<div class='alert alert-danger'>Please don't leave any field blank. Please try again.</div>";
        include 'users_signin.php';
        exit();
    } else {
    $landlord_id = loginPeople($username,$password,102);
    //$user_info = getUserInfo($landlord_id);
    if (!empty($landlord_id)){
        //session_start();
        $_SESSION['LOGGED_IN']='OK';
        $_SESSION['TYPE']='landlord';
        $_SESSION['LANDLORD_ID'] = $landlord_id;
        $_SESSION['RENTER_ID'] = null;
        $_SESSION['USERNAME'] = $username;
        //$_SESSION['USER_INFO'] = $user_info;
        include 'landlord_main.php';
        exit();
    } else
    {
        $message = "<div class='alert alert-danger'>Login failed. Please try again.</div>";
        include 'users_signin.php';
        exit();
    }
}
}

if (ISSET($_GET['signup'])){
include 'users_signup.php';
exit();
}

if (ISSET($_GET['signin'])){
include 'users_signin.php';
exit();
}

if(ISSET($_POST['confirmation'])) {
    include 'users_confirmation_signup.php';
    exit();
}

//SECTION B: LANDLORD CONTROLS
$renter_id = $_SESSION['RENTER_ID'];
$landlord_id = $_SESSION['LANDLORD_ID'];
//$user_info = getUserInfo($landlord_id);
//get default values
$profupdatefirstname = filter_input(INPUT_POST, 'firstnameprofile');
$profupdatelastname = filter_input(INPUT_POST, 'lastnameprofile');
$profileusername = filter_input(INPUT_POST, 'usernameprofile');
$profilepassword = filter_input(INPUT_POST, 'passwordprofile');
$profupdateemail = filter_input(INPUT_POST, 'emailprofile', FILTER_VALIDATE_EMAIL);
$profile_phone = filter_input(INPUT_POST,'phoneprofile');
//Need to add and statement forchecking if the user is logged in as renter or landlord

if ($_SESSION['TYPE'] == 'landlord' && isset($_POST['profileupdateL'])) {
    if(empty($profileusername) || empty($profilepassword) || empty($profupdatefirstname) || empty($profupdatelastname) || empty($profile_phone)){
        $message = "<div class='alert alert-danger'>You can't leave any field blank. Please try again.</div>";
        $user_info = getUserInfo($landlord_id);
        include 'landlord_profile.php';
        exit();
    }
    else {
        profileUpdateLandlord ($profupdatefirstname, $profupdatelastname, $profupdateemail, $profile_phone, $profileusername, $profilepassword);
        $user_info = getUserInfo($landlord_id);
        $message= "<div class='alert alert-success'>Your profile is updated successfully.</div>";
        include 'landlord_main.php';
        exit();
    }
}
if ($_SESSION['TYPE'] == 'landlord' && isset($_GET['landlord_main'])){
    $user_info = getUserInfo($landlord_id);
    include 'landlord_main.php';
    exit;
}

if ($_SESSION['TYPE'] == 'landlord' && ISSET($_GET['landlord_profile'])){
    $user_info = getUserInfo($landlord_id);
    include 'landlord_profile.php';
    exit();
}


//SECTION C: RENTER CONTROLS
$profupdatecreditscore = filter_input(INPUT_POST, 'creditscoreprofile', FILTER_VALIDATE_INT);
$profupdateincome = filter_input(INPUT_POST, 'incomeprofile', FILTER_VALIDATE_INT);
//$user_info = getUserInfo($renter_id);
if ($_SESSION['TYPE'] == 'renter' && isset($_POST['profileupdateR'])) {
    if(!(is_numeric($_POST['incomeprofile'])) || !(is_numeric($_POST['creditscoreprofile']))) {
        $message = "<div class='alert alert-danger'>Your credit score and income must be numeric values.</div>";
        exit();
        include 'renter_profile.php';
        exit();
    }
    else {
        profileUpdateRenter($profupdateincome, $profupdatecreditscore, $profupdatefirstname, $profupdatelastname, $profupdateemail, $profile_phone , $renter_id);
        $user_info = getUserInfo($renter_id);
        $message= "<div class='alert alert-success'>Your profile is updated successfully.</div>";
        include 'renter_main.php';
        exit();
    }
}

if($_SESSION['TYPE'] == 'renter' && isset($_GET['renter_main'])) {
    include 'renter_main.php';
    exit();
}

if($_SESSION['TYPE'] == 'renter' && isset($_GET['renter_profile'])) {
    //$renter_id = $_SESSION['RENTER_ID'];
    //unset($user_info);
    //$renter_info = getUserInfo($renter_id);
    include 'renter_profile.php';
    exit();
}


//if all else fails
include 'users_signup.php';
exit();

?>