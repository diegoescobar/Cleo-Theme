<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cleo
 */

get_header();
?>
	<main id="primary" class="site-main container mt-5">
		<div class="row">
			<div class="<?php echo ( is_active_sidebar('sidebar-widgets') ) ?  'col-lg-8' : 'col-lg-11'; ?>"> 
		<?php
		if ( have_posts() ) :

			if ( !is_home() && !is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;
			?><div class="content-row row"><?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;
			?></div><?php
			// the_posts_navigation();

			cleo_numeric_posts_nav();

			cleo_infinite_load_more();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		</div>

		<!-- Side widgets-->
		<?php 
			if( is_active_sidebar('sidebar-widgets') ) { ?>
				<!-- Side widgets-->
				<div class="col-lg-4">
					<div class="sticky-md-top">
					<?php
					//get_sidebar();
					dynamic_sidebar('sidebar-widgets'); ?>
				</div></div>
				<!-- /widgets-container -->
			<?php } ?>
		</div>
	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
