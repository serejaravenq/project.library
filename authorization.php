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
 			$_SESSION['admin'] = true;
 			header("Location:admin");
 		}else{
 			echo"Пароль не подошел";
 		}
 	}else{
 		header("Location:alerts/error.html");
 	}
 	
}

 	/*
 	if(userExists($email) == true) {
 		$password = clearInt($_POST['password']) ?: $password;
 		//$auth_token = checkHash($password, $auth_token);
 		echo $password, $auth_token;
 		if(checkHash($password, $auth_token)) {
 			echo "true";
 			
 		}else {
 			echo "nogood";
 		}
 	}
 }
*/
?>
