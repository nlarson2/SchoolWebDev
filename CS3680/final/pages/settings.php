<?php 
session_start();
if($_SESSION['active'] == true) {

?>
<h2 class="center">CHANGE PASSWORD</h2>
<form action="includes/settings.inc.php" method="post">
    <div class="form-group">
      <label for="cur_pass">Current Password:</label>
      <input type="password" class="form-control" name = "cur_pass" id="curPass">
    </div>
    <div class="form-group">
      <label for="new_pass1">New Password:</label>
      <input type="password" class="form-control" name = "new_pass1" id="newPass1">
    </div>
    <div class="form-group">
      <label for="new_pass2">Repeat New Password:</label>
      <input type="password" class="form-control" name = "new_pass2" id="newPass2">
    </div>
    <input type="submit" class="form-control" name='sbmtBtn' id='sbmtBtn' value="CHANGE PASSWORD">
</form>
<p class="center">Note: Changing password will log you out and require you to log back in.</p>
<?php
  $err = $_GET['err']; 
    if(!empty($err)) {
        switch($err) {
            case "EmPs":
                echo "<p class='err'>*EMPTY FIELDS</p>";
                break;
            case 'DM':
                echo "<p class='err'>*NEW PASSWORDS DONT MATCH</p>";
                break;
            case 'WP':
                echo "<p class='err'>*WRONG CURRENT PASSWORD</p>";
                break;
            
        }
    }


}
 else {
    header("Location: pages/#home"); exit();
 }


?>
