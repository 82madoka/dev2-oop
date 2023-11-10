<?php
session_start();

include "../classes/Product.php";

$product_obj = new Product;

$product = $product_obj->displaySpecificProduct($_GET['product_id']);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<?php
include "main_nav.php";
?>
<div class="container mt-5">
    <div class="card-border-0 mx-auto w-50">
        <div class="card-header bg-white border-0">
            <h1 class="text-center">
                <i class="fa-solid fa-pen-to-square me-1"></i>Buy Product
            </h1>
        </div>

        <div class="card-body">
        <form action="../views/payment.php?product_id=<?= $product['id'] ?>" method="post" class="w=75 mx=auto">
        <div class="mb-3">
            <label for="" class="form-label">Product Name</label>
            <h2 class="fw-bold"><?= $product['product_name']?></h2>
        </div>
        <div class="row mb-3">
        <div class="col-6">
            <label for="" class="form-label">Price</label>
            <h2 class="fw-bold"><?= $product['price']?></h2>
        </div>
        <div class="col-6">
            <label for="" class="form-label">Stocks Left</label>
            <h2 class="fw-bold"><?= $product['quantity']?></h2>
        </div>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Buy Quantity</label>
            <input type="number" name="buy_quantity" class="form-control form-control-lg text-center fw-bold" required min="1" max="<?= $product['quantity']?>">
        </div>
        <button type="submit" class="btn btn-success w-100" name="buy_product">Pay</button>
    
        </form>
        </div>
    </div>
</div>
    
</body>
</html>