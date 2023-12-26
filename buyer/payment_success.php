

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, height=device-height, minimum-scale=1.0, user-scalable=0">
        <meta name="referrer" content="origin">
        <title>Rushabh Trading Co.</title>
        <!-- Favicon icon -->
        <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon" >
        <link rel="apple-touch-icon" type="image/png" href="assets/images/favicon.png" />
        <meta name="apple-mobile-web-app-title" content="Rushabh Trading Co.">

        <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png" />

        <link rel="mask-icon" type="" href="assets/images/favicon.png" />



        <style>
            body {
                background-color: #191919;
            }

            .container {
                padding: 100px 0;
                display: flex;
                width: 100%;
            }

            .checkmark_ok {
                position: absolute;
                -webkit-animation: grow 1.4s cubic-bezier(0.42, 0, 0.275, 1.155) both infinite;
                animation: grow 1.4s cubic-bezier(0.42, 0, 0.275, 1.155) both infinite;
            }
            .checkmark_ok:nth-child(1) {
                width: 12px;
                height: 12px;
                left: 12px;
                top: 16px;
            }
            .checkmark_ok:nth-child(2) {
                width: 18px;
                height: 18px;
                left: 168px;
                top: 84px;
            }
            .checkmark_ok:nth-child(3) {
                width: 10px;
                height: 10px;
                left: 32px;
                top: 162px;
            }
            .checkmark_ok:nth-child(4) {
                width: 20px;
                height: 20px;
                left: 82px;
                top: -12px;
            }
            .checkmark_ok:nth-child(5) {
                width: 14px;
                height: 14px;
                left: 125px;
                top: 162px;
            }
            .checkmark_ok:nth-child(6) {
                width: 10px;
                height: 10px;
                left: 16px;
                top: 16px;
            }
            .checkmark_ok:nth-child(1) {
                -webkit-animation-delay: 1.7s;
                animation-delay: 1.7s;
            }
            .checkmark_ok:nth-child(2) {
                -webkit-animation-delay: 1.4s;
                animation-delay: 1.4s;
            }
            .checkmark_ok:nth-child(3) {
                -webkit-animation-delay: 2.1s;
                animation-delay: 2.1s;
            }
            .checkmark_ok:nth-child(4) {
                -webkit-animation-delay: 2.8s;
                animation-delay: 2.8s;
            }
            .checkmark_ok:nth-child(5) {
                -webkit-animation-delay: 3.5s;
                animation-delay: 3.5s;
            }
            .checkmark_ok:nth-child(6) {
                -webkit-animation-delay: 4.2s;
                animation-delay: 4.2s;
            }

            .checkmark {
                position: relative;
                padding: 30px;
                /*   animation: checkmark 5.6s cubic-bezier(0.42, 0, 0.275, 1.155) both; */
                -webkit-animation: checkmark 5.6s cubic-bezier(0.42, 0, 0.275, 1.155) both infinite;
                animation: checkmark 5.6s cubic-bezier(0.42, 0, 0.275, 1.155) both infinite;
            }

            .checkmark__check {
                position: absolute;
                top: 50%;
                left: 50%;
                z-index: 10;
                -webkit-transform: translate3d(-50%, -50%, 0);
                transform: translate3d(-50%, -50%, 0);
                fill: #fff;
            }

            .checkmark__back {
                -webkit-animation: rotate 35s linear both infinite;
                animation: rotate 35s linear both infinite;
            }
            .waves-effect {
                position: relative;
                cursor: pointer;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                z-index: 1;
            }
            .btn-success {
                background-color: #f5a619;
            }
            .waves-effect {
                overflow: hidden;
            }
            .btn {
                text-decoration: none;
                font-size: 15px;
                padding: .85rem 2.13rem;
                margin: 6px;
                border-radius: 2px;
                border: 0;
                -webkit-transition: .2s ease-out;
                transition: .2s ease-out;
                white-space: normal!important;
                cursor: pointer;
                color: #FFF!important;
                -webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
                box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
            }
            .btn:hover{
                background-color: transparent!important;
                border: 1px solid #f5a619;
                outline: 0;
                -webkit-box-shadow: 0 5px 11px 0 rgba(0,0,0,.18), 0 4px 15px 0 rgba(0,0,0,.15);
                box-shadow: 0 5px 11px 0 rgba(0,0,0,.18), 0 4px 15px 0 rgba(0,0,0,.15);
            }
            @media(max-width: 500px){
                .container{
                    margin: 10px auto !important;
                }
            }
            @-webkit-keyframes rotate {
                0% {
                    -webkit-transform: rotate(0deg);
                    transform: rotate(0deg);
                }
                100% {
                    -webkit-transform: rotate(360deg);
                    transform: rotate(360deg);
                }
            }

            @keyframes rotate {
                0% {
                    -webkit-transform: rotate(0deg);
                    transform: rotate(0deg);
                }
                100% {
                    -webkit-transform: rotate(360deg);
                    transform: rotate(360deg);
                }
            }
            @-webkit-keyframes grow {
                0%, 100% {
                    -webkit-transform: scale(0);
                    transform: scale(0);
                }
                50% {
                    -webkit-transform: scale(1);
                    transform: scale(1);
                }
            }
            @keyframes grow {
                0%, 100% {
                    -webkit-transform: scale(0);
                    transform: scale(0);
                }
                50% {
                    -webkit-transform: scale(1);
                    transform: scale(1);
                }
            }

            @-webkit-keyframes checkmark {
                0%, 100% {
                    opacity: 1;
                    -webkit-transform: scale(1);
                    transform: scale(1);
                }
                10%, 50%, 90% {
                    opacity: 1;
                    -webkit-transform: scale(1);
                    transform: scale(1);
                }
            }

            @keyframes checkmark {
                0%, 100% {
                    opacity: 1;
                    -webkit-transform: scale(1);
                    transform: scale(1);
                }
                10%, 50%, 90% {
                    opacity: 1;
                    -webkit-transform: scale(1);
                    transform: scale(1);
                }
            }
        </style>
        <script>
            window.console = window.console || function (t) {};
        </script>
        <script>
            if (document.location.search.match(/type=embed/gi)) {
                window.parent.postMessage("resize", "*");
            }
        </script>
        <?php
        $b_id = isset($_GET['b_id']) ? $_GET['b_id'] : '';
        session_start();
        if (isset($_SESSION['buyer_session'])) {
            $buyer_id = $_SESSION['buyer_session'];
            if ($buyer_id !== $b_id) {
                header("location:payment_success.php?$random_url&$random_url&b_id=$buyer_id&ot_id=$ot_id&$random_url&$random_url");
            }
        } else {
            header("location:../signin");
        }
        ?>
    </head>
    <body translate="no">
        <?php
        require_once ('DB.php');
        //print_r($_POST);
        $ot_id = isset($_POST['ot_id']) ? $_POST['ot_id'] : '';
        $payment_id = $_POST['razorpay_payment_id'];
        $order_id = $_POST['razorpay_order_id'];
        $sign_hash = $_POST['razorpay_signature'];

        $sql = "update order_details set order_id='$order_id',payment_id='$payment_id',signature_hash='$sign_hash' WHERE id='$ot_id'";
        if (!mysqli_query($conn, $sql)) {
            ?>
            <?php
        } else {
            ?>
            <div class="container">
                <div class="row" style="margin: 0 auto">
                    <div class="col-12">
                        <div class="checkmark">
                            <svg class="checkmark_ok" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z" fill="#f5a619">
                            </path></svg>
                            <svg class="checkmark_ok" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z" fill="#f5a619">
                            </path></svg>
                            <svg class="checkmark_ok" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z" fill="#f5a619">
                            </path></svg>
                            <svg class="checkmark_ok" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z" fill="#f5a619">
                            </path></svg>
                            <svg class="checkmark_ok" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z" fill="#f5a619">
                            </path></svg>
                            <svg class="checkmark_ok" height="19" viewBox="0 0 19 19" width="19" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.296.747c.532-.972 1.393-.973 1.925 0l2.665 4.872 4.876 2.66c.974.532.975 1.393 0 1.926l-4.875 2.666-2.664 4.876c-.53.972-1.39.973-1.924 0l-2.664-4.876L.76 10.206c-.972-.532-.973-1.393 0-1.925l4.872-2.66L8.296.746z" fill="#f5a619">
                            </path></svg>
                            <svg class="checkmark__check" height="36" viewBox="0 0 48 36" width="48" xmlns="http://www.w3.org/2000/svg">
                            <path d="M47.248 3.9L43.906.667a2.428 2.428 0 0 0-3.344 0l-23.63 23.09-9.554-9.338a2.432 2.432 0 0 0-3.345 0L.692 17.654a2.236 2.236 0 0 0 .002 3.233l14.567 14.175c.926.894 2.42.894 3.342.01L47.248 7.128c.922-.89.922-2.34 0-3.23">
                            </path></svg>
                            <svg class="checkmark__back" height="115" viewBox="0 0 120 115" width="120" xmlns="http://www.w3.org/2000/svg">
                            <path d="M107.332 72.938c-1.798 5.557 4.564 15.334 1.21 19.96-3.387 4.674-14.646 1.605-19.298 5.003-4.61 3.368-5.163 15.074-10.695 16.878-5.344 1.743-12.628-7.35-18.545-7.35-5.922 0-13.206 9.088-18.543 7.345-5.538-1.804-6.09-13.515-10.696-16.877-4.657-3.398-15.91-.334-19.297-5.002-3.356-4.627 3.006-14.404 1.208-19.962C10.93 67.576 0 63.442 0 57.5c0-5.943 10.93-10.076 12.668-15.438 1.798-5.557-4.564-15.334-1.21-19.96 3.387-4.674 14.646-1.605 19.298-5.003C35.366 13.73 35.92 2.025 41.45.22c5.344-1.743 12.628 7.35 18.545 7.35 5.922 0 13.206-9.088 18.543-7.345 5.538 1.804 6.09 13.515 10.696 16.877 4.657 3.398 15.91.334 19.297 5.002 3.356 4.627-3.006 14.404-1.208 19.962C109.07 47.424 120 51.562 120 57.5c0 5.943-10.93 10.076-12.668 15.438z" fill="#f5a619">
                            </path></svg>
                        </div>
                        <div class="col-12">
                            <h2 style="text-align: center;color: #f5a619">Order Placed !</h2>
                            <p style="text-align: center;margin-bottom: 50px;color: #f5a619">Easily track all your orders!</p>
                            <a href="my_orders?b_id=<?php echo $b_id ?>" class="btn btn-success waves-effect waves-light">Go to My Orders</a>
                        </div>
                    </div>
                </div>
            </div>        
            <?php
        }
        ?>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>