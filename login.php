<?php
$random_url = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 1000000);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rushabh_trading";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die($conn);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// username and password sent from form 
    $myusername = mysqli_real_escape_string($conn, $_POST['username']);
    $mypassword = mysqli_real_escape_string($conn, $_POST['password']);
    $sql = "SELECT * FROM adminlogin WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $id = $row["id"];
    $count = mysqli_num_rows($result);
    $_SESSION['user'] = $myusername;
    $_SESSION['pass'] = $mypassword;
    // If result matched $myusername and $mypassword, table row must be 1 row
    if ($count == 1) {
        header("location:admin_panel?$random_url$random_url&id=$id&$random_url$random_url&$random_url&$random_url");
    } else {
        header("location:login?failed=Your Login Name or Password is invalid");
    }
}
?>
<html>
    <head>
        <?php
        include'admin_headerlink.php';
        ?>
    </head>
    <body class="login-page">
        <div class="login-box">
            <div class="logo">
                <a href="javascript:void(0);">Admin<b> Rushabh Trading Co.</b></a>
            </div>
            <div class="card">
                <div class="body">
                    <form role="form" action="" method="post">
                        <div class="msg">Sign in to start your session</div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8 p-t-5">
                            </div>
                            <div class="col-xs-4">
                                <button class="btn btn-block bg-pink waves-effect" name="login" type="submit">SIGN IN</button>
                            </div>
                        </div>
                    </form>
                    <div style = "margin-top:10px">
                        <?php
                        $success = isset($_GET['success']) ? $_GET['success'] : '';
                        $failed = isset($_GET['failed']) ? $_GET['failed'] : '';
                        if ($success != NULL) {
                            ?>
                            <div class="well" style="background-color:white;color:green;">
                                <?php
                                echo $success;
                                ?>
                            </div>
                            <?php
                        }
                        if ($failed != NULL) {
                            ?>
                            <div class="well" style="background-color:white;color:red;">
                                <?php
                                echo $failed;
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include'admin_footer.php';
        ?> 
    </body>
</html>
