<?php
ob_start();
require_once 'DB.php';
$img_id = mysqli_real_escape_string($conn, $_POST['img_id']);
$p_id = isset($_GET['p_id']) ? $_GET['p_id'] : '';

if (isset($_POST["update_thumb_img"])) {
    // Get Image Dimension
    $fileinfo = getimagesize($_FILES["thumbnail"]["tmp_name"]);
    $width = $fileinfo[0];
    $height = $fileinfo[1];
    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );

    // Get image file extension
    $file_extension = pathinfo($_FILES["thumbnail"]["name"], PATHINFO_EXTENSION);

    // Validate file input to check if is not empty
    if (!file_exists($_FILES["thumbnail"]["tmp_name"])) {
        header("location:update_product?p_id=$p_id&failed=Choose an image file to upload.");
    }    // Validate file input to check if is with valid extension
    else if (!in_array($file_extension, $allowed_image_extension)) {
        header("location:update_product?p_id=$p_id&failed=Upload valid images. Only PNG and JPEG are allowed.");
    }    // Validate image file size
    else if (($_FILES["thumbnail"]["size"] > 1000000)) {
        header("location:update_product?p_id=$p_id&failed=Thumbnail size exceeds 1MB");
    }    // Validate image file dimension
    else if ($width > "400" || $height > "620" || $width < "399" || $height < "619") {
        header("location:update_product?p_id=$p_id&failed=Thumbnail dimension should be 400X620");
    } else {
        $target_dir = "upload/product_img/thumbnail/";
        $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $new_file_name = $target_dir . $p_id . "_project_thumb_updated_" . $img_id . "." . $imageFileType;

        $sql_thumb_img = "update product_img set thumbnail='$new_file_name' WHERE id='$img_id'";
        // use exec() because no results are returned
        if (!mysqli_query($conn, $sql_thumb_img)) {
            header("location:update_product?p_id=$p_id&failed=There was an error in updating the product thumbnail image. Please try again later!");
        } else {
            move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $new_file_name);
            header("location:update_product?p_id=$p_id&success=Product thumbnail image updated successfully");
        }
    }
}



if (isset($_POST["update_product_img"])) {
    $target_dir = "upload/product_img/";
    $target_file = $target_dir . basename($_FILES["p_img"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $new_file_name = $target_dir . $p_id . "_project_img_updated_" . $img_id . "." . $imageFileType;

    $sql = "update product_img set image='$new_file_name' WHERE id='$img_id'";
    // use exec() because no results are returned
    if (!mysqli_query($conn, $sql)) {
        header("location:update_product?p_id=$p_id&failed=There was an error in updating the product image. Please try again later!");
    } else {
        move_uploaded_file($_FILES["p_img"]["tmp_name"], $new_file_name);
        header("location:update_product?p_id=$p_id&success=Product image updated successfully");
    }
}


$p_name = mysqli_real_escape_string($conn, $_POST['p_name']);
$fabric = mysqli_real_escape_string($conn, $_POST['fabric']);
$brand_name = mysqli_real_escape_string($conn, $_POST['brand_name']);
$price = mysqli_real_escape_string($conn, $_POST['price']);
$p_keywords = mysqli_real_escape_string($conn, $_POST['product_keywords']);
//checkbbox
$size = implode("^", $_POST["size"]);
if (isset($_POST["update_product_info"])) {
    $sql = "update products set p_name='$p_name',fabric='$fabric',brand_name='$brand_name',size='$size',price='$price',keywords='$p_keywords' WHERE p_id='$p_id'";
    // use exec() because no results are returned
    if (!mysqli_query($conn, $sql)) {
        header("location:update_product?p_id=$p_id&failed=There was an error in updating the product information. Please try again later!");
    } else {
        header("location:update_product?p_id=$p_id&success=Product information updated successfully");
    }
}