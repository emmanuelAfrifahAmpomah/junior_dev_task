<?php
require_once 'core/Database.php';

$sku=$name=$price=$type=$size=$height=$width=$length=$weight="";

$errorMessage = array('sku'=>'', 'name'=>'', 'price'=>'');


if(isset($_POST['submit'])){
    if(empty($_POST['sku'])) {
      $errorMessage['sku'] = 'Please, provide an SKU';
    }else {
        $sku = htmlspecialchars($_POST['sku']);
      }
  
      if(empty($_POST['name'])) {
        $errorMessage['name'] = 'Please, provide a name';
      }else {
          $name = htmlspecialchars($_POST['name']);
          if(!preg_match('/^[a-zA-Z\s]+$/', $name)) {
            $errorMessage['name'] = 'Name should be only alphabetic characters';
          }
        }
  
        if(empty($_POST['price'])) {
          $errorMessage['price'] = 'Please, provide a price';
        }else {
            $price = filter_var(($_POST['price']), FILTER_VALIDATE_FLOAT);
          }
  
          if(!empty($_POST['productType'])) {
            $type = htmlspecialchars($_POST['productType']);
          }
  
          if(!empty($_POST['size'])) {
            $size = htmlspecialchars($_POST['size']);
          }
  
          if(!empty($_POST['height'])) {
            $height = htmlspecialchars($_POST['height']);
          }
  
          if(!empty($_POST['width'])) {
            $width = htmlspecialchars($_POST['width']);
          }
  
          if(!empty($_POST['length'])) {
            $length = htmlspecialchars($_POST['length']);
          }
  
          if(!empty($_POST['weight'])) {
            $weight = htmlspecialchars($_POST['weight']);
          }

//   //see if there is a duplicate sku in the database already
//   $sql = mysqli_query($connection, "SELECT sku FROM production WHERE sku='$sku'LIMIT 1");
//   // count the output amount, if there's an sku match then the below value will be 1
// if($sql) {
//   $skuMatch = mysqli_num_rows($sql);

//   if($skuMatch > 0){
 
//    $errorMessage['sku'] = 'Sorry, sku already exists';
//    exit();
//  }
// }

          $sql = mysqli_query($connection, "INSERT INTO production(sku, name, 
          price, type, size, height, width, length, weight) 
          VALUES('$sku', '$name', '$price', '$type', '$size', '$height', 
          '$width', '$length', '$weight')") or die(mysqli_errno($connection));

      // redirect the user after
      header("location: product-list.php");
      exit();
  };
 ?>

<?php
include_once 'products/productTemplate.php';
include_once 'products/Book.php';
include_once 'products/DVD.php';
include_once 'products/Furniture.php';

$children = array();

foreach(get_declared_classes() as $class ){
    if(is_subclass_of( $class, 'productTemplate' )){
    $children[] = $class;
    }
}
?>
