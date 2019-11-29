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
      $fName = cleanInput($_GET['fN']);
      $lName = cleanInput($_GET['lN']);
  }
  ?>
  <br>
  <form action="includes/register.inc.php" method="post">
    <div class="form-group">
    <div class="form-group">
      <label for="fName">First Name:</label> <?php if(!empty($_GET['f'])) echo "<span class='err'>*</span>";?>
      <input <?php if(!empty($_GET['f'])) echo "class='inputErr' ";?>type="text" class="form-control" name = "fName" id="fName" <?php if(!empty($fName)) echo "value=$fName"; ?>>
    </div>
      <label for="lName">Last Name:</label><?php if(!empty($_GET['l'])) echo "<span class='err'>*</span>";?>
      <input <?php if(!empty($_GET['l'])) echo "class='inputErr' ";?> type="text" class="form-control" name = "lName" id="lName" <?php if(!empty($lName)) echo "value=$lName"; ?>>
    </div>
    <div class="form-group">
      <label for="email1">Email:</label><?php if(!empty($_GET['e'])) echo "<span class='err'>*</span>";?>
      <input  <?php if(!empty($_GET['e'])) echo "class='inputErr' ";?>type="email" class="form-control" name = "email1" id="email1" <?php if(!empty($email)) echo "value=$email"; ?> >
    </div>
    <div class="form-group">
      <label for="email2">Verify Email:</label><?php if(!empty($_GET['e'])) echo "<span class='err'>*</span>";?>
      <input  <?php if(!empty($_GET['e'])) echo "class='inputErr' ";?>type="email" class="form-control" name = "email2" id="email2">
    </div>
    <div class="form-group">
      <label for="pwd1">Password:</label><?php if(!empty($_GET['p'])) echo "<span class='err'>*</span>";?>
      <input  <?php if(!empty($_GET['p'])) echo "class='inputErr' ";?>type="password" class="form-control" name = "pwd1" id="pwd1">
    </div>
    <div class="form-group">
      <label for="pwd2">Repeat Password:</label><?php if(!empty($_GET['p'])) echo "<span class='err'>*</span>";?>
      <input  <?php if(!empty($_GET['p'])) echo "class='inputErr' ";?>type="password" class="form-control" name = "pwd2" id="pwd2">
    </div>





  <?php
  if(isset($_GET['err']) && !empty($_GET['err'])) {
      $err = cleanInput($_GET['err']);
      switch($err) {
      case 'all':
        echo "<p class='err'>*ALL FIELDS EMPTY</p>";
        break;
      case 'EmPs':
          echo "<p class='err'>*EMPTY FIELDS</p>";
          break;
      case 'Em':
          echo "<p class='err'>*EMPTY EMAIL</p>";
          break;
      case 'Pw':
          echo "<p class='err'>*EMPTY PASSWORD</p>";
          break;
      case 'emailUsed':
          echo "<p class='err'>*EMAIL ALREADY REGISTERED</p>";
          break;
      case 'emailForm':
          echo "<p class='err'>*EMAIL INCORRECT FORMAT</p>";
          break;
      }
      if($_GET['f'] == "wf" || $_GET['l'] == "wf") {
          echo "<p class='err'>*NAME FORMATED INCORRECTLY (MAKE SURE THERE ARE NO SPACES)</p>";
      }
  }
  ?>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form> 

<?php } else { ?>
  <h2>ALREADY LOGGED IN</h2>
  
<?php
}
?>