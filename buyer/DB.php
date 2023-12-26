
<?php
$servername = "localhost";
$username = "gxvxuoyc_rushabh_user";
$password = "shubham@1432486";
$dbname = "gxvxuoyc_rushabh_trading";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname) or die($conn);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}