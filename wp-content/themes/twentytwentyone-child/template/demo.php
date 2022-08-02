<?php
/*
Template Name: Demo
Template Post Type: post, page, my-post-type;
*/

?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
    .category-form {
        display: flex;
        border-radius: unset;
        position: relative;
    }

    .search-btn {
        background-color: #f4f4f4;
        border-color: rgba(0, 0, 0, 0.125);
        color: #777;
        border-top-right-radius: 30px;
        border-bottom-right-radius: 30px;
        border: 1px solid #ced4da;
        font-size: 100%;
        line-height: 1.4rem;
        padding: 0 25px;
        border-left: 0;
    }

    .category-form {
        max-width: 750px;
        margin: 10px auto 10px;
        background-color: #0000000a;
        padding: 7px 7px;
        display: flex;
        border-radius: 30px;
    }

    .search-input {
        width: 100%;
        background-color: #fff !important;
        border: 1px solid rgba(0, 0, 0, 0.125) !important;
        border-radius: 5px;
        border-top-left-radius: 30px;
        border-bottom-left-radius: 30px;
        height: calc(2.25rem + 2px);
        padding: .375rem .75rem !important;
        font-size: 1rem;
    }

    .search-drpdwn {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        max-width: 170px;
        background-color: #ffffff;
        height: calc(2.25rem + 2px);
        border: 1px solid #ced4da;
        color: #495057;
        font-weight: 600;
    }

    .category-form {
        text-align: center;
        width: 100%;
        margin-bottom: 10px;
    }

    .col-sm {
        border: 1px solid black !important;
        background-color: #ced4da;
        box-sizing: content-box;
        max-width: 0px;
        text-align: center;
        font-weight: 450;
    }
</style>

<form action="" id="" method="post" class='category-form'>
    <input for="search" type="text" id="search" placeholder="Keyword" autocomplete="off" class="search-input">
    <div id="mydata" class="custom-my-data"></div>
    <select name="child_id" class="search-drpdwn" id="">
        <option value="" selected="">All Categories...</option>
        <?php
        global $wpdb;
        $data = $wpdb->get_results("SELECT category FROM `live_product`");
        foreach ($data as $category) {
            $value = $category->category;
        ?>
            <option><?php echo $value; ?></option>
        <?php
        }
        ?>

    </select>
    <input type="button" name="category" class="search-btn" value="Go" id="submit">
</form>
<div id="result" style="margin-left: 10px;"></div>

<div class="row justify-content-center">
    <div class="col-sm one" style="margin-right: 5px;max-width: 25px;">0-9</div>
    <?php
    foreach (range('A', 'Z') as $char) {
    ?>
        <div class="col-sm"><?php echo $char; ?></div>
    <?php } ?>
</div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript">
    jQuery(function() {

        jQuery("#search").keyup(function() {
            var term = jQuery("#search").val();
            //jQuery("#result").html('');
            jQuery.ajax({
                type: "post",
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                data: {
                    action: "auto_complete_searching",
                    term: term
                },
                success: function(data) {
                    jQuery.each(data, function(key, value) {
                        //alert(value);
                        if(jQuery("#search").val() == ''){
                            jQuery("#result").html('')
                        }
                        else if (value == '') {
                            jQuery("#result").text("Result Not Found");

                        } else {
                            jQuery("#result").html('');
                            for (var i = 0; i < value.length; i++) {
                                jQuery("#result").append('<ul>' + value[i] + '</ul>');
                                //alert(value[i]);
                            }
                        }
                    });
                }
            });
        });
        jQuery('#result').on('click', 'ul', function() {
            var click_text = jQuery(this).text().split('|');
            jQuery('#search').val(jQuery.trim(click_text[0]));
            jQuery("#result").html('');
        });
    });

    /**jQuery(document).ready(function($) {
            //alert('here');
        $('#search').autocomplete({

            // add the way to the file with database query

            serviceUrl: '<?php echo get_stylesheet_directory_uri(); ?>/template/autocomplete.php',

            // what happens when user chooses autocomlete suggestion

            onSelect: function(suggestion) {
                alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
            }
        });
    });*/


    /**$('#search').autocomplete({
        source: function(request, response) {
            // input query 
            var term = request.term;
            //alert(term);
            $.ajax({
                type: "POST",
                url: "<?php echo get_stylesheet_directory_uri(); ?>/template/autocomplete.php",
                // "POST" `term` to server
                data: {
                    autocomplete: term
                },
            }).then(function(data) {
                response(data)
            }, function error(jqxhr, textStatus, errorThrown) {
                console.log(textStatus, errorThrown)
            });
        }
    }, {
        minLength: 1
    });*/
</script>