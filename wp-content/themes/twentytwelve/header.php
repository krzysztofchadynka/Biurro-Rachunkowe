<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri().'/css/style.css'; ?>" />
	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,200,300,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Andika&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->
	<?php wp_head(); ?>
	<script>
		jQuery(document).ready(function($){
			var m_width = $('header#masthead #site-navigation .menu-mainmenu-container ul#menu-mainmenu').width();
			var pos = $('header#masthead #site-navigation .menu-mainmenu-container ul#menu-mainmenu').position();
			var count = 0;
			
			$('ul.sub-menu').css('width', m_width);
			
			$('header#masthead #site-navigation .menu-mainmenu-container ul#menu-mainmenu li.menu-item').each(function(){
				if ($(this).hasClass('menu-item-has-children'))
				{
					var el_pos = $(this).position();
					var marg = el_pos.left - pos.left;
					
					$('ul.sub-menu').css('position', 'absolute');
					$('ul.sub-menu').css('left', '-' + marg + 'px');
				}
			});
			
			$('header#masthead #site-navigation .menu-mainmenu-container ul#menu-mainmenu li.menu-item').each(function(){
				if ($(this).hasClass('menu-item-has-children'))
				{
					$(this).find('ul.sub-menu li').each(function(){
						count++;
					});
					
					if (count <= 3)
					{
						$(this).find('ul.sub-menu li').each(function(){
							$(this).css('width', '31%');
						});
					}
				}
			});
			
			
		});
	</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<hgroup>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" ?>
				<img src="/wp-content/themes/twentytwelve/img/br-logo.png" />
			</a>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h3 class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></h3>
			<a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentytwelve' ); ?>"><?php _e( 'Skip to content', 'twentytwelve' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->

		<?php if ( get_header_image() ) : ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
		<?php endif; ?>
	</header><!-- #masthead -->

	<div id="main" class="wrapper">