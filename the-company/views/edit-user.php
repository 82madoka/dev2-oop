<?php
session_start();
require "../classes/User.php";

$user_obj = new User;
$user = $user_obj->getUser($_SESSION['id']);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <?php include "main_nav.php" ?>

    <main class="row justify-content-center gx-0">
        <div class="col-4">
            <h2 class="text-center">USER LIST</h2>

            <form action="../actions/edit-user.php" method="post" enctype="multipart/form-data">
            <div class="row justify-content-center mb-3">  
              <div class="col-6">
                    <?php
                    if($user['photo']){    
                    ?>
                    <img src="../assets/images/<?= $user['photo'] ?>" alt="<?=$user['username']?>" class="d-block mx-auto edit-photo">
                    <?php
                    }else{
                    ?>
                     <i class="fa-solid fa-user text-secondary d-block text-center edit-icon"></i>
                     <?php
                     }
                     ?>

                     <input type="file" name="photo" class="form-control mt-2" accept="image/*">
                </div>
            </div>
            
            <div class="mb-3">
                <label for="first-name" class="form-label">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control" value="<?= $user['first_name']?>" required autofocus>
            </div>

            <div class="mb-3">
                <label for="last-name" class="form-label">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control" value="<?= $user['last_name']?>" required>
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control fw-bold" value="<?= $user['username']?>" maxlength="15" required>
            </div>

            <div class="text-end">
                <a href="dashboard.php" class="btn btn-secondary btn-sm">Cancel</a>
                <button type="submit" class="btn btn-warning btn-sm px-5">Save</button>
            </div>
            </form>
        </div>
    </main>
</body>
</html>