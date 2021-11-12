<?php
/**
 * Дочерняя тема для темы newsup  
 * 
 */

defined( 'ABSPATH' ) || exit;

/**
 * Helpers
 */
if (!function_exists('show')) {
    function show() {
        echo "<pre>";
	    print_r($param);
	    echo "</per>";
    }
}

if (!function_exists('vshow')) {
    function vshow() {
        echo "<pre>";
	    var_dump($param);
	    echo "</per>";
    }
}

function teh_scripts_style() {
	$theme_version = wp_get_theme()->get( 'Version' );
	wp_enqueue_style( 'teh-style', get_stylesheet_directory_uri() .'/assets/css/teh.css' );
	wp_enqueue_script( 'teh-script', get_stylesheet_directory_uri() . '/assets/js/teh.js', array(), $theme_version, true );
}
add_action( 'wp_enqueue_scripts', 'teh_scripts_style' );

/**
 * Банеры
 */
require_once( get_stylesheet_directory(). '/inc/baners.php' );

/**
 * Банеры (как на старом сайте)
 */
require_once( get_stylesheet_directory(). '/inc/baners_old.php' );

/**
* Возврат раздела виджетов в классический вид
*/
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
add_filter( 'use_widgets_block_editor', '__return_false' );
?>