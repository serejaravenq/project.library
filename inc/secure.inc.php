<?php
include "configdb.php";
include "filter.php";

function getHash($password) {
	$hash = password_hash($password,PASSWORD_BCRYPT);
	return trim($hash);
}

function checkHash($password, $hash) {
	return password_verify(trim($password), trim($hash));
}



function saveUser($email, $hash) {
	global $link;
	$email = mysqli_real_escape_string($link, $email);
	$hash = mysqli_real_escape_string($link, $hash);
	$sql = "INSERT INTO admins(
    email,
    hash)
    VALUES(?, ?)";

    if(!$stmt= mysqli_prepare($link, $sql)) {
    	return false;
    }

    mysqli_stmt_bind_param($stmt,"ss",$email, $hash);
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
	$sql = "SELECT email FROM admins WHERE email = '$email' " ;
	$result = mysqli_query($link, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

		if(count($row)>0) {
			return $row;
		}else{
			$row = array();
			return $row;
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
?>