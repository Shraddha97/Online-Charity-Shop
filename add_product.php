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
                                    Add Product Information
                                </h2>
                            </div>
                            <div class="body">
                                <!--                                <div class="row clearfix">
                                                                    <div class="col-md-12 instruction">
                                                                        <h5>Instructions: </h5>
                                                                        <ul>
                                                                            <li>Image Dimension should be 400X300 (in pixels)</li>
                                                                            <li>Use <strong>^</strong> icon to write in a point.</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>-->
                                <?php
                                require_once 'DB.php';
                                $sql1 = "select p_id from products order by p_id desc limit 0,1";
                                $result1 = mysqli_query($conn, $sql1);
                                // output data of each row
                                if ($row1 = mysqli_fetch_array($result1)) {
                                    $id = $row1 ['p_id'] + 1;
                                } else {
                                    $id = 10001;
                                }
                                ?>
                                <form action="insert_product" method="post" enctype="multipart/form-data">
                                    <div class="row clearfix">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                <label for="p_id">Product Number</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="hidden" id="p_id" class="form-control" name="p_id" value="<?php echo $id; ?>">
                                                        <input type="text" class="form-control" value="<?php echo $id; ?>" disabled="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="p_name">Product Title</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="p_name" placeholder="" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="p_category">Product Category</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <select class="form-control" name="p_category" id="p_category" required="">
                                                            <option value="">--- Select ---</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="p_sub">Product Sub-Category</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <select class="form-control" name="p_sub" id="p_sub" required="">
                                                            <option value="">--- Select ---</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="p_type">Product Type</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <select class="form-control" name="p_type" id="p_type" required="">
                                                            <option value="">--- Select ---</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="fabric">Product Description</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="fabric" placeholder="" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="brand_name">Product Brand</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" name="brand_name" placeholder="" required="">
                                                    </div>
                                                </div>
                                            </div>                                            
                                            <div class="col-md-4">
                                                <label for="price">Product Price</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input type="number" class="form-control" name="price" placeholder="" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Product Size</label><br/><br/>
                                                <div class="demo-checkbox">
                                                    <div class="col-md-2">
                                                        <input type="checkbox" name="size[]" value="XS" id="XS" class="chk-col-purple" />
                                                        <label for="XS">X-Small</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="checkbox" name="size[]" value="S" id="S" class="chk-col-purple" />
                                                        <label for="S">Small</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="checkbox" name="size[]" value="M" id="M" class="chk-col-purple" />
                                                        <label for="M">Medium</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="checkbox" name="size[]" value="L" id="L" class="chk-col-purple" />
                                                        <label for="L">Large</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="checkbox" name="size[]" value="XL" id="XL" class="chk-col-purple" />
                                                        <label for="XL">X-Large</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="checkbox" name="size[]" value="XXL" id="XXL" class="chk-col-purple" />
                                                        <label for="XXL">XX-Large</label>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input type="checkbox" name="size[]" value="Free" id="Free" class="chk-col-purple" />
                                                        <label for="Free">Free</label>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <hr>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <label for="product_keywords">Product Keywords</label>
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <textarea class="form-control" name="product_keywords" required=""></textarea>
                                                    </div>
                                                    <p class="note">Seperate keyword using <strong>^</strong></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-xs-12 col-md-3 col-lg-3">
                                            <input class="btn btn-block bg-purple waves-effect" type="submit" value="Next" name="product_submit">
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
    <script>
        var subjectObject = {
            // customized-products
            "Kitchen": {
                // curtains, sofa
                "Mugs": ["Mugs"],
                "Dinnerware": ["Dinnerware"]
                
                // "Vegetable&Fruits": ["Vegetable&Fruits"]
            },
            // Fabrics
            "Fashion": {
              /*  "Imported": ["Zurich", "4-Way Lycra", "NS-Lycra", "Multi-purpose Lycra"],
                "Indian": ["Polyster Jercey", "Printed Jercey", "Astar Fabric", "Curtain Fabric"]*/
                 "Mens Wear": ["T-shirts","Jeans","Shoes"],
                 "Womens Wear": ["Jeans", "T-shirts", "Shoes"]

            },
            "Accessories": {
              /*  "Imported": ["Zurich", "4-Way Lycra", "NS-Lycra", "Multi-purpose Lycra"],
                "Indian": ["Polyster Jercey", "Printed Jercey", "Astar Fabric", "Curtain Fabric"]*/
                 "Jewellery": ["Jewellery"],
                 "Deodrants": ["Deodrants"]

            },
            // Garments
            "Home Decor": {
             /*   "Mens Wear": ["Shirts", "T-shirts", "Jeans", "Track Pants", "Shorts", "Cotton 3/4", "Swimming Trunks"],
                "Womens Wear": ["Jeans", "Tops", "Leggings", "Nighties", "Night Suits", "Swimming Costumes"],
                "Kids Wear": ["T-shirts", "Track Pants", "Swimming Costumes"]*/
                "Flooring": ["Flooring"],
                "Bath": ["Bath Towels"]
               
                
            }
        };
        window.onload = function () {
            var categorySel = document.getElementById("p_category");
            var subSel = document.getElementById("p_sub");
            var typeSel = document.getElementById("p_type");
            for (var x in subjectObject) {
                categorySel.options[categorySel.options.length] = new Option(x, x);
            }
            categorySel.onchange = function () {
                    //empty Chapters- and Topics- dropdowns
                    typeSel.length = 1;
                    subSel.length = 1;
                //display correct values
                for (var y in subjectObject[this.value]) {
                    subSel.options[subSel.options.length] = new Option(y, y);
                }
            };
            subSel.onchange = function () {
                    //empty Chapters dropdown
                    typeSel.length = 1;
                //display correct values
                var z = subjectObject[categorySel.value][this.value];
                for (var i = 0; i < z.length; i++) {
                    typeSel.options[typeSel.options.length] = new Option(z[i], z[i]);
                }
            };
        };
    </script>
</html>
