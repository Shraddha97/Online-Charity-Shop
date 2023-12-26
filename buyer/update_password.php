<!DOCTYPE html>
<html>
    <head>
        <?php
        include 'headerlink.php';
        $b_id = isset($_GET['b_id']) ? $_GET['b_id'] : '';
        session_start();
        if (isset($_SESSION['buyer_session'])) {
            $buyer_id = $_SESSION['buyer_session'];
            if ($buyer_id !== $b_id) {
                header("location:update_password.php?b_id=$buyer_id");
            }
        } else {
            header("location:../signin");
        }
        ?>
    </head>
    <body>
        <?php
        include 'header.php';
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
        <section class="section-sm">
            <div class="container">
                <div class="col-md-6 offset-md-3 section-title text-uppercase">
                    <h2>Change Password</h2>
                    <span class="decor"></span>
                </div>
                <form class="contact-form" action="updating_buyer_password.php?b_id=<?php echo $b_id ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <input type="hidden" class="b_id" name="b_id" value="<?php echo $b_id ?>" />
                            <input type="password" placeholder="Old Password *" value="" name="old_pass" id="old_pass" required="">
                            <input type="password" placeholder="New Password *" value="" name="new_pass" id="new_pass" required="">
                            <input type="password" placeholder="Confirm Password *" value="" name="cpass" id="cpass" required="">
                            <div class="col-md-2 offset-md-8 card-right">
                                <button class="site-btn submit-order-btn" id="change_pass_btn" name="change_pass_btn" type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- Header section end -->
        <?php
        include 'footer.php';
        ?>
        <!-- Footer section end -->
    </body>
    <?php
    include 'footerlink.php';
    ?>
</html>