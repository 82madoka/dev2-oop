<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<!--login-->
<div class="container mt-5">
    <div class="card border-0 mx-auto w-50">
        <div class="card-header border-0 bg-white mt-5">
            <h1 class="display-4 fw-bold text-center text-primary">
                Login <i class="fa-solid fa-right-to-bracket"></i>
            </h1>
        </div>
        <div class="card-body">
            <form action="../actions/user-actions.php" method="post" class="w-75 mx-auto">
                <div class="mb-3">
                    <label for="username" class="form-label small">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label small">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100" name="login">Login</button>
                </div>
                <div class="mb-3 text-center">
                    <!--register modal button-->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger mx-auto" data-bs-toggle="modal" data-bs-target="#registerModal">
                     Create an account
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>









<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header border-0">
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>        
      </div>
      <div class="modal-body p-5">
        <h1 class="display-4 fw-bold text-danger text-center">
            <i class="fa-solid fa-user-plus me-1"></i>Registration
        </h1>
        <form action="../actions/user-actions.php" method="post" class="w-75 mx-auto pt-4 p-5">
          <div class="row mb-3">
            <div class="col-6">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" name="first_name" id="first_name" >
            </div>
            <div class="col-6">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="last_name" >
            </div>
          </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" >
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" >
            </div>
            <button type="submit" class="btn btn-danger w-100" name="register">Register</button>
        </form>
      </div>
      
    </div>
  </div>
</div>



    
<!--bootstrap script-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>