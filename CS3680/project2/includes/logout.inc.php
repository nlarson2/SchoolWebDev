<?php
/*========================|
| Author: Nickolas Larson |
| Created: 4/23/2019      |
| Modified: 4/25/2019     |
|========================*/ 

session_start();
include_once("connect.php");
include_once("lib.php");
if(isset($_SESSION['email'])) {
    $_SESSION = array();
    session_destroy();
}
header("Location: ../#logout");
exit();
?>