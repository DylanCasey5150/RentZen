<?php

/*When the submit button is clicked, insert into 
  - renter_property:
  - renter_application: */
function submitApp ($renter_id,$property_id,$move_in_date,$renter_message) {
    global $db;
    $sql = "INSERT INTO renter_property (`renter_id`,`property_id`) "
            . "VALUES (?,?)";
    $statement = $db->prepare($sql);
    $statement->bindValue(1,$renter_id);
    $statement->bindValue(2,$property_id);
    if ($statement->execute()){
        $last_id = $db->lastInsertId();
        $sql = "INSERT INTO rental_application (renterproperty_id, last_status_id, move_in_date, renter_message)"
                . "VALUES (?,1,?,?) ";
        $statement = $db->prepare($sql);
        $statement->bindValue(1,$last_id);
        $statement->bindValue(2,$move_in_date);
        $statement->bindValue(3,$renter_message);
        $result = $statement->execute();
        
    } else
    {
        $result = false;
    };
    
    $statement->closeCursor();
    //result is true on success, false on error
    return $result;        
    
}

function getRentalApps ($landlord_id,$status_id) {
    global $db;
    $sql = "SELECT * FROM `rental_application`, `rental_app_status`, `renter_property`, `property`, `landlord_property`, `people` 
    WHERE `property`.property_id=`renter_property`.property_id 
    AND `renter_property`.renterproperty_id =`rental_application`.renterproperty_id
    AND `rental_application`.`last_status_id`=`rental_app_status`.app_status_id 
    AND `property`.property_id= `landlord_property`.property_id
    AND `renter_property`.renter_id = `people`.people_id
    AND `landlord_property`.landlord_id = ? 
    AND `rental_application`.`last_status_id`=?";
    $statement = $db->prepare($sql);
    $statement->bindValue(1,$landlord_id);
    $statement->bindValue(2,$status_id);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $result; 
}

function getRentalAppsSmall ($landlord_id,$status_id) {
    global $db;
    $sql = "SELECT firstname, lastname, phone, 
        property.street, rental_application_id,
        renter_property.renter_id
        FROM `rental_application`, `rental_app_status`, `renter_property`, `property`, `landlord_property`, `people` 
        WHERE `property`.property_id=`renter_property`.property_id 
        AND `renter_property`.renterproperty_id =`rental_application`.renterproperty_id
        AND `rental_application`.`last_status_id`=`rental_app_status`.app_status_id 
        AND `property`.property_id= `landlord_property`.property_id
        AND `renter_property`.renter_id = `people`.people_id
        AND `landlord_property`.landlord_id = ? 
        AND `rental_application`.`last_status_id`=?";
    $statement = $db->prepare($sql);
    $statement->bindValue(1,$landlord_id);
    $statement->bindValue(2,$status_id);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $result; 
        };



function RenterGetRentalApps ($renter_id,$status_id) {
    global $db;
    $sql = "SELECT firstname, lastname, phone, rental_application_id,
            property.street, rental_fee,
            app_status_name
        FROM `rental_application`, `rental_app_status`, `renter_property`, `property`, `landlord_property`, `people` 
        WHERE `property`.property_id=`renter_property`.property_id 
        AND `renter_property`.renterproperty_id =`rental_application`.renterproperty_id
        AND `rental_application`.`last_status_id`=`rental_app_status`.app_status_id 
        AND `property`.property_id= `landlord_property`.property_id
        AND `landlord_property`.landlord_id = `people`.people_id
        AND `renter_property`.renter_id = ? 
        AND `rental_application`.`last_status_id`=?";
    $statement = $db->prepare($sql);
    $statement->bindValue(1,$renter_id);
    $statement->bindValue(2,$status_id);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $result; 
        };

function getRentalApp ($rental_application_id) {
    global $db;
    $sql = "SELECT 
        rental_application_id, app_status_name, renter_message, 
        property.street, property.city, picture, rental_fee,
        firstname, lastname, phone, email, credit_rating, income, move_in_date, username 
        FROM `rental_application`, `rental_app_status`, `renter_property`, `property`, `landlord_property`, `people` 
        WHERE `property`.property_id=`renter_property`.property_id 
        AND `renter_property`.renterproperty_id =`rental_application`.renterproperty_id
        AND `rental_application`.`last_status_id`=`rental_app_status`.app_status_id 
        AND `property`.property_id= `landlord_property`.property_id
        AND `renter_property`.renter_id = `people`.people_id
        AND rental_application_id =?
        ";
    $statement = $db->prepare($sql);
    $statement->bindValue(1,$rental_application_id);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $result; 
        };

        
function getRentalAppsOld ($landlord_id) {
    global $db;
    $sql = "SELECT * FROM `rental_application`, `rental_app_status`, `renter_property`, `property`, `landlord_property` 
    WHERE `property`.property_id=`renter_property`.property_id 
    AND `renter_property`.renterproperty_id =`rental_application`.renterproperty_id
    AND `rental_application`.`last_status_id`=`rental_app_status`.app_status_id 
    AND `property`.property_id= `landlord_property`.property_id
    AND `landlord_property`.landlord_id = ? 
    AND `rental_application`.`last_status_id`=1";
    $statement = $db->prepare($sql);
    $statement->bindValue(1,$landlord_id);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $result; 
        };

function changeRentalAppStatus($rental_application_id, $last_status_id){
    global $db;
    $sql = "UPDATE `rental_application` SET `last_status_id` = ?
            WHERE `rental_application_id`=?";
    $statement = $db->prepare($sql);
    $statement->bindValue(1,$last_status_id);
    $statement->bindValue(2,$rental_application_id);
    $result = $statement->execute();
    $statement->closeCursor();
    
    //result is true on success, false on error
    return $result;

};


?>