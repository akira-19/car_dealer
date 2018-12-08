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
 }else{


 mysql_query("DELETE FROM `cars` WHERE VIN = $_POST[VIN]", $link );

 echo "delete complete";

}



mysql_close($link);



 ?>