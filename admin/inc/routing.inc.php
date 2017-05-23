<?php

$id = isset($_GET['id']) ? strtolower($_GET['id']) : 'index.php';

		switch($id) {
		case "add_product": include "inc/add_product.html"; break;
		case "edit_product": include "edit_product.php"; break;
		case "catalog": include "catalog.php"; break;
		case "delete_product": include "delete_product.html"; break;
		default: include "index.inc.php"; break;		
	}

?>