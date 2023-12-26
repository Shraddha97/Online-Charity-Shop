<?php
ob_start();
require_once 'DB.php';
session_start();
$username = $_SESSION['user'];
$b_id = isset($_GET['b_id']) ? $_GET['b_id'] : '';
$sql = "select * from buyer_register where b_id='$b_id'";

$result = mysqli_query($conn, $sql);
// output data of each row
while ($row = mysqli_fetch_array($result)) {
    $current_password = $row["b_password"];
}
$new_pass = $_POST['new_pass'];
$old_pass = $_POST['old_pass'];
$cpass = $_POST['cpass'];

$salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
$cpass = hash('sha256', $cpass . $salt);
for ($round = 0;$round < 65536;$round++)
{
    $cpass = hash('sha256', $cpass . $salt);
}
$hash = $cpass;

if ($current_password === $old_pass) {
    if ($new_pass === $cpass) {
        $query = "update buyer_register set hash='$hash' and salt='$salt' WHERE b_id='$b_id'";
        if (!mysqli_query($conn, $query)) {
            header("location:update_password?failed=Try Again !");
        } else {
            session_destroy();
            header("location:../signin?success=Password updated successfully&b_id=$b_id");
        }
    } else {
        header("location:update_password?failed=Confirm Password does not match !&b_id=$b_id");
    }
} else {
    header("location:update_password?failed=Old Password does not match !&b_id=$b_id&c_p=$current_password&o_p=$old_pass");
}
