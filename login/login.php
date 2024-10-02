<?php
include "db.php";
session_start();
$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];
    

    if ($user && password_verify($inputPassword, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        header("Location: index.php"); 
        exit;
    } else {
        $errorMessage = "Invalid username or password";
    }
}

if(isset($_POST['logout'])){
    session_start();
    session_destroy(); // Destroy the session
    header("Location: login.php"); // Redirect to login page
    exit;
}


?>




<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form Recaptcha v2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body class="d-flex align-items-center justify-content-center" style="height: 100vh;">

    <div class="container mt-5">
        <form action="" method="POST" id="loginForm">
            <div class="row mt-5">
                <h1 class="fs-1 text-center">Login</h1>
            </div>

            <?php if ($errorMessage): ?>
            <div class="row mt-3">
                <div class="col-3 d-flex justify-content-center">
                    <div class="alert alert-danger"><?php echo htmlspecialchars($errorMessage); ?></div>
                </div>
            </div>
            <?php endif; ?>

            <div class="row d-flex justify-content-center mt-1">
                <div class="col-3">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
                        <label for="username">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                        <label for="password">Password</label>
                    </div>
                </div>
            </div>
            <!--
            <div class="row d-flex justify-content-center mt-3">
                <div class="g-recaptcha d-flex justify-content-center" data-sitekey="YOUR_SITE_KEY"></div>
            </div>
            -->
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-3 d-flex justify-content-center">
                    <button class="btn btn-primary" type="submit">Login</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
