<?php


if(isset($_GET['logout'])){ 
	logOut();
 }
 
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Administration</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>Administraion</h1>
	<h3>Available actions</h3>
	<ul>
		<li><a href='add_cat.php'>Add Catalog</a></li>
		<li><a href='orders.php'>Orders</a></li>
		<li><a href='../index.html'>Add_user</a></li>
		<li><a href='index.php?logout'>LogOut</a></li>
	</ul>
</body>
</html>