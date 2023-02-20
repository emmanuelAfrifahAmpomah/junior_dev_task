<?php
require_once('core/Database.php');

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
    $type = htmlspecialchars($_POST['DVD' || 'Furnitre' || 'Book']);


    $size = htmlspecialchars($_POST['size']);
    $height = htmlspecialchars($_POST['height']);
    $width = htmlspecialchars($_POST['width']);
    $length = htmlspecialchars($_POST['length']);
    $weight = htmlspecialchars($_POST['weight']);
    $value = htmlspecialchars($_POST['']);

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

