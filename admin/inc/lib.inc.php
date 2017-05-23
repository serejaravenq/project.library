<?php

	function addProduct($name, $price, $quantity, $thumbnail) {
		global $link;
		$name = mysqli_real_escape_string($link, $name);
		$thumbnail = mysqli_real_escape_string($link, $thumbnail);
		$sql = "INSERT INTO products (
		name,
		price,
		quantity,
		thumbnail)
		VALUES(?, ?, ?, ?)";

		if(!$stmt = mysqli_prepare($link, $sql)) {
    	return false;
    	}

	    mysqli_stmt_bind_param($stmt,"siis",$name, $price, $quantity, $thumbnail);
	    mysqli_stmt_execute($stmt);
	    mysqli_stmt_close($stmt);
	    return true;
	}

	function showCatalog() {
		global $link;
		$sql = "SELECT * FROM products";
		$result= mysqli_query($link, $sql);

		if(mysqli_num_rows($result) > 0) {
			
			while($row= mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$arr[] = $row;
			}

		return $arr;	
		}else{
			return false;
		}

		mysqli_free_result($result);					
	}

	function showProduct($id) {
		global $link;
		$sql = "SELECT * FROM products WHERE id = '$id'";
		$result = mysqli_query($link, $sql);
		$row= mysqli_fetch_array($result, MYSQLI_ASSOC);
		if(mysqli_num_rows($result) >0) {
			return $row;
		}else{
			return false;
		}	
	}

	function updateName($name, $id) {
		global $link;
		$name = mysqli_real_escape_string($link, $name);
		$sql = "UPDATE products SET name = ? WHERE id = '$id'";

		if(!$stmt = mysqli_prepare($link, $sql)) {
    	return false;
    	}

	    mysqli_stmt_bind_param($stmt, "s", $name);
	    mysqli_stmt_execute($stmt);
	    mysqli_stmt_close($stmt);
	    return true;
	}

	function updatePrice($price, $id) {
		global $link;
		$sql = "UPDATE products SET price = ? WHERE id = '$id'";

		if(!$stmt = mysqli_prepare($link, $sql)) {
    	return false;
    	}

	    mysqli_stmt_bind_param($stmt,"i", $price);
	    mysqli_stmt_execute($stmt);
	    mysqli_stmt_close($stmt);
	    return true;
	}

	function updateQuantity($quantity, $id) {
		global $link;
		$sql = "UPDATE products SET quantity = ? WHERE id = '$id'";

		if(!$stmt = mysqli_prepare($link, $sql)) {
    	return false;
    	}

	    mysqli_stmt_bind_param($stmt, "i", $quantity);
	    mysqli_stmt_execute($stmt);
	    mysqli_stmt_close($stmt);
	    return true;
	}

	function updateThumbnail($thumbnail, $id) {
		global $link;
		$name = mysqli_real_escape_string($link, $thumbnail);
		$sql = "UPDATE products SET thumbnail = ? WHERE id = '$id'";

		if(!$stmt = mysqli_prepare($link, $sql)) {
    	return false;
    	}

	    mysqli_stmt_bind_param($stmt, "s", $thumbnail);
	    mysqli_stmt_execute($stmt);
	    mysqli_stmt_close($stmt);
	    return true;
	}

	function deleteProduct($id) {
		global $link;
		$sql = "DELETE FROM products WHERE id = ?";
		
		if(!$stmt = mysqli_prepare($link, $sql)) {
    	return false;
    	}

	    mysqli_stmt_bind_param($stmt, "i", $id);
	    mysqli_stmt_execute($stmt);
	    mysqli_stmt_close($stmt);
	    return true;
		

	}

	function logOut() {
		setcookie("admin", 0, time()-3600,"/project.library");
		header("Location: http://".$_SERVER['HTTP_HOST']."/project.library/login.html");
		exit;
	}
?>