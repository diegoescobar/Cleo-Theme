<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package cleo
 */

get_header();
?>

<main id="primary" class="site-main container mt-5">

	<section class="error-404 not-found col-lg-12 mb-5">
		<header class="page-header">
			<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'cleopress' ); ?></h1>
		</header><!-- .page-header -->

		<div class="row">
			<div class="page-content col-lg-8 mb-5">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'cleopress' ); ?></p>
				<?php
				get_search_form();

				the_widget( 'WP_Widget_Recent_Posts' );
				?>
				<?php
				/* translators: %1$s: smiley */
				$cleo_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'cleopress' ), convert_smilies( ':)' ) ) . '</p>';
				the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$cleo_archive_content" );
				?>
			</div>
			<div class="widgets col-lg-4 mb-">
				<div class="widget widget_categories">
					<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'cleopress' ); ?></h2>
					<ul>
						<?php
						wp_list_categories(
							array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							)
						);
						?>
					</ul>
				</div><!-- .widget -->

				<?php
				the_widget( 'WP_Widget_Tag_Cloud' );
				?>
			</div><!-- .page-content -->
		</div>
	</section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();
