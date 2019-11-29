<?php
/*========================|
| Author: Nickolas Larson |
| Created: 4/23/2019      |
| Modified: 4/24/2019     |
|========================*/

session_start();
include_once("../includes/lib.php");


if($_SESSION['active'] == true) {

    echo "<h2>Welcome ".$_SESSION['uName']."</h2>";
} else {
    echo "<h2>Welcome Guest</h2>";
} 
?>

