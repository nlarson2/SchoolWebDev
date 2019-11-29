<?php
/*========================|
| Author: Nickolas Larson |
| Created: 4/23/2019      |
|========================*/  
session_start();
include_once("../includes/lib.php");



$img = 'images/';




if(isset($_POST['update']) || isset($_POST['empty'])) {
    $data = sqlQuery("select * from Products");
    $iter = 0;
    $amounts = $_POST['qty'];
    foreach($data as $item) {
        if(isset($_SESSION['cart'][$item['prod_id']])) {
            if(isset($_POST['empty'])){
                unset($_SESSION['cart']);
            } elseif (isset($_POST['update'])) {
                if($amounts[$iter] > 0) {
                    $_SESSION['cart'][$item['prod_id']] = $amounts[$iter];
                }
                $iter++;
            }
        }
    }
    header("Location: ../#cart");
    exit();
}



if(!isset($_SESSION['active'])) {
    echo "<h2>Must Login In To View This Page</h2><br>";
    echo "<h3><a class = 'stop' id='home' href='#'>Login</a></h3>";
} else {
    
        $data = sqlQuery("select * from Products");
        
        if(!empty($_SESSION['cart'])) {
            echo "<form action ='pages/cart.php' method='POST'>";
            echo "<input type='submit' name='update' value='UPDATE CART'>";
            echo "<input type='submit' name='empty' value='EMPTY CART'>";
            $iter = 0;
            $total = 0;
            foreach($data as $item) {
                echo '<table>';
                if(isset($_SESSION['cart'][$item['prod_id']])) {
                    echo '<tr>';
                    echo '<td rowspan = "5"><img class = "thumbnail" src ="'.$img.$item['prod_img'].'"></td>';
                    echo '<td>NAME: '.$item['prod_name'].'</td>';
                    echo '<td rowspan = "6"><input type=number name="qty['.$iter++.']" value='.$_SESSION['cart'][$item['prod_id']].'></tr>';
                    echo '<tr><td>RATING: ';
                    for($i=0;$i<$item['prod_rating'];$i++){
                        echo'*';
                    }
                    echo'</td></tr>';
                    echo'<tr><td>PRICE: $'.$item['prod_price'].'</td></tr>';
                    echo'<tr><td>SKU: '.$item['prod_sku'].'</td></tr>';
                    echo'<tr>';
                    if($item['prod_stock']=='0')
                        echo '<td id = "outOfStock">Out Of Stock</td>';
                    else
                        echo '<td>In Stock</td>';
                    $cost = $item['prod_price']*$_SESSION['cart'][$item['prod_id']];
                    $total += $cost;
                    echo '<td>$'.$cost.'</td>';
                    echo '</tr><tr>';
                    echo '<td colspan = "2">DESCRIPTION: '.$item['prod_description'].'<td>';
                    echo '</tr>';
                    
                

                }
                echo '</table>';
            }
            echo "</form>";
            echo "<h3 id='total'>TOTAL: $$total</h3>";
        } else {
            echo "<h3>CART IS EMPTY</h3>";
        }
        
}
?>