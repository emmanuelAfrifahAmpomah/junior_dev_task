<?php

require_once 'productTemplate.php';

class Book extends productTemplate{
    private $sku;
    private $name;
    private $price;
    private $size;
    private $height;
    private $width;
    private $length;
    private $weight;
    public function setValues($sku, $name, $price, $size, $height, $width, $length, $weight)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->size = $size;
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
        $this->weight = $weight;
    }

    // '<div class="card-box-order-mine p-2 bd-highlight">';
    //<input class='delete-checkbox' type='checkbox' name="delete[]" value='.$this->sku.'>';
    public function getInfo() {
        echo "
        <div class='col mt-5'>
        <div class='card border-secondary shadow-lg'>
        <div class='card-input'>
            <input type='checkbox' class='delete-checkbox form-check-input bg-secondary 
            m-2' name='delete[]' value='.$this->sku.' form='delete-form'>
        </div>
        <div class='card-body'>
        <p class='card-text text-center'>$this->sku</p>
        <p class='card-text text-center'>$this->name</p>
        <p class='card-text text-center'>$this->price.00 $</p>
        <p class='card-text text-center'>Size: $this->weight KG</p>
        </div>
        </div>
        </div>";
    }
}