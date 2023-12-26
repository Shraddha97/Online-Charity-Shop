<!DOCTYPE html>
<html>
    <head>
        <?php
        include 'headerlink.php';
        $b_id = isset($_GET['b_id']) ? $_GET['b_id'] : '';
        session_start();
        if (isset($_SESSION['buyer_session'])) {
            $buyer_id= $_SESSION['buyer_session'];
            if($buyer_id !== $b_id){
                header("location:about-us.php?b_id=$buyer_id");
            }
        } else {
            header("location:../signin");
        }
        ?>
        <style>
            .banner h2, .banner span, .banner p{
                color: #fff;
            }
            .banner p, .about-section p{
                font-size: 17px;
            }
        </style>
    </head>
    <body>
        <?php
        include 'header.php';
        ?>
        <!-- Header section end -->
        
        <section class="section-sm about-section">
            <div class="container">
                <div class="section-title text-uppercase">
                    <h2>About Rushabh Trading Co</h2>
                    <span class="decor"></span>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p>
                            Rushabh Trading co. is a young enterprise that manufactures good quality garments and fabrics for personal as well as business use.
                        </p> 
                        <p>
                            We here are committed to keep the client at competitive edge by consistently providing superior quality and competitive price.
                        </p>
                        <p>Our vision is to emerge as a large manufacturing destination for retailers looking at sourcing value products</p>
                        <p>We import as well as manufacture knitted fabrics that are used for sports wear, bottom wear purpose.</p>
                    </div>
                    <div class="col-md-6">
                        <img src="../img/bg-2.jpg" class="img-responsive"/>
                    </div>
                    <div class="col-md-12 order-sm-1">
                        <p>We also customize curtains, sofa covers, cushions etc as per client needs.</p>
                        <p>We also sell gents, ladies and kids garments on wholesale as well as retail basis.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="banner-section">
            <div class="banner set-bg" data-setbg="../img/bg.jpg" style="background-image: url(&quot;../img/bg.jpg&quot;);">
                <div class="container">
                    <h2>WHY CHOOSE US ?</h2>
                    <p>Our services, price, superior quality, timely delivery and knowledge of fashion.</p>
                    <p>We assure comfortable and wearable fashion wear.</p>
                    <p>We do customize products as per your choice.</p>
                    <p>Customize your own designs, we bring your vision to reality.</p>
                    <p>On time delivery with in house production of maximum products.</p>
                    <p>Fashionable clothes is our speciality.</p>
                    <p>Comfortable with small quantities.</p>
                    <a href="javascript:void(0);" class="site-btn">SHOP NOW</a>
                </div>
            </div>
        </section>
        <?php
        include 'footer.php';
        ?>
        <!-- Footer section end -->
    </body>
    <?php
    include 'footerlink.php';
    ?>
</html>