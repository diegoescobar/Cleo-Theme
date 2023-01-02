<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cleo
 */

if ( ! is_active_sidebar( 'sidebar-widgets' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area sticky-md-top">
	<?php dynamic_sidebar( 'sidebar-widgets' ); ?>
</aside><!-- #secondary -->
