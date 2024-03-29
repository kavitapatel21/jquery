<?php
/* Child theme generated with WPS Child Theme Generator */

if (!function_exists('b7ectg_theme_enqueue_styles')) {
    add_action('wp_enqueue_scripts', 'b7ectg_theme_enqueue_styles');

    function b7ectg_theme_enqueue_styles()
    {
        wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
        wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));
    }
}


add_action('wp_footer', 'wp_result_page_script');
function wp_result_page_script()
{
?>
    <script>
        jQuery('.app_button').on('click', function() {
            //alert("here");
            // function for add lead event for facebook pixel start
            //console.log("viewcontent for facebook pixel");
            var getsessionemail = "test@gmail.com"; //window.sessionStorage.getItem("step_email");
            var getsessionname = "kavita"; //window.sessionStorage.getItem("step_name");
            var getsessionlastname = "patel"; //window.sessionStorage.getItem("step_lastname");
            jQuery.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                data: {
                    'action': 'lead_event',
                    'firstname': getsessionname,
                    'lastname': getsessionlastname,
                    'email': getsessionemail,
                },
                success: function(response) {
                    console.log("success");
                }
            });
            // function for add lead event for facebook pixel end
        });
    </script>
<?php
}

// function for add lead for facebook pixel start
add_action('wp_ajax_lead_event', 'lead_event_callback');
add_action('wp_ajax_nopriv_lead_event', 'lead_event_callback');
function lead_event_callback()
{
    //echo 'here';
    //die;
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $fullURL = 'https://recovr.com/download/?=landing';
    $emailhased = hash('SHA256', $email);
    $fn = hash('SHA256', $fname);
    $ln = hash('SHA256', $lname);
    $time = time();
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://graph.facebook.com/v14.0/684242939375861/events?access_token=EAAKYCQBdU44BAABTDUHYd3ZCo1gOigWr1uNNqKWZCMIxKxhfqjEr11IuoM1NG698EBhOpOv6r2GhnNVbsbVNq4wTUy43r9W4MEEl1ZAJT4LZCUhZBZBO7vqqd2nZCejUiES3pdP6kCNEHb2qsBRagU4MZC5QKQFnZAhs0NRH1eyPicnZB7KsoZC17oK%0A',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
            "data": [
                {
                    "event_name": "Lead",
                    "event_time": "' . $time . '",
                    "action_source": "email",
                    "event_source_url"  : "' . $fullURL . '",
                    "user_data": {
                        "em": [
                            "' . $emailhased . '"
                        ],
                        "fn": [
                            "' . $fn . '"
                        ],
                        "ln": [
                            "' . $ln . '"
                        ],
                    },
                    "custom_data": {
                        "name": "download-landing-page",
                    }
                
                }
            ]
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    return true;
}

// function for add lead for facebook pixel start end

add_action('wp_footer', 'wp_result_page');
function wp_result_page()
{
?>
    <script>
        jQuery('#payment_btnn').on('click', function() {
            alert("here");
            var fname = jQuery('#fname').val();
            var lname = jQuery('#lname').val();
            var email = jQuery('#inputEmail4').val();
            var cardnumber = jQuery('#cardnumber').val();
            var month = jQuery('#month').val();
            var year = jQuery('#year').val();
            var cvv = jQuery('#cvv').val();
            jQuery.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                data: {
                    'action': 'event',
                    'firstname': fname,
                    'lastname': lname,
                    'email': email,
                    'cardnumber': cardnumber,
                    'month': month,
                    'year': year,
                    'cvv': cvv,
                },
                success: function(response) {
                    console.log(response);
                    if (response === false) {
                        $("#error").html("invalid card details");
                    }
                }
            });
        });
    </script>
<?php
}

