<?php 
header ('Content-Type:text/html;charset=utf-8');
define('DB_HOST', '127.0.0.1');
define('DB_LOGIN', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'library');


$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME) or die(mysqli_connect_error());
?>