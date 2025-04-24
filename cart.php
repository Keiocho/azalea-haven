<?php
session_start();
include('db_connect.php');

if (!isset($_SESSION['cartID'])) {
    echo "<h2>Your Cart</h2><p>No cart found.</p>";
    exit();
}

$cartID = $_SESSION['cartID'];

// Handle empty cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['empty_cart'])) {
    $deleteQuery = "DELETE FROM CartProduct WHERE cartID = ?";
    $stmt = mysqli_prepare($conn, $deleteQuery);
    mysqli_stmt_bind_param($stmt, "i", $cartID);
    mysqli_stmt_execute($stmt);
    header("Location: cart.php");
    exit();
}

$query = "
    SELECT p.name, p.price, cp.numToBuy
    FROM CartProduct cp
    JOIN Products p ON cp.productID = p.product_id
    WHERE cp.cartID = ?
";

$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $cartID);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Your Cart</title>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=EB+Garamond&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #f9f9f7;
      font-family: 'EB Garamond', serif;
      color: #333;
      text-align: center;
    }
    h2 {
      font-family: 'Cinzel', serif;
      color: #3b3e79;
      margin-top: 40px;
    }
    table {
      margin: auto;
      border-collapse: collapse;
      width: 80%;
      font-size: 1em;
      margin-top: 20px;
    }
    th, td {
      border: 1px solid #ccc;
      padding: 12px 20px;
    }
    th {
      background-color: #3b3e79;
      color: white;
    }
    .btn-group {
      margin-top: 30px;
    }
    .btn-group form {
      display: inline-block;
    }
    button {
      padding: 10px 20px;
      margin: 0 10px;
      font-family: 'Cinzel', serif;
      font-size: 0.9em;
      background-color: #3b3e79;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    button:hover {
      background-color: #2e3163;
    }
  </style>
</head>
<body>

<h2>Your Cart</h2>

<?php
if (mysqli_num_rows($result) === 0) {
    echo "<p>Your cart is empty.</p>";
} else {
    echo "<table>";
    echo "<tr><th>Product</th><th>Price</th><th>Quantity</th><th>Subtotal</th></tr>";

    $total = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $name = htmlspecialchars($row['name']);
        $price = $row['price'];
        $qty = $row['numToBuy'];
        $subtotal = $price * $qty;
        $total += $subtotal;

        echo "<tr>
                <td>$name</td>
                <td>\$$price</td>
                <td>$qty</td>
                <td>\$" . number_format($subtotal, 2) . "</td>
              </tr>";
    }

    echo "<tr><td colspan='3' style='text-align:right;'><strong>Total:</strong></td><td><strong>\$" . number_format($total, 2) . "</strong></td></tr>";
    echo "</table>";
    ?>

    <div class="btn-group">
      <form method="POST" action="cart.php">
        <button type="submit" name="empty_cart">Empty Cart</button>
      </form>

      <form method="POST" action="checkout.php">
        <button type="submit">Checkout</button>
      </form>
    </div>

<?php } ?>

</body>
</html>