// function for add lead for facebook pixel start
add_action('wp_ajax_event', 'lead_event');
add_action('wp_ajax_nopriv_event', 'lead_event');
function lead_event()
{
    //echo '<pre>';
    //print_r($_POST);
    $fname = $_POST['firstname'];
    $email = $_POST['email'];
    $card_type = 'card';
    $card_numner = $_POST['cardnumber'];
    $exmonth = $_POST['month'];
    $exyear = $_POST['year'];
    $cvv = $_POST['cvv'];
    $subscribe_id = "price_1L7z8HGSLZI5qKJBIY1R3Tjt";

    //Curl start for check customer already exist or not
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.stripe.com/v1/customers',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_POSTFIELDS => 'email=' . $email . '',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer sk_test_51KMnalGSLZI5qKJB7ANMSnomf1xE8BcIIBotP1mMtpnpiCj0DMVVhlBrLDX3Eg20CURzSjUcR9GhTn0NTbNwbcxG00syBBR6Wi',
            'Content-Type: application/x-www-form-urlencoded'
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($response, TRUE);
    //print_r($result);
    //Curl end for check customer exist or not

    if ($result['data'][0]['id']) {
        $customer_id = $result['data'][0]['id'];
        //echo 'customer already exist';
    } else {
        //echo 'create cutomer';
        // Curl Call For Create Customer in strip start 
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.stripe.com/v1/customers',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'name=' . $fname . ' & email=' . $email . '',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer sk_test_51KMnalGSLZI5qKJB7ANMSnomf1xE8BcIIBotP1mMtpnpiCj0DMVVhlBrLDX3Eg20CURzSjUcR9GhTn0NTbNwbcxG00syBBR6Wi',
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($response, TRUE);
        $customer_id = $result['id'];
        // Curl Call For Create Customer in strip end 
    }

    // For Create a PaymentMethod START
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.stripe.com/v1/payment_methods',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => 'type=' . $card_type . '&card%5Bnumber%5D=' . $card_numner . '&card%5Bexp_month%5D=' . $exmonth . '&card%5Bexp_year%5D=' . $exyear . '&card%5Bcvc%5D=' . $cvv . '',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer sk_test_51KMnalGSLZI5qKJB7ANMSnomf1xE8BcIIBotP1mMtpnpiCj0DMVVhlBrLDX3Eg20CURzSjUcR9GhTn0NTbNwbcxG00syBBR6Wi',
            'Content-Type: application/x-www-form-urlencoded'
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($response, TRUE);
    $payment_id = $result['id'];
    if ($result['id'] == '') {
        echo 'false';
        exit;
    }
    // print_r($result);
    // For Create a PaymentMethod END

    //Attach a PaymentMethod to a Customer STRT
    // IN URL You must pass Create a PaymentMethod response id like pm_1L8kAqGSLZI5qKJBrDDH59eQ and customer id in post data
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.stripe.com/v1/payment_methods/' . $payment_id . '/attach',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => 'customer=' . $customer_id,
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer sk_test_51KMnalGSLZI5qKJB7ANMSnomf1xE8BcIIBotP1mMtpnpiCj0DMVVhlBrLDX3Eg20CURzSjUcR9GhTn0NTbNwbcxG00syBBR6Wi',
            'Content-Type: application/x-www-form-urlencoded'
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($response, TRUE);
    $createdDate = $result['created'];
    $timestamp = strtotime('+7 days', $createdDate);
    //print_r($result);
    //die;
    //Attach a PaymentMethod to a Customer END

    //Create a subscription START
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.stripe.com/v1/subscriptions',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => 'customer=' . $customer_id . '&items%5B0%5D%5Bprice%5D=' . $subscribe_id . '&default_payment_method=' . $payment_id . '&trial_end=' . $timestamp . '',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer sk_test_51KMnalGSLZI5qKJB7ANMSnomf1xE8BcIIBotP1mMtpnpiCj0DMVVhlBrLDX3Eg20CURzSjUcR9GhTn0NTbNwbcxG00syBBR6Wi',
            'Content-Type: application/x-www-form-urlencoded'
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $result_subscriptions = json_decode($response, TRUE);

    $subscription_id = $result_subscriptions['id'];
    $subscriptionExpiredDate = date('Y-m-d H:i:s', $result_subscriptions['current_period_start']);
    $subscriptionPurchaseDate = date('Y-m-d H:i:s', $result_subscriptions['current_period_end']);
    print_r($response);
    //Create a subscription END
}

add_action('wp_footer', 'wp_result_page_function');
function wp_result_page_function()
{
?>
    <script>
        jQuery('#submit_trial').on('click', function() {
            //alert("here");

            var getsessionemail = "test@gmail.com"; //window.sessionStorage.getItem("step_email");
            var getsessionname = "kavita"; //window.sessionStorage.getItem("step_name");
            var getsessionlastname = "patel"; //window.sessionStorage.getItem("step_lastname");
            jQuery.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                data: {
                    'action': 'start_trial_event',
                    'firstname': getsessionname,
                    'lastname': getsessionlastname,
                    'email': getsessionemail,
                },
                success: function(response) {
                    console.log("success");
                }
            });
        });
    </script>
