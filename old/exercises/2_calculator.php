<?php
echo $_SERVER["PHP_SELF"];
echo "</br>";
echo $_SERVER["REQUEST_METHOD"];
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./style/style.css" />
  <title>Calculator</title>
</head>

<body>
  <header>
    <h1>Calculator</h1>
  </header>
  <main>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <label for="num1">Number 1</label>
      <input type="number" name="num1" id="num1">

      <select name="operators" id="">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
      </select>

      <label for="num2">Number 2</label>
      <input type="number" name="num2" id="num2">

      <button type="submit">Calculate</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $errors = false;

      $num1 = filter_input(INPUT_POST, "num1", FILTER_SANITIZE_NUMBER_FLOAT);
      $num2 = filter_input(INPUT_POST, "num2", FILTER_SANITIZE_NUMBER_FLOAT);
      $operator = htmlspecialchars($_POST["operators"]);

      if (!is_numeric($num1) || !is_numeric($num2)) {
        $errors = true;
        echo "PLEASE ENTER A VALID NUMBER </br>";
      }

      if (empty($num1) || empty($num2)) {
        $errors = true;
        echo "PLEASE FILL ALL THE INPUT";
      }

      if (!$errors) {
        $result = 0;
        switch ($operator) {
          case "+":
            $result = $num1 + $num2;
            break;
          case "-":
            $result = $num1 - $num2;
            break;
          case "*":
            $result = $num1 * $num2;
            break;
          case "/":
            $result = $num1 / $num2;
            break;
          default:
            echo "FAILED TO CALCULATE!";
        }
        echo "$num1 $operator $num2 = $result";
      }
    } else {
      echo "PLEASE USE THE FORM!";
    }
    ?>
  </main>
  <footer></footer>
</body>

</html>