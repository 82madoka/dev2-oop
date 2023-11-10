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
    <title>Payment</title>
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
                <i class="fa-solid fa-pen-to-square me-1"></i>Payment
            </h1>
        </div>

        <div class="card-body">
            <form action="../actions/product-actions.php?product_id=<?= $product['id'] ?>" method="post">
            <div class="mb-3">
                <label for="" class="form-label">Product Name</label>
                <h2 class="fw-bold"><?=$product['product_name'] ?></h2>
            </div>
            <div class="row mb-3">
                <div class="col-6">
                    <label for="" class="form-label">Total Price</label>
                    <h2 class="fw-bold">
                        <?= $product['price'] * $_POST['buy_quantity'] ?>
                    </h2>
                </div>
                <div class="col-6">
                    <label for="" class="form-label">Buy Quantity</label>
                    <h2 class="fw-bold">
                        <?= $_POST['buy_quantity'] ?>
                    </h2>
                    <input type="hidden" name="buy_quantity" value="<?= $_POST['buy_quantity']?>">
                    <div id="buy-quantity-help" class="form-text text-danger">Maximum of<?= $product['quantity']?>
                </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Payment</label>
                <div class="input-group mb-3">
                    <span class="input-group-text fw-bold" id="price-tag">$</span>
                    <input type="number" name="payment" id="payment" class="form-control form-control-lg text-center fw-bold text-danger"
                    min="<?= $product['price'] * $_POST['buy_quantity']?>">
                </div>
            </div>
            <button type="submit" class="btn btn-success w-100" name="pay_product">Pay</button>       
        
        </form>
        
        </div>
    </div>
</div>
    
</body>
</html>