<?php
}

//Start trial
add_action('wp_ajax_start_trial_event', 'start_trial_event_callback');
add_action('wp_ajax_nopriv_start_trial_event', 'start_trial_event_callback');
function start_trial_event_callback()
{
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $fullURL = 'https://recovr.com/download/';
    $stemailhased = hash('SHA256', $email);
    $stfn = hash('SHA256', $fname);
    $stln = hash('SHA256', $lname);
    $sttime = time();
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://graph.facebook.com/v14.0/684242939375861/events?access_token=EAAKYCQBdU44BAABTDUHYd3ZCo1gOigWr1uNNqKWZCMIxKxhfqjEr11IuoM1NG698EBhOpOv6r2GhnNVbsbVNq4wTUy43r9W4MEEl1ZAJT4LZCUhZBZBO7vqqd2nZCejUiES3pdP6kCNEHb2qsBRagU4MZC5QKQFnZAhs0NRH1eyPicnZB7KsoZC17oK%0A',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
					"data": [
						{
							"event_name": "StartTrial",
							"event_time": "' . $sttime . '",
							"action_source" : "email",
							"content_name" : "download-app",
							"user_data": {
								"em": [
									"' . $stemailhased . '"
								],
								"fn": [
									"' . $stfn . '"
								],
								"ln": [
									"' . $stln . '"
								],
							},   
							"event_source_url"  : "' . $fullURL . '",					
						}
					]
				}',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    //return true;
}


