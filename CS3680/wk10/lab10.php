<?php

require_once("./header.php");
require_once("./connect.php");

$IMG_DIR = "./images/";


function printData($items){
    $iterator = 0;
    foreach ($items as $item){
        echo '<table>';
        echo '<tr>';
        echo '<td rowspan = "5"><img class = "thumbnail" src ="'.$GLOBALS['IMG_DIR'].$item['prod_img'].'"></td>';
        echo '<td>NAME: '.$item['prod_name'].'</td></tr>';
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
        echo '</tr><tr>';
        echo '<td colspan = "2">DESCRIPTION: '.$item['prod_description'].'<td>';
        echo '</tr></table>';


        $iterator++;
        if($iterator == 2){
        echo '<br>';
        $iterator = 0;
        }
    }

}


?>

<form method='GET' action='lab10.php'>
  <label for='sortby'>Sort By</label>
  <select name='sortby' id='sortby' onchange='this.form.submit()'>
    <option value=''> </option>
    <option value='rating'>Rating</option>
    <option value='priceHighToLow'>Price High to Low </option>
    <option value='priceLowToHigh'>Price Low to High </option>
  </select>
</form>

<?php


$sql='';
if(isset($_GET['sortby'])) {
    switch($_GET['sortby']) {
        case 'rating':
            $sql =
                "SELECT prod_name, prod_img, prod_description, 
                    prod_price, prod_rating, prod_sku, prod_stock
                FROM Products
                ORDER BY prod_rating DESC";
            break;
        case 'priceHighToLow':
            $sql =
                "SELECT prod_name, prod_img, prod_description, 
                    prod_price, prod_rating, prod_sku, prod_stock
                FROM Products
                ORDER BY prod_price DESC";
            break;
        case 'priceLowToHigh':
            $sql =
                "SELECT prod_name, prod_img, prod_description, 
                    prod_price, prod_rating, prod_sku, prod_stock
                FROM Products
                ORDER BY prod_price ASC";
            break;
        default:
            $sql = 
                "SELECT prod_name, prod_img, prod_description, 
                        prod_price, prod_rating, prod_sku, prod_stock
                FROM Products";
            break;
    }
    $result = $db->query($sql);
    printData($result);
    $db->close();
}



?>

</body>
</html>
