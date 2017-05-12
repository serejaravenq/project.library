<?php
	session_start();
	require "inc/lib.inc.php"
if(isset($_SESSION['user_id'])) {

	if($_SERVER['REQUEST_METHOD']=='POST') {
		$name = clearStr($_POST['name']) ?: $name;
		$price = clearInt($_POST['price']) ?: $price;
		$quantity = clearInt($_POST['quantity']) ?: $quantity;
	}		
}
?>