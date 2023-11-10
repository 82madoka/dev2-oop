<?php

require_once "Database.php";

class Product extends Database{
    public function displayProducts(){
        $sql = "SELECT * FROM `products`";

        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die("Error selecting products: ".$this->conn->error);
        }
    }

    public function addProduct($request){
        $product_name = $request['product_name'];
        $price = $request['price'];
        $quantity = $request['quantity'];

        $sql = "INSERT INTO products (`product_name`, `price`, `quantity`)VALUES('$product_name', '$price', '$quantity')";

        if($this->conn->query($sql)){
            header("location: ../views/dashboard.php");
            exit;
        }else{
            die("Error in Adding: ". $this->conn->error);
        }
    }

    public function displaySpecificProduct($product_id){
        $sql = "SELECT * FROM products WHERE `id`= '$product_id'";

        if($result = $this->conn->query($sql)){
            return $result->fetch_assoc();
        }else{
            die('Error in retrieving Product: ' . $this->conn->error);
        }
    }

    public function updateProduct($product_id, $request){
        $product_name = $request['product_name'];
        $price = $request['price'];
        $quantity = $request['quantity'];

        $sql = "UPDATE `products` SET `product_name` = '$product_name', `price` = '$price', `quantity`= '$quantity' WHERE `id` = '$product_id'";

        if($this->conn->query($sql)){
            header("location: ../views/dashboard.php");
            exit;
        }else{
            die("Error in editing product: ".$this->conn->error);
        }
    }
        public function deleteProduct($product_id){
            $sql = "DELETE FROM `products` WHERE `id` = '$product_id'";

            if($this->conn->query($sql)){
                header("location: ../views/dashboard.php");
                exit;
            }else{
                die("Error in deleting product: ".$this->conn->error);
            }
        }

        public function adjustStock($product_id,$request){

            $buy_quantity = $request['buy_quantity'];

            $sql = "UPDATE `products` SET `quantity` = `quantity` - '$buy_quantity' WHERE `id` = '$product_id'";

            if($this->conn->query($sql)){
                header("location: ../views/dashboard.php");
                exit;
            }else{
                die("Error in adjusting stock: ".$this->conn->error);
            }
        }
    
    

}




?>