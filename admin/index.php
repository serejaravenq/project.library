<?php

require "inc/lib.inc.php";
require "../inc/secure.inc.php";

if(isset($_GET['logout'])) { 
	logOut();
 }

if(isset($_COOKIE['admin'])) {
	$auth_token = $_COOKIE['admin'];
	$admin = checkRole($auth_token);
 
	if($admin) {
		$result = $admin['email'];
	
	}else{
		$result = 'You`re not admin!';
	}
		 
}else{
	header("Location: http://".$_SERVER['HTTP_HOST']."/project.library/login.html");
	exit;
}

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Administration</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<!-- Styles for main version -->
	<link rel="stylesheet" href="../css/signin.css" />
</head>
<body>
<div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Library</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
            	<li><a href='index.php'>General</a></li>
            	<li><a href='index.php?id=add_product'>Add_product</a></li>
            	<li><a href='index.php?id=catalog'>Catalog</a></li>
            	<li><a href='index.php?logout'>LogOut</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

	<h2>Administrator, <?php echo $result ;?></h2>
	

<?php
		include "inc/routing.inc.php";
?>

</div>	
	
</body>
</html>