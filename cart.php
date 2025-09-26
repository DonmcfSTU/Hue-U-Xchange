<?php
session_start();

// Start or initialize cart
if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
}

// Handle adding items to cart
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['product_id'];
  $qty = (int) $_POST['quantity'];

  if (isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id] += $qty;
  } else {
    $_SESSION['cart'][$id] = $qty;
  }
}

// Define product catalog
$products = [
  ["id" => 1, "name" => "Divine Hoodie", "price" => 44, "desc" => "Wrap yourself in warmth and worth."],
  ["id" => 2, "name" => "Aura Oils", "price" => 22, "desc" => "Align your frequency with intention."],
  ["id" => 3, "name" => "Ritual Kit", "price" => 33, "desc" => "Tools for transformation."],
  ["id" => 4, "name" => "Music EP", "price" => 11, "desc" => "Sonic guidance from the Lightbearer archives."],
  ["id" => 5, "name" => "Access Code", "price" => 55, "desc" => "Unlock inner sanctums of self-awareness."]
];

// Helper to find a product by ID
function getProductById($products, $id) {
  foreach ($products as $product) {
    if ($product['id'] == $id) {
      return $product;
    }
  }
  return null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Your Cart - Hue U Xchange</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    <nav>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="offerings.php">Offerings</a></li>
        <li><a href="cart.php">Cart</a></li>
        <li><a href="about.html">About</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section class="intro">
      <h1>Your Cart</h1>

      <?php if (empty($_SESSION['cart'])): ?>
        <p>Your cart is empty. <a href="offerings.php">Browse offerings</a>.</p>
      <?php else: ?>
        <?php
          $total = 0;
          foreach ($_SESSION['cart'] as $id => $qty):
            $product = getProductById($products, $id);
            if (!$product) continue;
            $subtotal = $product['price'] * $qty;
            $total += $subtotal;
        ?>
          <div class="product">
            <h2><?= htmlspecialchars($product['name']) ?></h2>
            <p>Quantity: <?= $qty ?></p>
            <p>Subtotal: $<?= number_format($subtotal, 2) ?></p>
          </div>
        <?php endforeach; ?>

        <h3><strong>Total: $<?= number_format($total, 2) ?></strong></h3>

        <a href="checkout.php" class="cta-button">Proceed to Checkout</a>
      <?php endif; ?>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 Hue U Xchange</p>
  </footer>
</body>
</html>
