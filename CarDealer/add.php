<!-- add.php -->
<?php
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
mysql_query("INSERT INTO `Cars`.`cars` (`VIN`, `Make`, `Model`,`Year`, `Color`, `Mileage`, `Accidents`, `TotalDamage`, `Price`, `Image1`, `Image2`, `Image3`, `Feature`) VALUES ('$_POST[VIN]', '$_POST[Make]', '$_POST[Model]', '$_POST[Year]', '$_POST[Color]', '$_POST[Mileage]', '$_POST[Accidents]', '$_POST[TotalDamage]', '$_POST[Price]', '$_POST[Image1]', '$_POST[Image2]', '$_POST[Image3]', '$_POST[Feature]');", $link );
mysql_close($link);
print("<font color=blue>");
print ("<h3>The car has been inserted . </h3>");
print("<p></p>");
print("<a href=addform.html>Return to add more records</a> to menu.");

?>
