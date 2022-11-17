<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package cleo
 */

get_header();
?>

	<main id="primary" class="site-main container mt-5">
		<div class="row">
			<div class="col-lg-8"> 

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'cleopress' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<?php cleo_numeric_posts_nav(); ?>
			<?php
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

			cleo_numeric_posts_nav();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		</div>

			<?php if( is_active_sidebar('search-widgets') ) { ?>
				<!-- Side widgets-->
				<div class="col-lg-4">
					<?php dynamic_sidebar('search-widgets'); ?>
				</div>
				<!-- /widgets-container -->
			<?php } ?>
		</div>

	</main><!-- #main -->

<?php

get_footer();
