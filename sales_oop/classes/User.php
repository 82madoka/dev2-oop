<?php

require_once "Database.php";

class User extends Database{
    public function register($request){
        // print_r($request);
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $username = $request['username'];
        $password = $request['password'];

        $password = password_hash($password,PASSWORD_DEFAULT);

        $sql = "INSERT INTO `users` (`first_name`,`last_name`, `username`, `password`)
        VALUES('$first_name', '$last_name', '$username', '$password')";

        if($this->conn->query($sql)){
            header('location: ../views');
            exit;
        }else{
            die("Error registering the user: ".$this->conn->error);
        }

    }
    public function login($request){
        // print_r($request);
        $username = $request['username'];
        $password = $request['password'];

        //sql command
        $sql = "SELECT * FROM `users` WHERE `username` = '$username'";
        if($result = $this->conn->query($sql)){
            // check if username exists
            if($result->num_rows == 1){
                $user = $result->fetch_assoc(); // associative array
                if(password_verify($password,$user['password'])){
                    // password_verify(a,b)
                    // a - password plain (from the form plain text)
                    // b - hash text from db
                    session_start();
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['name'] = $user['first_name']. " ". $user['last_name'];
                    header('location: ../views/dashboard.php'); // goto dashboard.php
                    exit;
                }else{
                    die("Password is incorrect");
                }
            }else{
                die("Username not found");
            }
        }else{
            die("Error selecting user from the database: ".
            $this->conn->error);
        }
    }

    public function logout(){
        session_start();
        session_unset();
        session_destroy();

        header("location: ../views");
        exit;
    }

}




?>