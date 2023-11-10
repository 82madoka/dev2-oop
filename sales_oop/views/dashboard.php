<?php
session_start();

if(empty($_SESSION)){
    header('location: ../views');
    exit;
}

include "../classes/Product.php";
$product_obj = new Product;

$all_products = $product_obj->displayProducts();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
    include "main_nav.php";
    ?>
    <div class="container mt-5">
        <div class="card w-75 border-0 mx-auto">
            <div class="card-header bg-white border-0">
                <div class="row">
                    <div class="col text-start">
                        <h1 class="display-6 fw-bold">Product List</h1>                                    
                    </div>
                    <div class="col text-end">
                        <!--add product modal trigger-->
                        <i data-bs-toggle="modal" data-bs-target="#addProductModal" class="fa-solid fa-plus fa-3x text-info" style="cursor: pointer;"></i>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>PRODUCT</th>
                            <th>PRICE</th>
                            <th>QUANTITY</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--products later-->
                        <?php
                          foreach($all_products as $product) {                       
                        ?>
                        <tr>
                            <td><?= $product['id']?></td>
                            <td><?= $product['product_name']?></td>
                            <td><?= $product['price']?></td>
                            <td><?= $product['quantity']?></td>
                            <td>
                                <a href="edit-product.php?product_id=<?=$product['id'] ?>"
                                class="btn btn-warning btn-sm" title="Edit Product"><i class="fa-solid fa-pen"></i></a>
                                
                                <a href="../actions/delete-product.php?product_id=<?= $product['id'] ?>" class="btn btn-danger btn-sm" title="Delete Product"><i class="fa-solid fa-trash"></i></a> 
                                <td>
                                    <?php if($product['quantity'] > 0){
                                     ?> 
                                     <a href="../views/buy-product.php?product_id=<?= $product['id'] ?>" class="btn btn-success btn-sm" title="Buy Product"><i class="fa-solid fa-cash-register"></i></a> 
                                     <?php 
                                    }
                                    ?>
                                    
                                </td>                         
                            
                            </td>
                        </tr>
                        <?php
                          }
                      ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>


<div class="modal fade" id="addProductModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="card-header border-0 bg-white mt-5">
            <h1 class="display-4 fw-bold text-center">
            <i class="fa-solid fa-box me-1"></i>Add Product
            </h1>
        </div>
        <div class="modal-body p-5">
            <!--should rethink the link below-->
        <form action="../actions/product-actions.php" method="post" class="w-75 mx-auto">
                <div class="mb-3">
                    <label for="product_name" class="form-label small">Product Name</label>
                    <input type="text" class="form-control" id="product_name" name="product_name">
                </div>
        <div class="row mb-3">
            <div class="col-6">
                <label for="price" class="form-label small text-secondary">Price</label>
                    <div class="input-group mb-3">
                        <div class="input-group-text" id="price-tag">$</div>
                        <input type="number" name="price" id="price" class="form-control" step="any" aria-describedby="price-tag">
                    </div>
            </div>
            <div class="col-6">
                    <label for="quantity" class="form-label small">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity">
            </div>

         </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-info w-100" name="add_product">Add</button>
                </div>
            </form>

        </div>
      </div>
    </div>
</div>



<!--bootstrap script-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>