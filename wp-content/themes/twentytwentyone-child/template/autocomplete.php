<?php
require_once("../../../../wp-load.php");
require_once("../../../../wp-config.php");
global $wpdb;
$string = $_POST['autocomplete'];
$result = $wpdb->get_results("SELECT * FROM `live_product` WHERE product_name LIKE '%" . $string . "%' ORDER BY id ASC");
$json = array();
foreach ($result as $get_result) {
    array_push($json, $get_result->product_name);
}

echo json_encode($json);
