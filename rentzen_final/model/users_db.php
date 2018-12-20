<?php

function loginPeople($username,$password,$role){
    //returns true if the username and password are a good match.  false if not
    global $db;
    $sql = 'select people_id FROM people '
            . 'WHERE username = ? and password = ? and role_id = ?';
    $statement = $db->prepare($sql);
    $statement->bindValue(1,$username);
    $statement->bindValue(2,$password);
    $statement->bindValue(3,$role);
    $statement->execute();
    $array = $statement->fetch();
    $statement->closeCursor();
    if (empty($array['people_id'])){
        $result = false;
    } else
    {
        $result = $array['people_id'];
    }
    return $result; //result is the people_id of the logged-in user   
}

function addUser($username, $password, $role) {
    global $db;
    $sql = "INSERT INTO people(username, password, role_id) "
            . "VALUES(?,?,?)";
    $statement=$db->prepare($sql);
    $statement->bindValue(1,$username);
    $statement->bindValue(2,$password);
    $statement->bindValue(3,$role);
    if ($statement->execute()){
       $result = true; 
    } else
    {
        $result = false;
    };
    
    $statement->closeCursor();
    
    //result is true on success, false on error
    return $result;
}

function profileUpdateRenter ($a, $b, $c, $d, $email, $phone, $renter_id) {
    global $db;
    $sql = "UPDATE people SET income = ?, credit_rating = ?, firstname = ?, lastname = ?, email = ?, phone=?  WHERE people_id = ?"; 
    $statement=$db->prepare($sql);
    $statement->bindValue(1,$a);
    $statement->bindValue(2,$b);
    $statement->bindValue(3,$c);
    $statement->bindValue(4,$d);
    $statement->bindValue(5,$email);
    $statement->bindValue(6,$phone);
    $statement->bindValue(7,$renter_id);
    $result = $statement->execute();
    $statement->closeCursor();
    return $result;
}

function profileUpdateLandlord ($a, $b, $c, $phone, $e, $f) {
    global $db;
    $sql = "UPDATE people SET firstname = ?, lastname = ?, email = ?, phone=? WHERE username = ? AND password = ?"; 
    $statement=$db->prepare($sql);
    $statement->bindValue(1,$a);
    $statement->bindValue(2,$b);
    $statement->bindValue(3,$c);
    $statement->bindValue(4,$phone);
    $statement->bindValue(5,$e);
    $statement->bindValue(6,$f);
    $statement->execute();
    $statement->closeCursor();
    return $result;
}

function getUserInfo ($people_id){
    global $db;
    $sql = "SELECT * from people WHERE people_id = ?";
    $statement = $db->prepare($sql);
    $statement->bindValue(1,$people_id);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    $statement->closeCursor();
    //result is the array of result
    return $result;            
}

