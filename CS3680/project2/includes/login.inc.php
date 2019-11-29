<?php
/*========================|
| Author: Nickolas Larson |
| Created: 4/23/2019      |
| Modified: 4/24/2019     |
|========================*/  
session_start();
include_once("lib.php");

if(isset($_POST['submitbtn'])) {
    $email = cleanInput($_POST['email']);
    $pwd = cleanInput($_POST['pwd']);

    if(empty($email) && empty($pwd)){
        header("Location: ../#login?err=EmPs");
        exit();
    } else if (empty($email)) {
        header("Location: ../#login?err=Em");
        exit();
    } else if (empty($pwd)) {
        header("Location: ../#login?err=Pw&email=$email");
        exit();
    } else {
        $login = login($email, $pwd);
        if(!empty($login)) {
            store($login);
            header("Location: ../#home");
            exit();
        } else {
            header("Location: ../#login?err=incEP");
            exit();
        }
    }
}

