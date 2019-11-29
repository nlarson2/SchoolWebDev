<?php
$servername = "localhost";
$username = "nlarson";
$password = "nlarsonPass";
$database = "nlarson";
// Create connection
$db = new mysqli($servername, $username, $password, $database);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?> 
