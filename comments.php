<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cleo
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<!-- Comments section-->
<?php /*
<!-- Comments section-->
<section class="mb-5">
	<div class="card bg-light">
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
	</div>
</section>
*/ ?>

<div class="row">
	<section id="comments" class="comments-area mb-5">
		<div class="card bg-light">
			<div class="card-body">
				<?php

				comment_form();

				// You can start editing here -- including this comment!
				if ( have_comments() ) :
					?>
					<h3 class="fw-bold comments-title">
						
						<?php
						$cleo_comment_count = get_comments_number();
						if ( '1' === $cleo_comment_count ) {
							printf(
								/* translators: 1: title. */
								esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'cleo' ),
								'<span>' . wp_kses_post( get_the_title() ) . '</span>'
							);
						} else {
							printf( 
								/* translators: 1: comment count number, 2: title. */
								esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $cleo_comment_count, 'comments title', 'cleo' ) ),
								number_format_i18n( $cleo_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								'<span>' . wp_kses_post( get_the_title() ) . '</span>'
							);
						}
						?>
					</h3><!-- .comments-title -->

					<?php the_comments_navigation(); ?>

					<!-- comment-list -->
						<?php
						wp_list_comments(
							array(
								'style'      => 'div',
								'short_ping' => false,
							)
						);
						?>
					<!-- .comment-list -->

					<?php
					the_comments_navigation();

					// If comments are closed and there are comments, let's leave a little note, shall we?
					if ( ! comments_open() ) :
						?>
						<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'cleo' ); ?></p>
						<?php
					endif;

				endif; // Check for have_comments().
				
				?>
			</div>
		</div>
	</section>
</div>
