<?php

require "../inc/secure.inc.php";
require "inc/lib.inc.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $id = clearInt($_POST['id']) ?: $id;
      if(deleteProduct($id)) {
      echo "Product successfully deleted";
            
        header("Refresh:2; url=http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME'])."/index.php?id=catalog");
      }
  }

if(isset($_GET['id'])) {
  
  $id = clearInt($_GET['id']) ?: $id;
  echo "<h2>Delete Product?</h2>
        <form method='POST'>
        <input type='hidden' name='id' value='$id' />
        <input type='submit' value='Delete'>
        </form>"; 
}

?>
