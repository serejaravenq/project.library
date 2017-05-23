<?php
function rediRect($user_type) {
		switch ($user_type) {
		case "user": $redirect_url = "/project.library/user/index.php"; break;
		case "admin": $redirect_url = "/project.library/admin/index.php"; break;
		case "error": $redirect_url = "/project.library/alerts/error.html"; break;
		case "registered": $redirect_url = "/project.library/alerts/successfull.html"; break;
		case "alreadyIn": $redirect_url = "/project.library/alerts/warning.html"; break;
		default: $redirect_url = "/project.library/login.html";
	}

header('HTTP/1.1 200 OK');
header('Location: http://'.$_SERVER['HTTP_HOST'].$redirect_url);
exit();
}

?>