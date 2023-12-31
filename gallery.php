

<!DOCTYPE html>
<html lang="en" >

    <head>

        <?php
        include 'headerlink.php';
        ?>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.14/css/lightgallery.css" rel="stylesheet" type="text/css"/>

        <style>
            .lg-pager-outer{
                display: none
            }
            .small {
                font-size: 11px;
                color: #999;
                display: block;
                margin-top: -10px
            }

            .cont {
                text-align: center;
            }

            .page-head {
                padding: 60px 0;
                text-align: center;
            }

            .page-head .lead {
                font-size: 18px;
                font-weight: 400;
                line-height: 1.4;
                margin-bottom: 50px;
                margin-top: 0;
            }

            .btn {
                -moz-user-select: none;
                background-image: none;
                border: 1px solid transparent;
                border-radius: 2px;
                cursor: pointer;
                display: inline-block;
                font-size: 14px;
                font-weight: normal;
                line-height: 1.42857;
                margin-bottom: 0;
                padding: 6px 12px;
                text-align: center;
                vertical-align: middle;
                white-space: nowrap;
                text-decoration: none;
            }

            .btn-lg {
                border-radius: 2px;
                font-size: 18px;
                line-height: 1.33333;
                padding: 10px 16px;
            }

            .btn-primary:hover {
                background-color: #fff;
                color: #152836;
            }

            .btn-primary {
                background-color: #152836;
                border-color: #0e1a24;
                color: #ffffff;
            }

            .btn-primary {
                border-color: #eeeeee;
                color: #eeeeee;
                transition: color 0.1s ease 0s, background-color 0.15s ease 0s;
            }

            .page-head h1 {
                font-size: 42px;
                margin: 0 0 20px;
                color: #FFF;
                position: relative;
                display: inline-block;
            }

            .page-head h1 .version {
                bottom: 0;
                color: #ddd;
                font-size: 11px;
                font-style: italic;
                position: absolute;
                width: 58px;
                right: -58px;
            }

            .demo-gallery > ul {
                margin-bottom: 0;
                padding-left: 15px;
            }

            .demo-gallery > ul > li {
                margin-bottom: 15px;
                display: inline-block;
                margin-right: -3px;
                list-style: outside none none;
            }

            .demo-gallery > ul > li a {
                border: 3px solid #FFF;
                border-radius: 3px;
                display: block;
                overflow: hidden;
                position: relative;
                float: left;
            }

            .demo-gallery > ul > li a > img {
                -webkit-transition: -webkit-transform 0.15s ease 0s;
                -moz-transition: -moz-transform 0.15s ease 0s;
                -o-transition: -o-transform 0.15s ease 0s;
                transition: transform 0.15s ease 0s;
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
                height: 100%;
                width: 100%;
            }

            .demo-gallery > ul > li a:hover > img {
                -webkit-transform: scale3d(1.1, 1.1, 1.1);
                transform: scale3d(1.1, 1.1, 1.1);
            }

            .demo-gallery > ul > li a:hover .demo-gallery-poster > img {
                opacity: 1;
            }

            .demo-gallery > ul > li a .demo-gallery-poster {
                background-color: rgba(0, 0, 0, 0.1);
                bottom: 0;
                left: 0;
                position: absolute;
                right: 0;
                top: 0;
                -webkit-transition: background-color 0.15s ease 0s;
                -o-transition: background-color 0.15s ease 0s;
                transition: background-color 0.15s ease 0s;
            }

            .demo-gallery > ul > li a .demo-gallery-poster > img {
                left: 50%;
                margin-left: -10px;
                margin-top: -10px;
                opacity: 0;
                position: absolute;
                top: 50%;
                -webkit-transition: opacity 0.3s ease 0s;
                -o-transition: opacity 0.3s ease 0s;
                transition: opacity 0.3s ease 0s;
            }

            .demo-gallery > ul > li a:hover .demo-gallery-poster {
                background-color: rgba(0, 0, 0, 0.5);
            }

            .demo-gallery .justified-gallery > a > img {
                -webkit-transition: -webkit-transform 0.15s ease 0s;
                -moz-transition: -moz-transform 0.15s ease 0s;
                -o-transition: -o-transform 0.15s ease 0s;
                transition: transform 0.15s ease 0s;
                -webkit-transform: scale3d(1, 1, 1);
                transform: scale3d(1, 1, 1);
                height: 100%;
                width: 100%;
            }

            .demo-gallery .justified-gallery > a:hover > img {
                -webkit-transform: scale3d(1.1, 1.1, 1.1);
                transform: scale3d(1.1, 1.1, 1.1);
            }

            .demo-gallery .justified-gallery > a:hover .demo-gallery-poster > img {
                opacity: 1;
            }

            .demo-gallery .justified-gallery > a .demo-gallery-poster {
                background-color: rgba(0, 0, 0, 0.1);
                bottom: 0;
                left: 0;
                position: absolute;
                right: 0;
                top: 0;
                -webkit-transition: background-color 0.15s ease 0s;
                -o-transition: background-color 0.15s ease 0s;
                transition: background-color 0.15s ease 0s;
            }

            .demo-gallery .justified-gallery > a .demo-gallery-poster > img {
                left: 50%;
                margin-left: -10px;
                margin-top: -10px;
                opacity: 0;
                position: absolute;
                top: 50%;
                -webkit-transition: opacity 0.3s ease 0s;
                -o-transition: opacity 0.3s ease 0s;
                transition: opacity 0.3s ease 0s;
            }

            .demo-gallery .justified-gallery > a:hover .demo-gallery-poster {
                background-color: rgba(0, 0, 0, 0.5);
            }

            .demo-gallery .video .demo-gallery-poster img {
                height: 48px;
                margin-left: -24px;
                margin-top: -24px;
                opacity: 0.8;
                width: 48px;
            }

            .demo-gallery.dark > ul > li a {
                border: 3px solid #04070a;
            }
        </style>


    </head>

    <body translate="no" >
        <?php
        include 'header.php';
        ?>
        <!-- Header section end -->
        
        <section class="section-sm">
            <div class="container">
                <div class="section-title text-uppercase">
                    <h2>Gallery</h2>
                    <span class="decor"></span>
                </div>
                <div class="row">
                    <div class="demo-gallery col-md-12">
                        <ul id="lightgallery">
                            <?php
                                            require_once ('DB.php');
                                            $sql = "SELECT * FROM gallery order by id desc";
                                            $result = mysqli_query($conn, $sql);
                                            // output data of each row
                                            while ($row = mysqli_fetch_array($result)) {
                                                ?>
                            <li class="col-md-3" data-src="<?php echo $row ['image']; ?>">
                                <a href="javascript:void(0);">
                                    <img class="img-responsive" src="<?php echo $row ['thumbnail']; ?>">
                                    <div class="demo-gallery-poster">
                                        <img src="https://sachinchoolur.github.io/lightGallery/static/img/zoom.png">
                                    </div>
                                </a>
                            </li>
                            <?php
                                            }
                                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <?php
        include 'footer.php';
        ?>
    </body>
    <?php
    include 'footerlink.php';
    ?>
    <script src="plugins/lightbox/js/lightGallery.js" type="text/javascript"></script>
    <script id="rendered-js" >
        $(document).ready(() => {
            $("#lightgallery").lightGallery({
                pager: true});
        });
    </script>
</html>

