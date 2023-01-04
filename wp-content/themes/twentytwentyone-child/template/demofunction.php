<?php
/*
 * Template Name: Demo function
 * description: >-
  Page template without sidebar
 */
    $attachment_id=62;
	$image = wp_get_attachment_image_src( $attachment_id);
	echo $image[0];
