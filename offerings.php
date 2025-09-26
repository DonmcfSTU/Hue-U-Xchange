<?php
$products = [
  ["id" => 1, "name" => "Divine Hoodie", "price" => 44, "desc" => "Wrap yourself in warmth and worth."],
  ["id" => 2, "name" => "Aura Oils", "price" => 22, "desc" => "Align your frequency with intention."],
  ["id" => 3, "name" => "Ritual Kit", "price" => 33, "desc" => "Tools for transformation."],
  ["id" => 4, "name" => "Music EP", "price" => 11, "desc" => "Sonic guidance from the Lightbearer archives."],
  ["id" => 5, "name" => "Access Code", "price" => 55, "desc" => "Unlock inner sanctums of self-awareness."]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Offerings - Hue U Xchange</title>
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
      <h1>Choose Your Symbolic Offering</h1>
      <p class="tagline">Each item is a tool of transformation for your journey from shadow to light.</p>

      <?php foreach ($products as $product): ?>
        <div class="product">
          <h2><?= $product['name'] ?></h2>
          <p><?= $product['desc'] ?></p>
          <p><strong>$<?= $product['price'] ?></strong></p>
          <form action="cart.php" method="POST">
            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
            <label>Qty:
              <input type="number" name="quantity" value="1" min="1" style="width: 50px;">
            </label>
            <button type="submit">Add to Cart</button>
          </form>
        </div>
        <hr>
      <?php endforeach; ?>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 Hue U Xchange</p>
  </footer>
</body>
</html>

