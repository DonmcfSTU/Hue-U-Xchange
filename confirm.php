<?php
session_start();

// Get name safely
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : 'Lightbearer';

// Clear the session cart
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Confirmation - Hue U Xchange</title>
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
      <h1>Welcome, <?= $name ?>.</h1>
      <p>You are now a <strong>Certified Light Carrier</strong>.</p>
      <p>The portal recognizes your signature and your offerings.</p>
      <p>Thank you for stepping into the light. <a href="index.html">Return Home</a>.</p>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 Hue U Xchange</p>
  </footer>
</body>
</html>
