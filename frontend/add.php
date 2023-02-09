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
      <button class="btn btn-primary m-2" type="submit" form="product_form">Save</button>
      <a class="btn btn-danger m-2" href="#" type="button">Cancel</a>
    </span>
  </div>
</nav>
<hr class="mx-3 py-1">
<div class="container-fluid p-5">
    <fieldset>
        <form method="POST" id="product_form" class="needs-validation" novalidate="" data-gtm-form-interact-id="0">
            <div class="row form-group mb-3">
            <label class="col-sm-2 col-form-label" for="sku">SKU</label>
            <div class="col-sm-auto was-validated">
            <input id="sku" type="text" class="form-control" placeholder="" name="sku" value="" required="" data-gtm-form-interact-id="0">
            <div id="validateSku" class="text-dark position-absolute" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <div id="feedbackSku" class="invalid-feedback">
            Please, submit required data
            </div>
            </div>
            </div>
        </form>
    </fieldset>

</div>
</body>
<script src="bootstrap\bootstrap.bundle.js"></script> <!-- bootstrap javascript -->
</html>