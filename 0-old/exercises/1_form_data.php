<?php

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./style/style.css" />
  <title>Form Data</title>
</head>

<body>
  <header>
    <h1>Login||Signup System</h1>
  </header>
  <main>
    <div class="login-container">
      <h2>Login</h2>
      <form action="./pure_php/1_form_data_pure.php" method="post">
        <input type="text" name="in-username" id="" placeholder="Username" />
        <input
          type="password"
          name="in-password"
          id=""
          placeholder="Password" />
        <button type="submit">Login</button>
      </form>
    </div>
    <div class="signup-container">
      <h2>Signup</h2>
      <form action="" method="post">
        <input type="text" name="up-username" id="" placeholder="Username" />
        <input
          type="password"
          name="up-password"
          id=""
          placeholder="Password" />
        <input type="email" name="up-email" id="" placeholder="Email" />
        <button type="submit">Signup</button>
      </form>
    </div>
  </main>
  <footer></footer>
</body>

</html>