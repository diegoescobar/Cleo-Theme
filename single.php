<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package cleo
 */

get_header();
?>
	<main id="primary" class="site-main container mt-5">
		<div class="row">
			<?php if ( is_singular() ) : ?>
				<div class="col-lg-12"><?php the_breadcrumb();?></div>
			<?php endif; ?>
			<div class="<?php echo ( is_active_sidebar('single-widgets') ) ?  'col-lg-8' : 'col-lg-11'; ?>">
			<?php 
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', get_post_type() );

				the_post_navigation(
					array(
						'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'cleopress' ) . '</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'cleopress' ) . '</span> <span class="nav-title">%title</span>',
					)
				);

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			
			?>
			</div>
			<!-- Side widgets-->
			<?php 
			if( is_active_sidebar('single-widgets') ) { ?>
				<!-- Side widgets-->
				<div class="col-lg-4">
					<div class="sticky-md-top">
					<?php //get_sidebar();
					dynamic_sidebar('single-widgets'); ?>
				</div></div>
				<!-- /widgets-container -->
			<?php } ?>
		</div>
	</main><!-- #main -->
<?php
// get_sidebar();
get_footer();
