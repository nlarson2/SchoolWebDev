<?php
/*========================|
| Author: Nickolas Larson |
| Created: 4/23/2019      |
| Modified: 4/24/2019     |
|========================*/ 

session_start();
include_once("../includes/lib.php");
if($_SESSION['active'] == true) {
    header("Location: pages/#home"); exit();
} else {
    echo"<h2>SUCCESSFULLY LOGGED OUT</h2>";
}
?>