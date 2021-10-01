<?php
require_once 'php/db_con.php';
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $query = mysqli_query($conn,"SELECT * FROM `masters_users` WHERE Email_Id = '$email' AND Password = '$pass' ORDER BY Users_Id DESC LIMIT 1");
    $query_result = mysqli_fetch_array($query);
    if(isset($query_result)){
        $_SESSION['User_Id'] = $query_result['User_Id'];
        header('location:dashboard.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>VH-21-04-Streak | Login</title>

    <link rel="shortcut icon" href="assets/img/favicon.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <h2 style="color:white" class="text-center">VH-21-04-Streak</h2>
                <div class="loginbox">
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Login</h1>
                            <p class="account-subtitle">Access to your dashboard</p>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label class="form-control-label">Email Address</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Password</label>
                                    <div class="pass-group">
                                        <input type="password" class="form-control pass-input" name="pass" required>
                                        <span class="fas fa-eye toggle-password"></span>
                                    </div>
                                </div>
                                <button class="btn btn-lg btn-block btn-primary" type="submit" name="login">Login</button>
                                <div class="text-center dont-have">Don't have an account yet? <a href="registration.php">Register</a></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

</html>