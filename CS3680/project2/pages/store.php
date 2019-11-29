<?php
/*========================|
| Author: Nickolas Larson |
| Created: 4/23/2019      |
|========================*/  
session_start();
#include_once("/includes/connect.php");
#include_once("includes/lib.php");
include_once("../includes/lib.php");

$img = "images/";
if(!$db){
    echo "BROKEN";
}
if(!isset($_SESSION['active'])) {
    echo "<h2>Must Login In To View This Page</h2><br>";
    echo "<h3><a class = 'stop' id='login' href='#login'>Login</a></h3>";
} else {
    ?>

    <h3>STORE</h3>
    <?php

$query = "select * from Products;";
//$stmt = $db->prepare($query);
//$stmt->execute();
//$response = $stmt->get_result();
//$items = $response->fetch_assoc();
    $items = sqlQuery($query);
   #var_dump($items);
   $iter = 0;
   echo "<div class='row'>";
   echo "<div class = 'card-group'>";
   foreach($items as $item) {
       ?>
       <form action='includes/addToCart.inc.php' method='post'>
        
            <div class="col-sm-6">
                <div class="card">
                    <img class="card-img-top" src="<?php echo $img.$item["prod_img"]; ?>" alt="<?php echo $item["prod_name"]; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $item["prod_name"]; ?></h5>
                        <p class="card-text"><?php echo $item["prod_description"]; ?></p>
                    </div>
                    <div class="card-footer">
                        <?php if($item['prod_stock'] > 0) { ?>
                        <input type='hidden' name='item' value='<?php echo $item['prod_id'];?>'>
                        <input type='submit' class="btn btn-primary" name='add' value='Add To Cart'>
                        <p class ="card-text"><?php echo '$'.$item['prod_price'].'';?></p>
                        <?php } else { ?>
                        <p class="card-text">OUT OF STOCK</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </form>
       <?php
    } 
    echo "</div>";
    echo "</div>";


}
?>
