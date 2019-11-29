<?php
/*========================|
| Author: Nickolas Larson |
| Created: 4/23/2019      |
| Modified: 4/24/2019     |
|========================*/ 
session_start();
include_once("lib.php");

if(isset($_POST['item']) && !empty($_POST['item'])) {
    $add = cleanInput($_POST['item']);
    $query = "select * from Products where prod_id=?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("i", $add);
    $stmt->execute();
    $item = $stmt->get_result();
    $item = genArray($item);
    $stmt->close();
    //if(isset($_SESSION["$item"])) {}
    /*
    if(isset($_SESSION[$item['prod_id']])) {
        $_SESSION[$item['prod_id']] += 1;
    } else {
        $_SESSION[$item['prod_id']] = 1;
    }
    */
    if(isset($_SESSION['cart'])) {
        if(isset($_SESSION['cart'][$add]))
            $_SESSION['cart'][$add] += 1;
        else 
            $_SESSION['cart'][$add] = 1;
    } else {
        $_SESSION['cart'] = array();
        $_SESSION['cart'][$add] = 1;
    }
    header("Location: ../#cart");
    exit();
}