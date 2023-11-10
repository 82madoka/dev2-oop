<?php

include "../classes/User.php";

$user_obj = new User;

//login isset
if(isset($_POST['login'])){
    $user_obj->login($_POST);
}

//register isset
if(isset($_POST['register'])){
    $user_obj->register($_POST);
}

?>