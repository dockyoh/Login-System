<?php
$message = "";

if (isset($_POST['favGame'])) {
    $favGame = $_POST['favGame'];
    $message = "Wow! $favGame is a fantastic game!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST</title>
</head>

<body>
    <header>
        <h1>TEST</h1>
    </header>
    <main>
        <form action="" method="post">
            <label for="input1">Fav Game</label>
            <input type="text" name="favGame" id="input1">
            <button type="submit">Submit</button>
        </form>

        <?php if ($message !== ""): ?>
            <h1><?php echo $message ?></h1>
        <?php endif; ?>
    </main>
    <footer></footer>
</body>

</html>