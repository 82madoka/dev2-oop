<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="bg-light">

    <div style="height: 100vh;">
        <div class="row h-100 m-0">
            <div class="card w-25 my-auto mx-auto">
                <div class="card-header bg-white border-0 py-3">
                    <h1 class="text-center">Login</h1>
                </div>
                <div class="card-body">
                    <form action="../actions/login.php" method="post">
                        <!--going inside actions folder register file-->
                        <div class="mb-3">
                            <label for="username" class="form-label">User Name</label>
                            <input type="text" name="username" maxlenbgth="15" id="username"
                                class="form-control fw-bold" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required
                                aria-describedby="password-info" minlength="8">
                            <div class="form-text" id="password-info">
                                Password must be at least 8 characters
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                    <p class="text-center mt-3 small">
                        Not yet registered? <a href="../views/register.php">Resister</a>
                    </p>
                </div>
            </div>
        </div>

    </div>


</body>


</html>