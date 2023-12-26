<html lang="en" dir="ltr" class="no-js windows chrome desktop page--no-banner page--logo-main page--show page--show card-fields">
    <?php
    require_once ('DB.php');
    require_once '../razorpay-php/Razorpay.php';

    use \Razorpay\Api\Api;

$key_id = 'rzp_test_nnta1oVAq4Ol6t';
    $secret_key = '1gi7yvKJEbpVd0Sh3nzViPIN';
    $api = new Api($key_id, $secret_key);

    $ot_id = isset($_GET['ot_id']) ? $_GET['ot_id'] : '';
    $sql = "SELECT * FROM order_details where id='$ot_id'";
    $result = mysqli_query($conn, $sql);
// output data of each row
    while ($row = mysqli_fetch_array($result)) {
        $b_id = $row['b_id'];
        $buyer_name = $row['b_fname'] . $row['b_lname'];
        $order_p_price = $row ['total_amt'];
        $grand_total = $order_p_price * 100;
        $sql_bemail = "SELECT * FROM buyer_register where b_id='$b_id'";
        $result_bemail = mysqli_query($conn, $sql_bemail);
// output data of each row
        while ($row_bemail = mysqli_fetch_array($result_bemail)) {
            $buyer_email = $row_bemail['b_email'];
        }
    }


    $order = $api->order->create(array(
        'receipt' => $ot_id,
        'amount' => $grand_total,
        'payment_capture' => 1,
        'currency' => 'GBP',
            )
    );
    ?>
    <meta name="viewport" content="width=device-width">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, height=device-height, minimum-scale=1.0, user-scalable=0">
        <meta name="referrer" content="origin">

        <title>Rushabh Trading Co.</title>
        <!-- Favicon icon -->
        <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon" >        <!--[if lt IE 9]>
        <link rel="stylesheet" media="all" href="//cdn.shopify.com/app/services/9087252/assets/41982083/checkout_stylesheet/v2-ltr-edge-645dd6bbb6edc8e2f5ec027ddcccfb79-91/oldie" />
        <![endif]-->
        <link href="//cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css" rel="stylesheet" type="text/css">
        <!--[if gte IE 9]><!-->
        <link rel="stylesheet" media="all" href="//cdn.shopify.com/app/services/9087252/assets/41982083/checkout_stylesheet/v2-ltr-edge-645dd6bbb6edc8e2f5ec027ddcccfb79-91" />

        <!--<![endif]-->

        <script src="//cdn.shopify.com/s/assets/checkout-d9efd16c27be9fca2d15e1380447ff8dfc7290d649952e43c9951ef2b72d485f.js" crossorigin="anonymous"></script>
        <style>

            @media (min-width: 1000px){
                .order-summary__sections {
                    height: auto !important;
                }
            }
            .razorpay-payment-button:hover{
                color: #23243d !important;
                background-color: transparent !important;
                border-color: #23243d !important;
                outline: 0;
                -webkit-box-shadow: 0 5px 11px 0 rgba(0,0,0,0.18), 0 4px 15px 0 rgba(0,0,0,0.15);
                box-shadow: 0 5px 11px 0 rgba(0,0,0,0.18), 0 4px 15px 0 rgba(0,0,0,0.15);
                text-decoration: none;
            }
            .razorpay-payment-button{
                border-radius: 10em;
                display: block;
                cursor: pointer;
                padding-top: .7rem;
                padding-bottom: .7rem;
                color: #fff !important;
                background-color: #23243d !important;
                border: 2px solid #23243d !important;
                text-transform: uppercase;
                word-wrap: break-word;
                white-space: normal;
                cursor: pointer;
                -webkit-box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);
                box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);
                -webkit-transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
                transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
                transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
                transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
                padding: .84rem 3.14rem;
                font-size: 15px;
                position: relative;
                overflow: hidden;
                cursor: pointer;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                -webkit-tap-highlight-color: transparent;
                margin: auto;
                margin-bottom: 50px;
                font-weight: 600;
            }
        </style>

        <?php
        $random_url = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 1000000);
        $b_id = isset($_GET['b_id']) ? $_GET['b_id'] : '';
        session_start();
        if (isset($_SESSION['buyer_session'])) {
            $buyer_id = $_SESSION['buyer_session'];
            if ($buyer_id !== $b_id) {
                header("location:make_payment.php?$random_url&$random_url&b_id=$buyer_id&ot_id=$ot_id&$random_url&$random_url");
            }
        } else {
            header("location:../signin");
        }
        ?>
    </head>
    <body>
        <header class="banner" data-header role="banner">
            <a class="logo--left hidden-lg hidden-md hidden-sm" href="javascript:void(0);">
                <span class="logo__text heading-1">
                    <img src="../img/logo.png" style="padding-left: 10px;width:200px">
                </span>
            </a>
        </header>
        <div class="content" data-content>
            <div class="wrap">
                <div class="main">
                    <header class="main__header" role="banner">
                        <a class="logo logo--left" href="javascript:void(0);"><span class="logo__text heading-1"><img width="200" src="../img/logo.png"/></span></a>
                    </header>
                    <?php
                    $sql_shipping_details = "SELECT * FROM buyer_details where b_id=$b_id";
                    $result_shipping_details = mysqli_query($conn, $sql_shipping_details);
                    while ($row_shipping_details = mysqli_fetch_array($result_shipping_details)) {
                        ?>
                        <div class="step__sections">
                            <div class="section section--contact-information">
                                <div class="section__header">
                                    <div class="layout-flex layout-flex--tight-vertical layout-flex--loose-horizontal layout-flex--wrap">
                                        <h2 class="section__title layout-flex__item layout-flex__item--stretch" id="main-header">
                                            Contact information
                                        </h2>
                                    </div>
                                </div>
                                <div class="section__content">
                                    <div class="fieldset">
                                        <div class="address-fields" data-address-fields>
                                            <div class="field--half field field--optional" data-address-field="first_name">
                                                <label class="field__label" for="checkout_fname">First name</label>
                                                <div class="field__input-wrapper">
                                                    <input placeholder="First name" value="<?php echo $row_shipping_details["b_fname"]; ?>" autocomplete="shipping given-name" autocorrect="off" data-backup="first_name" class="field__input" size="30" type="text" name="checkout_fname" id="checkout_fname" disabled=""/>
                                                </div>
                                            </div>
                                            <div class="field--half field field--disabled" data-address-field="last_name">
                                                <label class="field__label" for="checkout_lname">Last name</label>
                                                <div class="field__input-wrapper">
                                                    <input placeholder="Last name" value="<?php echo $row_shipping_details["b_lname"]; ?>" autocomplete="shipping family-name" autocorrect="off" data-backup="last_name" class="field__input" aria-disabled="true" size="30" type="text" name="checkout_lname" id="checkout_lname"  disabled=""/>
                                                </div>
                                            </div>
                                            <div class="field field--disabled">
                                                <div class="field__input-wrapper field__input-wrapper--icon-right">
                                                    <label class="field__label field__label--visible" for="checkout_phone">Phone</label>
                                                    <input placeholder="Phone" value="<?php echo $row_shipping_details["b_phone"]; ?>" class="field__input field__input--numeric" size="30" type="tel" name="checkout_phone" id="checkout_phone"  disabled=""/>
                                                    <div class="field__icon">
                                                        <div data-tooltip="true" id="phone_tooltip" class="tooltip-container"><button type="button" class="tooltip-control" data-tooltip-control="true" aria-label="More information" aria-describedby="tooltip-for-phone" aria-controls="tooltip-for-phone" aria-pressed="false"><svg class="icon-svg icon-svg--color-adaptive-lighter icon-svg--size-16 icon-svg--block icon-svg--center" role="presentation" aria-hidden="true" focusable="false"> <use xlink:href="#question" /> </svg></button><span class="tooltip" role="tooltip" id="tooltip-for-phone">In case we need to contact you about your order</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="field field--disabled">
                                                <div class="field__input-wrapper field__input-wrapper--icon-right">
                                                    <label class="field__label field__label--visible" for="checkout_phone_a">Phone (optional)</label>
                                                    <input placeholder="Phone (optional)" value="<?php echo $row_shipping_details["b_aphone"]; ?>" class="field__input field__input--numeric" size="30" type="tel" name="checkout_phone_a" id="checkout_phone_a"  disabled=""/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>

                            <div class="section section--shipping-address" data-shipping-address>
                                <div class="section__header">
                                    <h2 class="section__title" id="section-delivery-title">
                                        Shipping address
                                    </h2>
                                </div>
                                <div class="section__content">
                                    <div class="section__content">
                                        <div class="fieldset">
                                            <div class="address-fields" data-address-fields>
                                                <div data-address-field="address1" data-autocomplete-field-container="true" class="field field--disabled">
                                                    <label class="field__label" for="checkout_address1">Address Line 1</label>
                                                    <div class="field__input-wrapper">
                                                        <input placeholder="Address Line 1" value="<?php echo $row_shipping_details["address_line_1"]; ?>" class="field__input" size="30" type="text" name="checkout_address1" id="checkout_address1"  disabled="" />
                                                    </div>
                                                </div>
                                                <div data-address-field="address2" data-autocomplete-field-container="true" class="field field--optional">
                                                    <label class="field__label" for="checkout_address2">Address Line 2</label>
                                                    <div class="field__input-wrapper">
                                                        <input placeholder="Address Line 2" value="<?php echo $row_shipping_details["address_line_2"]; ?>" autocomplete="shipping address-line2" autocorrect="off" data-backup="address2" class="field__input" size="30" type="text" name="checkout_address2" id="checkout_address2"  disabled=""/>
                                                    </div>
                                                </div>
                                                <div data-address-field="city" data-autocomplete-field-container="true" class="field field--disabled">
                                                    <label class="field__label" for="checkout_city">City</label>
                                                    <div class="field__input-wrapper">
                                                        <input placeholder="City" value="<?php echo $row_shipping_details["city"]; ?>" autocomplete="shipping address-level2" autocorrect="off" data-backup="city" class="field__input" aria-disabled="true" size="30" type="text" name="checkout_city" id="checkout_city"  disabled="" />
                                                    </div>
                                                </div>
                                                <div class="field--third field field--disabled" data-address-field="zip" data-autocomplete-field-container="true">
                                                    <label class="field__label" for="checkout_zip">Pincode code</label>
                                                    <div class="field__input-wrapper">
                                                        <input placeholder="Pincode code" value="<?php echo $row_shipping_details["pincode"]; ?>" class="field__input field__input--zip" aria-disabled="true" size="30" type="text" name="checkout_zip" id="checkout_zip"  disabled="" />
                                                    </div>
                                                </div>
                                                <div class="field--third field field--disabled" data-address-field="province" data-autocomplete-field-container="true">
                                                    <label class="field__label" for="checkout_state">State</label>
                                                    <div class="field__input-wrapper field__input-wrapper--select">
                                                        <select size="1" autocomplete="shipping state" data-backup="state" class="field__input field__input--select" aria-disabled="true" name="checkout_state" id="checkout_state"  disabled="">
                                                            <option value="">State</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Andaman and Nicobar Islands") { ?> selected=""  <?php } ?> value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Andhra Pradesh") { ?> selected=""  <?php } ?> value="Andhra Pradesh">Andhra Pradesh</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Arunachal Pradesh") { ?> selected=""  <?php } ?> value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Assam") { ?> selected=""  <?php } ?> value="Assam">Assam</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Bihar") { ?> selected=""  <?php } ?> value="Bihar">Bihar</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Chandigarh") { ?> selected=""  <?php } ?> value="Chandigarh">Chandigarh</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Chattisgarh") { ?> selected=""  <?php } ?> value="Chattisgarh">Chhattisgarh</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Dadra and Nagar Haveli") { ?> selected=""  <?php } ?> value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Daman and Diu") { ?> selected=""  <?php } ?> value="Daman and Diu">Daman and Diu</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Delhi") { ?> selected=""  <?php } ?> value="Delhi">Delhi</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Goa") { ?> selected=""  <?php } ?> value="Goa">Goa</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Gujarat") { ?> selected=""  <?php } ?> value="Gujarat">Gujarat</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Haryana") { ?> selected=""  <?php } ?> value="Haryana">Haryana</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Himachal Pradesh") { ?> selected=""  <?php } ?> value="Himachal Pradesh">Himachal Pradesh</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Jammu and Kashmir") { ?> selected=""  <?php } ?> value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Jharkhand") { ?> selected=""  <?php } ?> value="Jharkhand">Jharkhand</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Karnataka") { ?> selected=""  <?php } ?> value="Karnataka">Karnataka</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Kerala") { ?> selected=""  <?php } ?> value="Kerala">Kerala</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Ladakh") { ?> selected=""  <?php } ?> value="Ladakh">Ladakh</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Lakshadweep") { ?> selected=""  <?php } ?> value="Lakshadweep">Lakshadweep</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Madhya Pradesh") { ?> selected=""  <?php } ?> value="Madhya Pradesh">Madhya Pradesh</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Maharashtra") { ?> selected=""  <?php } ?> value="Maharashtra">Maharashtra</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Manipur") { ?> selected=""  <?php } ?> value="Manipur">Manipur</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Meghalaya") { ?> selected=""  <?php } ?> value="Meghalaya">Meghalaya</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Mizoram") { ?> selected=""  <?php } ?> value="Mizoram">Mizoram</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Nagaland") { ?> selected=""  <?php } ?> value="Nagaland">Nagaland</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Odisha") { ?> selected=""  <?php } ?> value="Odisha">Odisha</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Puducherry") { ?> selected=""  <?php } ?> value="Puducherry">Puducherry</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Punjab") { ?> selected=""  <?php } ?> value="Punjab">Punjab</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Rajasthan") { ?> selected=""  <?php } ?> value="Rajasthan">Rajasthan</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Sikkim") { ?> selected=""  <?php } ?> value="Sikkim">Sikkim</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Tamil Nadu") { ?> selected=""  <?php } ?> value="Tamil Nadu">Tamil Nadu</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Telangana") { ?> selected=""  <?php } ?> value="Telangana">Telangana</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Tripura") { ?> selected=""  <?php } ?> value="Tripura">Tripura</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Uttar Pradesh") { ?> selected=""  <?php } ?> value="Uttar Pradesh">Uttar Pradesh</option>
                                                            <option <?php if ($row_shipping_details['state'] === "Uttarakhand") { ?> selected=""  <?php } ?> value="Uttarakhand">Uttarakhand</option>
                                                            <option <?php if ($row_shipping_details['state'] === "West Bengal") { ?> selected=""  <?php } ?> value="West Bengal">West Bengal</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="field--third field field--disabled" data-address-field="country" data-autocomplete-field-container="true">
                                                    <label class="field__label" for="checkout_country">Country</label>
                                                    <div class="field__input-wrapper field__input-wrapper--select">
                                                        <select size="1" autocomplete="shipping country" data-backup="country" class="field__input field__input--select" aria-disabled="true" name="checkout_country" id="checkout_country"  disabled="">
                                                            <option data-code="IN" selected="selected" value="India">India</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--                                                <div class="field">
                                                                                                <div class="checkbox-wrapper">
                                                                                                    <div class="checkbox__input">
                                                                                                        <input size="30" type="hidden" name="checkout[remember_me]" />
                                                                                                        <input name="checkout[remember_me]" type="hidden" value="0" /><input class="input-checkbox" data-backup="remember_me" type="checkbox" value="1" name="checkout[remember_me]" id="checkout_remember_me" />
                                                                                                    </div>
                                                                                                    <label class="checkbox__label" for="checkout_remember_me">
                                                                                                        Save this information for next time
                                                                                                    </label>
                                                                                                </div>
                                                                                            </div>-->
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="step__footer" data-step-footer>
                                <form action="payment_success?b_id=<?php echo $b_id ?>" method="POST">
                                    <input type="hidden" name="ot_id" value="<?php echo $ot_id ?>"/>
                                    <input type="hidden" name="b_id" value="<?php echo $b_id ?>"/>
                                    <script
                                        src="https://checkout.razorpay.com/v1/checkout.js"    
                                        data-key="<?php echo $key_id ?>"
                                        data-amount="<?php echo $order->amount ?>" 
                                        data-currency="GBP"
                                        data-order_id="<?php echo $order->id ?>"
                                        data-buttontext="Make Payment"
                                        data-name="Rushabh Trading Co."
                                        data-description="Total Amount"
                                        data-image="../img/favicon.png"
                                        data-prefill.name="<?php echo $buyer_name ?>"
                                        data-prefill.email="<?php echo $buyer_email ?>"
                                        data-theme.color="#F86D2A">
                                    </script>
                                    <input type="hidden" custom="Hidden Element" name="hidden">
                                </form>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div id="partial-icon-symbols" class="icon-symbols" data-tg-refresh="partial-icon-symbols" data-tg-refresh-always="true"><svg xmlns="http://www.w3.org/2000/svg"><symbol id="info"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 11h1v7h-2v-5c-.552 0-1-.448-1-1s.448-1 1-1h1zm0 13C5.373 24 0 18.627 0 12S5.373 0 12 0s12 5.373 12 12-5.373 12-12 12zm0-2c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10zM10.5 7.5c0-.828.666-1.5 1.5-1.5.828 0 1.5.666 1.5 1.5 0 .828-.666 1.5-1.5 1.5-.828 0-1.5-.666-1.5-1.5z"/></svg></symbol>
                    <symbol id="caret-down"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10"><path d="M0 3h10L5 8" fill-rule="nonzero"/></svg></symbol>
                    <symbol id="question"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm.7 13H6.8v-2h1.9v2zm2.6-7.1c0 1.8-1.3 2.6-2.8 2.8l-.1 1.1H7.3L7 7.5l.1-.1c1.8-.1 2.6-.6 2.6-1.6 0-.8-.6-1.3-1.6-1.3-.9 0-1.6.4-2.3 1.1L4.7 4.5c.8-.9 1.9-1.6 3.4-1.6 1.9.1 3.2 1.2 3.2 3z"/></svg></symbol>
                    <symbol id="powered-by-google"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 116 15"><path fill="#737373" d="M4.025 3.572c1.612 0 2.655 1.283 2.655 3.27 0 1.974-1.05 3.27-2.655 3.27-.902 0-1.63-.393-1.974-1.06h-.09v3.057H.95V3.68h.96v1.054h.094c.404-.726 1.16-1.166 2.02-1.166zm-.24 5.63c1.16 0 1.852-.884 1.852-2.36 0-1.477-.692-2.362-1.846-2.362-1.14 0-1.86.91-1.86 2.362 0 1.447.72 2.36 1.857 2.36zm7.072.91c-1.798 0-2.912-1.243-2.912-3.27 0-2.033 1.114-3.27 2.912-3.27 1.8 0 2.913 1.237 2.913 3.27 0 2.027-1.114 3.27-2.913 3.27zm0-.91c1.196 0 1.87-.866 1.87-2.36 0-1.5-.674-2.362-1.87-2.362-1.195 0-1.87.862-1.87 2.362 0 1.494.675 2.36 1.87 2.36zm12.206-5.518H22.05l-1.244 5.05h-.094L19.3 3.684h-.966l-1.412 5.05h-.094l-1.242-5.05h-1.02L16.336 10h1.02l1.406-4.887h.093L20.268 10h1.025l1.77-6.316zm3.632.78c-1.008 0-1.71.737-1.787 1.856h3.48c-.023-1.12-.69-1.857-1.693-1.857zm1.664 3.9h1.005c-.305 1.085-1.277 1.747-2.66 1.747-1.752 0-2.848-1.262-2.848-3.26 0-1.987 1.113-3.276 2.847-3.276 1.705 0 2.742 1.213 2.742 3.176v.386h-4.542v.047c.053 1.248.75 2.04 1.822 2.04.815 0 1.366-.3 1.63-.857zM31.03 10h1.01V6.086c0-.89.696-1.535 1.657-1.535.2 0 .563.038.645.06V3.6c-.13-.018-.34-.03-.504-.03-.838 0-1.565.434-1.752 1.05h-.094v-.938h-.96V10zm6.915-5.537c-1.008 0-1.71.738-1.787 1.857h3.48c-.023-1.12-.69-1.857-1.693-1.857zm1.664 3.902h1.005c-.304 1.084-1.277 1.746-2.66 1.746-1.752 0-2.848-1.262-2.848-3.26 0-1.987 1.113-3.276 2.847-3.276 1.705 0 2.742 1.213 2.742 3.176v.386h-4.542v.047c.053 1.248.75 2.04 1.822 2.04.815 0 1.366-.3 1.63-.857zm5.01 1.746c-1.62 0-2.657-1.28-2.657-3.266 0-1.98 1.05-3.27 2.654-3.27.878 0 1.622.416 1.98 1.108h.087V1.177h1.008V10h-.96V8.992h-.094c-.4.703-1.15 1.12-2.02 1.12zm.232-5.63c-1.15 0-1.846.89-1.846 2.364 0 1.476.69 2.36 1.846 2.36 1.148 0 1.857-.9 1.857-2.36 0-1.447-.715-2.362-1.857-2.362zm7.875-3.115h1.024v3.123c.23-.3.507-.53.827-.688.32-.16.668-.238 1.043-.238.78 0 1.416.27 1.9.806.49.537.73 1.33.73 2.376 0 .992-.24 1.817-.72 2.473-.48.656-1.145.984-1.997.984-.476 0-.88-.114-1.207-.344-.195-.137-.404-.356-.627-.657v.8h-.97V1.363zm4.02 7.225c.284-.454.426-1.05.426-1.794 0-.66-.142-1.207-.425-1.64-.283-.434-.7-.65-1.25-.65-.48 0-.9.177-1.264.532-.36.356-.542.942-.542 1.758 0 .59.075 1.068.223 1.435.277.694.795 1.04 1.553 1.04.57 0 .998-.227 1.28-.68zM63.4 3.726h1.167c-.148.402-.478 1.32-.99 2.754-.383 1.077-.703 1.956-.96 2.635-.61 1.602-1.04 2.578-1.29 2.93-.25.35-.68.527-1.29.527-.147 0-.262-.006-.342-.017-.08-.012-.178-.034-.296-.065v-.96c.183.05.316.08.4.093.08.012.152.018.215.018.195 0 .338-.03.43-.094.092-.065.17-.144.232-.237.02-.033.09-.193.21-.48.122-.29.21-.506.264-.646l-2.32-6.457h1.196l1.68 5.11 1.694-5.11zM73.994 5.282V6.87h3.814c-.117.89-.416 1.54-.87 1.998-.557.555-1.427 1.16-2.944 1.16-2.35 0-4.184-1.882-4.184-4.217 0-2.332 1.835-4.215 4.184-4.215 1.264 0 2.192.497 2.873 1.135l1.122-1.117C77.04.697 75.77 0 73.99 0c-3.218 0-5.923 2.606-5.923 5.805 0 3.2 2.705 5.804 5.923 5.804 1.738 0 3.048-.57 4.073-1.628 1.05-1.045 1.382-2.522 1.382-3.71 0-.366-.028-.708-.087-.992h-5.37zm10.222-1.29c-2.082 0-3.78 1.574-3.78 3.748 0 2.154 1.698 3.747 3.78 3.747S87.998 9.9 87.998 7.74c0-2.174-1.7-3.748-3.782-3.748zm0 6.018c-1.14 0-2.127-.935-2.127-2.27 0-1.348.983-2.27 2.124-2.27 1.142 0 2.128.922 2.128 2.27 0 1.335-.986 2.27-2.128 2.27zm18.54-5.18h-.06c-.37-.438-1.083-.838-1.985-.838-1.88 0-3.52 1.632-3.52 3.748 0 2.102 1.64 3.747 3.52 3.747.905 0 1.618-.4 1.988-.852h.06v.523c0 1.432-.773 2.2-2.012 2.2-1.012 0-1.64-.723-1.9-1.336l-1.44.593c.414.994 1.51 2.213 3.34 2.213 1.94 0 3.58-1.135 3.58-3.902v-6.74h-1.57v.645zm-1.9 5.18c-1.144 0-2.013-.968-2.013-2.27 0-1.323.87-2.27 2.01-2.27 1.13 0 2.012.967 2.012 2.282.006 1.31-.882 2.258-2.01 2.258zM92.65 3.992c-2.084 0-3.783 1.574-3.783 3.748 0 2.154 1.7 3.747 3.782 3.747 2.08 0 3.78-1.587 3.78-3.747 0-2.174-1.7-3.748-3.78-3.748zm0 6.018c-1.143 0-2.13-.935-2.13-2.27 0-1.348.987-2.27 2.13-2.27 1.14 0 2.126.922 2.126 2.27 0 1.335-.986 2.27-2.127 2.27zM105.622.155h1.628v11.332h-1.628m6.655-1.477c-.843 0-1.44-.38-1.83-1.135l5.04-2.07-.168-.426c-.314-.84-1.274-2.39-3.227-2.39-1.94 0-3.554 1.516-3.554 3.75 0 2.1 1.595 3.745 3.736 3.745 1.725 0 2.724-1.05 3.14-1.658l-1.285-.852c-.427.62-1.01 1.032-1.854 1.032zm-.117-4.612c.668 0 1.24.342 1.427.826l-3.405 1.4c0-1.574 1.122-2.226 1.978-2.226z"/></svg></symbol>
                    <symbol id="close"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path d="M15.1 2.3L13.7.9 8 6.6 2.3.9.9 2.3 6.6 8 .9 13.7l1.4 1.4L8 9.4l5.7 5.7 1.4-1.4L9.4 8"/></svg></symbol>
                    <symbol id="spinner-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M20 10c0 5.523-4.477 10-10 10S0 15.523 0 10 4.477 0 10 0v2c-4.418 0-8 3.582-8 8s3.582 8 8 8 8-3.582 8-8h2z"/></svg></symbol>
                    <symbol id="chevron-right"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10"><path d="M2 1l1-1 4 4 1 1-1 1-4 4-1-1 4-4"/></svg></symbol>
                    <symbol id="down-arrow"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 12 12"><path d="M10.817 7.624l-4.375 4.2c-.245.235-.64.235-.884 0l-4.375-4.2c-.244-.234-.244-.614 0-.848.245-.235.64-.235.884 0L5.375 9.95V.6c0-.332.28-.6.625-.6s.625.268.625.6v9.35l3.308-3.174c.122-.117.282-.176.442-.176.16 0 .32.06.442.176.244.234.244.614 0 .848"/></svg></symbol></svg></div>
            </div>
        </div>

    </body>
</html>