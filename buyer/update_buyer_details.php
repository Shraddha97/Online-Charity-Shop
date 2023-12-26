<?php
ob_start();
require_once 'DB.php';
$b_id = mysqli_real_escape_string($conn, $_POST['b_id']);
$checkout_fname = mysqli_real_escape_string($conn, $_POST['checkout_fname']);
$checkout_lname = mysqli_real_escape_string($conn, $_POST['checkout_lname']);
$checkout_phone = mysqli_real_escape_string($conn, $_POST['checkout_phone']);
$checkout_phone_a = mysqli_real_escape_string($conn, $_POST['checkout_phone_a']);
$checkout_email = mysqli_real_escape_string($conn, $_POST['checkout_email']);
$checkout_address1 = mysqli_real_escape_string($conn, $_POST['checkout_address1']);
$checkout_address2 = mysqli_real_escape_string($conn, $_POST['checkout_address2']);
$checkout_city = mysqli_real_escape_string($conn, $_POST['checkout_city']);
$checkout_zip = mysqli_real_escape_string($conn, $_POST['checkout_zip']);
$checkout_state = mysqli_real_escape_string($conn, $_POST['checkout_state']);
$checkout_country = mysqli_real_escape_string($conn, $_POST['checkout_country']);

if (isset($_POST["personal_btn"])) {
    $sql_count = "SELECT COUNT(*) as buyer_id FROM buyer_details where b_id=$b_id";
                        $result_count = mysqli_query($conn, $sql_count);
                        while ($row_count = mysqli_fetch_array($result_count)) {
                            $p_count = $row_count['buyer_id'];
                        }
                       if ($p_count < 1) {
                            $sql_buyer_details = "INSERT INTO buyer_details(b_id, b_fname, b_lname, b_phone, b_aphone) VALUES ('$b_id','$checkout_fname','$checkout_lname','$checkout_phone','$checkout_phone_a')";
                       }else{
                           $sql_buyer_details = "update buyer_details set b_phone='$checkout_phone',b_aphone='$checkout_phone_a',b_fname='$checkout_fname',b_lname='$checkout_lname' WHERE b_id='$b_id'";
                       }
    
    if (!mysqli_query($conn, $sql_buyer_details)) {
        header("location:my_account?failed=Something went wrong! Please try again later");
    } else {
        header("location:my_account?b_id=$b_id&success=Personal Information Updated Sucessfully!");  
    }
}
if (isset($_POST["address_btn"])) {
    $sql_count = "SELECT COUNT(*) as buyer_id FROM buyer_details where b_id=$b_id";
                        $result_count = mysqli_query($conn, $sql_count);
                        while ($row_count = mysqli_fetch_array($result_count)) {
                            $p_count = $row_count['buyer_id'];
                        }
                       if ($p_count < 1) {
                            $sql_address_details = "INSERT INTO buyer_details(b_id, address_line_1, address_line_2, city, pincode, state, country) VALUES ('$b_id','$checkout_address1','$checkout_address2','$checkout_city','$checkout_zip','$checkout_state','$checkout_country')";
                       }else{
    $sql_address_details = "update buyer_details set address_line_1='$checkout_address1',address_line_2='$checkout_address2',city='$checkout_city',pincode='$checkout_zip',state='$checkout_state' WHERE b_id='$b_id'";
                       }
    if (!mysqli_query($conn, $sql_address_details)) {
        header("location:my_account?failed=Something went wrong! Please try again later");
    } else {
        header("location:my_account?b_id=$b_id&success=Address Details Updated Sucessfully!");
    }
}
