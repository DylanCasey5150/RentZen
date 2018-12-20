<?php

function getProperties ($city, $rentalfee) {
    global $db;
    $sql = 'SELECT * FROM property WHERE CITY LIKE ? AND RENTAL_FEE<? AND PROPSTAT_ID = 403';
    //$sql2 = "SELECT * FROM property WHERE CITY LIKE '$city' AND RENTAL_FEE<$rentalfee AND PROPSTAT_ID = 403";
    //echo $sql2;
    //exit();
    $statement = $db->prepare($sql);
    $statement->bindValue(1, $city);
    $statement->bindValue(2, $rentalfee);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    
    return $result;   
}

function getCities () {
    global $db;
    $sql = 'SELECT distinct city FROM property';
    $statement = $db->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    
    return $result; 
}

// get properties owned by landlord for property_landlordlist.php
function getLandProperties ($landlord_id){
    global $db;
    $sql='SELECT * FROM  `people`, `property`,`landlord_property`, `property_status` WHERE people.people_id = landlord_property.landlord_id AND landlord_property.property_id = property.property_id AND property.propstat_id = property_status.propstat_id AND people.people_id = ? ORDER BY property.property_id DESC';
     $statement = $db->prepare($sql);
     $statement->bindValue(1, $landlord_id);    
     $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;    
}      
            
function addProperty ($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $credit_requirement, $rental_fee, $description, $landlord_id) {
    global $db;
    $x = rand(1, 9);
    $sql = 'INSERT INTO property(street, city, state_id, zip, beds, baths, sqft, type_id, propstat_id, income_requirement, credit_requirement, rental_fee, description, picture) '
            . 'VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
    $statement = $db->prepare($sql);
    $statement->bindValue(1, $a);
    $statement->bindValue(2, $b);
    $statement->bindValue(3, $c);
    $statement->bindValue(4, $d);
    $statement->bindValue(5, $e);
    $statement->bindValue(6, $f);
    $statement->bindValue(7, $g);
    $statement->bindValue(8, $h);
    $statement->bindValue(9, $i);
    $statement->bindValue(10, $j);
    $statement->bindValue(11, $credit_requirement);
    $statement->bindValue(12, $rental_fee);
    $statement->bindValue(13, $description);
    $statement->bindValue(14, '../images/home' . $x . '.jpg');
    $result= $statement->execute();
    if ($result == true){
        $last_id = $db->lastInsertId();
        $sql = "INSERT INTO landlord_property (landlord_id, property_id)"
                . "VALUES (?,?) ";
        $statement = $db->prepare($sql);
        $statement->bindValue(1,$landlord_id);
        $statement->bindValue(2,$last_id);
        $result = $statement->execute();
        
    } else
    {
        $result = false;
    };
    
    $statement->closeCursor();
    //result is true on success, false on error
    return $result;        
    
}

function editProperty ($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $credit_requirement, $rental_fee, $description, $landlord_id, $property_id) {
    global $db;
    $sql = 'UPDATE property SET 
            street = ?,
            city = ?,
            state_id = ?,
            zip = ?,
            beds = ?,
            baths = ?,
            sqft = ?,
            type_id = ?, 
            propstat_id = ?, 
            income_requirement = ?, 
            credit_requirement = ?, 
            rental_fee = ?, 
            description = ?
            WHERE property_id = ?;';
    $statement = $db->prepare($sql);
    $statement->bindValue(1, $a);
    $statement->bindValue(2, $b);
    $statement->bindValue(3, $c);
    $statement->bindValue(4, $d);
    $statement->bindValue(5, $e);
    $statement->bindValue(6, $f);
    $statement->bindValue(7, $g);
    $statement->bindValue(8, $h);
    $statement->bindValue(9, $i);
    $statement->bindValue(10, $j);
    $statement->bindValue(11, $credit_requirement);
    $statement->bindValue(12, $rental_fee);
    $statement->bindValue(13, $description);
    $statement->bindValue(14, $property_id);
    $result= $statement->execute();
    $statement->closeCursor();
    //result is true on success, false on error
    return $result;        
    
}


//property_landlordlist list and remove features
function listProperty($propidfunction){
    global $db;
    $sql ='UPDATE property SET propstat_id = 403 WHERE property_id = ?;';
    $statement = $db->prepare($sql);
    $statement->bindValue(1, $propidfunction);
    $statement->execute();
    $statement->closeCursor();   
   
}

//property_landlordlist list and remove features
function getProperty($propidfunction){
    global $db;
    $sql ='select * from  property WHERE property_id = ?;';
    $statement = $db->prepare($sql);
    $statement->bindValue(1, $propidfunction);
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();   
    return $result;
}

function removeProperty($propidfunction){
    global $db;
    $sql ='UPDATE property SET propstat_id = 402 WHERE property_id = ?;';
    $statement = $db->prepare($sql);
    $statement->bindValue(1, $propidfunction);
    $result = $statement->execute();
    $statement->closeCursor();   
    return $result;
}

function getPropertyInfo ($property_id){
    global $db;
    $sql = "SELECT property.street, property.city, people.email, people.username, 
        property.state_id, property.zip, beds, baths, sqft, type_id, 
        propstat_id, income_requirement, rental_fee, description, picture,
            firstname, lastname
            FROM property, landlord_property, people 
            WHERE property.property_id = ? 
            AND property.property_id = landlord_property.property_id 
            AND landlord_property.landlord_id = people.people_id";
    $statement = $db->prepare($sql);
    $statement->bindValue(1, $property_id);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    //result is the array of results
    return $result;

}
//Section B: Drowdowns
function getStates(){
    //gets state names for use in add property and other forms
    global $db;
    $sql = 'SELECT * FROM state';
    $statement = $db->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result; 
}

function getFeatureTypes(){
    //gets property features for use in add property and other forms
    global $db;
    $sql = "SELECT * FROM `feature`";
    $statement = $db->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $result;   
}

function getPropertyTypes(){
    //gets property types for use in add property and other forms
    global $db;
    $sql = "SELECT * FROM `property_type` order by typename";
    $statement = $db->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $result;   
}

function getOccupancyTypes(){
    //gets occupancy types for use in add property and other forms
    global $db;
    $sql = "SELECT * FROM `property_status`";
    $statement = $db->prepare($sql);
    $statement->execute();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    return $result;   
}