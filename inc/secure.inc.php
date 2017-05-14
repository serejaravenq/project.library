<?php
require "configdb.php";
require "filter.php";

function getHash($password) {
	$hash = password_hash($password,PASSWORD_BCRYPT);
	return $hash;
}

function saveUser($email, $hash, $status, $auth_token) {
	global $link;
	$email = mysqli_real_escape_string($link, $email);
	
	$sql = "INSERT INTO admins(
    email,
    hash,
    status,
    auth_token)
    VALUES(?, ?, ?, ?)";

    if(!$stmt= mysqli_prepare($link, $sql)) {
    	return false;
    }

    mysqli_stmt_bind_param($stmt,"ssss",$email, $hash, $status, $auth_token);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return true;
}

function userExists($email) {
	global $link;
	$sql = "SELECT id FROM admins WHERE email = '$email' ";
	$result = mysqli_query($link, $sql);

		if(mysqli_num_rows($result) > 0) {
			return true;
		}else{
			return false;
		}
	mysqli_free_result($result);
}


function searchUser($email) {
	global $link;
	$sql = "SELECT * FROM admins WHERE email = '$email' " ;
	$result = mysqli_query($link, $sql, MYSQLI_USE_RESULT);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

		if(count($row) > 0) {
			return $row;
		}else{
			return false;
		}
	mysqli_free_result($result);
}

function checkUser($email) {
	global $link;
	$sql = "SELECT hash FROM admins WHERE email = '$email' ";
	$result = mysqli_query($link, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	return $row['hash'];
}

/*function saveCookie($auth_token) {
	global $link;
	$sql = "UPDATE admins SET auth_token = '$auth_token' WHERE ";
}
*/
?>