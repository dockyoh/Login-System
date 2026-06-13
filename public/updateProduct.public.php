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
    <form action="../pure/update.pure.php" method="post">
      <input type="hidden" name="productId" value="<?= htmlspecialchars($_GET['productId']) ?>>">
      <div class="input-wrap">
        <label for="input-name">Name</label>
        <input
          type="text"
          name="productName"
          id="input-name"

          value="<?= htmlspecialchars($_GET['productName']); ?>" />
      </div>

      <div class="input-wrap">
        <label for="input-price">Price</label>
        <input
          type="number"
          step="any"
          name="productPrice"
          id="input-price"
          value="<?= htmlspecialchars($_GET['price']); ?>" />
      </div>

      <div class="input-wrap">
        <label for="input-quantity">Quantity</label>
        <input
          type="number"
          name="stockQuantity"
          id="input-quantity"
          value="<?= htmlspecialchars($_GET['stockQuantity']); ?>" />
      </div>

      <div class="active-wrap">
        <label for="is-active">Is Active?</label>
        <select name="isActive" id="is-active">
          <?php if ($_GET['isActive'] === '1'): ?>
            <option value="<?= htmlspecialchars($_GET['isActive']); ?>">Yes</option>
            <option value="FALSE">No</option>
          <?php else: ?>
            <option value="<?= htmlspecialchars($_GET['isActive']); ?>">No</option>
            <option value="TRUE">Yes</option>
          <?php endif; ?>
        </select>
      </div>

      <button type="submit" class="update-button" name="updateButton">Save</button>
    </form>
    <div class="errors-container">
      <p><?php
          $addView = new ProductView();
          $addView->showAddErros();
          ?></p>
    </div>
  </main>
  <footer></footer>
</body>

</html>