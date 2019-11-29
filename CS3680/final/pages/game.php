<?php

session_start();
include_once("../includes/lib.php");
if(!isset($_SESSION['active'])) {
  header("Location: pages/#home"); exit();
}
?>    
    <div class="webgl-content center">
    <br><br><br><div class="centerContent">
      <div id="gameContainer" style="width: 960px; height: 600px " onload()="setGame()"></div>
</div>
      <div class="footer">
        
        <div class="title"><h2><strong>AdventureIsh2</strong></h2></div>
      </div>
      <ul>
        <li><h2>Objective</h2></li>
        <li>Kill as many enemies as possible</li>
        <li><h2>controls</h2>
        <li>Left Click - Move around the map by left clicking on the ground</li>
        <li>Right Click - Right click on enemies to target/attack them (KEEP CLICKING!!!)</li>
        <li>Mouse Scroll Wheel - Zoom in and out</li>
        <li>A/D or Left and Right Arrows - Rotate Camera</li>
        <li>( Game is super buggy and doesnt always work that way )</li>
      </ul>
    </div>