add_action('wp_ajax_add_entry', 'add_stripe_entry');
add_action('wp_ajax_nopriv_add_entry', 'add_stripe_entry');
function add_stripe_entry()
{
    //echo "here";
    //die;
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $cardname = $_POST['cardname'];
    $cardnumber = $_POST['cardnumber'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $cvv = $_POST['cvv'];
    $card_type = 'card';
    $result_plan = 'price_1L7z5vGSLZI5qKJBLeWia0pY';
    //Curl start for check customer already exist or not
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.stripe.com/v1/customers',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_POSTFIELDS => 'email=' . $email . '',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer sk_test_51KMnalGSLZI5qKJB7ANMSnomf1xE8BcIIBotP1mMtpnpiCj0DMVVhlBrLDX3Eg20CURzSjUcR9GhTn0NTbNwbcxG00syBBR6Wi',
            'Content-Type: application/x-www-form-urlencoded'
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($response, TRUE);
    //print_r($result);
    //Curl end for check customer exist or not

    if ($result['data'][0]['id']) {
        $customer_id = $result['data'][0]['id'];
        //echo 'customer already exist';
    } else {
        //echo 'create cutomer';
        // Curl Call For Create Customer in strip start 
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.stripe.com/v1/customers',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'name=' . $fname . ' & email=' . $email . '',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer sk_test_51KMnalGSLZI5qKJB7ANMSnomf1xE8BcIIBotP1mMtpnpiCj0DMVVhlBrLDX3Eg20CURzSjUcR9GhTn0NTbNwbcxG00syBBR6Wi',
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($response, TRUE);
        $customer_id = $result['id'];
        // Curl Call For Create Customer in strip end 
    }

    // For Create a PaymentMethod START
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.stripe.com/v1/payment_methods',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => 'type=' . $card_type . '&card%5Bnumber%5D=' . $cardnumber . '&card%5Bexp_month%5D=' . $month . '&card%5Bexp_year%5D=' . $year . '&card%5Bcvc%5D=' . $cvv . '',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer sk_test_51KMnalGSLZI5qKJB7ANMSnomf1xE8BcIIBotP1mMtpnpiCj0DMVVhlBrLDX3Eg20CURzSjUcR9GhTn0NTbNwbcxG00syBBR6Wi',
            'Content-Type: application/x-www-form-urlencoded'
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($response, TRUE);
    $payment_id = $result['id'];
    if ($result['id'] == '') {
        echo 'false';
        exit;
    }
    // print_r($result);
    // For Create a PaymentMethod END

    //Attach a PaymentMethod to a Customer STRT
    // IN URL You must pass Create a PaymentMethod response id like pm_1L8kAqGSLZI5qKJBrDDH59eQ and customer id in post data
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.stripe.com/v1/payment_methods/' . $payment_id . '/attach',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => 'customer=' . $customer_id,
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer sk_test_51KMnalGSLZI5qKJB7ANMSnomf1xE8BcIIBotP1mMtpnpiCj0DMVVhlBrLDX3Eg20CURzSjUcR9GhTn0NTbNwbcxG00syBBR6Wi',
            'Content-Type: application/x-www-form-urlencoded'
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($response, TRUE);
    $createdDate = $result['created'];
    $timestamp = strtotime('+7 days', $createdDate);
    //print_r($result);
    //die;
    //Attach a PaymentMethod to a Customer END

    //Create a subscription START
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.stripe.com/v1/subscriptions',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => 'customer=' . $customer_id . '&items%5B0%5D%5Bprice%5D=' . $result_plan . '&default_payment_method=' . $payment_id . '&trial_end=' . $timestamp . '',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer sk_test_51KMnalGSLZI5qKJB7ANMSnomf1xE8BcIIBotP1mMtpnpiCj0DMVVhlBrLDX3Eg20CURzSjUcR9GhTn0NTbNwbcxG00syBBR6Wi',
            'Content-Type: application/x-www-form-urlencoded'
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
}


//PHP server-side validation
add_action('wp_ajax_php_validation', 'php_server_side_validation');
add_action('wp_ajax_nopriv_php_validation', 'php_server_side_validation');
function php_server_side_validation()
{
    $errorMSG = "";


    /* NAME */
    if (empty($_POST["name"])) {
        $errorMSG = "<li>Name is required</<li>";
    } else {
        $name = $_POST["name"];
    }


    /* EMAIL */
    if (empty($_POST["email"])) {
        $errorMSG .= "<li>Email is required</li>";
    } else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errorMSG .= "<li>Invalid email format</li>";
    } else {
        $email = $_POST["email"];
    }

    /* PHONE */
    if (empty($_POST["c"])) {
        $errorMSG .= "<li>Phoneno is required</li>";
    } else if (!preg_match("/^[0-9-+.' ]*$/", ($_POST["phoneno"]))) {
        $errorMSG .= "<li>Invalid phone number format</li>";
    } else {
        $phoneno = $_POST["phoneno"];
    }

    /* MSG SUBJECT */
    if (empty($_POST["msg_subject"])) {
        $errorMSG .= "<li>Subject is required</li>";
    } else {
        $msg_subject = $_POST["msg_subject"];
    }


    /* MESSAGE */
    if (empty($_POST["message"])) {
        $errorMSG .= "<li>Message is required</li>";
    } else {
        $message = $_POST["message"];
    }


    if (empty($errorMSG)) {
        $msg = "Name: " . $name . ", Email: " . $email . ",Phoneno: " . $phoneno . ", Subject: " . $msg_subject . ", Message:" . $message;
        echo json_encode(['code' => 200, 'msg' => $msg]);
        exit;
    }
    echo json_encode(['code' => 404, 'msg' => $errorMSG]);
}


//prevent/block direct access to a pageB and pageD
add_action('template_redirect', function () {
    if (!is_page(18) && !is_page(39)) //Id of pageB and pageD
    {
        return;
    }
    if (wp_get_referer() === 'http://localhost/recovr/pagea/') {
        return;
    }
    if (wp_get_referer() === 'http://localhost/recovr/page-c/') {
        return;
    }
    wp_redirect(get_home_url());
    exit;
});


add_action('wp_ajax_auto_complete_searching', 'auto_complete_searching');
add_action('wp_ajax_nopriv_auto_complete_searching', 'auto_complete_searching');
function auto_complete_searching()
{
    global $wpdb;
    $string = $_POST['term'];
    $result = $wpdb->get_results("SELECT * FROM `live_product` WHERE product_name LIKE '%" . $string . "%' ORDER BY id ASC");
    $items = array();
    foreach ($result as $get_result) {
        array_push($items, $get_result->product_name);
    }
    //echo json_encode($items);
    wp_send_json_success($items);
}

