<?php
ob_start();
require_once 'DB.php';
$id = isset($_GET['id']) ? $_GET['id'] : '';

$sql_img = "SELECT * FROM gallery WHERE id='$id'";
$result_img = mysqli_query($conn, $sql_img);
// output data of each row
while ($row_img = mysqli_fetch_array($result_img)) {
    $img_thumb = $row_img ['thumbnail'];
    $img = $row_img ['image'];
    unlink($img_thumb);
    unlink($img);
}

$query_p_img = "DELETE from gallery WHERE id='$id'";

if (!mysqli_query($conn, $query_p_img)) {
    header("location:view_gallery?failed=Error! Try Again");
} else {
    header("location:view_gallery?success=Gallery image deleted successfully!");
}