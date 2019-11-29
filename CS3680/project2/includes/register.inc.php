<?php
/*========================|
| Author: Nickolas Larson |
| Created: 4/23/2019      |
| Modified: 4/24/2019     |
|========================*/  
session_start();
include_once("lib.php");

if(isset($_POST) &&  !empty($_POST)) {
    $fName = cleanInput($_POST['fName']);
    $lName = cleanInput($_POST['lName']);
    $email1 = cleanInput($_POST['email1']);
    $email2 = cleanInput($_POST['email2']);
    $pwd1 = cleanInput($_POST['pwd1']);
    $pwd2 = cleanInput($_POST['pwd2']);
    $err = 'err=err';
    $bSaves = '';
    $gSaves = '';
    if(empty($fName) && empty($lName) && empty($email1) && empty($email2) && empty($pwd1) && empty($pwd2) ){
        header("Location: ../#register?err=all");
        exit();
    }

    if (empty($fName)) {
        $bSaves .= "&f=empty";
    } else {
        if (!preg_match("/^[a-zA-Z]*$/",$fName)) {
            $bSaves = "&f=wf";
        } else {
            $gSaves .= "&fN=$fName";
        }
    }
    if (empty($lName)) {
        $bSaves .= "&l=empty";
    }else {
        if (!preg_match("/^[a-zA-Z]*$/",$lName)) {
            $bSaves = "&l=wf";
        } else {
            $gSaves .= "&lN=$lName";
        }
    }

    if (empty($email1) || empty($email2)) {
        $bSaves .= "&e=empty";
    } else if ($email1 !== $email2) {
        $bSaves .= "&e=noMatch";
    } else {
        $gSaves .= "&email=$email1";
    }

    if (empty($pwd1) || empty($pwd2)) {
        $bSaves .= "&p=empty";
    } else if ($pwd1 !== $pwd2) {
        $bSaves .= "&p=noMatch";
    }

    if($bSaves == '')
    {
        
        if (!filter_var($email1, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../#register?err=emailForm");
            exit();
        }/*
        $query = "select * from customers where c_email=? limit 1";
        $stmt = $db->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $response = $stmt->get_result();
        $result = $response->fetch_assoc();*/
        $res = checkEmailUsed($email1);
        
        if(empty(checkEmailUsed($email1))) {
            register($fName, $lName, $email1, $pwd1);
            header("Location: ../#login?reg=true");
            exit();
        } else {
            header("Location: ../#register?err=emailUsed");
            exit();
        }


    } else {
        header("Location: ../#register?$err$bSaves$gSaves");
        exit();
    }




}

