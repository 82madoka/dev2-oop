<?php
class Employee{

    private $civil_status;
    private $position;
    private $employment_status;
    private $regular_hours;
    private $ot_hours;

    public function __construct($n_civil_status, $n_position, $n_employment_status, $n_regular_hours, $n_ot_hours){
        $this->civil_status = $n_civil_status;
        $this->position = $n_position;
        $this->employment_status = $n_employment_status;
        $this->regular_hours = $n_regular_hours;
        $this->ot_hours = $n_ot_hours;

    }

    public function getRegularRate(){
        $position = $this->position;
        $employment_status = $this->employment_status;

        //check if position is staff or admin
        if($position == "Staff"){
            //check employeement status
            if($employment_status == "Contractual"){
                return 300;

            }elseif($employment_status == "Probationary"){
                return 350;

            }elseif($employment_status == "Regular"){
                return 400;

            }

        }elseif($position == "Admin"){
            //check employeement status
            if($employment_status == "Contractual"){
                return 350;

            }elseif($employment_status == "Probationary"){
                return 400;

            }elseif($employment_status == "Regular"){
                return 500;

            }

        }
    }
    public function getOTRate(){


        $position = $this->position;
        $employment_status = $this->employment_status;

        //check if position is staff or admin
        if($position == "Staff"){
            //check employeement status
            if($employment_status == "Contractual"){
                return 10;

            }elseif($employment_status == "Probationary"){
                return 25;

            }elseif($employment_status == "Regular"){
                return 30;

            }

        }elseif($position == "Admin"){
            //check employeement status
            if($employment_status == "Contractual"){
                return 15;

            }elseif($employment_status == "Probationary"){
                return 30;

            }elseif($employment_status == "Regular"){
                return 40;

            }

        }
    }

    
    public function getRegularPay(){

        $regular_hours = $this->regular_hours;
        return $regular_hours * ($this->getRegularRate() / 8); 
        //PEMDAS / MDAS
        //1 - parentheses
        //2 - exponents
        //3 - multiplication
        //4 - division
        //5 - addition
        //6 - subtraction
    }
    public function getOTPay(){
        $ot_hours = $this->ot_hours;
        return $ot_hours * $this->getOTRate();
    }
    public function getGrossIncome(){
        return $this->getRegularPay() + $this->getOTPay();
    }

    public function getHealthcare(){
        if($this->civil_status == "Single"){
            return 200;
        }else{
            return 75;
        }
    }
    public function getTax(){
        $gross_income = $this->getGrossIncome();
        $civil_status = $this->civil_status;

        //check if single and > 1000
        if($civil_status == "Single" && $gross_income > 1000){
            return ($gross_income * 0.05);

        }
        //check if married and > 1500
        elseif($civil_status == "Married" && $gross_income > 1500){
            return ($gross_income * 0.03);
        }
        //else 0
        else{
            return 0;
        }
    }
    public function getNetIncome(){
        return $this->getGrossIncome() - ($this->getTax() + $this->getHealthcare());
    }
}


?>