function add_theme_menu_item()
{
    add_menu_page("Theme Option", "Theme Option", "manage_options", "theme-option", "theme_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");

function theme_settings_page()
{
?>
    <div class="wrap">
        <h1>Theme Option</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields("section");
            do_settings_sections("theme-options");
            submit_button();
            ?>
        </form>
    </div>
<?php
}

function main_logo_display()
{
?>
    <input type="file" name="main_logo" />
    <?php echo get_option('main_logo'); ?>
<?php
}


function sticky_logo_display()
{
?>
    <input type="file" name="sticky_logo" />
    <?php echo get_option('sticky_logo'); ?>
<?php
}

function favicon_display()
{
?>
    <input type="file" name="favicon" />
    <?php echo get_option('favicon'); ?>
<?php
}

function display_footer_copyright()
{
?>
    <input type="text" name="footer_copyright" id="footer_copyright" value="<?php echo get_option('footer_copyright'); ?>" />
<?php
}

function display_theme_panel_fields()
{
    add_settings_section("section", "All Settings", null, "theme-options");

    add_settings_field("main_logo", "Main Logo", "main_logo_display", "theme-options", "section");
    register_setting("section", "main_logo");

    add_settings_field("sticky_logo", "Sticky Logo", "sticky_logo_display", "theme-options", "section");
    register_setting("section", "sticky_logo");

    add_settings_field("favicon", "Favicon", "favicon_display", "theme-options", "section");
    register_setting("section", "favicon");

    add_settings_field("footer_copyright", "Footer Copyright", "display_footer_copyright", "theme-options", "section");
    register_setting("section", "footer_copyright");
}
add_action("admin_init", "display_theme_panel_fields");



/**add_action("init", "eg_create_sitemap");
function eg_create_sitemap()
{
    $postsForSitemap = get_posts(array(
        'numberposts' => -1,
        'orderby' => 'modified',
        'post_type'  => array('post'),
        'order'    => 'ASC',
        'post_status'  => 'publish'
    ));

    //Generate xml file on main project folder(ABSPATH)
    $sitemap = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    $sitemap .= '<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:video="http://www.google.com/schemas/sitemap-video/1.1">' . "\n";
    /*$sitemap .= '<?xml-stylesheet type="text/xsl" href="http://sitehere.com/sitemap.xsl"?>'."\n";*/

   /**foreach ($postsForSitemap as $post) {
        setup_postdata($post);
        $post_id = $post->ID;
        $postdat = $post->post_date;
        $postdate = explode(" ", $postdat);
        $postdatee = $postdate[0] . "T" . $postdate[1] . "-08:00";
        $postContent = $post->post_excerpt;
        $postName = $post->post_name;
        $posttitle = $post->post_title;

        $abspath = get_site_url();
        $sitemap .= '<url>' . "\n" .

            "\t" . '<video:video>' . "\n" .
            "\t\t" . '<video:title>' . $posttitle . '</video:title>' . "\n" .
            "\t\t" . '<video:publication_date>' . $postdatee . '</video:publication_date>' . "\n" .
            '</url>' . "\n\n";
    }
    $sitemap .= '</urlset>';
    $fp = fopen(ABSPATH . "sitemap.xml", 'w');
    fwrite($fp, $sitemap);
    fclose($fp);

    //Download xml file
    /**header('Content-type: text/xml');
    header('Content-Disposition: attachment; filename="text.xml"');
    echo $sitemap;
    exit();
}*/



add_action('init', 'enroll_student', 10, 1);
function enroll_student( $order_id ) {

$sitemap = '<?xml version="1.0" encoding="utf-8"?>'."\n";      
//$path = ABSPATH;
//echo $path;       
$abspath = ABSPATH.'wp-content/pointex';
$sitemap .= '<Export_Bfast_POINTEX>'."\n".

	"\t".'<Entete_Commande>'."\n".
	"\t\t"."<Id_commande>".  $order_id ."</Id_commande>"."\n".
	"\t".'</Entete_Commande>'."\n".  
	 
'</Export_Bfast_POINTEX>'."\n\n";

  $filename = 'order_'.date('m-d-Y_hia').'.xml';
  $fp = fopen($abspath .'/'.$filename, 'w');
  fwrite($fp, $sitemap);
  fclose($fp);
}
?>