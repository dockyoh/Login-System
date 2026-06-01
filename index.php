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
    </header>
    <main>
        <div class="login-container">
            <h2>Login</h2>
            <form action="./pure-php/login-pure.php" method="post">
                <input type="email" name="email" id="" placeholder="Email">
                <input type="password" name="password" id="" placeholder="Password">
                <button type="submit">Login</button>
            </form>
        </div>
        <div class="signup-container">
            <h2>Signup</h2>
            <form action="./pure-php/signup-pure.php" method="post">
                <input type="text" name="username" id="" placeholder="Username">
                <input type="password" name="password" id="" placeholder="Password">
                <input type="password" name="passwordRepeat" id="" placeholder="Confirm Password">
                <input type="email" name="email" id="" placeholder="Email">
                <button type="submit">Signup</button>
            </form>
        </div>
    </main>
    <footer></footer>
</body>

</html>