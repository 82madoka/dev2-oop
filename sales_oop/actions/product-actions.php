<?php

include_once "../classes/Product.php";

$product_obj = new Product;

if(isset($_POST['add_product'])){
    
    $product_obj->addProduct($_POST);

}elseif(isset($_POST['edit_product'])){

    $product_id = $_GET['product_id'];

    $product_obj->updateProduct($product_id,$_POST);
}elseif(isset($_POST['pay_product'])){
    
    $product_id = $_GET['product_id'];
    $product_obj->adjustStock($product_id,$_POST);
}



?>