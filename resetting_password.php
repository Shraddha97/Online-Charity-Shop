<?php

require_once 'DB.php';
$email = mysqli_real_escape_string($conn, $_POST['buyer_email']);
if (isset($_POST["reset_password"])) {
    $select = mysqli_query($conn, "SELECT * FROM `buyer_register` WHERE `b_email` = '" . $email . "'") or exit(mysqli_error($conn));
    $row = mysqli_fetch_array($select);
    $buyer_password = $row ['b_password'];
    if (mysqli_num_rows($select)) {
        $cond = filter_input(INPUT_POST, 'buyer_email');
        if (!empty($cond)) {
            require "PHPMailer/PHPMailerAutoload.php";
            $mail = new PHPMailer;
            //$mail->SMTPDebug = 2;                               // Enable verbose debug output
            $toEmail = filter_input(INPUT_POST, 'buyer_email');
            $fromEmail = "info@rushabhtrading.com";
            $subject = "Password Recovery Rushabh Trading Co";
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = "astute.herosite.pro";                   // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = $fromEmail;                 // SMTP username
            $mail->Password = 'Rush@bh@321';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;
            // TCP port to connect to
            $mail->setFrom($fromEmail);
            $mail->addAddress($toEmail);               // Name is optional
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->FromName = "Rushabh Trading Co";
            $mail->Subject = $subject;
            $mail->Body = '<strong>Dear user,</strong><br><br>';
            $mail->Body .= '<p>You have indicated that you have forgotten your Rushabh Trading Co Account password.</p><br>';
            $mail->Body .= '<p>To securely sign in and reset your password, you have been issued the password below.</p><br>';
            $mail->Body .= '<p>Use this password to sign in to your Rushabh Trading Co Account</p><br>';
            $mail->Body .= '<strong>Password: </strong>' . $buyer_password . "<br><br>";
            $mail->Body .= '<strong>
                                If you did not request this forgotten password email, no action 
                                is needed, your password will not be reset. However, you may want to log into 
                                your account and change your security password as someone may have guessed it
                            </strong><br><br>';
            $mail->Body .= '<strong>Note: </strong>This is a system generated e-mail and please do not reply.';
            if (!$mail->send()) {
                header("location:forgot_password?failed=Message could not be sent.");
                //echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                header("location:forgot_password?success=An email has been sent to your email address.");
//        exit();
            }
        }
    } else {
        header("location:forgot_password?failed=You are not registered with us. Please sign up.");
        //We cannot find an account with that email address
    }
}