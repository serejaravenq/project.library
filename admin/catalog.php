
  <h2>Striped Rows</h2>
  <p>The .table-striped class adds zebra-stripes to a table:</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Thumbnail</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
<?php 

	$arrIn = showCatalog();
	$path = "upload/";
	if($arrIn) {
		$arrOut = array();
	 	
	}else{
		echo "Нет товаров";
		exit;
	}
	
	foreach($arrIn as $val) {
		$arrOut = array_merge($arrOut,$val);
			
?>
<tr>
    <td><?php echo $arrOut['name']?></td>
    <td><?php echo $arrOut['price']?></td>
    <td><?php echo $arrOut['quantity']?></td>
    <td><img style='max-height:25px' src="<?php echo $path.$arrOut['thumbnail']?>"></td> 
    <td ><a style='padding-right: 50px;' href='edit_product.php?id=<?php echo $arrOut['id'];?>'>edit</a><a href='delete_product.php?id=<?php echo $arrOut['id'];?>'>delete</a></td>
    
    
</tr>
<?php
}	

?>
</tbody>
</table>
