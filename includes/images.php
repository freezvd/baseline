<?php

// Add new image size 4 x 3 ratio
add_image_size( 'one-half', 565, 424, TRUE );
add_image_size( 'one-third', 365, 274, TRUE );
add_image_size( 'one-fourth', 275, 206, TRUE );

// Add our image sizes to the media chooser
add_filter('image_size_names_choose', 'applegate_do_media_chooser_sizes');
function applegate_do_media_chooser_sizes( $sizes ) {
	$addsizes = array(
		'one-third'  => __( 'One Third'),
		'one-fourth' => __( 'One Fourth'),
	);
	$newsizes = array_merge( $sizes, $addsizes );
	return $newsizes;
}

// Turn off gallery CSS
add_filter( 'use_default_gallery_style', '__return_false' );
