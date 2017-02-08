<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BootstrapFast
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>
<?php $container = get_theme_mod( 'bootstrapfast_container_type' ); ?>
<body <?php body_class(); ?>>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bootstrapfast' ); ?></a>
	<div class="<?php echo esc_html( $container ); ?>">
		<div class="row">
			<div class="col-md-3 leftbar">
				<header id="masthead" class="site-header" role="banner">
					<div class="site-branding"><?php
					if ( get_header_image() ) { ?>
					    <div id="site-header">
					        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					            <img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
					        </a>
					    </div><?php
					} else {
						if ( is_front_page() && is_home() ) { ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1><?php
						} else { ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p> <?php
						}

						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) { ?>
							<p class="site-description"><?php echo esc_attr( $description ); ?></p> <?php
						}
					} ?>
					</div><!-- .site-branding -->

					<nav id="site-navigation" class="main-navigation" role="navigation">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'bootstrapfast' ); ?></button>
						<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
					</nav><!-- #site-navigation -->
				</header><!-- #masthead -->
				<?php get_sidebar(); ?>
			</div>
			<div class="col-md-9">
				<div id="content" class="site-content">
