
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rushabh_trading";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die($conn);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}