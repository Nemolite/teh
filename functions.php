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
* Возврат раздела виджетов в классический вид
*/
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
add_filter( 'use_widgets_block_editor', '__return_false' );

/**
 * Регистрация виджетов для документов меню
 */
function teh_register_widgets_doc_left(){
	register_sidebar( array(		
		'name' => esc_html__('Левый информационный блок', 'teh'),
		'id' => 'docleft',		
		'description' => esc_html__('Для левого информационного блока', 'teh'),
		'before_widget' => '<div id="%1$s" class="widget morenews-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span><span class="heading-line">',
        'after_title' => '</span><span class="heading-line-after"></span></h2>',
	) );
}
add_action( 'widgets_init', 'teh_register_widgets_doc_left' );

function teh_register_widgets_doc_right(){
	register_sidebar( array(		
		'name' => esc_html__('Правый информационный блок', 'teh'),
		'id' => 'docright',	
		'description' => esc_html__('Для правого информационного меню', 'teh'),
		'before_widget' => '<div id="%1$s" class="widget morenews-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span><span class="heading-line">',
        'after_title' => '</span><span class="heading-line-after"></span></h2>',
	) );
}
add_action( 'widgets_init', 'teh_register_widgets_doc_right' );

/**
 * Банеры
 */
require_once( get_stylesheet_directory(). '/inc/baners.php' );

/**
 * Банеры (как на старом сайте)
 */
require_once( get_stylesheet_directory(). '/inc/baners_old.php' );

/**
 * Блок верхних и нижних банеров
 */
require_once( get_stylesheet_directory(). '/inc/front-baner.php' );

/**
 * Блок документов на главной
 */
require_once( get_stylesheet_directory(). '/inc/document.php' );

?>