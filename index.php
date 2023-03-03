<?php
require_once 'backend/core/Database.php';
require_once 'backend/delete.php';
include_once 'backend/products/productController.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding new product</title>
    <link href="bootstrap/bootstrap.css" rel="stylesheet">  <!-- Bootstrap -->
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/styles.css" type="text/css" media="screen"> <!-- style directory -->
</head>
<body>
<form method="POST" action="">
<nav class="navbar">
  <div class="container-fluid">
    <h1 class="navbar-brand">Product List</h1>
    <div class="d-flex">
      <button href="addproduct.php" class="btn btn-secondary m-2 me-3" type="button" id="ADD" 
      name="ADD" onclick="window.location.href='addproduct.php'">ADD</button>
      <button id="delete-product-btn" class="btn btn-danger m-2" 
      type="submit" name="massDelete" value="Mass Delete">MASS DELETE</button>
</div>
  </div>
</nav>
<hr class="mx-3 py-1">
<div class="container p-5">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
      <?php
      $sql = "SELECT * FROM productions ORDER BY sku";
      $result = $connection->query($sql);
      $productCount = $result->num_rows;
      if($productCount > 0){
        while($row = $result->fetch_object()){
          $key= array_search("$row->type",$children);
          $ourNewProduct = new $children[$key]();
          $ourNewProduct->setValues("$row->sku","$row->name", 
          "$row->price","$row->size", "$row->height", 
          "$row->width", "$row->length", "$row->weight");
          echo $ourNewProduct->getInfo();
        }
      }
      ?>
      </div>
  </div>
<footer class="">
<hr class="mx-3 py-1">
<div class="text-center">
<p>Scandiweb test assignment</p>
</div>
</footer>
</form>
</body>
<script src="bootstrap\bootstrap.bundle.js"></script> <!-- bootstrap javascript -->
</html>