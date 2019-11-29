<?php
/*========================|
| Author: Nickolas Larson |
| Created: 4/23/2019      |
| Modified: 4/24/2019     |
|========================*/  

$servername = 'localhost';
$username = 'nlarson';
$password = 'nlarsonPass';
$database = 'nlarson';

#$db = new mysqli($servername, $username, $password, $database);

if($db->connect_error){
    die("Connection Failed: " . $db->connect_error);
}

function hasAccess(){
    echo "yes";
}
?>
