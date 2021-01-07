<?php
/**
 * The header coming soon for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ciat_foresight_theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> style="margin: 0 !important;">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body id="body-coming-soon" <?php body_class(); ?>
	style="background: url( <?php echo get_stylesheet_directory_uri() . '/static/images/field-bg.jpg';?> ) top center no-repeat;">
<?php wp_body_open(); ?>
<div id="page" class="site">
