<?php 

require "inc/secure.inc.php";
require "inc/routing.inc.php";	

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$email = clearStr($_POST['email']) ?: $email;
 	$user= searchUser($email);
 	var_dump($user);
 	if($user) {
 		$password = clearStr($_POST['password']) ?: $password;
 		if(password_verify($password, $user['hash'])) {
 			if($user['status'] == "status-admin") {
	 			$user_type = "admin";
	 			setcookie("admin", ($user["id"]), time()+3600);
 				
 			}else{
 				$user_type = "user";
 				setcookie("user", ($user["id"]), time()+3600);

 			}
 			
 		}else{
 			echo "Пароль не подошел";
 		} 		

 	}else{
 		$user_type = "error";
 	}
}

rediRect($user_type);
?>
