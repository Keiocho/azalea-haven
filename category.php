<?php
include 'db_connect.php';

$category = isset($_GET['type']) ? mysqli_real_escape_string($conn, $_GET['type']) : '';
$sql = "SELECT * FROM Products WHERE category = '$category'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title><?= strtoupper(htmlspecialchars($category)) ?> PRODUCTS</title>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&family=EB+Garamond&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'EB Garamond', serif;
      padding: 40px 20px;
      background-color: #f9f9f7;
      text-transform: uppercase;
    }

    h2 {
      font-family: 'Cinzel', serif;
      text-align: center;
      font-size: 2.2em;
      font-weight: bold;
      margin-bottom: 40px;
    }

    .products {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 30px;
      justify-content: center;
      max-width: 1200px;
      margin: 0 auto;
    }

    .product-card {
      background: none;
      border-radius: 12px;
      overflow: hidden;
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .product-card:hover {
      transform: translateY(-5px);
      box-shadow: 0px 6px 18px rgba(0,0,0,0.12);
    }

    .product-card img {
      width: 100%;
      height: 260px;
      object-fit: cover;
      display: block;
      border-bottom: 8px solid white;
    }

    .product-card h3 {
      font-size: 1em;
      font-weight: bold;
      margin: 10px 0 5px;
    }

    .product-card p {
      font-size: 0.7em;
      margin: 5px 10px;
    }

    .product-card strong {
      font-size: 0.9em;
      display: block;
      margin: 10px 0 5px;
    }
  </style>
</head>
<body>

<h2><?= strtoupper(htmlspecialchars($category)) ?> PRODUCTS</h2>
<div class="products">
  <?php if (mysqli_num_rows($result) > 0): ?>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <?php
        $img = 'placeholder.jpg';
        if ($row['name'] === 'Snowdrift Azalea Shrub') $img = 'azalea1.jpg';
        elseif ($row['name'] === 'Blush Belle Azalea Shrub') $img = 'azalea2.jpg';
        elseif ($row['name'] === 'Twilight Bloom Azalea Shrub') $img = 'azalea3.jpg';
        elseif ($row['name'] === 'Luna Frost Azalea Shrub') $img = 'azalea4.jpg';
        elseif ($row['name'] === 'Phoenix Petal Azalea Shrub') $img = 'azalea5.jpg';
        elseif ($row['name'] === 'Amber Blaze Azalea Shrub') $img = 'azalea6.jpg';
        elseif ($row['name'] === 'Golden Pop Azalea Shrub') $img = 'azalea7.jpg';
      ?>
      <div class="product-card">
        <img src="<?= $img ?>" alt="<?= htmlspecialchars($row['name']) ?>">
        <h3><?= strtoupper(htmlspecialchars($row['name'])) ?></h3>
        <p><?= strtoupper(htmlspecialchars($row['description'])) ?></p>
        <strong>$<?= number_format($row['price'], 2) ?></strong>
      </div>
    <?php endwhile; ?>
  <?php else: ?>
    <p style="text-align:center;">NO PRODUCTS FOUND IN THIS CATEGORY.</p>
  <?php endif; ?>
</div>

</body>
</html>
