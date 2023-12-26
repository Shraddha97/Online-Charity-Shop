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
                    <h1>Forgot Password</h1>
                    <p>Find Your Account</p>
                </div>
                <form id="create_customer" action="resetting_password" method="post">
                    <div class="input" >
                        <div class="content" >
                            <label for="buyer_email" ><span>Enter Registered Email Address *</span></label>
                            <input name="buyer_email" type="email"  required/>
                        </div>
                    </div>
                    <div class="">
                        <button name="reset_password" type="submit"><span>Submit</span></button>
                    </div>
                </form>
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