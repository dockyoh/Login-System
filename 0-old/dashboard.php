<?php
session_start();

if (!isset($_SESSION['last_regeneration'])) {
    header('Location: index.php');
    die();
} else {
    echo "Welcome " .  $_SESSION['welcome_user'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <header>
        <h1>DASHBOARD</h1>
    </header>
    <main>
        <form action="./pure-php/logout-pure.php" method="post">
            <button type="submit" name="logout">Logout</button>
        </form>
    </main>
    <footer></footer>
</body>

</html>