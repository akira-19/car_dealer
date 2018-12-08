<?php 

$array = array("VIN","Make","Model","Year","Color","Mileage","Accidents","TotalDamage","Price","Image1","Image2","Image3","Feature");

$modify ="";

for($i = 0;$i<count($array);$i++){
	if($_POST[$array[$i]]!=""){
		$post = $array[$i];
		$modify .= "`$array[$i]` = '$_POST[$post]', ";
	}
}

$modify = rtrim($modify,", ");




// Connectt to DB  
$link = mysql_connect("localhost","root","mysql");
if(!$link) die("<h3><font color=red>You must install MySQL</font></h3>");
// Select DB
$db_selected = mysql_select_db("Cars", $link);

if (!$db_selected) 
print("<h3><font color=red>Database does not exist.</font></h3>");
// Make Sure that the table exists
$r = mysql_query("SELECT * FROM cars", $link);
if (!$r) {
print("<h3><font color=red>cars does not exist</font></h3>");
 }
//mysql_query("INSERT INTO `booktable` (`BookID`, `Title`, `Author`, `Publisher`) VALUES ('9', '9', '9', '9');", $link );
mysql_query("UPDATE `Cars`.`cars` SET $modify WHERE `cars`.`VIN` = $_POST[VIN];", $link );
mysql_close($link);
print("<font color=blue>");
print ("<h3>The car has been inserted . </h3>");
print("<p></p>");
print("<a href=addform.html>Return to add more records</a> to menu.");


 ?>


