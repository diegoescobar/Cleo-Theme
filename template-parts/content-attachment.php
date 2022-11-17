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
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-10">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="entry-header mb-4">
                            <!-- Post title-->
							<?php
							if ( is_singular() ) :
								the_title( '<h1 class="entry-title fw-bolder mb-0">', '</h1>' );
							else :
								the_title( '<h2 class="entry-title text-primary fw-bolder mb-1"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
							endif;
							?>
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
                        <!-- Post content-->
                        <section class="mb-5">
                            <div class="entry-attachment">
                                <?php
                                $image_size = apply_filters( 'wporg_attachment_size', 'large' );
                                echo wp_get_attachment_image( get_the_ID(), $image_size );
                                ?>

                                <?php if ( has_excerpt() ) : ?>
                                    <div class="entry-caption">
                                        <?php the_excerpt(); ?>
                                    </div><!-- .entry-caption -->
                                <?php endif; ?>
                            </div><!-- .entry-attachment -->
                        </section>
                    </article>
                </div>
            </div>
		<div class="entry-content lead mb-5">
			<footer class="entry-footer">
				<?php cleo_entry_footer(); ?>
			</footer><!-- .entry-footer -->	
		</div><!-- .entry-content -->
	</div>

	
</section><!-- #post-<?php the_ID(); ?> -->
<?php if ( is_singular() ) : ?>
<hr class="m-0" />
<?php endif; ?>


