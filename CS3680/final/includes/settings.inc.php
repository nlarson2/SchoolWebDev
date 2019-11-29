<?php
session_start();
include_once("lib.php");

if(isset($_POST['sbmtBtn'])) {
    $curPass = cleanInput($_POST['cur_pass']);
    $newPass1 = cleanInput($_POST['new_pass1']);
    $newPass2 = cleanInput($_POST['new_pass2']);
    if(empty($curPass) || empty($newPass1) || empty($newPass2)){
        header("Location: ../#settings?err=EmPs");
        exit();
    }
    if($newPass1 != $newPass2) {
        header("Location: ../#settings?err=DM");
        exit();
    }
    if(verifyPass($curPass)) {
        changePassword($newPass1);
        header("Location: logout.inc.php");
        exit();
    }
    else {
        header("Location: ../#settings?err=WP");
        exit();
    }
}

