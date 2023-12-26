<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php
        session_start();
        if (isset($_SESSION['user'])) {
            
        } else {
            header("location:login");
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
