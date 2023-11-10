<?php

//class
class Book{
    //properties-variable inside a class
    //private, public, protected- modifiers

    private $variable1;
//private - cannot be used outside parent class
   
    public $variable2 = "initial value";
 //public - can be used outside parent class
    
    protected $variable3 = false;
//protected - similar to public but protected

    //methods-functions inside a class

    // private function displayTotal(){
    //     echo $this->variable1;
    //     //private method
    // }

    // public function getSum(){
    //     return $this->$variable1 + $this->variable2;
    //     //public
    // }

    // protected function isNotEmpty(){
    //     return $this->variable3;
    //     //protected
    // }

    //objects

    // private $title;
    // private $price;

    // //setters and getters
    // public function setTitle($new_title){
    //     $this->title = $new_title;
    // }

    public function getTitle(){
        return $this->title;
    }

    // //price
    // public function setPrice($new_price){
    //     $this->price = $new_price;
    // }

    public function getPrice(){
        return $this->price;
    }

    //method to set both title and price
    public function setValues($new_title, $new_price){
        $this->title = $new_title;
        $this->price = $new_price;
    }
    public function displayValues(){
        echo "Title: " .$this->getTitle();
        echo "Price: " .$this->getPrice();
    }

}

//outside of the class
//create an object
//instantiate the c;ass Book
// $book_obj = new Book;
// $book_obj->setTitle('Geology');
// echo "title has been set...<br>";
// echo "getting the title and display...<br>";
// echo $book_obj->getTitle();

//book 1
// $book_obj->setTitle('Algebra');
// $book_obj->setPrice(70);
// echo "Title: ".$book_obj->getTitle() . "<br>Price: ".$book_obj->getPrice(). "<br>";

//book 2
// $book_obj2 = new Book;
// $book_obj2->setTitle('Innumeracy');
// $book_obj2->setPrice(90);
// echo "Title: ".$book_obj2->getTitle(). "<br>Price: ".$book_obj2->getPrice(). "<br>";
















?>