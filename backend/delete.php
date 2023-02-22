<?php
require_once 'core/Database.php';

// $sql = "DELETE FROM production WHERE sku = . $sku .";
// $result = $connection->query($sql);
// if(!$result) die("Could not delete product from database:" . $mysqli->error());
// DELETE FROM `production` WHERE `production`.`sku` = 'der' 

if(isset($_POST["please_delete"])){
    
    if(isset($_POST['delete'])){
        foreach($_POST['delete'] as $SKU){
            
             $connection->query("DELETE FROM production WHERE sku='".$SKU."'");
          
        }
    }
}
