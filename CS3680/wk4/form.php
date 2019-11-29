<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>lab4</title>
    <link type="text/css" rel="stylesheet" href="css/stylesheet.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  </head>
  <body  onload="blankSlate()">

<?php


function clean_input($data)
{
	return htmlspecialchars(stripslashes(trim($data)));
}

$posted = false;
if($_SERVER['REQUEST_METHOD'] == "POST") {
	$fName = clean_input($_POST['firstname']);
	$lName = clean_input($_POST["lastname"]);
	$inOut = clean_input($_POST["InOut"]);
	$unfiltered_drinks = $_POST["drink"];
	$drinks = [];
	//$drinks[0][0] = $drinks[1][0] = $drinks[2][0] = "0";
	$i = 0;
	foreach($unfiltered_drinks as $arr) {
		$j = 0;
		foreach($arr as $arr2) {
				$drinks[$i][$j] = clean_input($arr2);

			$j++;
		}
		$i++;
	}
	//var_dump($drinks);
	//error handlers
	$err = '';
	$fnErr = '';
	$lnErr = '';
	$drnk1Err = array('','',''); 


	$chkdDrnk = [];
	$C = 0;

	
	if(!isset($fName) || empty($fName))  {
		$err .= "FIRST NAME REQUIRED<br>";
		$fnErr = '*';
	}

	if(!isset($lName) || empty($lName))  {
		$err .= "LAST NAME REQUIRED<br>";
		$lnErr = '*';
	}

	if( (!isset($drinks[0]) && !isset($drinks[1]) && !isset($drinks[2])) || ($drinks[0][0] == "0" && $drinks[1][0] == "0" && $drinks[2][0] == "0") ) {
		$err .= "Atleast one drink required<br>";
		$drnkErr[0] = $drnkErr[1] = $drnkErr[2] = '*';

	} else {
		$count = 0;
		foreach($drinks as $drink) {
			if($drink[0] != "0" && $drink[1]=="0"){
				$drnkErr[$count] = '*';
				$err .= $drink[0]." requires a size<br>";
			} elseif ($drink[0] != "0") {
				$chkdDrnk[$C++] = $drink;
			}
		       if(sizeof($drink) == 2 && $drink[0] != "0") {
				$drnkErr[$count] = '*';
				$err .= "Size selected without item selected<br>";
			}

			$count++;
		}	
	}

	$posted = true;
}

