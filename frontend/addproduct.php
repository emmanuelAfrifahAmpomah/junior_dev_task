<?php
require_once '../backend/core/Database.php';

/*<?php
if(empty($sku)){
  echo "";
}
?>*/

// initialize form values to empty string
$sku="";
$name="";
$price="";
$type="";
$value="";

$errorMessage ="";
$successMessage ="";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sku = htmlspecialchars($_POST['sku']);
    $name = htmlspecialchars($_POST['name']);
    $price = htmlspecialchars($_POST['price']);
    $type = $_POST['DVD' || 'Furniture' || 'Book'];
    $value = htmlspecialchars($_POST['']);

    $size = htmlspecialchars($_POST['size']);
    $height = htmlspecialchars($_POST['height']);
    $width = htmlspecialchars($_POST['width']);
    $length = htmlspecialchars($_POST['length']);
    $weight = htmlspecialchars($_POST['weight']);

    if($type == 'DVD') {
        $value = $size;
    }

    elseif ($type == 'Furniture') {
        $value = $height * $width * $length;
    }

    elseif ($type == 'Book') {
        $value = $weight;
    }

    do {
        if (empty($sku)||empty($name)||empty($price)||empty($type)||empty($value)) {
            $errorMessage = 'All fields are required';
            break;
        }

            // if there is no empty field then we proceed to create a new client to database
            $sql = "INSERT INTO products (sku, name, price, type, value)" . 
            "VALUES ('$sku', '$name', '$price', '$type', '$value')";
            $result = $connection->query($sql);

        if (!$result) {
            die("could not add data to database: " . $connection->connect_error);
            break;
        }

            // after adding client, we initialize the data variables to empty values

            $sku="";
            $name="";
            $price="";
            $type="";
            $value="";

            // we proceed to show a success message
            $successMessage="Client successfully added to database";

            // redirects to list of clients page
            header("location: product-list.php");
            exit;
        }while(false);
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
    <h1 class="navbar-brand">Product Add</h1>
    <span class="d-flex">
      <button class="btn btn-secondary m-2" name="submit" type="submit" form="product_form">Save</button>
      <a class="btn btn-danger m-2" href="product-list.php" type="button">Cancel</a>
    </span>
  </div>
</nav>
<hr class="mx-3 py-1">
<div class="container-fluid p-5">
    <fieldset>
        <form method="POST" id="product_form" class="needs-validation" novalidate>
            <!-- for SKU -->
            <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="sku">SKU</label>
            <div class="col-sm-auto was-validated">
            <input id="sku" type="text" class="form-control" name="sku" value="<?= htmlspecialchars($sku)?>" required>
            <div class='invalid-feedback'>
              Please, provide an SKU
              </div>
            </div>
            </div>
            <!-- for Name -->
            <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="name">Name</label>
            <div class="col-sm-auto was-validated">
            <input id="name" type="text" class="form-control" name="name" value="<?= htmlspecialchars($name)?>" required>
            <div id="feedbackName" class="invalid-feedback">
            Please, provide a Name
            </div>
            </div>
            </div>
            <!-- For Price -->
            <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="price">Price ($)</label>
            <div class="col-sm-auto was-validated">
            <input id="price" type="number" min="0.01" step="0.01" class="form-control" name="price" value="<?= htmlspecialchars($price)?>" required>
            <div id="feedbackSku" class="invalid-feedback">
            Please, provide the Price
            </div>
            </div>
            </div>
            <!-- For Product Type -->
            <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="productType">Product Type</label>
            <div class="col-sm-auto was-validated">
            <select id="productType" class="form-select" name="productType" required>
                <option selected value="">Type Switcher</option>
                <option id="DVD" value="DVD">DVD</option>
                <option id="Furniture" value="Furniture">Furniture</option>
                <option id="Book" value="Book">Book</option>
            </select>
            <div id="feedbackName" class="invalid-feedback">
            Please, provide the data of indicated type
            </div>
            </div>
            </div>
        </form>
    </fieldset>
    <!-- Product Type Selection -->
    <div id="selectProduct" class="mb-5">
      <!-- When DVD is selected -->
      <fieldset class="was-validated" id="dvd">
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="size">Size (MB)</label>
          <div class="col-sm-auto">
          <input id="size sizeMB" type="number" min="1" step="1" class="form-control" name="size" value="<?= htmlspecialchars($size)?>" required>
          <div class="invalid-feedback">Please, provide the size</div>
          </div>
        </div>
      </fieldset>

      <!-- When Furniture is selected -->
      <fieldset class="was-validated" id="furniture">
        <!-- Input for height -->
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="height">Height (CM)</label>
          <div class="col-sm-auto">
          <input id="weight" type="number" min="1" step="1" class="form-control" name="weight" value="<?= htmlspecialchars($height)?>" required>
          <div class="invalid-feedback">Please, provide the height</div>
          </div>
        </div>
        <!-- Input for width -->
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="width">Width (CM)</label>
          <div class="col-sm-auto">
          <input id="width" type="number" min="1" step="1" class="form-control" name="width" value="<?= htmlspecialchars($width)?>" required>
          <div class="invalid-feedback">Please, provide the width</div>
          </div>
        </div>
        <!-- Input for length -->
          <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="length">Length (CM)</label>
          <div class="col-sm-auto">
          <input id="length" type="number" min="1" step="1" class="form-control" name="length" value="<?= htmlspecialchars($length)?>" required>
          <div class="invalid-feedback">Please, provide the length</div>
          </div>
        </div>
      </fieldset>

      <!-- When Book is selected -->
      <fieldset class="was-validated" id="book">
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label" for="size">Weight (KG)</label>
          <div class="col-sm-auto">
          <input id="weight" type="number" min="1" step="1" class="form-control" name="weight" value="<?= htmlspecialchars($weight)?>" required>
          <div class="invalid-feedback">Please, provide the weight</div>
          </div>
        </div>
      </fieldset>
    </div>
</div>
</body>
<footer class="">
<hr class="mx-3 py-1">
<div class="text-center">
<p>Scandiweb test assignment</p>
</div>
</footer>
<script src="javascript/jquery.js" type="text/javascript"></script> <!-- jquery framework -->
<script src="script.js" type="text/javascript"></script>
<script src="bootstrap\bootstrap.bundle.js"></script> <!-- bootstrap javascript -->
</html>