<?php
include "Book.php";

if(isset($_POST['btn_submit'])){
    $title = $_POST['title'];
    $price = $_POST['price'];

    //instantiate the class Book
    $book_obj = new Book;

    //set both values
    $book_obj->setValues($title,$price);

    echo "one by one<br>";

    //display values one by one
    echo "Title: " .$book_obj->title;
    echo "<br>Price: " .$book_obj->price;

    echo "<hr>same time";

    //display both at the same time
    $book_obj->displayValues();
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
</head>
<body>

<form action="#" method="post">
    <label for="">Title</label>
    <input type="text" name="title" id="title"> <br>

    <label for="">price</label>
    <input type="text" name="price" id="price"> <br>

    <button type="submit" name="btn_submit">Submit</button>
</form>
    
</body>
</html>