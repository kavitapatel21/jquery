<?php
/*
 * Template Name: Asses ReviewDev
 * description: >-
  Page template without sidebar
 */

//get_header();
?>
<link rel="icon" type="image/x-icon" href="https://recovr.com/wp-content/uploads/2021/10/cropped-Recovr-Icon-Logo-Full-ColourRGB.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&family=Work+Sans:wght@600&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&family=Work+Sans&display=swap" rel="stylesheet">

<!--<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/css/style.css?time=<?php echo time(); ?>">-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<style>
    li.parsley-required {
        color: red
    }

    .description-back {
        font-size: 18px;
        font-weight: 800;
    }

    ul.parsley-errors-list {
        padding-left: 2px;
        list-style: none;
    }

    .parsley-pattern {
        color: red !important;
    }

    .input-title {
        font-size: 14px;
        font-weight: 600;
        color: #586d39;
        margin-bottom: 7px;
    }

    .br-three {
        border-radius: 0px;
    }

    .lbl-card-detail {
        padding-left: 36px;
    }

    .hero-banner {
        background-color: #586D39;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-direction: column;
    }

    .demo-one {
        height: 100vh;
        padding: 82.5px 150px 80px 80px;
        /* padding: 83px 150px 80px 80px; */
        /* padding: 80px 150px 80px 80px; */
        background-color: #586d39;
        width: 35%;
        position: fixed;
        left: 0;
    }

    .demo-two {
        margin-left: 35%;
        width: 65%;
        padding: 90px 120px 40px 120px;
        /* padding: 180px 120px 40px 120px; */
    }

    .hero-banner h2 {
        color: white;

    }

    .hero-banner-text {
        margin-top: 127px !important;
        /* margin-top: 126px !important; */
        /* margin-top: 119px !important; */
    }

    .hero-banner-text h3 {
        font-family: 'Work Sans';
        color: #fff;
        font-size: 20px;
        text-transform: none;
        /*margin: 0px;*/
        margin-top: 38px !important;
        /* margin-top: 40px !important; */
        line-height: 24px;
    }

    .hero-banner-left-content {
        display: flex;
        justify-content: left;
        align-items: start;
        flex-direction: column;
        margin-top: 119px;
    }

    .hero-banner-left-content .as-s1-img--top {
        height: 95px;
    }

    .mobile-content-set a {
        letter-spacing: -1px;
        font-size: 20px !important;
        color: #fff;
        display: inline-flex;
        align-items: center;
        font-weight: 400;
        font-family: 'Work Sans';
    }

    .mobile-content-set a:hover {
        text-decoration: none;
    }

    .mobile-content-set img {
        margin-right: 15px;
    }

    .hero-banner h2 {
        color: white;
        font-size: 80px;
        margin: 0px;
        font-weight: 400;
        font-family: 'Work Sans';
    }

    .hero-banner h3 {
        font-weight: 400 !important;
        font-size: 20px;
    }

    .banner-header-border {
        border-bottom: 1px solid #fff;
        margin-top: 48px !important;
        width: 80px;
    }

    .main-result .hero-banner {
        height: 100%;
    }

    .rounded-text-box {
        padding: 0px 10px;
        border: 1px solid #ced4da;
        border-radius: 15px;
    }

    .result-ssl-text {
        font-size: 14px;
        font-weight: 600;
        color: #586d39;
        margin-bottom: 7px;
        float: right;
        display: flex;
    }

    img.sll-icon {
        height: 20px;
        padding-top: 0px;
        padding-right: 3px;
    }

    @media screen and (max-width: 1440px) and (max-height: 900px) {
        .main-result .hero-banner-left-content {
            margin-top: 50px !important;
        }

        .main-result .hero-banner-text {
            margin-top: 50px !important;
        }
    }

    @media screen and (min-width: 1441px) and (max-height: 900px) {
        .main-result .hero-banner-left-content {
            margin-top: 50px !important;
        }

        .main-result .hero-banner-text {
            margin-top: 50px !important;
        }
    }

    @media(max-width: 991px) {
        .demo-one {
            width: 100%;
            height: auto;
            position: relative;
            padding: 65px 20px 65px 20px !important;
        }

        .demo-two {
            margin-left: 0%;
            width: 100%;
            padding: 28px 20px 40px 20px !important;
        }

        .main-result .hero-banner {
            height: auto !important;
        }

        .main-result .hero-banner-left-content {
            margin-top: 0px !important;
        }

        .main-result .hero-banner-text {
            margin-top: 50px !important;
        }

    }

    @media(max-width: 576px) {
        .hero-banner h2 {
            font-size: 40px !important;
        }

        .hero-banner h3 {
            font-size: 16px !important;
            margin: 0px !important;
            line-height: 19.2px;
        }

        .banner-header-border {
            margin-top: 24px !important;
            margin-bottom: 24px !important;
        }
    }

    .loader {
        display: none;
        color: red;
    }

    #idname {
        color: red;
    }

    /**Hide jquery validation error message & red border on inputbox 
    .error {
        border-color: red;
    }

    label.error {
        display: none !important;
    }

    label#expiry-error {
        display: none !important;
    }*/
