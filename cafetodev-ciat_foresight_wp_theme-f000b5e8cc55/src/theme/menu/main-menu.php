<?php
/**
 * Foresight Main Menu.
 *
 * @package Foresight_Theme
 */

if ( ! function_exists( 'foresight_main_menu' ) ) :

	/**
	 * Display main menu in header.
	 *
	 * @package Foresight_Theme
	 */
	function foresight_main_menu() {
		if ( has_nav_menu( 'foresight-main-menu' ) ) {
			wp_nav_menu(
				array(
					'theme_location'  => 'foresight-main-menu',
					'items_wrap'      => my_nav_wrap(),
					'container'       => 'div',
					'container_id'    => 'foresight-main-menu-container',
					'container_class' => '',
					'menu_id'         => 'foresight-main-menu-items',
					'menu_class'      => 'navbar-nav',
					'depth'           => 1,
					'fallback_cb'     => '',
					'link_before'     => '',
					'link_after'      => '',
				)
			);
		}
	}

	/**
	 *  Default value of 'items_wrap' is <ul id="%1$s" class="%2$s">%3$s</ul>'
	 *
	 * @return string menu construction returns.
	 */
	function my_nav_wrap() {

		// open the <ul>, set 'menu_class' and 'menu_id' values
		$wrap  = '<ul id="%1$s" class="%2$s">';

		// the static link
		$activeClass = "current-menu-item";
		$currentClass = (is_front_page()) ? $activeClass : "";
		$wrap .= '<li id="cafeto-menu-item-home" class="menu-item '. $currentClass .'"><a href="'. get_home_url() .'">Home</a></li>';

		// get nav items as configured in /wp-admin/
		$wrap .= '%3$s';


		// close the <ul>
		$wrap .= '</ul>';
		// return the result
		return $wrap;
	}
endif;

