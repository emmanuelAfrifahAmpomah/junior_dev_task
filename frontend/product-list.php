<?php
require_once '../backend/core/Database.php';
// require_once '../backend/delete.php';
include_once '../backend/products/Book.php';
include_once '../backend/products/DVD.php';
include_once '../backend/products/Furniture.php';

$children = array();

foreach(get_declared_classes() as $class ){
    if(is_subclass_of( $class, 'productTemplate' )){
    $children[] = $class;
    }
}
?>

<?php
if(isset($_POST["please_delete"])){
    
  if(isset($_POST['delete'])){
      foreach($_POST['delete'] as $SKU){
          
           $connection->query("DELETE FROM production WHERE sku='".$SKU."'");
        
      }
  }
}
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
    <link rel="stylesheet" href="styles/styles.css" media="screen"> <!-- style directory -->
</head>
<body class="">
<nav class="navbar">
  <div class="container-fluid">
    <h1 class="navbar-brand">Product List</h1>
    <span class="d-flex">
      <a href="addproduct.php" class="btn btn-secondary m-2" type="submit">Add</a>
      <form method="post" action="">
      <input id="delete-product-btn" class="btn btn-danger m-2" 
      type="submit" name="please_delete" value="Mass Delete">
    </span>
  </div>
</nav>
<hr class="mx-3 py-1">
<div class="container p-5">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
      <?php
      $sql = "SELECT * FROM production ORDER BY sku";
      $result = mysqli_query($connection, $sql);
      $productCount = mysqli_num_rows($result);
      if($productCount > 0){
        while($row = mysqli_fetch_object($result)){
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