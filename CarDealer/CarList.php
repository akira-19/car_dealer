

<?php

$link = mysql_connect("localhost","root","mysql");
if(!$link) die("<h3><font color=red>You must install MySQL</font></h3>");

$db_selected = mysql_select_db("Cars", $link);


mysql_select_db("Cars", $link );


if (!$db_selected) 
print("<h3><font color=red>Database does not exist.</font></h3>");

$r = mysql_query("SELECT * FROM cars", $link);


if (!$r) {
print("<h3><font color=red>cars does not exist</font></h3>");
 }
else {
print("<h2><font color=Blue>List of all cars</font></h2>
<table border>
<tr>
	<Th>VIN</Th>
	<Th>Make</Th>
	<Th>Model</Th>
	<Th>Year</Th>
	<Th>Color</Th>
	<Th>Mileage</Th>
	<Th>Accidents</Th>
	<Th>TotalDamage</Th>
	<Th>Price</Th>
	<Th>Image</Th>
	<Th>Feature</Th>
	</tr>");
while ($row = mysql_fetch_array($r)) {
	


$imgUrl = "";
for($k=1;$k<=3;$k++){
	$imgUrl .= "<img src=\"image/${row[0]}/".$k.".jpg \" alt=\"\">";
	}


print("<tr class=\"carList\">
	<td>${row[0]}</td>
	<td>$row[1]</td>
	<td>$row[2]</td>
	<td>$row[3]</td>
	<td>$row[4]</td>
	<td>$row[5]</td>
	<td>$row[6]</td>
	<td>$row[7]</td>
	<td>$row[8]</td>
	<td>$imgUrl</td>
	<td>$row[12]</td>
	</tr>");
}




}
print("</table>");

mysql_close($link);
print("<p></p>");





?>