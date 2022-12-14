<?php
/**
 * cleo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cleo
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function cleo_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on cleo, use a find and replace
		* to change 'cleopress' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'cleopress', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'cleopress' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	add_theme_support('dark-editor-style');
	
	add_theme_support( 'post-formats', array('aside','video','gallery','chat'));

	add_theme_support('responsive-embeds');
	add_theme_support('starter-content');
	// add_theme_support('editor-font-sizes');
	// add_theme_support('editor-styles');


	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'cleo_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	/**
	 * Register widget area.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 */
	function feed_widgets_init() {


		// single-widgets
		

		register_sidebar(
			array(
				'name'          => esc_html__( 'Sidebar', 'feed' ),
				'id'            => 'single-widgets',
				'description'   => esc_html__( 'Add widgets here.', 'feed' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);

		
		register_sidebar(
			array(
				'name'          => esc_html__( 'Front', 'feed' ),
				'id'            => 'front-widgets',
				'description'   => esc_html__( 'Add widgets here.', 'feed' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);


		// search-widets
		// page-widgets
		// sidebar-widgets
		// archive-widgets

		register_sidebar(
			array(
				'name'          => esc_html__( 'Search', 'feed' ),
				'id'            => 'search-widgets',
				'description'   => esc_html__( 'Add widgets here.', 'feed' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Page', 'feed' ),
				'id'            => 'page-widgets',
				'description'   => esc_html__( 'Add widgets here.', 'feed' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'General', 'feed' ),
				'id'            => 'sidebar-widgets',
				'description'   => esc_html__( 'Add widgets here.', 'feed' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		register_sidebar(
			array(
				'name'          => esc_html__( 'Archive', 'feed' ),
				'id'            => 'archive-widgets',
				'description'   => esc_html__( 'Add widgets here.', 'feed' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);


	}
	add_action( 'widgets_init', 'feed_widgets_init' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'cleo_setup' );

function get_cleo_custom_logo(){
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );

	// if (file_exists($logo[0])){
	// 	var_dump( $logo[0] );
	// }

	if ( has_custom_logo()) {
		echo '<img class="custom-logo" src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
	} else {
		echo '<h1>' . get_bloginfo('name') . '</h1>';
	}
	
}


function get_logo_thumbnail(){
	global $post;

	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$image = wp_get_attachment_image_src( $custom_logo_id , 'thumbnail' );
	return $image[0];
}

function the_logo_thumbnail(){

	echo '<a href="' . site_url() .'" class="custom-logo-link" rel="home" aria-current="page"><img src="'. get_logo_thumbnail()  .'" class="custom-logo" alt="'.get_bloginfo('name').'" decoding="async"></a>';

	// echo "<img src=" . get_logo_thumbnail() . '">';
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cleo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cleo_content_width', 640 );
}
add_action( 'after_setup_theme', 'cleo_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function cleo_scripts() {
	wp_enqueue_style( 'cleo-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'cleo-style', 'rtl', 'replace' );

	// wp_enqueue_style( 'bs-resume', get_template_directory_uri() .'/css/resume.css', array(), _S_VERSION );
	
	// wp_enqueue_script("jquery");

	// wp_enqueue_style( 'bs-resume-colours', get_template_directory_uri() .'/css/resume-colour.css', array(), _S_VERSION );

	wp_enqueue_script( 'cleo-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'cleo-load-more',  get_template_directory_uri() . '/js/loadmore.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cleo_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';


require get_template_directory() . '/inc/breadcrumb.php';
/** Navbar functions for admins */
require get_template_directory() . '/inc/admin-functions.php';


/**
 * Customizer additions. Fuckin Horror Clown show
 */
require get_template_directory() . '/inc/customizer/customizer.php';
// require get_template_directory() . '/inc/customizer/customizer-dynamic-style.php';
// require get_template_directory() . '/inc/customizer/dynamic-theme-style.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


function add_favicon() {
	echo '<link rel="shortcut icon" type="image/x-icon" href="'.get_template_directory_uri().'/assets/favicon.ico" />';
}

add_action('wp_head', 'add_favicon');


function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function add_link_atts($atts) {
	$atts['class'] = "nav-link js-scroll-trigger";
	return $atts;
}

add_filter( 'nav_menu_link_attributes', 'add_link_atts');



function add_additional_class_on_anchor($classes, $item, $args) {
    if(isset($args->add_a_class)) {
        $classes['class'] = $args->add_a_class;
    }

	// $atts['class'] = "nav-link js-scroll-trigger";
    return $classes;
}
add_filter( 'nav_menu_link_attributes', 'add_additional_class_on_anchor', 1, 3);


remove_image_size('1536x1536');
remove_image_size('2048x2048');


function cleo_numeric_posts_nav() {
  
    if( is_singular() )
        return;
  
    global $wp_query;
  
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
  
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
  
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
  
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
  
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
  
    echo '<div class="navigation wp-pagenavi"><ul>' . "\n";
  
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
  
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
  
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
  
        if ( ! in_array( 2, $links ) )
            echo '<li>???</li>';
    }
  
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
  
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>???</li>' . "\n";
  
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
  
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );
  
    echo '</ul></div>' . "\n";
  
}

function cleo_infinite_load_more(){

   // Initial Post Load.
   ?>
   <div class="vl-container mt-20 md:mt-28 xl:mt-32 mb-28 md:mb-36 xl:mb-40">

      <button id="load-more" value="Load More" data-page="<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>" class="load-more-btn"><?php esc_html_e( 'Load More', 'text-domain' ); ?>
      </button>
   </div>
   <?php
}

/** Bootstrap Template fix */
function wph_add_class_for_p_tag($content) {
    $content = str_replace('<p>', '<p class="fs-5 mb-4">', $content);
    return $content;
}

add_filter('the_content', 'wph_add_class_for_p_tag', 9999);
add_filter('the_excerpt', 'wph_add_class_for_p_tag', 9999);

function prefix_category_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    }
	if ( is_tag() ){
		$title = single_tag_title( '', false );
	}
    return $title;
}
add_filter( 'get_the_archive_title', 'prefix_category_title' );


/**
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
	if ( ! is_single() ) {
		$more = sprintf( '<div class="nav-links"><a class="read-more more-link" href="%1$s">%2$s</a></div>',
			get_permalink( get_the_ID() ),
			__( 'Read More', 'textdomain' )
		);
	}

	return $more;
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

function modify_read_more_link() {
	return '<a class="more-link" href="' . get_permalink() . '">Continue Reading</a>';
   }
add_filter( 'the_content_more_link', 'modify_read_more_link' );
   