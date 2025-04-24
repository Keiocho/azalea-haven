<?php
include 'db_connect.php';

$search = mysqli_real_escape_string($conn, $_GET['query']);
$sql = "SELECT * FROM Products WHERE name LIKE '%$search%' OR description LIKE '%$search%'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Search Results</title>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'EB Garamond', serif;
      background-color: #f9f9f9;
      padding: 20px;
      animation: fadeIn 0.5s ease-in;
      text-transform: uppercase;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: scale(0.95); }
      to { opacity: 1; transform: scale(1); }
    }

    h2 {
      text-align: center;
      color: #a65c8d;
      margin-bottom: 30px;
    }

    .results-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 30px;
      max-width: 1200px;
      margin: 0 auto;
    }

    .product-card {
      background: white;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
      transition: transform 0.3s ease;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding-bottom: 15px;
    }

    .product-card:hover {
      transform: translateY(-5px);
    }

    .product-card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .product-card h3 {
      margin: 12px 0 6px 0;
      color: #000000;
      text-align: center;
      font-weight: bold;
      font-size: 0.9em;
    }

    .product-card p {
      margin: 2px 10px;
      font-size: 0.75em;
      text-align: center;
      color: #000000;
      font-weight: normal;
    }

    .add-cart-form input[type="number"] {
      font-family: 'EB Garamond', serif;
      padding: 3px;
      font-size: 0.8em;
      width: 50px;
    }

    .add-cart-form button {
      font-family: 'EB Garamond', serif;
      padding: 4px 10px;
      font-size: 0.9em;
      background-color: #000;
      color: #fff;
      border: none;
      cursor: pointer;
      margin-top: 5px;
    }

    a {
      color: #000000;
      text-decoration: none;
      display: block;
      text-align: center;
      margin-top: 40px;
      font-weight: bold;
    }
  </style>
</head>
<body>

  <h2>Search Results for: "<?= htmlspecialchars($search) ?>"</h2>

  <div class="results-grid">
  <?php if (mysqli_num_rows($result) > 0): ?>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <div class="product-card">
        <?php
          $img = 'metalplanter.jpg';

          $imgMap = [
            "Snowdrift Azalea Shrub" => 'azalea1.jpg',
            "Blush Belle Azalea Shrub" => 'azalea2.jpg',
            "Twilight Bloom Azalea Shrub" => 'azalea3.jpg',
            "Luna Frost Azalea Shrub" => 'azalea4.jpg',
            "Phoenix Petal Azalea Shrub" => 'azalea5.jpg',
            "Amber Blaze Azalea Shrub" => 'azalea6.jpg',
            "Golden Pop Azalea Shrub" => 'azalea7.jpg',
            "Azalea Spring Petal Pillowcases" => 'azaleapillowcase.jpg',
            "Azalea Floral Dreams Duvet Cover" => 'azaleafloraldreamsduvetcover.jpg',
            "Azalea Bloom Blanket Throw" => 'azaleabloomblanketthrow.jpg',
            "Azalea Pastel Bloom Bed Skirt" => 'azaleapastelbloombedskirt.jpg',
            "Azalea Body Pillow Cover" => 'azaleabodypillowcover.jpg',
            "Azalea Porcelain Plate" => 'azaleaporcelainplate.jpg',
            "Azalea Blooming Cups Set" => 'azaleabloomingcupsset.jpg',
            "Azalea Petal Dance Dinner Set" => 'azaleapetaldancedinnerset.jpg',
            "Azalea Spring Garden Serving Tray" => 'azaleaspringgardenservingtray.jpg',
            "Azalea Floral Edge Napkin Set" => 'azaleafloraledgenapkinset.jpg',
            "Azalea Blossom Pitcher" => 'azaleablossompitcher.jpg',
            "Snowdrift Azalea Seeds" => 'snowdriftazaleaseeds.jpg',
            "Blush Belle Azalea Seeds" => 'blushbelleazaleaseeds.jpg',
            "Twilight Bloom Azalea Seeds" => 'twilightbloomazaleaseeds.jpg',
            "Luna Frost Azalea Seeds" => 'lunafrostazaleaseeds.jpg',
          ];

          if (isset($imgMap[$row['name']])) {
            $img = $imgMap[$row['name']];
          }

          echo "<img src='$img' alt='" . htmlspecialchars($row['name']) . "'>";
        ?>
        <h3><?= strtoupper(htmlspecialchars($row['name'])) ?></h3>
        <p><?= strtoupper(htmlspecialchars($row['description'])) ?></p>
        <p><strong>$<?= number_format($row['price'], 2) ?></strong></p>
        <p><em><?= strtoupper($row['quantity'] . ' in stock') ?></em></p>

        <form method="POST" action="add_to_cart.php" class="add-cart-form">
          <input type="hidden" name="product_id" value="<?= $row['product_id'] ?>">
          <input type="number" name="quantity" value="1" min="1" required>
          <button type="submit">Add to Cart</button>
        </form>
      </div>
    <?php endwhile; ?>
  <?php else: ?>
    <p style="text-align:center; color: #777;">No products matched your search.</p>
  <?php endif; ?>
  </div>

  <a href="main.php">Back to Home</a>

</body>
</html>

<?php mysqli_close($conn); ?>