
<!-- <button id='add'>Add Permission User</button>
<button id='modify'>Modify Permission User</button>
<button id='delete'>Delete Permission User</button>

<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script type='text/javascript'></script>
 -->

<?php 

echo "
<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' type='text/css' href='CSS/stylesheet.css'>
	<style>
	#srchdiv input{
			margin: 5px 2px;
		}
		#cars{
			border: 1px solid black;
		}
		#cars tr td{
			border: 1px solid black;
		}
		img{
			width: 150px;
			height: 100px;
		}
		.int{
			width: 70px;
		}
		</style>
</head>
<body>

<form action='UserCheck.php' method='post'>
	User ID:<input type='text' name='ID'><br>
	Password:<input type='text' name='pass'><br>
	<input type='submit' name='submit'>
</form>
<br>

<button id='add'>Add Permission User</button>
<button id='modify'>Modify Permission User</button>
<button id='delete'>Delete Permission User</button>

<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script type='text/javascript'>
	$('button').hide();
</script>



</body>
</html>";

$ID = $_POST[ID];
$pass = $_POST[pass];


$link = mysql_connect("localhost","root","mysql");
if(!$link) die("<h3><font color=red>You must install MySQL</font></h3>");

$db_selected = mysql_select_db("Cars", $link);


if (!$db_selected) 
print("<h3><font color=red>Database does not exist.</font></h3>");


$r = mysql_query("SELECT * FROM security", $link);


if (!$r) {
print("<h3><font color=red>the database does not exist</font></h3>");
  }else{

	$user = mysql_query("SELECT * FROM security WHERE ID = $ID AND Password = '$pass';", $link);


	$row = mysql_fetch_array($user);

	echo $row[1];
	echo $row[4];
	



	if($row[2]==1){
		echo "<script type='text/javascript'>
	$('#add').show();
	$('#modify').show();
	$('#delete').show();
</script>";
	}else{
		if(($row[3]==1)){
echo "<script type='text/javascript'>
	$('#add').show();

</script>";
		}
		if(($row[4]==1)){
echo "<script type='text/javascript'>

	$('#modify').show();

</script>";
		}
		if(($row[5]==1)){
echo "<script type='text/javascript'>

	$('#delete').show();
</script>";
		}

 	}



	}

 


mysql_close($link);





 ?>




<!-- 

// $r =  mysql_query("SELECT * FROM cars WHERE Make $make AND Model $model AND Year BETWEEN $year1 and $year2 AND Mileage BETWEEN $mileage1 and $mileage2 AND Accidents BETWEEN $accidents1 and $accidents2 AND TotalDamage BETWEEN $damage1 and $damage2 AND Price BETWEEN $price1 and $price2;", $link );

// while ($row = mysql_fetch_array($r)) {

// print("<tr class=\"carList\">
// 	<td><a href=\"search_result.php?no=$row[0]\"><img src=\"image/${row[0]}/$row[9] \" alt=\"\"></a></td>
// 	<td>$row[1]</td>
// 	<td>$row[2]</td>
// 	<td>$row[3]</td>
// 	</tr>");



// }




















// print("<h2><font color=Blue>List of all cars</font></h2>
// <table border>
// <tr>
// 	<Th>VIN</Th>
// 	<Th>Make</Th>
// 	<Th>Model</Th>
// 	<Th>Year</Th>
// 	<Th>Color</Th>
// 	<Th>Mileage</Th>
// 	<Th>Accidents</Th>
// 	<Th>TotalDamage</Th>
// 	<Th>Price</Th>
// 	<Th>Image</Th>
// 	<Th>Feature</Th>
// 	</tr>");
// while ($row = mysql_fetch_array($r)) {
	


// $imgUrl = "";
// for($k=1;$k<=3;$k++){
// 	$imgUrl .= "<img src=\"image/${row[0]}/".$k.".jpg \" alt=\"\">";
// 	}


// print("<tr class=\"carList\">
// 	<td>${row[0]}</td>
// 	<td>$row[1]</td>
// 	<td>$row[2]</td>
// 	<td>$row[3]</td>
// 	<td>$row[4]</td>
// 	<td>$row[5]</td>
// 	<td>$row[6]</td>
// 	<td>$row[7]</td>
// 	<td>$row[8]</td>
// 	<td>$imgUrl</td>
// 	<td>$row[12]</td>
// 	</tr>");
// }




// }
// print("</table>");

 -->