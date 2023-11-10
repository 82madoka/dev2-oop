<?php

require_once "Database.php";

//inherit the database class to user class
class user extends Database{

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
        header('location: ../views');
        exit;
    }

    public function getAllUsers(){
        $sql = "SELECT id, first_name, last_name, username, photo FROM users";

        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die('Error restrieving all users: ' . $this->conn->error);
        }
    }

    public function getUser($id){
        $sql = "SELECT * FROM users WHERE id = $id";

        if($result = $this->conn->query($sql)){
            return $result->fetch_assoc();
        }else{
            die('Error retrieving the user: ' . $this->conn->error);
        }
    }

    public function update($request, $files){
        session_start();
        $id = $_SESSION['id'];
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $username = $request['username'];
        $photo = $files['photo']['name'];
        $tmp_photo = $files['photo']['tmp_name'];

        $sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', username = '$username' WHERE id = $id";

        if($this->conn->query($sql)){
            $_SESSION['username'] = $username;
            $_SESSION['name'] = "$first_name $last_name";

            if($photo){//check if user is uploading photo
                $sql2 = "UPDATE `users` SET `photo` ='$photo' WHERE `id` = '$id'";

                if($this->conn->query($sql2)){
                    $destination = "../assets/images/$photo";
                    if(move_uploaded_file($tmp_photo, $destination)){
                        header('location: ../views/dashboard.php');
                        exit;
                    }else{
                        die("error saving the photo to folder");
                    }
                }else{
                    die('Error updating the photo');
                }

            }else{
                header('location: ../views/dashboard.php');
                exit;
            }

        }else{
            die('Error updating the user: '. $this->conn->error);
        }
    }

    public function delete(){
        session_start();
        $id = $_SESSION['id'];

        $sql = "DELETE FROM `users` WHERE `id` = $id";

        if($this->conn->query($sql)){
            $this->logout();
        }else{
            die('Error deleting your account: '.$this->conn->error);
        }
    }
}



?>