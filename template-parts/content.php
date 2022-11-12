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
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
							<?php
							if ( is_singular() ) :
								the_title( '<h1 class="entry-title fw-bolder mb-0">', '</h1>' );
							else :
								the_title( '<h2 class="entry-title text-primary fw-bolder mb-1"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
							endif;
							?>
							<?php
							if ( 'post' === get_post_type() ) :
								?>
								<div class="text-muted fst-italic mb-2">
									<?php
									cleo_posted_on();
									cleo_posted_by();
									?>
								</div><!-- .entry-meta -->
							<?php endif; ?>

                            <!-- Post categories-->
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a>
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
                        <!-- Preview image figure-->
						<?php 
						// <figure class="mb-4"><img class="img-fluid rounded" src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="..." /></figure>
						cleo_post_thumbnail(); ?>
                        <!-- Post content-->
                        <section class="mb-5">
                            <?php
							the_content(
								sprintf(
									wp_kses(
										/* translators: %s: Name of current post. Only visible to screen readers */
										__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'cleo' ),
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
        </div>

	<header class="entry-header">
		
		
	</header><!-- .entry-header -->

	

	<div class="entry-content lead mb-5">
		
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php cleo_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</section><!-- #post-<?php the_ID(); ?> -->
<hr class="m-0" />
