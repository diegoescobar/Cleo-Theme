<?php

require_once(  __DIR__ . '/scssphp/scss.inc.php');

include_once( __DIR__ . '/customizer-functions.php');

if (is_customize_preview()) {
	add_action('wp_head', function() {
		
        $css = compileCleoSass();

		if (!empty($css) && is_string($css)) {
			echo '<style type="text/css">' . $css . '</style>';
		}

	});
}

add_action('customize_register', function($wp_customize) {
	$wp_customize->add_section('theme-variables', [
		'title' => __('Theme Variables', 'txtdomain'),
		'priority' => 25
	]);
 
	$wp_customize->add_setting('theme-main', ['default' => '#594c74']);
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'theme-main', [
		'section' => 'theme-variables',
		'label' => __('Main theme color', 'txtdomain'),
		'priority' => 10
	]));
 
	$wp_customize->add_setting('theme-secondary', ['default' => '#555']);
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'theme-secondary', [
		'section' => 'theme-variables',
		'label' => __('Secondary theme color', 'txtdomain'),
		'priority' => 20
	]));
 
	$wp_customize->add_setting('theme-text-size', ['default' => '12']);
	$wp_customize->add_control('theme-text-size', [
		'section' => 'theme-variables',
		'label' => __('Text size', 'txtdomain'),
		'type' => 'number',
		'priority' => 30,
		'input_attrs' => ['min' => 8, 'max' => 20, 'step' => 1]
	]);
});

add_action('customize_save_after', function() {

	$target_css =  __DIR__ . '/../css/variables.css';

	$css = compileCleoSass();
    
	if (!empty($css) && is_string($css)) {
		file_put_contents($target_css, $css);
	} else {
        throw_error( implode(';', $css) ); 
    }

});

function throw_error( $message ){
    header('HTTP/1.1 500 Internal Server Booboo');
    header('Content-Type: application/json; charset=UTF-8');
    // if (is_array()){ $css_test = implode('; ', $variables); }
    die(json_encode(array('message' => 'ERROR: ' . $message , 'code' => 1337)));
}


wp_enqueue_style( 'new-theme-style', get_stylesheet_directory_uri() . '/css/variables.css', array('cleo-style'), _S_VERSION, true );