<?php 
session_start();
header("HTTP/1.0 401 Unauthorized");
require "inc/secure.inc.php";
	
if($_SERVER['REQUEST_METHOD']=='POST') {
	$email = clearStr($_POST['email']) ?: $email;
 	$founded = searchUser($email);

 	if(in_array($email, $founded)) {
 		$password = clearStr($_POST['password']) ?: $password;

 		if(checkHash($password, checkUser($email))) {
 			$_SESSION['user_id'] = "admin";
 			header("Location:admin");
 		}else{
 			echo"Пароль не подошел";
 		}
 	}else{
 		header("Location:alerts/error.html");

 	}	
}

if (!isset($_SESSION['user_id'])) {
	header("Location:login.html");
}
?>
