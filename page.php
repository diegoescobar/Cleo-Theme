<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cleo
 */

get_header();
?>

	<main id="primary" class="site-main container mt-5">
		<div class="row">
			<div class="<?php echo ( is_active_sidebar('page-widgets') ) ?  'col-lg-8' : 'col-lg-11'; ?>">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

				?>
			</div>
		<?php

		// <!-- Side widgets-->
		if( is_active_sidebar('page-widgets') ) { ?>
			<!-- Side widgets-->
			<div class="col-lg-4">
					<div class="sticky-md-top">
				<?php
				//get_sidebar();
				dynamic_sidebar('page-widgets'); ?>
			</div></div>
			<!-- /widgets-container -->
		<?php } 
		
		echo "</div>";
		

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
		</div>
	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
