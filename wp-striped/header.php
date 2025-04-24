<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package ex64wp-html5up-striped
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/ie/html5shiv.min.js" type="text/javascript"></script>
		<link rel="stylesheet"
			  href="<?php echo get_template_directory_uri(); ?>/css/ie8.css">
		<![endif]-->

		<?php wp_head(); ?>
		<link rel="stylesheet"
			  href="<?php echo get_template_directory_uri(); ?>/css/rtl.css">
	</head>
	<body <?php body_class(); ?>>
