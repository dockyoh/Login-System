<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Fullstack Website</title>
</head>

<body>
    <header>
        <h1>Fullstack Website</h1>
    </header>
    <main>
        <?php if (true) { ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="number" name="num1" placeholder="number 1">
                <select name="operators">
                    <option value="add">+</option>
                    <option value="subtract">-</option>
                    <option value="multiply">*</option>
                    <option value="divide">/</option>
                </select>
                <input type="number" name="num2" placeholder="number 2">
                <button type="submit">Calculate</button>
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $num1 = filter_input(INPUT_POST, "num1", FILTER_SANITIZE_NUMBER_FLOAT);
                $num2 = filter_input(INPUT_POST, "num2", FILTER_SANITIZE_NUMBER_FLOAT);
                $operators = htmlspecialchars($_POST["operators"]);

                $errors = false;

                if (empty($num1) || empty($num2) || empty($operators)) {
                    echo "<p>Please fill all the input field</p>";
                    $errors = true;
                }
                if (!is_numeric($num1) || !is_numeric($num2)) {
                    echo "<p>Please input anumber</p>";
                    $errors = true;
                }
                if (!$errors) {
                    $result = 0;
                    $operator = "";
                    switch ($operators) {
                        case 'add':
                            $result = $num1 + $num2;
                            $operator = "+";
                            break;
                        case 'subtract':
                            $result = $num1 - $num2;
                            $operator = "-";
                            break;
                        case 'multiply':
                            $result = $num1 * $num2;
                            $operator = "*";
                            break;
                        case 'divide':
                            $result = $num1 / $num2;
                            $operator = "/";
                            break;
                        default:
                            echo "<p>Something went wrong</p>";
                            break;
                    }
                    echo "<p>$num1 $operator $num2 = $result</p>";
                }
            }
            ?>
        <?php } ?>
    </main>
    <footer></footer>
</body>

</html>