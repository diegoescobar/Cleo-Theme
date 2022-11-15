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
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cleo' ),
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
                    <!-- Comments section-->
                    <section class="mb-5">
                        <div class="card bg-light">
							<?php 
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
							/*
                            <div class="card-body">
                                <!-- Comment form-->
                                <form class="mb-4"><textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea></form>
                                <!-- Comment with nested comments-->
                                <div class="d-flex mb-4">
                                    <!-- Parent comment-->
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">Commenter Name</div>
                                        If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks.
                                        <!-- Child comment 1-->
                                        <div class="d-flex mt-4">
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold">Commenter Name</div>
                                                And under those conditions, you cannot establish a capital-market evaluation of that enterprise. You can't get investors.
                                            </div>
                                        </div>
                                        <!-- Child comment 2-->
                                        <div class="d-flex mt-4">
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold">Commenter Name</div>
                                                When you put money directly to a problem, it makes a good headline.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single comment-->
                                <div class="d-flex">
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold">Commenter Name</div>
                                        When I look at the universe and all the ways the universe wants to kill us, I find it hard to reconcile that with statements of beneficence.
                                    </div>
                                </div>
                            </div>
							*/?>
                        </div>
                    </section>
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


