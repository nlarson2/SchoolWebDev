<?php
/*========================|
| Author: Nickolas Larson |
| Created: 4/23/2019      |
| Modified: 4/24/2019     |
|========================*/ 
include_once("connect.php");
function cleanInput($input)
{
    return htmlspecialchars(stripslashes(trim($input)));
}
function genArray($items) {
    $ret = array();
    foreach($items as $item) {
        $ret[] = $item;
    }
    return $ret;
}
function sqlQuery($query) {
    
    global $db;
    $stmt = $db->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $items = genArray($result);
    $db->close();
    return $items;
}
function checkEmailUsed($email) {
    global $db;
    $query = "select * from customers where c_email=? limit 1";
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $response = $stmt->get_result();
    $ret = $response->fetch_assoc();
    $stmt->close();
    return $ret;
}
function hashed($pwd) {
    return password_hash($pwd, PASSWORD_DEFAULT);
}
function register($fName, $lName, $email, $pwd) {
    global $db;
    $hashPwd = hashed($pwd);
    $insert = "insert into customers (c_fName, c_lName, c_email, c_pw) values (?,?,?,?);";
    $stmt = $db->prepare($insert);
    $stmt->bind_param("ssss", $fName, $lName, $email, $hashPwd);
    $stmt->execute();
    $stmt->close();
    return;
}
function login($email, $pwd) {
    if(!checkEmailUsed($email))
        return;
    global $db;
    $query = "select * from customers where c_email=?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $response = $stmt->get_result();
    $result = $response->fetch_assoc();
    /*$hashPwd = hashed($pwd);
    echo $hashPwd.'<br>';
    echo $result['c_pw'];*/
    
    if(password_verify($pwd, $result['c_pw'])) {
        return $result;
    }
    return;

}
function store($details) {
    $_SESSION['fName'] = $details['c_fName'];
    $_SESSION['lName'] = $details['c_lName'];
    $_SESSION['email'] = $details['c_email'];
    if($details['c_admin'] == 1) {
        $SESSION['admin'] = true;
    }
    $_SESSION['active'] = true;
    return;
}


?>