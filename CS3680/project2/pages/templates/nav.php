<?php
/*========================|
| Author: Nickolas Larson |
| Created: 4/23/2019      |
| Modified: 4/25/2019     |
|========================*/ 
session_start();
include_once("includes/lib.php");
?>

<nav class = "navbar navbar-expand-sm  bg-dark navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link stop" id='home' href="#">HOME</a>
        </li>
        <!-- if not logged in -->
        <?php
        if($_SESSION['active'] != true) {
        ?>
        <li class="nav-item right">
            <a class="nav-link stop" id='login' href="#">LOGIN</a>
        </li>
        <li class="nav-item right">
            <a class="nav-link stop" id='register' href="#">REGISTER</a>
        </li>
        <!--  ====================== -->
        <?php } else { ?>

        <!--if logged in -->
        <li class="nav-item">
            <a class="nav-link stop" id='store' href="#">STORE</a>
        </li>
        <li class="nav-item right">
            <a class="nav-link stop" id='cart' href="#">CART</a>
        </li>
            <!-- adjust right -->
        <li class="nav-item right">
            <a class="nav-link" id='logout' href="includes/logout.inc.php">LOGOUT</a>
        </li>
            <!--  ====================== -->
        <?php 

        if($_SESSION['admin'] == 1) {
        
        ?>
        <!--if admin-->
        <li class="nav-item">
            <a class="nav-link stop" id='admin' href="#">EDIT_ITEMS</a>
        </li>
        <?php } } ?>
        <!--  ====================== -->
    </ul>

        

</nav>