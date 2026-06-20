<?php
session_start();

require_once '../pure/classAutoLoader.pure.php';

if (!isset($_SESSION['isLogedin'])) {
  header('Location: ../index.html');
  die();
}

$productView = new ProductView();
$products = $productView->viewProducts();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../style/dashboard.css" />
  <title>Dashboard</title>
</head>

<body>
  <header>
    <h1>Dashboard</h1>
    <nav>
      <ul>
        <li><a href="./addProduct.public.php">Add Product</a></li>
      </ul>
    </nav>
    <div class="logout-container">
      <p href="" class="user-profile">
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
    <section class="product-section">
      <ul class="product-list">
        <div class="product_column-title">
          <p>Name</p>
          <p>Price</p>
          <p>Quantity</p>
          <p>Active</p>
          <p>Date Created</p>
        </div>
        <?php foreach ($products as $product): ?>
          <li class="product-item">
            <article class="product-card">
              <p><?= htmlspecialchars($product['product_name']); ?></p>
              <p><?= htmlspecialchars($product['price']); ?></p>
              <p><?= htmlspecialchars($product['stock_quantity']); ?></p>
              <p><?= htmlspecialchars($product['is_active']); ?></p>
              <p><?= htmlspecialchars($product['created_at']); ?></p>
            </article>
            <!-- DLETE BUTTON -->
            <form action="../pure/delete.pure.php" method="post">
              <input type="hidden" name="productId" value="<?= htmlspecialchars($product['product_id']); ?>">
              <button type="submit" name="deleteBtn">Delete</button>
            </form>
            <!-- UPDATE BUTTON -->
            <form action="updateProduct.public.php" method="get">
              <input type="hidden" name="productId" value="<?= htmlspecialchars($product['product_id']); ?>">
              <input type="hidden" name="productName" value="<?= htmlspecialchars($product['product_name']); ?>">
              <input type="hidden" name="price" value="<?= htmlspecialchars($product['price']); ?>">
              <input type="hidden" name="stockQuantity" value="<?= htmlspecialchars($product['stock_quantity']); ?>">
              <input type="hidden" name="isActive" value="<?= htmlspecialchars($product['is_active']); ?>">
              <button type="submit" name="updateBtn">Update</button>
            </form>
          </li>
        <?php endforeach; ?>
      </ul>
    </section>
  </main>
  <footer></footer>
</body>

</html>