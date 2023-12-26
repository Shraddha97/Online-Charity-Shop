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
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Upload Gallery Image
                                </h2>
                            </div>
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-md-12 instruction">
                                        <h5>Instructions: </h5>
                                        <ul>
                                            <li>Thumbnail Image Dimension should be 400X300 (in pixels)</li>
                                        </ul>
                                    </div>
                                </div>
                                <form action="insert_gallery" method="post" enctype="multipart/form-data">
                                    <div class="row clearfix">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label for="thumbnail">Image Thumbnail</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="file" class="form-control" name="thumbnail" placeholder="" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="img">Image</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="file" class="form-control" name="img" placeholder="" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-xs-12 col-md-3 col-lg-3">
                                            <input class="btn btn-block bg-purple waves-effect" type="submit" value="Upload" name="gallery_submit">
                                        </div>
                                    </div>
                                </form>
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
