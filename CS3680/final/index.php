<?php
/*========================|
| Author: Nickolas Larson |
| Created: 4/23/2019      |
| Modified: 4/24/2019     |
|========================*/  


ini_set("session.cookie_httponly", 1);
session_start();
include_once("pages/templates/header.php");
include_once("pages/templates/nav.php");
?>

<div id="content">
</div>


<?php
include_once("pages/templates/footer.php");
?>
