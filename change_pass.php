<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php
        include 'admin_headerlink.php';
        session_start();
        if (isset($_SESSION['user'])) {
            
        } else {
            header("location:login");
        }
        ?>
    </head>
    <body class="theme-purple">
        <?php
        include 'admin_header.php';
        ?>
        <?php
        include 'adminleftsidebar.php';
        ?>
        <section class="content">
            <div class="container-fluid">
                <div class="block-header">
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
                    <!-- Basic Examples -->
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h2>
                                        Change Password
                                    </h2>
                                </div>
                                <div class="body">
                                    <div class="table-responsive" style="overflow: hidden">
                                        <form role="form" action="update_pass" method="post">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock</i>
                                                </span>
                                                <div class="form-line">
                                                    <input type="password" class="form-control" name="old_pass" placeholder="Old Password" required>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock</i>
                                                </span>
                                                <div class="form-line">
                                                    <input type="password" class="form-control" name="new_pass" placeholder="New Password" required>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock</i>
                                                </span>
                                                <div class="form-line">
                                                    <input type="password" class="form-control" name="cpass" placeholder=" Confirm Password" required>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12 col-md-4 col-lg-4">
                                                    <button class="btn btn-block bg-purple waves-effect" type="submit">Change Password</button>
                                                </div>
                                            </div> 
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- #END# Exportable Table -->
                </div>
            </div>
        </section>

        <?php
        include 'admin_footer.php';
        ?>
    </body>
</html>
