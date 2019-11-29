
<?php
//lab2.php
  define("DEVELOPER_MODE",true);
  define("LOGFILE",'./logfile.log');
  if(DEVELOPER){
    error_reporting(E_ALL);
    ini_set("display_errors",1);

    ini_set("error_log",LOGFILE);
    error_log("test\n",0);
  }
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Lab3</title>
		<style>
			table{ 
				display: inline-block;
				width: 50%;

			}
			.thumbnail{ width: 80px;}
			#outOfStock{ color: red;}
		</style>
	</head>
	<body>
		

<?php


$items = array(
	
        array("NAME"=>"Almonds", "DESCRIPTION"=>"High in fiber and PROTEiN!",
        "PRICE"=>"4.00/lb", "RATING" =>"4", "SKU"=>"00198",
        "STOCK"=>"1", "IMG"=>"images/almonds.jpg"),

        array("NAME"=>"Apple", "DESCRIPTION"=>"A delicious red apple",
        "PRICE"=>"0.98/lb", "RATING" =>"2", "SKU"=>"58697",
        "STOCK"=>"0", "IMG"=>"images/apple.jpg"),

        array("NAME"=>"banana", "DESCRIPTION"=>"Great source of potassium",
        "PRICE"=>"0.79/lb", "RATING" =>"3", "SKU"=>"24370",
        "STOCK"=>"1", "IMG"=>"images/banana.jpeg"),

        array("NAME"=>"Broccoli",
        "DESCRIPTION"=>"Honestly I dont know why we sell this stuff... is it even good for you?",
        "PRICE"=>"1.99/lb", "RATING" =>"1", "SKU"=>"17348",
        "STOCK"=>"1", "IMG"=>"images/broccoli.jpeg"),

        array("NAME"=>"Chips", "DESCRIPTION"=>"Crunchy salty goodness",
        "PRICE"=>"3.99", "RATING" =>"5", "SKU"=>"95163",
        "STOCK"=>"0", "IMG"=>"images/chips.jpeg"),

        array("NAME"=>"Orange", "DESCRIPTION"=>"Boost your immune system with this super fruit",
        "PRICE"=>"1.79/lb", "RATING" =>"4", "SKU"=>"73859",
        "STOCK"=>"1", "IMG"=>"images/orange.jpg")

	

);

  
 function printArray($items){
	 $iterator = 0;
	 foreach ($items as $item){
		 echo '<table>';
		 echo '<tr>';
		 echo '<td rowspan = "5"><img class = "thumbnail" src ="'.$item['IMG'].'"</td>';
		 echo '<td>NAME: '.$item['NAME'].'</td></tr>';
		 echo '<tr><td>RATING: ';
		 for($i=0;$i<$item['RATING'];$i++){
			 echo'*';
		 }
		 echo'</td></tr>';
		 echo'<tr><td>PRICE: $'.$item['PRICE'].'</td></tr>';
		 echo'<tr><td>SKU: '.$item['SKU'].'</td></tr>';
		 echo'<tr>';
		 if($item['STOCK']=='0')
			 echo '<td id = "outOfStock">Out Of Stock</td>';
		 else
			 echo '<td>In Stock</td>';
		 echo '</tr><tr>';
		 echo '<td colspan = "2">DESCRIPTION: '.$item['DESCRIPTION'].'<td>';
		 echo '</tr></table>';


		 $iterator++;
		 if($iterator == 2){
		 	echo '<br>';
			$iterator = 0;
		 }
	 }

 }


  function priceSort($a,$b){
  	if($a['PRICE'] ==$b['PRICE']) return 0;
	return ($a['PRICE']<$b['PRICE'])?-1:1;
  }


  function ratingSort($a,$b){
        if($a['RATING'] ==$b['RATING']) return 0;
        return ($a['RATING']<$b['RATING'])?1:-1;
  }


  printArray($items);

?>
		<hr>
		<h2>Featured Itmes</h2>
<?php

  uasort($items, "ratingSort");
  printArray($items);

?>
		<hr>
		<h2>Price Low to High</h2>

<?php
  uasort($items, "priceSort");
  printArray($items);


?>
	</body>
</html>Highest Rating - Lowest RatingHighest Rating - Lowest Rating
