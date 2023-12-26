<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php
        include 'headerlink.php';
        $b_id = isset($_GET['b_id']) ? $_GET['b_id'] : '';
        session_start();
        if (isset($_SESSION['buyer_session'])) {
            $buyer_id= $_SESSION['buyer_session'];
            if($buyer_id !== $b_id){
                header("location:about-us.php?b_id=$buyer_id");
            }
        } else {
            header("location:../signin");
        }
        ?>
        <script>
            window.onload = function () {
                if (!window.location.hash) {
                    window.location = window.location + '';
                    window.location.reload();
                }
            };
        </script>
    </head>
    <body class="theme-purple ls-opened">
        <?php
        session_destroy();
        ?>
    </body>
</html>
