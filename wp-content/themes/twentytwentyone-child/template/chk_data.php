<?php
//echo "here";
//die;
require_once("../../../../wp-config.php");
require_once("../../../../wp-load.php");
global $wpdb;
$post_id = $wpdb->get_results("SELECT value FROM drag_drop");
$array = array();
foreach ($post_id as $value) {
   $val = $value->value;
   //echo $val;
   array_push($array, $val);
   //print_r($arr);
}
   $count = 0;
   foreach ($array as $val) {
      echo ('<div itemid="' . $val . '" class="child" id="itm-1">' . $val . '</div>');
      //$itemid='<div itemid="' . $val . '" class="child" id="itm-1">' . $val . '</div>';
      $count++;
   }
//print_r($post_id);
