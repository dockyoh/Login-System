<?php
session_start();

if (!isset($_SESSION["todos"])) {
    $_SESSION["todos"] = [];
}

if (isset($_POST["newItem"]) && isset($_POST["newItem"]) !== "") {
    $_SESSION["todos"][] = $_POST["newItem"];
}

if (isset($_POST["clear_all"])) {
    $_SESSION["todos"] = [];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if (true): ?>
        <form action="" method="post">
            <label for="todos">Add Todos</label>
            <input type="text" name="newItem" id="todos" placeholder="Add task">
            <button type="submit">Submit</button>
            <button type="submit" name="clear_all">Clear All Task</button>
        </form>

        <ul>
            <?php foreach ($_SESSION["todos"] as $todo): ?>
                <li><?php $todo; ?></li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>
</body>

</html>