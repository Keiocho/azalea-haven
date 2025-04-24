<?php
$host = "localhost";
$user = "chavezk5_Sneezy";
$pass = "Snowwhite1017";
$db   = "chavezk5_Inventory";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>