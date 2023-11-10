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
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<?php include "main_nav.php"; ?>

<div class="container mt-5">
    <div class="card-border-0 mx-auto w-50">
        <div class="card-header bg-white border-0">
            <h1 class="text-center">
                <i class="fa-solid fa-pen-to-square me-1"></i>Edit Product
            </h1>
        </div>

        <div class="card-body">
        <form action="../actions/product-actions.php?product_id=<?= $product['id'] ?>" method="post" class="w-75 mx-auto">
                <div class="mb-3">
                    <label for="product_name" class="form-label small">Product Name</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" value="<?= $product['product_name']?>">
                </div>
        <div class="row mb-3">
            <div class="col-6">
                <label for="price" class="form-label small text-secondary">Price</label>
                    <div class="input-group mb-3">
                        <div class="input-group-text" id="price-tag">$</div>
                        <input type="number" name="price" id="price" class="form-control" step="any" aria-describedby="price-tag" value="<?= $product['price']?>">
                    </div>
            </div>
            <div class="col-6">
                    <label for="quantity" class="form-label small">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="<?= $product['quantity']?>">
            </div>

         </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-info w-100" name="edit_product">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
    
</body>
</html>