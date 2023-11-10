<?php

include "../classes/Product.php";
$product_obj = new Product;

$product_obj->deleteProduct($_GET['product_id']);

?>