<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Azalea Haven - Staff Dashboard</title>
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
    .container {
      text-align: center;
      padding: 40px;
      border-radius: 15px;
      background-color: #ffffff;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    h1 {
      color: #d81b60;
      margin-bottom: 20px;
    }
    .btn {
      display: block;
      margin: 10px auto;
      padding: 12px 24px;
      font-size: 1rem;
      background-color: #f48fb1;
      color: white;
      border: none;
      border-radius: 8px;
      text-decoration: none;
      cursor: pointer;
    }
    .btn:hover {
      background-color: #e91e63;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>🌸 Employee Dashboard</h1>
    <a class="btn" href="inventory_management.php">📦 Manage Inventory</a>
    <a class="btn" href="lookup_orders.php">🔍 Lookup Orders</a>
    <a class="btn" href="LandingPage.html">🚪 Log Out</a>
  </div>
</body>
</html>