if(!$posted || $err != '') {
?>

      <form class="centerText" id="orderForm" action="form.php" method="post">

	<div class="spaceOut10" id = "nameFields">

	<span class='error'><?php echo"$fnErr"?></span>
	  <label for="firstname">First Name</label>
	  <input type="text" id = "firstname" name="firstname" value = '<?php if(isset($fName))
	  echo $fName;else echo "";?>'>

	<span class='error'><?php echo"$lnErr"?></span>
	  <label for="lastname">Last Name</label>
	  <input type="text" id = "lastname" name="lastname" value='<?php if(isset($lName))
	  echo $lName;else echo"";?>'>

	</div>


	<div class="spaceOut10" id = "drinkField">
	  <!-- First drink options-->

	  <span class='error'><?php echo"$drnkErr[0]"?></span>

	  <label>COFFEE  
		<input type='checkbox' id='drink1' name='drink[0][0]' value='Coffee' <?php if(isset($drinks[0][0]) && $drinks[0][0] != "0")  echo "checked"?>>
	  </label>

	  <select name='drink[0][1]' id='size1'>
	      <option value='0' <?php if($drinks[0][1] == '0') echo "selected" ?>>Please select a size</option>
	      <option value='Small-$1.99' <?php if($drinks[0][1] == 'Small-$1.99') echo "selected" ?>>Small-$1.99</option>
	      <option value='Medium-$2.72' <?php if($drinks[0][1] == 'Medium-$2.72') echo "selected" ?>>Medium-$2.72</option>
	      <option value='Large-$3.11' <?php if($drinks[0][1] == 'Large-$3.11') echo "selected" ?>>Large-$3.11</option>
	  </select>

	  <input type='number' id='amount1' name='drink[0][2]' min="1">
	  <br>

	    <!-- Second drink options-->

	    <span class='error'><?php echo"$drnkErr[1]" ?></span>

	  <label>TEA
	   <input type='checkbox' id='drink2' name='drink[1][0]' value='Tea'<?php if(isset($drinks[1][0]) && $drinks[1][0] != "0") echo "checked"?>>
	  </label>

	  <select name='drink[1][1]' id='size2'>
		<option value='0' selected>Please select a size</option>
	      <option value='Small-$1.99' <?php if($drinks[1][1] == 'Small-$1.99') echo "selected" ?>>Small-$1.99</option>
	      <option value='Medium-$2.72' <?php if($drinks[1][1] == 'Medium-$2.72') echo "selected" ?>>Medium-$2.72</option>
	      <option value='Large-$3.11' <?php if($drinks[1][1] == 'Large-$3.11') echo "selected" ?>>Large-$3.11</option>

	</select>

	  <input type='number' id='amount2' name='drink[1][2]' min="1">
	  <br>

	  <!-- Third drink options-->


	  <span class='error'><?php echo"$drnkErr[2]"?></span>

	  <label>HOTCHOCOLATE
	   <input type='checkbox' id='drink3' name='drink[2][0]' value='HotChocolate'<?php if(isset($drinks[2][0]) && $drinks[2][0] != "0") echo "checked"?>>
	  </label>

	  <select name='drink[2][1]' id='size3'>
	    <option value='0' <?php if($drinks[2][1] == '0') echo "selected" ?>>Please select a size</option>
	      <option value='Small-$1.99' <?php if($drinks[2][1] == 'Small-$1.99') echo "selected" ?>>Small-$1.99</option>
	      <option value='Medium-$2.72' <?php if($drinks[2][1] == 'Medium-$2.72') echo "selected" ?>>Medium-$2.72</option>
	      <option value='Large-$3.11' <?php if($drinks[2][1] == 'Large-$3.11') echo "selected" ?>>Large-$3.11</option>
	  </select>

	  <input type='number' id='amount3' name='drink[2][2]' min="1">
	</div>

	<input id="orderIn" type='radio' name='InOut' value = 'in' >In House
	<input id="orderOut" type='radio' name='InOut' value = 'out'>To Go
	<br>
	<input class="spaceOut10" id="subBtn" type='submit' value='Submit'>
	<!-- <button>Subbmit</button>  note to self -->

	</form>
      <div id='output'><?php echo $err;?></div>
	<?php } else {
		
		$OutPut = "<p>Thank you $fName $lName for your order. You have ordered: ";
		$cost = 0;
		$size = sizeof($chkdDrnk);
		for($i = 0 ; $i < $size ; $i++) {
			if($i == $size-1 && $i > 0){
				$OutPut .= " and ".$chkdDrnk[$i][2]." ".preg_replace('/[-].+/','',$chkdDrnk[$i][1])." ".$chkdDrnk[$i][0];
				if($chkdDrnk[$i][2] > 1)
					$OutPut .= "'s";
				$OutPut .= "<br>";	
			} else {
				$OutPut .= " ".$chkdDrnk[$i][2]." ".preg_replace('/[-].+/','',$chkdDrnk[$i][1])." ".$chkdDrnk[$i][0];
				if($chkdDrnk[$i][2] > "1")
					$OutPut .= "'s";
				if($size > 1){
					$OutPut .= ", ";
				}
			}
			//preg_replace('/[^A-Za-z]/','',$string);
		
			$value = preg_replace('/[^0.0-9.0]+/','',$chkdDrnk[$i][1]);	
			$cost += $value * $chkdDrnk[$i][2];
		}
		$OutPut .= " Your total is $".$cost." Order Received: ".date('m/j/y')." at ".date('h:i A')."<br>";
		echo "<h2>".$OutPut."</h2>";
	

	 } ?>
	  <script>

	  //when page is refreshed set everthing to blank/inhouse
	  function blankSlate(){
		  document.getElementById('amount1').value = '1';
		  document.getElementById('amount2').value = '1';
		  document.getElementById('amount3').value = '1';
		  document.getElementById('orderIn').checked = true;
	  }
 
      </script>



  </body>
</html>
