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
    $query = "select * from users where u_email=? limit 1";
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $response = $stmt->get_result();
    $ret = $response->fetch_assoc();
    $stmt->close();
    return $ret;
}
function checkUNameUsed($uName) {
    global $db;
    $query = "select * from users where u_uName=? limit 1";
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $uName);
    $stmt->execute();
    $response = $stmt->get_result();
    $ret = $response->fetch_assoc();
    $stmt->close();
    return $ret;
}
function hashed($pwd) {
    return password_hash($pwd, PASSWORD_DEFAULT);
}
function register($fName, $lName, $uName, $email, $pwd) {
    global $db;
    $hashPwd = hashed($pwd);
    $insert = "insert into users (u_fName, u_lName, u_uName, u_email, u_pw, u_admin) values (?,?,?,?,?,0);";
    $stmt = $db->prepare($insert);
    $stmt->bind_param("sssss", $fName, $lName, $uName, $email, $hashPwd);
    $stmt->execute();
    $stmt->close();
    return;
}
function verifyPass($pwd) {
    global $db;
    $query = "select * from users where u_email=?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $_SESSION['email']);
    $stmt->execute();
    $response = $stmt->get_result();
    $result = $response->fetch_assoc();
    /*$hashPwd = hashed($pwd);
    echo $hashPwd.'<br>';
    echo $result['c_pw'];*/
    
    if(password_verify($pwd, $result['u_pw'])) {
        return $result;
    }
    return;
}
function changePassword($pwd) {
    global $db;
    echo "here";

    $query = "update users SET u_pw=? where u_email=?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("ss", hashed($pwd), $_SESSION['email']);
    $stmt->execute();
    return;
}
function login($email, $pwd) {
    if(!checkEmailUsed($email))
        return;
    global $db;
    $query = "select * from users where u_email=?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $response = $stmt->get_result();
    $result = $response->fetch_assoc();
    /*$hashPwd = hashed($pwd);
    echo $hashPwd.'<br>';
    echo $result['c_pw'];*/
    
    if(password_verify($pwd, $result['u_pw'])) {
        return $result;
    }
    return;

}
function store($details) {
    $_SESSION['fName'] = $details['u_fName'];
    $_SESSION['lName'] = $details['u_lName'];
    $_SESSION['uName'] = $details['u_uName'];
    $_SESSION['email'] = $details['u_email'];
    if($details['u_admin'] == 1) {
        $SESSION['admin'] = true;
    }
    $_SESSION['active'] = true;
    return;
}


?>
