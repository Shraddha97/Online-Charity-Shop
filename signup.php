<!DOCTYPE html>
<html>
    <head>
        <?php
        include 'headerlink.php';
        ?>
        <style>
            button:hover{
                cursor: pointer;
            }
            button:disabled {
  cursor: not-allowed;
  pointer-events: all !important;
}
        </style>
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
                    <h1>Sign up</h1>
                    <p>It's quick & easy</p>
                </div>
                <form id="create_customer" name="create_customer" action="insert_buyer_register" method="post">
                    <div class="input" >
                        <div class="content" >
                            <label for="f_name" ><span>Full Name *</span></label>
                            <input type="text" onkeyup="validate_allLetter(document.create_customer.f_name)" value="" name="f_name" id="f_name" required />
                            <div id="error_only_alphabets_request" class="alert alert-danger text-left hidden"><strong><i class="fa fa-warning"></i> Error !</strong>  Enter Only Alphabets. </div>
                        </div>
                    </div>
                    <div class="input" >
                        <div class="content" >
                            <label for="email"><span>Email Address *</span></label>
                            <input type="email" onkeyup="validate_email(document.create_customer.email)" value="" name="email" id="email" required="">
                            <div id="error_email_invalid" class="alert alert-danger text-left hidden"><strong><i class="fa fa-warning"></i> Error !</strong>  Enter Valid Email Address. </div>
                        </div>
                    </div>
                    <div class="input" >
                        <div class="content" >
                            <label for="number"><span>Mobile Number *</span></label>
                            <input type="number" onkeyup="validate_phonenumber(document.create_customer.phone)" value="" name="phone" id="phone" required="">
                            <div id="error_phone_length_request" class="alert alert-danger text-left hidden"><strong><i class="fa fa-warning"></i> Error !</strong>  Enter Valid Phone Number. </div>
                        </div>
                    </div>
                    <div class="input" >
                        <div class="content" >
                            <label for="password" ><span>Enter Password *</span></label>
                            <input id="password" name="password" type="password" required/>
                            <i class="mdi mdi-eye-off show_password" id="show_password" onclick="visible_password()"></i>
                        </div>
                    </div>
                    <div class="input" >
                        <div class="content">
                            <label for="cpassword" ><span>Confirm Password *</span></label>
                            <input id="cpassword" name="cpassword" type="password" required/>
                            <i class="mdi mdi-eye-off show_password" id="show_cpassword" onclick="visible_cpassword()"></i>
                            <div id="pass_confirm" class="alert alert-success text-left hidden"><strong><i class="fa fa-check"></i> Success !</strong>  Confirm password match ! </div>
                            <div id="pass_nt_confirm" class="alert alert-danger text-left hidden"><strong><i class="fa fa-warning"></i> Error !</strong>  Confirm password does not match ! </div>
                        </div>
                    </div>
                    <div class="">
                        <button type="submit" name="create_ac_btn" id="create_ac_btn" disabled="disabled"><span>Register</span></button>
                    </div>
                </form>
                <div class="sign-up-bar" >
                    <a href="signin"><span>Already have an account?</span> Sign in</a>
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