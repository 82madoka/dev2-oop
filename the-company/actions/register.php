<?php

include "../classes/User.php";

//instantiate user class
$user_obj = new User;

//call the method
// print_r($_POST);
$user_obj->register($_POST);

?>