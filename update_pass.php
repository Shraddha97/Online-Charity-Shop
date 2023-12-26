<?php
ob_start();
require_once 'DB.php';
session_start();
$username = $_SESSION['user'];
$sql = "select * from adminlogin";

$result = mysqli_query($conn, $sql);
// output data of each row
while ($row = mysqli_fetch_array($result)) {
    $current_password = $row["password"];
}
$new_pass = $_POST['new_pass'];
$old_pass = $_POST['old_pass'];
$cpass = $_POST['cpass'];



if ($current_password === $old_pass) {
    if ($new_pass === $cpass) {
        $query = "update adminlogin set password='$new_pass' WHERE password='$old_pass'";
        if (!mysqli_query($conn, $query)) {
            header("location:change_pass?failed=Try Again !");
        } else {
            session_destroy();
            header("location:login?success=Password updated successfully");
        }
    } else {
        header("location:change_pass?failed=Confirm Password does not match !");
    }
} else {
    header("location:change_pass?failed=Old Password does not match !");
}
