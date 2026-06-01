<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <title>Document</title>
</head>

<body>
    <header>
        <h1>Signup System</h1>
    </header>
    <main>
        <div class="signup-container">
            <h2>Signup</h2>
            <form action="./4-insert-data-pure.php" method="post">
                <input type="text" name="upUsername" id="" placeholder="Username">
                <input type="password" name="upPassword" id="" placeholder="Password">
                <input type="email" name="upEmail" id="" placeholder="Email">
                <button type="submit">Signup</button>
            </form>
        </div>
    </main>
    <footer></footer>
</body>

</html>