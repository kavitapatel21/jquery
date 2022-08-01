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
<script type="text/javascript">
    jQuery('#submit').on('click', function() {

        jQuery.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'post',
            data: {
                action: 'search_product_name',
                keyword: jQuery('#search').val(),
            },
            success: function(data) {
                console.log("success");
            }
        });

    });
</script>