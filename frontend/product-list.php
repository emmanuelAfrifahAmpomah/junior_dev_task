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
      <a href="addproduct.php" class="btn btn-primary m-2" type="submit">Add</a>
      <a id="delete-product-btn" class="btn btn-danger m-2" href="delete.php" type="button">Mass Delete</a>
    </span>
  </div>
</nav>
<hr class="mx-3 py-1">
<div class="container p-5">
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
    <div class="mt-2">
        <div class="card border-secondary shadow-lg">
            <div class="card-input">
                <input type="checkbox" class="delete-checkbox form-check-input bg-secondary m-2" name="" form="delete-form">
            </div>
            <div class="card-body">
                <p class="card-text text-center">JVC200123</p>
                <p class="card-text text-center">Acme DISC</p>
                <p class="card-text text-center">1.00 $</p>
                <p class="card-text text-center">Size: 700 MB</p>
            </div>
        </div>
    </div>
</div>
</div>
<footer class="">
<hr class="mx-3 py-1">
<div class="text-center">
<p>Scandiweb test assignment</p>
</div>
</footer>
</body>
<script src="bootstrap\bootstrap.bundle.js"></script> <!-- bootstrap javascript -->
</html>