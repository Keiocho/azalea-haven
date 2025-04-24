<?php
session_start();
include('db_connect.php');
if (!isset($_SESSION['cartID'])) {
    $custID = 1;
    $insertCart = "INSERT INTO Cart (custID, total) VALUES ($custID, 0)";
    mysqli_query($conn, $insertCart);
    $_SESSION['cartID'] = mysqli_insert_id($conn);
}
?>
<html>
<head>
  <title>Azalea Bloom Shop</title>
  <link href="https://fonts.googleapis.com/css2?family=Allura&family=Cinzel:wght@400;700&family=EB+Garamond&display=swap" rel="stylesheet">
  <style>
    body { background-color: #f9f9f7; font-family: 'Cinzel', serif; margin: 0; color: black; }
    .promo-banner { background-color: #000; color: white; text-align: center; padding: 5px 0; font-size: 0.75em; }
    .top-links { text-align: right; padding: 10px 20px 0 20px; font-size: 0.75em; }
    .top-links a { color: black; text-decoration: none; margin-left: 10px; }

    .search-bar { text-align: right; padding: 5px 20px 10px 20px; }
    .search-bar input[type="text"] {
      padding: 4px 8px;
      font-size: 0.8em;
      font-family: 'EB Garamond', serif;
      border-radius: 4px;
      border: 1px solid #ccc;
    }
    .search-bar button {
      padding: 4px 10px;
      font-size: 0.8em;
      cursor: pointer;
      font-family: 'EB Garamond', serif;
      border-radius: 4px;
      border: none;
      background-color: #808080;
      color: white;
      margin-left: 5px;
    }

    .header-row { display: flex; justify-content: space-between; align-items: flex-start; padding: 0px 15px; }
    .site-title span:first-child { display: block; }
    .site-title span:last-child { display: block; margin-left: 30px; }

    .nav-links { display: flex; gap: 20px; font-size: 0.8em; }
    .nav-links a { text-decoration: none; color: black; }

    .category-section { padding: 30px 0; text-align: center; }
    .category-title { font-size: 1.8em; font-weight: bold; margin-bottom: 30px; }
    .categories { display: flex; justify-content: center; gap: 40px; padding: 0 40px; flex-wrap: wrap; }
    .category-card {
      width: 260px;
      background: #fff;
      border-radius: 10px;
      overflow: hidden;
      transition: transform 0.3s ease;
      box-shadow: 0px 4px 10px rgba(0,0,0,0.15);
      text-decoration: none;
    }
    .category-card:hover { transform: translateY(-5px); }
    .category-card img { width: 100%; height: 240px; object-fit: cover; display: block; }
    .category-card p {
      margin: 12px 0;
      font-size: 0.9em;
      color: #3b3e79;
      background-color: white;
      text-transform: uppercase;
    }
    .categories a { text-decoration: none; }
  </style>
</head>
<body>

<div class="promo-banner">
  BE SURE TO SUBSCRIBE TO OUR MAILING LIST FOR DAILY AZALEA FACTS, SPECIAL DISCOUNTS, ANNOUNCEMENTS AND <strong>MORE!</strong>
</div>

<div class="top-links">
  <a href="#">FAVORITES</a> |
  <a href="#">CREATE AN ACCOUNT</a> |
  <a href="#">LOGIN</a>
</div>

<div class="search-bar">
  <form action="results.php" method="GET" style="display:inline;">
    <input type="text" name="query" placeholder="Search Azalea Products..." required>
    <button type="submit">GO</button>
  </form>
  <button onclick="location.href='cart.php'">CART</button>
</div>

<div class="header-row">
  <div class="site-title">
    <span>Azalea</span>
    <span>Haven</span>
  </div>
  <div class="nav-links">
    <a href="#">ABOUT AZALEAS</a>
    <a href="#">SHOP FOR AZALEA PRODUCTS</a>
    <a href="#">SUBSCRIBE</a>
    <a href="#">CONTACT</a>
  </div>
</div>

<div class="category-section">
  <div class="category-title">Shop by Category</div>
  <div class="categories">

    <a href="category.php?type=Shrubs">
      <div class="category-card"><img src="azalea1.jpg"><p>Shrubs</p></div>
    </a>

    <a href="category.php?type=Seeds">
      <div class="category-card"><img src="azalea2.jpg"><p>Seeds</p></div>
    </a>

    <a href="category.php?type=Tableware">
      <div class="category-card"><img src="azalea3.jpg"><p>Tableware</p></div>
    </a>

    <a href="category.php?type=Bedding">
      <div class="category-card"><img src="azalea4.jpg"><p>Bedding</p></div>
    </a>

    <a href="category.php?type=Apparel">
      <div class="category-card"><img src="azalea5.jpg"><p>Apparel</p></div>
    </a>

    <a href="category.php?type=Pot">
      <div class="category-card"><img src="azalea6.jpg"><p>Pot</p></div>
    </a>

  </div>
</div>

</body>
</html>
