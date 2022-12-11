<?php


// require( __DIR__ . "/../../../wp-load.php" );
require_once( __DIR__ . "/scssphp/scss.inc.php" );

use ScssPhp\ScssPhp\Compiler;
use ScssPhp\ScssPhp\ValueConverter;


function compileCleoSass(){

    $compiler = new Compiler();

    $compiler->setImportPaths( __DIR__ . '/../sass/' );


    $variables = cleoStyleVariables_arr();

    $compiler->replaceVariables(	$variables	);

    try {

        // $css = $compiler->compileString('@import "style.scss";')->getCss();
        $css = $compiler->compileString('@import "layouts/bs.resume.scss";')->getCss();
        return $css;

    } catch (\Exception $e) {
        return $e;
        syslog(LOG_ERR, 'scssphp: Unable to compile content');
    }
}


function cleoStyleVariables_arr() {
    /*
    $primary:       #d63384 !default;
    $secondary:     #e9ecef !default;
    $success:       #198754 !default;
    $info:          #0dcaf0 !default;
    $warning:       #ffc107 !default;
    $danger:        #dc3545 !default;
    $light:         #212529 !default;
    $dark:          #f8f9fa !default;
    */

    $variables = array( 
        '$primary' => ValueConverter::parseValue(get_theme_mod('theme-primary', '#d63384')),
        '$secondary' => ValueConverter::parseValue(get_theme_mod('theme-secondary', '#e9ecef')),
        // '$text-size' => ValueConverter::parseValue(get_theme_mod('theme-text-size', '12'. 'px')),
        '$success'	=>	ValueConverter::parseValue(get_theme_mod('theme-success', '#198754')),
        '$info'	=>	ValueConverter::parseValue(get_theme_mod('theme-info','#0dcaf0')),
        '$warning'	=>	ValueConverter::parseValue(get_theme_mod('theme-warning','#ffc107')),
        '$danger'	=>	ValueConverter::parseValue(get_theme_mod('theme-danger','#dc3545')),
        '$light'	=>	ValueConverter::parseValue(get_theme_mod('theme-light','#212529')),
        '$dark'	=>	ValueConverter::parseValue(get_theme_mod('theme-dark','#f8f9fa')),
        );

    return $variables;

    /*
 * 


$white:    #fff !default;
$gray-100: #f8f9fa !default;
$gray-200: #e9ecef !default;
$gray-300: #dee2e6 !default;
$gray-400: #ced4da !default;
$gray-500: #adb5bd !default;
$gray-600: #6c757d !default;
$gray-700: #495057 !default;
$gray-800: #343a40 !default;
$gray-900: #212529 !default;
$black:    #000 !default;

$blue:    #0d6efd !default;
$indigo:  #6610f2 !default;
$purple:  #6f42c1 !default;
$pink:    #d63384 !default;
$red:     #dc3545 !default;
$orange:  #bd5d38 !default;
$yellow:  #ffc107 !default;
$green:   #198754 !default;
$teal:    #20c997 !default;
$cyan:    #0dcaf0 !default;

$primary:       $gray-800; //$blue !default;
$secondary:     $gray-200 !default;
$success:       $green !default;
$info:          $cyan !default;
$warning:       $yellow !default;
$danger:        $red !default;
$light:         $gray-900 !default;
$dark:          $gray-100 !default;

$body-bg:                   $white !default;
$body-color:                $gray-900 !default;
$body-text-align:           null !default;

$border-color:                $gray-300 !default;

$link-color:                              $primary !default;
$link-decoration:                         underline !default;
$link-shade-percentage:                   20% !default;
$link-hover-color:                        shift-color($link-color, $link-shade-percentage) !default;



$link-hover-decoration:                   null !default;
$stretched-link-pseudo-element:           after !default;
$stretched-link-z-index:                  1 !default;
$paragraph-margin-bottom:   1rem !default;
$grid-columns:                12 !default;
$grid-gutter-width:           1.5rem !default;
$grid-row-columns:            6 !default;
$border-width:                1px !default;
$border-radius:               .25rem !default;
$border-radius-sm:            .2rem !default;
$border-radius-lg:            .3rem !default;
$border-radius-pill:          50rem !default;

 * 
 */
}

?>