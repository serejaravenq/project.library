<?php

require_once "inc/secure.inc.php";
require_once "inc/redirect.inc.php";	


if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$email = clearStr($_POST['email']) ?: $email;
		
	if(userExists($email) == false) {

		if(!empty($_POST['role'])) {
		$role = $_POST['role'];

		}else{
			echo "Надо выбрать между админом и юзером!";
		}

		$password = clearStr($_POST['password']) ?: $password;
		$hash = getHash($password);
		$auth_token = md5($email);
		var_dump($role);

		if(saveUser($email, $hash, $role, $auth_token)) {
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