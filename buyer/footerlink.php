<!--====== Javascripts & Jquery ======-->
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.slicknav.min.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/jquery.nicescroll.min.js"></script>
<script src="../js/jquery.zoom.min.js"></script>
<script src="../js/jquery-ui.min.js"></script>
<script src="main.js"></script>
<script src="../js/form.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $(".add-to-cart").on("click", function (e) {
            e.preventDefault();
            var $form = $(this).closest(".add_to_cart_form");
            var b_id = $form.find(".b_id").val();
            var p_id = $form.find(".p_id").val();
            var p_name = $form.find(".p_name").val();
            var p_img = $form.find(".p_img").val();
            var price = $form.find(".price").val();
            var p_qty=1;
            $.ajax({
                url: "add_to_cart.php",
                method: 'POST',
                data: {p_id: p_id, p_name: p_name, p_img: p_img, price: price, b_id: b_id, p_qty: p_qty},
                success: function (response) {
                    $("#cart_msg").html(response);
                    load_cart_item_number();
                }
            });
        });

        load_cart_item_number();

        function load_cart_item_number() {
            var b_id = $(".b_id").val();
            $.ajax({
                url: "add_to_cart.php",
                method: 'GET',
                data: {cartItem: "cart_item", b_id: b_id},
                success: function (response) {
                    $(".cart_number").html(response);
                }
            });
        }
    });
    // Get the snackbar DIV
    var x = document.getElementById("snackbar");
    // Add the "show" class to DIV
    x.className = "show_result";
    // After 3 seconds, remove the show class from DIV
    setTimeout(function () {
        x.className = x.className.replace("show_result", "");
    }, 3000);
</script>