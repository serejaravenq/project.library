<?php
require_once "inc/secure.inc.php";
$result = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$email = clearStr($_POST['email']) ?: $email;
	
	if(userExists($email) == false) {
		$password = clearStr($_POST['password']) ?: $password;
		$hash = getHash($password);

		if(saveUser($email, $hash)) {
			header("Location: alerts/successfull.html");
			
		}else{
			$result = "Ошибка сохранения данных";
		}
	}else{
		header("Location: alerts/warning.html");
	}
}

?>