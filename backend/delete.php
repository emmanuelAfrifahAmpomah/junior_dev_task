<?php
require_once 'core/Database.php';

if(isset($_POST['massDelete'])) {
    if(empty(isset($_POST['delete']))){
      // echo "delete is empty";
    }else{
        if(isset($_POST['delete'])){
        foreach($_POST['delete'] as $SKU){
            
            $result = $connection->query("DELETE FROM production WHERE sku='".$SKU."'");
          
        }
    }
    // header("location: product-list.php");
    // exit;
  
    }
  }
