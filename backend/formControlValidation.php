<?php
require_once 'core/Database.php';

$sku=$name=$price=$type=$size=$height=$width=$length=$weight="";

$errorMessage = array('sku'=>'', 'name'=>'', 'price'=>'');


if(isset($_POST['submit'])){

  $sku = htmlspecialchars($_POST['sku']);
  $name = htmlspecialchars($_POST['name']);
  $price = filter_var(($_POST['price']), FILTER_VALIDATE_FLOAT);
  $type = htmlspecialchars($_POST['productType']);
  $size = htmlspecialchars($_POST['size']);
  $height = htmlspecialchars($_POST['height']);
  $width = htmlspecialchars($_POST['width']);
  $length = htmlspecialchars($_POST['length']);
  $weight = htmlspecialchars($_POST['weight']);

  


      if(empty($name)) {
        $errorMessage['name'] = 'Please, provide a name';
      }else{
        if(!preg_match('/^[a-zA-Z\s]+$/', $name)) {
          $errorMessage['name'] = 'Name should be only alphabetic characters';
        }
      }

      if(empty($price)){
        $errorMessage['price'] = 'Please, provide a price';
      }
      if(empty($sku)) {
        $errorMessage['sku'] = 'Please, provide an SKU';
        
      }
      else{
        if(!preg_match('/^([0-9]*[.])?[0-9]+$/', $price)) {
          $errorMessage['price'] = 'Should be a float eg.: 49.00';
        }else{
          //see if there is a duplicate sku in the database already
          $sql = mysqli_query($connection, "SELECT * FROM production WHERE sku='$sku'LIMIT 1");
          // count the output amount, if there's an sku match then the below value will be 1
          $skuMatch = mysqli_num_rows($sql);
        
          if($skuMatch > 0){
         
           $errorMessage['sku'] = 'Sorry, sku already exists';
         }else{
          $sql = mysqli_query($connection, "INSERT INTO production(sku, name, 
          price, type, size, height, width, length, weight) 
          VALUES('$sku', '$name', '$price', '$type', '$size', '$height', 
          '$width', '$length', '$weight')") or die(mysqli_errno($connection));
        
          // redirect the user after
           header("location: product-list.php");
        }
}
      }

  }
