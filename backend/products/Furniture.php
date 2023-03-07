<?php

require_once 'productTemplate.php';

class Furniture extends productTemplate{
    
    public function setValues($sku, $name, $price, $size, $height, $width, $length, $weight){
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->size = $size;
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
        $this->weight = $weight;
    }

    public function getInfo(){
         echo "
         <div class='col mt-5'>
         <div class='card border-0 cardStyle'>
         <div class='card-input'>
             <input type='checkbox' id='delete' class='delete-checkbox form-check-input bg-secondary 
             m-2' name='delete[]' value='$this->sku'>
         </div>
         <div class='card-body'>
         <p class='card-text text-center'>$this->sku</p>
         <p class='card-text text-center'>$this->name</p>
         <p class='card-text text-center'>$this->price $</p>
         <p class='card-text text-center'>Dimension: $this->height x $this->width x $this->length</p>
         </div>
         </div>
         </div>";


    }
};