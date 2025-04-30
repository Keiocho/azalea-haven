<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $custID = intval($_POST['custID']);
    $sql = "SELECT * FROM Orders WHERE custID = $custID";
    $result = mysqli_query($conn, $sql);

    echo "<h2>Orders for Customer ID $custID</h2>";
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Order ID: " . $row['orderID'] . " | Total: $" . $row['total'] . " | Date: " . $row['orderDate'] . "<br>";
        }
    } else {
        echo "No orders found for this customer.";
    }
}
?>

<form method="POST">
  <h2>Lookup Customer Orders</h2>
  <input name="custID" type="number" placeholder="Customer ID" required>
  <button type="submit">Search Orders</button>
</form>
