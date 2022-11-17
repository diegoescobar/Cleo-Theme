<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cleo
 */

?>
<!-- Page content-->

		<!-- Post content-->
		<article>
			<!-- Post header-->
			<header class="entry-header mb-4">
				<!-- Post title-->
				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title fw-bolder mb-0">', '</h1>' );
				elseif ( is_home() || is_front_page()):
					// the_title( '<p class="entry-title fw-bolder mb-0">', '</p>' );
				else :
					the_title( '<h2 class="entry-title text-primary fw-bolder mb-1"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;
				?>
				<?php
				if ( 'post' === get_post_type() ) :
					?>
					<div class="text-muted fst-italic mb-2">
						<?php
						// cleo_posted_on();
						// cleo_posted_by();
						?>
					</div><!-- .entry-meta -->
				<?php endif; ?>

				<!-- Post categories-->
				<footer class="entry-footer">
					<?php cleo_entry_footer(); ?>
				</footer><!-- .entry-footer -->
				<?php
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cleopress' ),
						'after'  => '</div>',
					)
				);
				?>
			</header>
			<!-- Preview image figure-->
			<figure class="mb-4">
				<?php cleo_post_thumbnail(); ?>
			</figure>
			<!-- Post content-->
			<section class="mb-5">
			<?php if ( is_singular() ) : 
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
				else :
					the_excerpt(sprintf(
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
					) );
				endif; ?>
			</section>
			<footer class="entry-footer">
				<?php cleo_entry_footer(); ?>
			</footer><!-- .entry-footer -->	
		</article>
		<!-- #post-<?php the_ID(); ?> -->
	<?php if ( is_singular() ) : ?>
	<hr class="m-0" />
	<?php endif; ?>
	
