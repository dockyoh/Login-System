<?php
$products = [
    "keyboard" => 75,
    "mouse" => 50,
    "monitor" => 150,
    "headphone" => 100,
];
if (isset($_GET['budget'])) {
    $myBudget = $_GET['budget'];

    echo "My budget " . $myBudget . "</br>";

    foreach ($products as $name => $price) {
        if ($myBudget >= $price) {
            echo "$name cost $price --> You can afford this!</br>";
        } else {
            echo "$name cost $price --> Too expensive!</br>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUDGET</title>
</head>

<body>
    <form action="" method="get">
        <input type="number" name="budget">
        <button type="submit">Shop</button>
    </form>

</body>

</html>