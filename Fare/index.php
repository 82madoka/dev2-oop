<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fare Activity</title>
</head>
<body>

<form action="#" method="post">
    <label for="age">Age</label>
    <input type="text" name="age" id="age" placeholder="Age"> <br>

    <label for="distance">Distance</label>
    <input type="text" name="distance" id="distance" placeholder="Distance (km)"> <br>

    <button class="submit" name="btn_submit">Submit</button>
</form>
    
</body>
</html>


<?php
  include "Fare.php";

  if(isset($_POST['btn_submit'])){
    $age = $_POST['age'];
    $distance = $_POST['distance'];

    //instantiate class Fare with constructor
    $fare_obj = new Fare($age,$distance);

    //display the total fare
    echo "The fare is " . $fare_obj->getTotalfare();

  }


?>