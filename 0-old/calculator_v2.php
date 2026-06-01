<?php
$total = 0;
$isFormsubmitted = false;

if (isset($_POST['num1']) && isset($_POST['num2'])) {
    echo "isset";
    if (!empty($_POST['num1']) || !empty($_POST['num2'])) {
        $total = $_POST['num1'] + $_POST['num2'];
        $isFormsubmitted = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator V2</title>
</head>

<body>
    <header>
        <h1>Calculator V2</h1>
    </header>
    <main>

        <?php if ($isFormsubmitted): ?>
            <h1><?php echo "The total is $total"; ?></h1>
            <?php echo $_POST['num1']; ?>
        <?php endif; ?>

        <form action="" method="post">
            <label for="input1">Num 1</label>
            <input type="number" name="num1" id="input1">
            <label for="input2">Num 2</label>
            <input type="number" name="num2" id="input2">
            <button type="submit">=</button>
        </form>
    </main>
    <footer></footer>
</body>

</html>