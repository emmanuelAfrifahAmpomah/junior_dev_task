<?php
include_once 'Book.php';
include_once 'DVD.php';
include_once 'Furniture.php';

$children = array();

foreach(get_declared_classes() as $class ){
    if(is_subclass_of( $class, 'productTemplate' )){
    $children[] = $class;
    }
}