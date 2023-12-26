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
                header("location:searched_product.php?b_id=$buyer_id");
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
        <section class="section-sm">
            <div class="container">

                <div class="section-title text-uppercase">
                    <h2>Search Results</h2>
                    <span class="decor"></span>
                </div>
                <div class="row">

                    <?php
                    require_once ('DB.php');
                    $search = isset($_GET['search_keyword']) ? $_GET['search_keyword'] : '';
                    
                    $limit = 8;  // Number of entries to show in a page.
                    // Look for a GET variable page if not found default is 1.     
                    if (isset($_GET["page"])) { 
                      $pn  = $_GET["page"]; 
                    } 
                    else { 
                      $pn=1; 
                    };  
                  
                    $start_from = ($pn-1) * $limit;
                    
                    $sql_keyword = "SELECT * FROM products where (p_name like '%$search%' or fabric like '%$search%' or brand_name like '%$search%' or keywords like '%$search%') LIMIT $start_from, $limit";

                    $result_keyword = mysqli_query($conn, $sql_keyword);
                    while ($row_keyword = mysqli_fetch_array($result_keyword)) {
                        $p_id = $row_keyword['p_id'];
                            ?>
                            <div class="col-lg-3 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <?php
                                        $sql_thumb_img = "SELECT * FROM product_img where p_id='$p_id' limit 1";
                                        $result_thumb_img = mysqli_query($conn, $sql_thumb_img);
                                        // output data of each row
                                        while ($row_thumb_img = mysqli_fetch_array($result_thumb_img)) {
                                            $thumb_img = $row_thumb_img['thumbnail'];
                                            ?>
                                            <a href="product_details?p_id=<?php echo $row_keyword['p_id'] ?>&category=<?php echo $row_keyword['sub_category'] ?>&b_id=<?php echo $b_id ?>"><img src="../<?php echo $row_thumb_img['thumbnail']; ?>" alt=""></a>
                                            <?php
                                        }
                                        ?>
                                        <div class="pi-links">
                                            <div class="effect-ajax-cart">
                                                <input type="hidden" class="b_id" value="<?php echo $b_id ?>" />
                                                <input type="hidden" class="p_id" value="<?php echo $row['p_id'] ?>" />
                                                <input type="hidden" class="p_name" value="<?php echo $row['p_name']; ?>" />
                                                <input type="hidden" class="p_img" value="<?php echo $thumb_img ?>" />
                                                <input type="hidden" class="price" value="<?php echo $row['price']; ?>" />
                                                <a href="signin" class="add-card add-to-cart" id="add-to-cart"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pi-text">
                                        <h6><i class="fa fa-gbp"></i>&nbsp;
                                            <?php
                                            $product_price = preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $row_keyword['price']);
                                            echo trim($product_price);
                                            ?>
                                        </h6>
                                        <a href="product_details?p_id=<?php echo $row_keyword['p_id'] ?>&category=<?php echo $row_keyword['sub_category'] ?>&b_id=<?php echo $b_id ?>"><p><?php echo $row_keyword['p_name'] ?></p></a>
                                    </div>
                                </div>
                            </div>
                            <?php
                    }
                    ?>
                </div>
                
                <div class="row" style="float: right">
                    <ul id="pagination" class="pagination">
                      <?php  
                        $b_id = $_GET['b_id'];
                        
                        $sql = "SELECT COUNT(*) FROM products where (p_name like '%$search%' or fabric like '%$search%' or brand_name like '%$search%' or keywords like '%$search%')";  
                        $rs_result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_row($rs_result);  
                        $total_records = $row[0];  
                          
                        // Number of pages required.
                        $total_pages = ceil($total_records / $limit);  
                        $pagLink = "";                        
                        for ($i=1; $i<=$total_pages; $i++) {
                          if ($i==$pn) {
                            //   $pagLink .= "<li class='active'><a href='index.php?page=".$i."'>".$i."</a></li>";
                              $pagLink .= "<li class='active'><a href='searched_product?page=".$i."&search_keyword=".$search."&b_id=".$b_id."'>".$i."</a></li>";
                          }            
                          else  {
                              $pagLink .= "<li><a href='searched_product?page=".$i."&search_keyword=".$search."&b_id=".$b_id."'>".$i."</a></li>";  
                          }
                        };  
                        echo $pagLink;  
                      ?>
                    </ul>
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