</style>
<div class="main-result d-flex flex-wrap">
    <div class="demo-one">
        <div class="hero-banner text-left">
            <div class="mobile-content-set">
                <div class="as-s1-home--btn hero-banner-link text-md-left">
                    <a class="text-white text-uppercase back-btn font-twenty font-weight-regular" href="https://recovr.com/">
                        <img src="https://recovr.com/wp-content/uploads/2022/06/Line-2.svg" />
                        Home
                    </a>
                </div>
                <div class="hero-banner-left-content">
                    <div class="as-s1-img--top d-none d-lg-block">
                        <img src="https://recovr.com/wp-content/uploads/2022/06/welcome-img.svg" />
                    </div>
                    <div class="as-s1-content--top hero-banner-text">
                        <h2 class="text-left text-uppercase font-eighty text-weight first-text-left-sd">YOUR RESULTS</h2>
                        <div class="banner-header-border mt-2 mt-md-5 mb-0 mb-md-4"></div>
                        <h3 class="option_answer text-white green_color text-left font-twenty text-weight mt-5">Great news,
                            <!-- <span class="result-user-name">Ann!</span> -->
                            Based on your answers, one of our rehab professionals is ready to help.
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="demo-two">
        <div class='post-content'>
            <div id="primary" class="content-area">
                <main id="main" class="site-main standard-img" role="main">
                    <?php
                    //while (have_posts()) : the_post();
                    //     the_content();
                    ?>
                    <div id="app">
                        <form method="POST" id="myassesForm">
                            <div class="">
                                <div class="rounded-text-box">
                                    <p class="description mb-0">Congratulations on making the call to do something about your</p>
                                    <a class="description-back">back.</a>
                                    <p class="description">Upon review of your answers we have identified that you may have one or more red flags that we would like to explore more before we recommend a program to you.</p>

                                    <p class="description">Don’t be alarmed as there can often be a simple reason, however we wouldn’t be doing our job if we didn’t follow up.</p>
                                    <p class="description">So what happens now?</p>
                                    <p class="description">You will be assigned a rehab professional. They will review your answers in more detail and may reach out with any follow-up questions. They will communicate to you via email.</p>
                                </div>
                                <div class="row margin">
                                    <div class="col-6 pl-3 pr-3">
                                        <div class="form-group ">
                                            <label for="firstname" class="work_sans_500 input-title">Enter Your First Name</label>
                                            <input type="text" class="form-control form-control-lg  work_sans_400 br-three" name="firstname" id="firstname" aria-describedby="firstname" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="col-6 pl-3 pr-3">
                                        <div class="form-group">
                                            <label for="lastname" class="work_sans_500 input-title">Enter Your Last Name</label>
                                            <input type="text" class="form-control form-control-lg  work_sans_400 br-three" name="lastname" id="lastname" aria-describedby="lastname" placeholder="Last Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 pl-3 pr-3">
                                        <div class="form-group ">
                                            <label for="email" class="work_sans_500 input-title">Enter Your Email</label>
                                            <input type="email" class="form-control form-control-lg  work_sans_400 br-three" name="email" id="email" aria-describedby="emailHelp" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-6 pl-3 pr-3">
                                        <div class="form-group ">
                                            <label for="phone" class="work_sans_500 input-title">Enter Your Phone No.</label>
                                            <input type="number" class="form-control form-control-lg  work_sans_400 br-three" name="phone" id="phone" aria-describedby="mobile" placeholder="Mobile phone number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 margin ">
                                        <div class="m-10 rounded-text-box">
                                            <p class="description">For us to bring in a rehab professional to do this, we will need to charge $20 to cover these costs.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer modal_custom margin">
                                <div class="container">
                                    <div class='form-row row'>
                                        <div class='col-md-12 error form-group hide'>
                                            <div class='alert-danger alert'>.
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="assesment_id" id="assesment_id" value="">
                                    <input type="hidden" name="mobile_no" id="mobile_no" value="">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group d-flex align-items-center justify-content-between">
                                                <label class="work_sans_500" style="font-size: 14px; font-weight: 600; color: #586d39; margin-bottom: 7px;" for="form-elem-1">Your card details</label>
                                                <span class="result-ssl-text"><img class="sll-icon" src="https://recovr.com/wp-content/uploads/2022/07/sll.png">Protected by SSL technology</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form-elem-1" class="work_sans_500 input-title d-none d-md-flex"> Name on card</label>
                                                <input type="text" id="form-elem-1" name="name" class="form-control form-control-lg work_sans_400 br-three" placeholder="Name on card" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="form-elem-2" class="work_sans_500 input-title d-none d-md-flex"> Number</label>
                                                <input type="text" id="form-elem-2" name="number" class="form-control form-control-lg card-number work_sans_400" size='20' placeholder="Card Number" />
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="expiry" class="work_sans_500 input-title d-none d-md-flex"> Expiry</label>
                                                <input type="text" id="expiry" name="month" class="form-control form-control-lg card-expiry-month work_sans_400 br-three" size="4" placeholder="MM" />
                                            </div>
                                        </div>
                                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                                            <label class='control-label work_sans_500 input-title d-none d-md-flex'>Expiration Year</label> <input class='form-control form-control-lg card-expiry-year work_sans_400 br-three' id="year" name="year" placeholder='YYYY' size='4' type='text'>
                                        </div>
                                        <div class='col-xs-12 col-md-4 form-group expiration required '>
                                            <div class="form-group">
                                                <label class="work_sans_500 input-title d-none d-md-flex" for="cvv"> CVV</label>
                                                <input type="text" id="cvv" name="cvv" class="form-control form-control-lg card-number work_sans_400" placeholder="CVV Code" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row d-flex justify-content-md-between">
                                        <div class="col-md-6">
                                            <label class="mt-4">
                                                <input type="checkbox" value="" name="terms"> Check here to indicate that you have read and agree to recovr's <a href="#" class="color"> <b>Terms Of Services </b></a></label>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group mt-4 d-flex justify-content-center justify-content-md-end">
                                                <button type="submit" class="btn btn-success float-right px-3 py-3 pay br-three" id="btn-submit">Consult with a rehab professional</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="idname"></div>
                                    <div class="loader">
                                        <center>
                                            <div class="loading-image">Please wait...</div>
                                        </center>
                                    </div>
                        </form>
                    </div>
                    <?php
                    // endwhile; // End of the loop.
                    ?>
                </main>
            </div>
        </div>
    </div>
