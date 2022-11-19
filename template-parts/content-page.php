<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cleo
 */

?>

<!-- Post content-->
<article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- Post header-->
	<header class="mb-4">
		<!-- Post title-->
		<?php
		if ( is_singular() && !is_front_page()) :
			the_title( '<h1 class="entry-title fw-bolder mb-1">', '</h1>' );
		elseif ( !is_home() ) :
			//whut
		elseif ( is_front_page()):
			// the_title( '<p class="entry-title fw-bolder mb-0">', '</p>' );
		else :
			the_title( '<h2 class="entry-title text-primary fw-bolder mb-1"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
		<!-- Post meta content-->
		<div class="text-muted fst-italic mb-2"><?php  //cleo_posted_on(); ?> <?php //cleo_posted_by(); ?></div>
		<!-- Post categories-->
		<?php cleo_entry_footer(); ?>
	</header>
	
	<!-- Preview image figure-->
	<figure class="mb-4">
		<?php cleo_post_thumbnail(); ?>
	</figure>

	<!-- Post content-->
	<section class="mb-5">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'cleopress' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);
		?>
	</section>
</article>
