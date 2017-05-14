<?php

require_once "inc/secure.inc.php";
require_once "inc/routing.inc.php";	


if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$email = clearStr($_POST['email']) ?: $email;
		
	if(!empty($_POST['user'])) {
		$status = $_POST['user'];

	}
	
	if(!empty($_POST['admin'])) {
		$status = $_POST['admin'];

	}

	if(userExists($email) == false) {
		$password = clearStr($_POST['password']) ?: $password;
		$hash = getHash($password);
		
		if(saveUser($email, $hash, $status)) {
			$user_type = "registered";
			
		}else{
			echo "Ошибка сохранения данных";
		}
	}else{
		$user_type ="alreadyIn";
	}
}

rediRect($user_type);

?>