<?php
session_start();
include('db_connect.php');
if (!isset($_SESSION['cartID'])) {
    die("Cart session not found.");
}

$cartID = $_SESSION['cartID'];
$productID = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
$quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;

if ($productID < 1 || $quantity < 1) {
    die("Invalid product or quantity.");
}

$checkQuery = "SELECT * FROM CartProduct WHERE cartID = ? AND productID = ?";
$stmt = mysqli_prepare($conn, $checkQuery);
mysqli_stmt_bind_param($stmt, "ii", $cartID, $productID);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    $updateQuery = "UPDATE CartProduct SET numToBuy = numToBuy + ? WHERE cartID = ? AND productID = ?";
    $updateStmt = mysqli_prepare($conn, $updateQuery);
    mysqli_stmt_bind_param($updateStmt, "iii", $quantity, $cartID, $productID);
    mysqli_stmt_execute($updateStmt);
} else {
    $insertQuery = "INSERT INTO CartProduct (cartID, productID, numToBuy) VALUES (?, ?, ?)";
    $insertStmt = mysqli_prepare($conn, $insertQuery);
    mysqli_stmt_bind_param($insertStmt, "iii", $cartID, $productID, $quantity);
    mysqli_stmt_execute($insertStmt);
}
header("Location: main.php");
exit();
?>
