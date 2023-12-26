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
    $username = mysqli_real_escape_string($conn, $_POST['buyer_email']);
    $pass = mysqli_real_escape_string($conn, $_POST['buyer_password']);
    $sql = "SELECT * FROM buyer_register WHERE b_email = '$username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $b_id = $row["b_id"];
    $count = mysqli_num_rows($result);
    
    
    $db_hash = $row["hash"];
    $db_salt = $row["salt"];

    $password = hash('sha256', $pass . $db_salt);
    for ($round = 0;$round < 65536;$round++)
    {
        $password = hash('sha256', $password . $db_salt);
    }
    
       
    if ($db_hash == $password)
    {   
        $_SESSION['buyer_session'] = $b_id;
        header("location:buyer/home?$random_url$random_url&b_id=$b_id&$random_url$random_url&$random_url&$random_url");
    }else {
        header("location:signin?failed=Email Address or Password is invalid");
    }
    
    
}
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
        include 'headerlink.php';
        ?>
    </head>
    <body>

        <?php
        include_once 'header.php';
        ?>
        <!-- Header section end -->
        <?php
        $success = isset($_GET['success']) ? $_GET['success'] : '';
        $failed = isset($_GET['failed']) ? $_GET['failed'] : '';
        if ($success != NULL) {
            ?>
            <div class="alert alert-success text-left"><strong><i class="fa fa-check"></i> Success !</strong>  <?php echo $success ?> </div>
            <?php
        }
        if ($failed != NULL) {
            ?>
            <div class="alert alert-danger text-left"><strong><i class="fa fa-warning"></i> Error !</strong>  <?php echo $failed ?> </div>
            <?php
        }
        ?>
        <div class="logo" ><div><span></span></div></div>
        <div class="main" >
            <div class=" template borders" >
                <div class="top" >
                    <div class="content">
                        <div class="bdr">
                        </div>
                    </div>
                </div>
                <div class="bottom" >
                    <div class="content">
                        <div class="bdr">
                        </div>
                    </div>
                </div>
                <div class="left" >
                    <div class="content">
                        <div class="bdr"></div>
                    </div>
                </div>
                <div class="right" >
                    <div class="content">
                        <div class="bdr"></div>
                    </div>
                </div>
            </div>
            <div class="container signin-div" >
                <div class="title">
                    <h1>Sign in</h1>
                    <p>To continue, please sign in below.</p>
                </div>
                <form id="create_customer" role="form" action="" method="post">
                    <div class="input" >
                        <div class="content" >
                            <label for="buyer_email" ><span>Email</span></label>
                            <input name="buyer_email" type="email"  />
                        </div>
                    </div>
                    <div class="input" >
                        <div class="content">
                            <label for="buyer_password" ><span>Password</span></label>
                            <input id="password" name="buyer_password"  type="password" />
                            <i class="mdi mdi-eye-off show_password" id="show_password" onclick="visible_password()"></i>
                        </div>
                        <div class="others" >
                            <div class="error-box" ></div>
                            <div class="forgot-password" >Forgot your account password? <a  href="forgot_password" >Recover account.</a></div>
                        </div>
                    </div>
                    <div class="">
                        <button type="submit"><span>Sign in</span></button>
                    </div>
                </form>
                <div class="sign-up-bar" >
                    <a href="signup"><span>Don't have an account?</span> Sign up</a>
                </div>
            </div>
        </div>
        <?php
        include 'footer.php';
        ?>
        <!-- Footer section end -->
    </body>

    <?php
    include 'footerlink.php';
    ?>
</html>