</div>


<!--<script src="https://parsleyjs.org/dist/parsley.min.js"></script> -->
<!--<script type="text/javascript" src="https://js.stripe.com/v2/"></script> -->
<!-- <script type="text/javascript" src="<?php //echo get_stylesheet_directory_uri() 
                                            ?>/js/script.js?time=<?php //echo time();
                                                                    ?>"></script> -->


<script>
    jQuery(document).on('click', '#btn-submit', function(e) {

        jQuery("#myassesForm").validate({
            rules: {
                firstname: {
                    required: true
                },
                lastname: {
                    required: true
                },
                email: {
                    required: true
                },
                phone: {
                    required: true,
                    maxlength: 10,
                    minlength: 10
                },
                name: {
                    required: true
                },
                number: {
                    required: true,
                    digits: true,
                    maxlength: 16,
                    minlength: 16
                },
                month: {
                    required: true,
                    digits: true,
                    maxlength: 2,
                    minlength: 2
                },
                year: {
                    required: true,
                    digits: true,
                    maxlength: 4,
                    minlength: 4
                },
                cvv: {
                    required: true,
                    digits: true,
                    maxlength: 3,
                    minlength: 3
                },
                terms: {
                    required: true

                },
            },
            messages: {
                firstname: {
                    required: 'Please enter first name & lastname'
                },
                lastname: {
                    required: 'Please enter first name & lastname'
                },
                email: {
                    required: 'Please enter email'
                },
                phone: {
                    required: 'Please enter phone number',
                    minlength: "Please enter 10 digit Number.",
                    maxlength: "Please enter 10 digit Number."
                },
                name: {
                    required: 'Please enter card name'
                },
                number: {
                    required: 'Please enter card number',
                    minlength: "Please enter 16 digit Number.",
                    maxlength: "Please enter 16 digit Number."
                },
                month: {
                    required: 'Required',
                    minlength: "Please enter 2 digit Number.",
                    maxlength: "Please enter 2 digit Number."
                },
                year: {
                    required: 'Required',
                    minlength: "Please enter 4 digit Number.",
                    maxlength: "Please enter 4 digit Number."
                },
                cvv: {
                    required: 'Required',
                    minlength: "Please enter 3 digit Number.",
                    maxlength: "Please enter 3 digit Number."
                },
                terms: {
						required: 'Please check the checkbox'

					}
            },
            groups: {
            onemsg: "firstname lastname"//validate multiple fields with one error
        },
           

            submitHandler: function(form) {
                var fname = jQuery('#firstname').val();
                var lname = jQuery('#lastname').val();
                var email = jQuery('#email').val();
                var phone = jQuery('#phone').val();
                var cardname = jQuery('#form-elem-1').val();
                var cardnumber = jQuery('#form-elem-2').val();
                var month = jQuery('#expiry').val();
                var year = jQuery('#year').val();
                var cvv = jQuery('#cvv').val();

                jQuery.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    data: {
                        'action': 'add_entry',
                        'firstname': fname,
                        'lastname': lname,
                        'email': email,
                        'phone': phone,
                        'cardname': cardname,
                        'cardnumber': cardnumber,
                        'month': month,
                        'year': year,
                        'cvv': cvv,
                    },
                    beforeSend: function() {
                        jQuery('.loader').show();
                    },
                    success: function(response) {
                        console.log(response);
                        if (response === false) {
                            jQuery('#idname').html('Invalid card details');
                            jQuery('.loader').hide();
                        }
                    }
                });
            }
        });
        /**var attribute= $('#myassesForm').attr('novalidate');
            if (attribute) {
                alert('here');
            }*/
    });
</script>

<?php

//get_footer(); 
?>