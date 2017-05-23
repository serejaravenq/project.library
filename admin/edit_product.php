<?php 
require "../inc/secure.inc.php";
require "inc/lib.inc.php";

 if(isset($_GET['id'])) {
 	$id = clearInt($_GET['id']) ?: $id;
 	$path = "upload/";
 	$row = showProduct($id);
 	
 	if($_SERVER['REQUEST_METHOD'] == 'POST') {
 		$name = clearStr($_POST['name']) ?: $name;
 		$price = clearInt($_POST['price']) ?: $price;
 		$quantity = clearInt($_POST['quantity']) ?: $quantity;

 		if($name != $row['name'] && $name !='') {
 		$result = updateName($name, $id);

 			if($result) {
 				$row = showProduct($id);
 				var_dump($row);
 			}else{
 				echo "Имя не обновилось";
 			}
 		}

 		if($price != $row['price'] && $price !='') {
 		$result = updatePrice($price, $id);

 			if($result) {
 				$row = showProduct($id);
 				var_dump($row);
 			}else{
 				echo "Цена не обновилась";
 			}
 		}

 		if($quantity != $row['quantity'] && $quantity !='') {
 		$result = updateQuantity($quantity, $id);

 			if($result) {
 				$row = showProduct($id);
 				var_dump($row);
 			}else{
 				echo "Кол-во не обновилось";
 			}
 		}

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

		$result = updateThumbnail($thumbnail, $id);	
		if($result) {
 			$row = showProduct($id);

 			}else{
 				echo "Картинка не обновилась";
 			}

		}
 	}
}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Edit_product</title>
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
	<a href='index.php?id=catalog'>Back To Catalog</a>
		<form class="form-signin" method="post" enctype="multipart/form-data">
	        <h2 class="form-signin-heading">Edit_product</h2>
	        <label for="inputName" class="sr-only">Name</label>
	        <input type="text" id="inputName" name="name" class="form-control" placeholder="Name" value ="<?php echo $row['name'];?>" autofocus>
	        <label for="inputPrice" class="sr-only">Price</label>
	        <input type="number" name="price" id="inputPrice" class="form-control" placeholder="Price" value ="<?php echo $row['price'];?>">
	        <label for="inputQuantity" class="sr-only" >Quantity</label>
	        <input type="number" id="inputQuantity" max="100" name="quantity" class="form-control" placeholder="Quantity" value ="<?php echo $row['quantity'];?>">
	        <label for="inputThumbnail" class="sr-only">Thumbnail</label>
	        <input type="file" name="filename" id="inputThumbnail" class="form-control"  accept="image/*" value="Choose File">
	        <img class="img-thumbnail"  src="<?php echo $path.$row['thumbnail']?>" >
	        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	        
      	</form>
	</div>  
</body>
</html
