<?php
/*========================|
| Author: Nickolas Larson |
| Created: 4/23/2019      |
| Modified: 4/24/2019     |
|========================*/  
session_start();
include_once("../includes/lib.php");
if(!isset($_SESSION['active'])) {
  if(isset($_GET['err']) && !empty($_GET['err'])) {
    $email = cleanInput($_GET['email']);
  }
  ?>
  <br>
  <form action="includes/login.inc.php" method="post">
    <div class="form-group">
      <label for="email">Email address:</label>
      <input type="email" class="form-control" name = "email" id="email" <?php if(!empty($email)) echo "value=$email"; ?> >
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name = "pwd" id="pwd">
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox"> Remember me
      </label>
    </div>
    <?php
    if(isset($_GET['err']) && !empty($_GET['err'])) {
      $err = cleanInput($_GET['err']);
      switch($err) {
        case 'EmPs':
          echo "<p class='err'>*EMPTY FIELDS</p>";
          break;
        case 'Em':
          echo "<p class='err'>*EMPTY EMAIL</p>";
          break;
        case 'Pw':
          echo "<p class='err'>*EMPTY PASSWORD</p>";
          break;
      }
    }
  ?>
    <button type="submit" class="btn btn-primary" name='submitbtn'>Submit</button>
  </form> 
<?php } else { ?>
  <h2>ALREADY LOGGED IN</h2>
  
<?php
}
?>

