<?php
	require "inc/lib.inc.php";
	require "../inc/secure.inc.php";

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$name = clearStr($_POST['name']) ?: $name;
		$price = clearInt($_POST['price']) ?: $price;
		$quantity = clearInt($_POST['quantity']) ?: $quantity;
		/******CHECK $_FILES['filename']************/
		if(!empty($_FILES['filename']['name'])) {
			$thumbnail = clearStr($_FILES['filename']['name']);
			
			$path="upload/";
			if($_FILES["filename"]["size"] > 1024*2*1024) {
		     echo "Размер файла превышает два мегабайта";
		     exit;
		    }

			$imageinfo = getimagesize($_FILES['filename']['tmp_name']);
			if($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg' && $imageinfo['mime'] != 'image/png') {
				echo "Wrong format picture. Only JPEG/GIF/PNG formats";
			}
			$uploadfile = $path . basename($_FILES['filename']['name']);
		// check it if file is uploaded
		if(is_uploaded_file($_FILES['filename']['tmp_name'])) { 
		move_uploaded_file($_FILES['filename']['tmp_name'], $uploadfile);
		}

		}else{
			echo "Добавьте картинку";
		}
		/******CHECK $_FILES['filename'] END************/
		if(addProduct($name, $price, $quantity, $thumbnail)) {
			echo "Успешно добавлен товар<br><img src=".$uploadfile;"";
			header("Refresh:2; url=http://" .$_SERVER['HTTP_HOST'] .dirname($_SERVER['SCRIPT_NAME']));	
		}else{
			echo "Ошибка при добавлении товара";
				
		}
	}		
?>

