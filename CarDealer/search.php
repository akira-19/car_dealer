<!-- add.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Result of Searching</title>
	<style type="text/css">
		img{
			height: 100px;
			width: 150px;
		}
	</style>
</head>
<body>

</body>
</html>


<?php

if($_POST[make]==""){
	$make = "IS NOT NULL";
}else{
	$make = "= '$_POST[make]'";
}
if($_POST[model]==""){
	$model = "IS NOT NULL";
}else{
	$model = "= '$_POST[model]'";
}

if($_POST[year1]==""){
	$year1 = 0;
}else{
	$year1 = $_POST[year1];
}

if($_POST[year2]==""){
	$year2 = 100000;
}else{
	$year2 = $_POST[year2];
}

if($_POST[mileage1]==""){
	$mileage1 = 0;
}else{
	$mileage1 = $_POST[mileage1];
}

if($_POST[mileage2]==""){
	$mileage2 = 1000000000;
}else{
	$mileage2 = $_POST[mileage2];
}

if($_POST[accidents1]==""){
	$accidents1 = 0;
}else{
	$accidents1 = $_POST[accidents1];
}

if($_POST[accidents2]==""){
	$accidents2 = 100000;
}else{
	$accidents2 = $_POST[accidents2];
}

if($_POST[damage1]==""){
	$damage1 = 0;
}else{
	$damage1 = $_POST[damage1];
}

if($_POST[damage2]==""){
	$damage2 = 10000000;
}else{
	$damage2 = $_POST[damage2];
}

if($_POST[price1]==""){
	$price1 = 0;
}else{
	$price1 = $_POST[price1];
}

if($_POST[price2]==""){
	$price2 = 1000000000;
}else{
	$price2 = $_POST[price2];
}


// print($make.'/'.$model.'/'.$year1.'/'.$year2.'/'.$mileage1.'/'.$mileage2.'/'.$accidents1.'/'.$accidents2.'/'.$damage1.'/'.$damage2.'/'.$price1.'/'.$price2);

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
 }else{

print("<h2><font color=Blue>List of all cars</font></h2>
<table border>
<tr>
	<Th>Picture</Th>
	<Th>Make</Th>
	<Th>Model</Th>
	<Th>Year</Th>
	</tr>");




   $r =  mysql_query("SELECT * FROM cars WHERE Make $make AND Model $model AND Year BETWEEN $year1 and $year2 AND Mileage BETWEEN $mileage1 and $mileage2 AND Accidents BETWEEN $accidents1 and $accidents2 AND TotalDamage BETWEEN $damage1 and $damage2 AND Price BETWEEN $price1 and $price2;", $link );

while ($row = mysql_fetch_array($r)) {

print("<tr class=\"carList\">
	<td><a href=\"search_result.php?no=$row[0]\"><img src=\"image/${row[0]}/$row[9] \" alt=\"\"></a></td>
	<td>$row[1]</td>
	<td>$row[2]</td>
	<td>$row[3]</td>
	</tr>");



}

print("</table>");

}


mysql_close($link);
print("<font color=blue>");
print ("<h3>The car has been inserted . </h3>");
print("<p></p>");
print("<a href=addform.html>Return to add more records</a> to menu.");

?>
