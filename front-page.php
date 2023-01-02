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
			<div class="<?php 
			// if ($user['is_logged_in'] ? $user['first_name'] : 'Guest').'!';
			echo ( is_active_sidebar('front-widgets') ) ?  'col-lg-8' : 'col-lg-11';
			?>"> 
			<!-- Page content-->
			<?php
				while ( have_posts() ) :
					the_post();
					if (is_front_page()){
						get_template_part( 'template-parts/content', get_post_type() );
					}
				endwhile; // End of the loop.
				?>
			</div>
			<!-- Side widgets-->
			<?php 
			if( is_active_sidebar('front-widgets') ) { ?>
				<!-- Side widgets-->
				<div class="col-lg-4">
					<div class="sticky-md-top">
					<?php
					//get_sidebar();
					dynamic_sidebar('front-widgets'); ?>
				</div></div>
				<!-- /widgets-container -->
			<?php } ?>
		</div>
	</main><!-- #main -->

<?php

get_footer();
