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
    <body class="theme-purple ls-opened">
        <?php
        include 'admin_header.php';
        ?>
        <?php
        include 'adminleftsidebar.php';
        ?>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div>
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
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Manage Gallery Image
                                </h2>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th>Thumbnail</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require_once ('DB.php');
                                            $sql = "SELECT * FROM gallery order by id desc";
                                            $result = mysqli_query($conn, $sql);
                                            // output data of each row
                                            while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                <tr>
                                                    <td><img style="width: 100px" src="<?php echo $row ['thumbnail']; ?>"/></td>
                                                    <td><img style="width: 100px" src="<?php echo $row ['image']; ?>"/></td>
                                                    <td style="vertical-align: middle">
                                                        <a class="btn bg-purple btn-circle waves-effect waves-circle waves-float" href="delete_gallery_img?id=<?php echo $row ["id"]; ?>" title="Delete Image">
                                                            <i class="material-icons">delete_forever</i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </section>
        <?php
        include 'admin_footer.php';
        ?>
    </body>
</html>