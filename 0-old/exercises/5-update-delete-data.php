<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <title>Update Delete Data</title>
</head>

<body>
    <header>
        <h1>Update Delete Data</h1>
    </header>
    <main>
        <div class="login-container">
            <h2>Update</h2>
            <form action="./pure_php/5-update-data-pure.php" method="post">
                <input type="text" name="username" id="" placeholder="Username" />
                <input
                    type="password"
                    name="password"
                    id=""
                    placeholder="Password" />
                <input type="email" name="email" id="" placeholder="Email" />
                <button type="submit">Update</button>
            </form>
        </div>
        <div class="signup-container">
            <h2>Delete</h2>
            <form action="./pure_php/5-delete-data-pure.php" method="post">
                <input type="text" name="username" id="" placeholder="Username" />
                <input
                    type="password"
                    name="password"
                    id=""
                    placeholder="Password" />
                <input type="email" name="email" id="" placeholder="Email" />
                <button type="submit">Delete</button>
            </form>
        </div>
    </main>
    <footer></footer>
</body>

</html>