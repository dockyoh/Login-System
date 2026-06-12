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
  <title>Update Product</title>
</head>

<body>
  <header>
    <h1>Update Product</h1>
    <nav class="nav-container">
      <ul>
        <li><a href="./dashboard.public.php">Dashboard</a></li>
        <li><a href="./addProduct.public.php">Add Product</a></li>
      </ul>
    </nav>
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
    <form action="" method="post">
      <div class="input-wrap">
        <label for="input-name">Name</label>
        <input
          type="text"
          name="productName"
          id="input-name"
          placeholder="<?= htmlspecialchars($_GET['productName']); ?>" />
      </div>

      <div class="input-wrap">
        <label for="input-price">Price</label>
        <input
          type="number"
          step="any"
          name="productPrice"
          id="input-price"
          placeholder="<?= htmlspecialchars($_GET['price']); ?>" />
      </div>

      <div class="input-wrap">
        <label for="input-quantity">Quantity</label>
        <input
          type="number"
          name="stockQuantity"
          id="input-quantity"
          placeholder="<?= htmlspecialchars($_GET['stockQuantity']); ?>" />
      </div>

      <div class="active-wrap">
        <label for="is-active">Is Active?</label>
        <select name="isActive" id="is-active">
          <option value="TRUE">Yes</option>
          <option value="FALSE">No</option>
        </select>
      </div>

      <button type="submit" class="add-button">Save</button>
    </form>
    <div class="errors-container">
      <p><?php
          $addView = new ProductView();
          $addView->showAddErros();
          echo $_GET['productId'];
          ?></p>
    </div>
  </main>
  <footer></footer>
</body>

</html>