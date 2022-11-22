<?php


// require( __DIR__ . "/../../../wp-load.php" );
require_once( __DIR__ . "/scssphp/scss.inc.php" );

use ScssPhp\ScssPhp\Compiler;
use ScssPhp\ScssPhp\ValueConverter;


function compileCleoSass(){

    $compiler = new Compiler();

    $compiler->setImportPaths( __DIR__ . '/../sass/' );

    $variables = array( 
        '$primary' => ValueConverter::parseValue(get_theme_mod('theme-main', '#594c74')),
        '$secondary' => ValueConverter::parseValue(get_theme_mod('theme-secondary', '#555')),
        '$text-size' => ValueConverter::parseValue(get_theme_mod('theme-text-size', '12'. 'px')),
        '$gray-100'	=>	ValueConverter::parseValue(get_theme_mod('theme-main', '#594c74')),
        '$gray-200'	=>	ValueConverter::parseValue(get_theme_mod('theme-main','#594c74')),
        '$gray-700'	=>	ValueConverter::parseValue(get_theme_mod('theme-main','#594c74')),
        '$white'	=>	ValueConverter::parseValue(get_theme_mod('theme-main','#594c74')),
        '$indigo'	=>	ValueConverter::parseValue(get_theme_mod('theme-main','#594c74')),
        '$border-color'	=>	ValueConverter::parseValue(get_theme_mod('theme-main','#594c74')),
        '$link-hover-color'	=>	ValueConverter::parseValue(get_theme_mod('theme-main','#594c74')),
        '$font-family-monospace'	=>	ValueConverter::parseValue(get_theme_mod('theme-main','#594c74')),);

    $compiler->replaceVariables(	$variables	);

    try {

        $css = $compiler->compileString('@import "variables.scss";')->getCss();
        return $css;

    } catch (\Exception $e) {
        return $e;
        syslog(LOG_ERR, 'scssphp: Unable to compile content');
    }
}

?>