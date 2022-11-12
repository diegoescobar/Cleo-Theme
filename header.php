<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cleo
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

	<link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico" />
	<!-- Font Awesome icons (free version)-->
	<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
	<!-- Google fonts-->
	<link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />

	<?php wp_head(); ?>

 
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'cleo' ); ?></a>

	<!-- Navigation-->
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
		
			<span class="d-block d-lg-none site-title"><?php 
			if ( is_front_page() && is_home() ) :
				?>
				<h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
				<?php
			else :
				?>
				<h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
				<?php
			endif;
			?></span>
			<a class="navbar-brand js-scroll-trigger" href="#page-top">
				<span class="d-none d-lg-block"><?php the_custom_logo(); ?></span>
			</a>
		
		<?php 
		$cleo_description = get_bloginfo( 'description', 'display' );
		if ( $cleo_description || is_customize_preview() ) :
			?>
			<h5 class="site-description"><?php echo $cleo_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></h5>
		<?php endif; ?>

		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

		
		<div class="collapse navbar-collapse" id="navbarResponsive">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'main-menu',
						'menu_class'	 => 'navbar-nav',
						'add_li_class'	 => 'nav-item',
						'container'		 => '',
						'add_a_class'	=> 'nav-link js-scroll-trigger',
					)
				);
				?>
		</div>
	</nav>
	<header id="masthead" class="site-header">


		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'cleo' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
