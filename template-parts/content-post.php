<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cleo
 */


$postClasses = (!is_single() ) ? 'col-6 col-lg-4' : '' ; 

$postClasses = ( is_active_sidebar('sidebar-widgets') || is_active_sidebar('archive-widgets')) ? 'col-12 col-3' : $postClasses;

?>
    <!-- Post content-->
    <article id="post-<?php the_ID(); ?>" <?php post_class( $postClasses ); ?>>
        <!-- Post header-->
        <header class="mb-4">
            <!-- Post title-->
            <?php
            if ( is_singular() ) :
                the_title( '<h1 class="entry-title fw-bolder mb-1">', '</h1>' );
            else :
                the_title( '<h2 class="entry-title text-primary fw-bolder mb-1"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            endif;
            ?>
            <!-- Post meta content-->
            <div class="text-muted fst-italic mb-2"><?php cleo_posted_on(); ?> <?php cleo_posted_by(); ?></div>
            <!-- Post categories-->
            <?php cleo_entry_footer(); ?>
        </header>
        
        <?php if ( !has_post_format( 'gallery' ) ) { ?>
        <!-- Preview image figure-->
        <figure class="mb-4">
            <?php cleo_post_thumbnail(); ?>
        </figure>
        <?php } ?>

        <!-- Post content-->
        <section class="mb-5">
            <?php if ( is_singular() ): 
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
            elseif ( has_post_format( 'gallery' ) ):

                echo '<a href="' . esc_url( get_permalink() ) . '" class="post-thumbnail" rel="bookmark">';
                the_post_thumbnail();
                echo '</a>';
            else :
                the_excerpt(sprintf(
                    wp_kses(
                        /* translators: %s: Name of current post. Only visible to screen readers */
                        __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'cleopress' ),
                        array(
                            'span' => array(
                                'class' => array(),
                        )   ,
                        )
                    ),
                    wp_kses_post( get_the_title() )
                ) );

                // the_content_more_link();

            endif; ?>
        
        <?php if ( is_singular() ) : ?>
            <div class="nav-links"><?php cleo_leave_comment(); ?></div>
        <?php endif; ?>
        </section>
        <hr class="m-0" />

    </article>
