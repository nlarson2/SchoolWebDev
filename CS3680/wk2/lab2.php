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


echo"<!DOCTYPE html>\n";
echo"<html>\n";

define("TITLE","lab2");
define("CSS", "css/lab2.css");
echo"<head>\n";
echo"<title>".TITLE."</title>\n";
echo"<link type=\"text/css\" rel=\"stylesheet\" href =\"".CSS."\" >\n";
echo"</head>\n";
$tableOut = "<table>\n";
for($i = 1; $i <= 10 ; $i++){
   $tableOut.= "<tr>";
   for($j = 1; $j <=10; $j++){
      if($i==1 && $j==1){
        $tableOut.="<th>*</th>\n";
      }
      elseif($i ==1){
        $tableOut.="<th scope = 'column'>$j</th>\n";
      }
      elseif($j ==1){
        $tableOut.="<th scope = 'row'>$i</th>\n";
      }
      else {
        $tableOut.="<td>".($j*$i)."</td>\n";
      }
    }
    $tableOut.="</tr>";
}
$tableOut.="</table>\n";

$fname = "Nickolas";
if(isset($fname)){
  error_log("Name set to $fname\n");
}
else{
  error_log("Name not set\n");
}


echo"<body>\n";
echo"<h1>Welcome to $fname's lab2</h1>\n";
echo "$tableOut";
echo "<br><br>";
$var1 =1;
$var2 = 2;
echo $var1." + ".$var2." is ".($var1+$var2)." (".gettype($var1+$var2).")<br>";
echo $var1." . ".$var2." is ".($var1.$var2)." (".gettype($var1.$var2).")<br>";
$var1 = 1;
$var2 = 2.0;
echo $var1." + ".$var2." is ".($var1+$var2)." (".gettype($var1+$var2).")<br>";
echo $var1." . ".$var2." is ".($var1.$var2)." (".gettype($var1.$var2).")<br>";
$var1 = '1.0 word';
$var2 = 2;
echo $var1." + ".$var2." is ".($var1+$var2)." (".gettype($var1+$var2).")<br>";
echo $var1." . ".$var2." is ".($var1.$var2)." (".gettype($var1.$var2).")<br>";
$var1 = 'word';
$var2 = 2.0;
echo $var1." + ".$var2." is ".($var1+$var2)." (".gettype($var1+$var2).")<br>";
echo $var1." . ".$var2." is ".($var1.$var2)." (".gettype($var1.$var2).")<br><br>";



$var1 =1;
$var2 = 2;
echo <<<EOT

	Int+double is a double because it is the type in the equation with the heighest precision.
	PHP will automatical return the type with the heighest precision.<br><br><br>

EOT;
echo <<<EOD
	A string that starts with a numberical number followed by a + operator will try to configure
	it as a numeric value to be added to the other value; a way that i tested this was on the 3rd var2
	i changed it to '2' and recieved the same value.<br><br><br>
EOD;


echo"</body>\n";
echo"</html>\n";


 ?>
