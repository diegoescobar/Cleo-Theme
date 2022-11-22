<?php

require( __DIR__ . '/../../../wp-load.php');

require_once __DIR__ . "/inc/scssphp/scss.inc.php";

use ScssPhp\ScssPhp\Compiler;
use ScssPhp\ScssPhp\ValueConverter;

$compiler = new Compiler();

// $source_scss = __DIR__ . '/sass/variables.scss';
// $scssContents = file_get_contents( __DIR__ . '/sass/variables.scss' );
// echo file_get_contents( __DIR__ . '/sass/variables.scss' );
// $import_path = __DIR__ . '/sass/';
// $compiler->addImportPath( $import_path );
// $compiler->setImportPaths( $import_path );

$compiler->setImportPaths( __DIR__ . '/sass/' );

 $variables = array( 
	'$primary' => ValueConverter::parseValue(get_theme_mod('theme-main', '#594c74')),
	'$secondary' => ValueConverter::parseValue(get_theme_mod('theme-secondary', '#555')),
	'$text-size' => ValueConverter::parseValue(get_theme_mod('theme-text-size', '12'). 'px'),
	'$gray-100'	=>	ValueConverter::parseValue('#594c74'),
	'$gray-200'	=>	ValueConverter::parseValue('#594c74'),
	'$gray-700'	=>	ValueConverter::parseValue('#594c74'),
	'$white'	=>	ValueConverter::parseValue('#594c74'),
	'$indigo'	=>	ValueConverter::parseValue('#594c74'),
	'$border-color'	=>	ValueConverter::parseValue('#594c74'),
	'$link-hover-color'	=>	ValueConverter::parseValue('#594c74'),
	'$font-family-monospace'	=>	ValueConverter::parseValue('#594c74'),);

$compiler->replaceVariables(	$variables	);

// ];

// $compiler->setVariables($variables);
// $compiler->addVariables($variables);
// $compiler->replaceVariables($variables);

var_dump( $compiler->getCompileOptions() );

echo "<pre>";

try {

	$css = $compiler->compileString('@import "variables.scss";')->getCss();

	// $css = $compiler->compileString($scssContents, $source_scss);
	var_dump ( $css );

} catch (\Exception $e) {
    echo '';
    syslog(LOG_ERR, 'scssphp: Unable to compile content');
}


// echo $compiler->compileString( $variables );

// echo $compiler->compileString('
//   $color: #abc;
//   div { color: $color; }
// ')->getCss();

?>