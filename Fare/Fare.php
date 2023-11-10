<?php

class Fare{
    private $age;
    private $distance;

    //constractor　method
    public function __construct($new_age,$new_distance){
        $this->age = $new_age;
        $this->distance = $new_distance;
    }

    //methods
    public function getAdditionalFare($distance){
       $fare = 8;

       if($distance > 4){
        $fare += $distance - 4; //$fare = $fare + $distance - 4
       }

       return $fare;

    }

    public function getFareDiscount($sub_total){
        return $sub_total * .8; //100 - 20 = 80

    }

    public function getTotalFare(){

        $sub_total = $this->getAdditionalFare($this->distance);

        if($this->age >=60){
            return $this->getFareDiscount($sub_total);
        }else{
            return $sub_total;
        }

    }
}

?>