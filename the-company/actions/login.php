<?php

include "../classes/user.php";

//instantiate
$user_obj = new User;

//call method login
$user_obj->login($_POST);




?>