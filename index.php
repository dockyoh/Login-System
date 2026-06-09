<?php
require_once './pure/classAutoLoader.pure.php';
$signupView = new SignupView();
$loginView = new LoginView();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <title>Login-Signup System</title>
</head>

<body>
    <header>
        <h1>Login-Signup System</h1>
        <!-- SHOW LOGED USER -->
        <div class="logout-profile-container">
            <p><?php $signupView->showSignupUser();
                $loginView->showLogUser() ?></p>
            <form action="./pure/logout.pure.php" method="post">
                <button type="submit">Logout</button>
            </form>
        </div>
    </header>
    <main>
        <!-- LOGIN -->
        <div class="login-container">
            <h2>Login</h2>
            <form action="./pure/login.pure.php" method="post">
                <input type="email" name="email" id="" placeholder="Email">
                <input type="password" name="password" id="" placeholder="Password">
                <button type="submit">Login</button>
            </form>
        </div>
        <!-- LOGOUT -->
        <div class="signup-container">
            <h2>Signup</h2>
            <form action="./pure/signup.pure.php" method="post">
                <input type="text" name="username" id="" placeholder="Username">
                <input type="password" name="password" id="" placeholder="Password">
                <input type="password" name="confirmPassword" id="" placeholder="Confirm Password">
                <input type="email" name="email" id="" placeholder="Email">
                <button type="submit">Signup</button>
            </form>
            <?php
            // SHOW ERRORS
            $signupView->showSignupErrors();
            $loginView->showLogErrors();
            ?>
        </div>
    </main>
    <footer></footer>
</body>

</html>