<?php

if(isset($_COOKIE['admin'])) {
	$auth_token = $_COOKIE['admin'];
	

}else{
	header("Location: http://".$_SERVER['HTTP_HOST']."/project.library/login.hmtl");
	exit;
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
		<li><a href='add_product.html'>Add_product</a></li>
		<li><a href='../index.html'>Add_user</a></li>
		<li><a href='index.php?logout'>LogOut</a></li>
	</ul>
</body>
</html>