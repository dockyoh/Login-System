<?php
session_start();

if (!isset($_SESSION['isLogedin'])) {
  header('Location: ../index.php');
  die();
}

require_once '../pure/classAutoLoader.pure.php';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../style/addProduct.css" />
  <title>Add Product</title>
</head>

<body>
  <header>
    <h1>Add Product</h1>
    <div class="logout-container">
      <p>
        <?php
        $loginView = new LoginView();
        $loginView->showLogUser();
        ?>
      </p>
      <form action="../pure/logout.pure.php" method="post">
        <button type="submit">Logout</button>
      </form>
    </div>
  </header>
  <main>
    <form action="../pure/add.pure.php" method="post">
      <div class="input-wrap">
        <label for="input-name">Name:</label>
        <input
          type="text"
          name="productName"
          id="input-name"
          placeholder="Product Name" />
      </div>

      <div class="input-wrap">
        <label for="input-price">Price:</label>
        <input
          type="number"
          step="any"
          name="productPrice"
          id="input-price"
          placeholder="0.00" />
      </div>

      <div class="input-wrap">
        <label for="input-quantity">Quantity:</label>
        <input
          type="number"
          name="stockQuantity"
          id="input-quantity"
          placeholder="0" />
      </div>

      <button type="submit" class="add-button">ADD</button>
    </form>
    <div class="errors-container">
      <p><?php
          $addView = new AddView();
          $addView->showAddErros();
          ?></p>
    </div>
  </main>
  <footer></footer>
</body>

</html>