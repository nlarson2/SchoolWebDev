<?php
//Author: Nickolas Larson

require_once("./header.php");
require_once("./connect.php");


$IMG_DIR = "./images/";
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 */

function cleanData($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}
function genArray($items) {
    $ret = array();
    foreach($items as $item) {
        $ret[] = $item;
    }
    return $ret;
}
function getPost($get) {
    return cleanData($_POST[$get]);
}

$item_num = 0;
$row;

function queryAll(){
        global $db, $item_num;
        $sql =
            "SELECT prod_name, prod_img, prod_description, 
                prod_price, prod_rating, prod_sku, prod_stock
            FROM Products";
        $result = $db->query($sql);
        global $row;
        $row= genArray($result);
        if($item_num > sizeof($row) || $item_num < 0) {
            $item_num = 0;
        }
}
$nameErr = false;
$imgErr = false;
$rankErr = false;
$priceErr = false;
$skuErr = false;
$stockErr = false;
$descErr = false;
$errMsg = '';
function checkErrors($name,$img,$desc,$price,$rank,$sku,$stock) {
        global $nameErr, $imgErr , $rankErr,  $priceErr, $skuErr, $stockErr, $descErr;
      
            if(!isset($name) || empty($name)) {
                $nameErr = true;
                $errMsg .= "Please fill out all fields<br>";
            }
            
            if(!isset($img) || empty($img)) {
                $imgErr = true;
                if(!$nameErr) {
                    $errMsg .= "Please fill out all fields<br>";
                }               
            }
            if(!isset($rank) || empty($rank) || $rank < 0 || $rank > 5) {
                $rankErr = true;
                $errMsg .= "Please insert a rank between 0 and 5<br>";
            }
            if(!isset($price) || empty($price) || $price < 0) {
                $priceErr = true;
                $errMsg .= "Please insert a price greater than or equal to zero<br>";
            }
            if(!isset($sku) || empty($sku) || $sku < 0) {
                $skuErr = true;
                $errMsg .= "Please insert a SKU code greater than zero<br>";
            } 
            if($skuErr == false) {
                $stmt = $GLOBALS['db']->prepare("select prod_sku from Products where prod_sku=?");
                $stmt->bind_param("s", $sku);
                $res = $stmt->execute();
                if($res['prod_sku'] == $sku) {
                    $skuErr = true;
                    $errMsg .= "SKU code already taken<br>";
                }
            }
            if(!isset($stock) || empty($stock) || $stock < 0) {
                $stockErr = true;
                $errMsg .= "Please insert the stock amount greater than or equal zero<br>";
            }
            if(!isset($desc) || empty($desc)) {
                $descErr = true;
                $errMsg .= "Please insert a description<br>";
            }
            return $errMsg;
}
//check for update/delete/insert
//make sure that rank is between 0 && 5
//make sure price, sku && stock are non neg
if(isset($_POST['action']) && !empty($_POST['action'])) {
        $action = getPost('action');
        $item = getPost('item');
        $name = getPost('name');
        $img = getPost('img');
        $rank = getPost('rank');
        $price = getPost('price');
        $sku = getPost('sku');
        $stock = getPost('stock');
        $desc = getPost('descp');
        $errMsg = '';
        $sql_stmt='';
        global $row;
        switch($action) {
        case "Insert":
            $errMsg = checkErrors($name,$img,$desc,$price,$rank,$sku,$stock);     
            if($errMsg == '') {
                $query = "insert into Products (prod_name, prod_img, prod_description, prod_price, prod_rating, prod_sku, prod_stock )  values (?,?,?,?,?,?,?);";
                $sql_stmt = $db->prepare($query);
                $sql_stmt->bind_param('sssdisi',$name,$img,$desc,$price,$rank,$sku,$stock);
            }
            break;
        case "Update":
            $errMsg = checkErrors($name,$img,$desc,$price,$rank,$sku,$stock);
            if($errMsg == '') {
                queryAll();
                $updateSKU = $row[$item-1]['prod_sku'];
                $query = "update Products SET prod_name=?, prod_img=?, prod_description=?, prod_price=?, prod_rating=?, prod_sku=?, prod_stock=? where prod_sku=$updateSKU";
                $sql_stmt = $db->prepare($query);
                $sql_stmt->bind_param('sssdisi',$name,$img,$desc,$price,$rank,$sku,$stock);
            }
            break;  
        case "Delete":
                $query = "delete from Products where prod_sku=?";
                $sql_stmt = $db->prepare($query);
                $sql_stmt->bind_param('s',$sku); 
            break;
        }
        if($sql_stmt != '') {
            //$sql_stmt->execute();
            // dont want people actually executing this in my public_html
            // right?
        }
        if($action == "Update" && !empty($item)) {
            header("Location: ./lab11.php?q=$item");
        }
}

