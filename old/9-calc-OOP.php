<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>

<body>
    <header>
        <h1>Calculator</h1>
    </header>
    <main>
        <form action="pure/9-calc-pure.php" method="post">
            <label for="num1">Number 1</label>
            <input type="number" step="any" name="num1" id="num1">

            <select name="operators" id="">
                <option value="add">+</option>
                <option value="sub">-</option>
                <option value="mul">*</option>
                <option value="div">/</option>
            </select>

            <label for="num2">Number 2</label>
            <input type="number" step="any" name="num2" id="num2">

            <button type="submit">Calculate</button>
        </form>
    </main>
    <footer></footer>
</body>

</html>