<?php

// Register header nav menu
add_action( 'init', 'baseline_register_header_nav' );
function baseline_register_header_nav() {
	register_nav_menu( 'header', __( 'Header Navigation', 'baseline' ) );
}

// Display header nav
add_action( 'genesis_header', 'baseline_do_header_nav', 12 );
function baseline_do_header_nav() {
	echo '<div class="header-content">';
		// echo get_search_form();
		genesis_nav_menu( array( 'theme_location' => 'header' ) );
	echo '</div>';
}

// Reposition the secondary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_before_footer', 'genesis_do_subnav', 5 );

// Add side menu after site-container
add_action( 'genesis_after', 'baseline_sidr_navigation' );
function baseline_sidr_navigation() {

	echo '<nav id="side-menu" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">';

    	echo '<button class="menu-close" role="button" aria-pressed="false"><span class="fa fa-times" aria-hidden="true"></span>' . __( ' Close', 'baseline' ) . '</button>';

		get_search_form();

		// Header nav
		$header = wp_nav_menu( array(
			'theme_location' => 'header',
			'echo'           => false,
			'fallback_cb'    => false,
		) );
		// Primary nav
		$primary = wp_nav_menu( array(
			'theme_location' => 'primary',
			'echo'           => false,
			'fallback_cb'    => false,
		) );
		// Secondary nav
		$secondary = wp_nav_menu( array(
			'theme_location' => 'secondary',
			'echo'           => false,
			'fallback_cb'    => false,
		) );
		// Display menus if they are active
		if ( ! empty( $header ) ) {
			// echo '<div class="sidr-heading">' . __( 'Header Menu', 'baseline' ) . '</div>';
			echo $header;
		}
		if ( ! empty( $primary ) ) {
			// echo '<div class="sidr-heading">' . __( 'Primary Menu', 'baseline' ) . '</div>';
			echo $primary;
		}
		if ( ! empty( $secondary ) ) {
			// echo '<div class="sidr-heading">' . __( 'Secondary Menu', 'baseline' ) . '</div>';
			echo $secondary;
		}

	echo '</nav>';
}
