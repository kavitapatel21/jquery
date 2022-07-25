<?php
/*
Template Name: drag&drop
Template Post Type: post, page, my-post-type;
*/
get_header();
?>

<div class="row widgets">
    <div class="text-center col-md-5" id="container1">
        <h2>A</h2>
        <?php $arr = array('item 1', 'item 2', 'item 3', 'item 4', 'item 5', 'item 6', 'item 7', 'item 8', 'item 9', 'item 10');
        global $wpdb;
        $post_id = $wpdb->get_results("SELECT value FROM drag_drop");
        // Search for the array key and unset   
        foreach ($post_id as $value) {
            $val = $value->value;
            //echo $val;
            $keyToDelete = array_search($val, $arr);
            unset($arr[$keyToDelete]);
        }
        foreach ($arr as $subcat) {
            echo ('<div itemid="' . $subcat . '" class="child" id="' . $subcat . '">' . $subcat . '</div>');   
        }
        ?>
        <!--<div itemid="itm-1" class="child" id="itm-1">Item 1</div>
        <div itemid="itm-2" class="child" id="itm-2">Item 2</div>
        <div itemid="itm-3" class="child" id="itm-3">Item 3</div>
        <div itemid="itm-4" class="child" id="itm-4">Item 4</div>
        <div itemid="itm-5" class="child" id="itm-5">Item 5</div>
        <div itemid="itm-6" class="child" id="itm-6">Item 6</div>
        <div itemid="itm-7" class="child" id="itm-7">Item 7</div>
        <div itemid="itm-8" class="child" id="itm-8">Item 8</div>
        <div itemid="itm-9" class="child" id="itm-9">Item 9</div>
        <div itemid="itm-10" class="child" id="itm-10">Item 10</div>-->
    </div>
    <div class="text-center col-md-5" id="container2">
        <h2>B</h2>
        <?php
        $post_id = $wpdb->get_results("SELECT value FROM drag_drop");
        foreach ($post_id as $value) {
            $val = $value->value;
            echo ('<div itemid="' . $val . '" class="child" id="itm-1">' . $val . '</div>');
        } 
        ?>
    </div>
</div>

<?php
get_footer(); ?>