if(isset($_GET['q'])) {
 
    $item_num = cleanData($_GET['q']);
    if($item_num > 0) {
        queryAll();
    }
}




?>
<h1>Admin Item Management System</h1>
<form method='post' action='lab11.php'>
    <input type="hidden" name='item' value ='<?php echo $item_num?>'>
    <table>
        <tr>
            <td rowspan = "6">
                <img class = "thumbnail" src = "<?php 
                echo $IMG_DIR;
                if($item_num > 0)
                    echo $row[$item_num-1]['prod_img'];
                else
                    echo 'placeholder.png';
                ?>">
            </td>
            <td>
                <label>Name:</label>
            </td>
            <td>
                <input type='text' name='name' value='<?php
                     if($item_num > 0) 
                        echo $row[$item_num-1]['prod_name'];
                ?>'>
            </td>
            <?php if($nameErr) { ?>
            <td><span class='err'>*</span></td>
            <?php } ?>
        </tr>   
        <tr>
            <td>
                <label>ImageSrc:</label>
            </td>
            <td>
                <input type='text' name='img'  value='<?php
                    if($item_num > 0)
                        echo $row[$item_num-1]['prod_img'];
                    ?>'>
            </td>
            <?php if($imgErr) { ?>
            <td><span class='err'>*</span></td>
            <?php } ?>
        </tr>   
        <tr>
            <td>
                <label>Rating:</label>
            </td>
            <td>
                <input type='number' name='rank' min='0' max='5' value='<?php
                    if($item_num > 0)
                        echo $row[$item_num-1]['prod_rating'];
                    ?>'>
            </td>
            <?php if($rankErr) { ?>
            <td><span class='err'>*</span></td>
            <?php } ?>
        </tr>   
        <tr>
            <td>
                <label>Price:</label>
            </td>
            <td>
                <input type='number' name='price' min='0' step='any'  value='<?php
                    if($item_num > 0)
                        echo $row[$item_num-1]['prod_price'];
                    ?>'>
            </td>
            <?php if($priceErr) { ?>
            <td><span class='err'>*</span></td>
            <?php } ?>
        </tr> 
        <tr>
            <td>
                <label>SKU:</label>
            </td>
            <td>
                <input type='number' name='sku' min='0' value='<?php
                    if($item_num > 0)
                        echo $row[$item_num-1]['prod_sku'];
                    ?>'>
            </td>
            <?php if($skuErr) { ?>
            <td><span class='err'>*</span></td>
            <?php } ?>
        </tr> 
        <tr>
            <td>
                <label>Stock:</label>
            </td>
            <td>
                <input type='number' name='stock' min='0' value='<?php
                    if($item_num > 0)
                        echo $row[$item_num-1]['prod_stock'];
                    ?>'>
            </td>
            <?php if($stockErr) { ?>
            <td><span class='err'>*</span>
            <?php } ?>
        </tr> 
        <tr>
            <td colspan='3'>
                <label id='description'>Description:
                <?php if($descErr) { ?>
                <span class='err'>*</span>
                <?php } ?></label>
                <textarea name="descp" rows='5' cols='70' ><?php
                    if($item_num > 0)
                        echo $row[$item_num-1]['prod_description'];
                ?></textarea>
            </td>
        </tr>
        </table>
        <br> 
        <a href='lab11.php?q=<?php
            if($item_num > 0)
                echo $item_num - 1;
            else
                echo 0;
        ?>'><input type='button' value='Prev'></a>
            
        <a href='lab11.php?q=<?php
            if($item_num < sizeof($row) || sizeof($row) == 0)
                echo $item_num + 1;
            else
                echo sizeof($row); 
        ?>'><input type='button' value='Next'></a>
        
        <?php if($item_num > 0) { ?>
            <input type='submit' name='action' value='Update'>
            <input type='submit' name='action' value='Delete'>
        <?php } else {?>
            <input type='submit' name='action' value='Insert'>
        <?php } ?>
        


</form>
            
               
<?php

    if($errMsg != '') { ?>
    <span class = 'err'><?php echo $errMsg?></span>
    <?php }
    $db->close()
?>

</body>
</html>
