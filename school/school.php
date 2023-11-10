<?php
class School{
  // given prices per unit
    private $price_unit_1 = 550;
    private $price_unit_2 = 630;
    private $price_unit_3 = 470;
    private $price_unit_4 = 501;

  // given prices for laboratory
    private $price_lab_1 = 3359;
    private $price_lab_2 = 4000;
    private $price_lab_3 = 2890;
    private $price_lab_4 = 3555;


    private $year;
    private $units;
    private $lab;

    public function __construct($new_year,$new_units,$new_lab){
      $this->year = $new_year;
      $this->units = $new_units;
      $this->lab = $new_lab;
    }
    private function getSubTotal()
    {
      $total_unit =0;
      if($this->year == "1st"){
        $total_unit = $this->units * $this->price_unit_1;
      }elseif($this->year == "2nd"){
        $total_unit = $this->units * $this->price_unit_2;
      }
      elseif($this->year == "3rd"){
        $total_unit = $this->units * $this->price_unit_3;
      }
      elseif($this->year == "4th"){
        $total_unit = $this->units * $this->price_unit_4;
      }

      return $total_unit;
    }

    private function getLaboratory()
    {
      $laboratory = 0;

      if($this->year == "1st"){
        $laboratory = $this->price_lab_1;
      }elseif($this->year == "2nd")
      {
        $laboratory = $this->price_lab_2;

      }
      elseif($this->year == "3rd"){

        $laboratory = $this->price_lab_3;
      }
      elseif($this->year == "4th"){

        $laboratory = $this->price_lab_4;
      }
      return $laboratory;
    }

    public function getTotalPrice()
    { 
      $total = 0;
      $sub_total = $this->getSubTotal();

      if($this->lab == "with_lab"){
        $total = $sub_total + $this->getLaboratory();
      }elseif($this->lab == "without_lab"){
        $total = $sub_total;
      }
      return $total;
    }

}


// public function getTotalprice(){

  


// }



?>

