<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cleo
 */

get_header();
?>

	<main id="primary" class="site-main container mt-5">
		<div class="row">
			<div class="<?php echo ( is_active_sidebar('archive-widgets') ) ?  'col-lg-8' : 'col-lg-11'; ?>">
				<?php if ( have_posts() ) : ?>
					<header class="page-header">
						<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="archive-description">', '</div>' );
						?>
					</header><!-- .page-header -->
					<?php the_posts_navigation( ); ?>
					<div class="row">
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
						
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;
					?></div><?php
					cleo_numeric_posts_nav();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>

			</div>

			<?php if( is_active_sidebar('archive-widgets') ) { ?>
				<!-- Side widgets-->
				<div class="col-lg-4">
					<div class="sticky-md-top">
						<?php dynamic_sidebar('archive-widgets'); ?>
					</div>
				</div>
				<!-- /widgets-container -->
			<?php } ?>
		</div>
	</main><!-- #main -->

<?php

get_footer();
