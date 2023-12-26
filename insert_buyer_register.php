<?php
ob_start();
require_once 'DB.php';
$sql1 = "select b_id from buyer_register order by b_id desc limit 0,1";
$result1 = mysqli_query($conn, $sql1);
// output data of each row
if ($row1 = mysqli_fetch_array($result1)) {
    $b_id = $row1 ['b_id'] + 13;
} else {
    $b_id = 1014;
}

$fname = mysqli_real_escape_string($conn, $_POST['f_name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$pass = mysqli_real_escape_string($conn, $_POST['password']);

$salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647));
$pass = hash('sha256', $pass . $salt);
for ($round = 0;$round < 65536;$round++)
{
    $pass = hash('sha256', $pass . $salt);
}
$hash = $pass;

if (isset($_POST["create_ac_btn"])) {
    $select = mysqli_query($conn, "SELECT * FROM `buyer_register` WHERE `b_email` = '" . $email . "' or `b_phone` = '" . $phone . "'") or exit(mysqli_error($conn));
    if (mysqli_num_rows($select)) {
        header("location:signin?failed=You are already registered. Please log in.");
    } else {
        // $sql = "INSERT INTO buyer_register(b_id,b_name,b_email,b_phone,b_password) VALUES ('$b_id','$fname','$email','$phone','$pass')";
        $sql = "INSERT INTO buyer_register(b_id,b_name,b_email,b_phone,hash,salt) VALUES ('$b_id','$fname','$email','$phone','$hash','$salt')";
        if (!mysqli_query($conn, $sql)) {
            header("location:signup?failed=Something went wrong !".mysqli_error($conn));
            //echo mysqli_error($conn);
        } else {
            header("location:signin?success=Your Account has been created successfully !");
        }
    }
}
