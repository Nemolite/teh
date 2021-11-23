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
 * Произвольные типы записей для нижних банеров
 */
function teh_section_bottom_baner(){
	$labels = array(
		'name'               => 'Банер', 
		'singular_name'      => 'Банер', 
		'add_new'            => 'Добавить новый',
		'add_new_item'       => 'Добавить новый банер',
		'edit_item'          => 'Редактировать банер',
		'new_item'           => 'Новый банер',
		'view_item'          => 'Посмотреть банер',
		'search_items'       => 'Найти банер',
		'not_found'          => 'Банер не найдено',
		'not_found_in_trash' => 'В корзине банеров не найдено',
		'parent_item_colon'  => '',
		'menu_name'          => 'Нижние Банеры'
	  );
	 
	  $args = array(
		'labels' => $labels,
		'public' => true, // 
		'show_ui' => true, 
		'has_archive' => true, 
		'menu_icon' => 'dashicons-media-document', 
		'menu_position' => 20, 
		'supports' => array( 'title', 'editor', 'thumbnail')
	);	
	register_post_type('bottom_baner', $args  );
}
add_action('init', 'teh_section_bottom_baner');

/**
 * Добавление произвольного поля (url) для произволього типа записей bottom_baner
 */
function teh_add_custom_url(){	
	add_meta_box( 
		'teh_meta_url',
	 	'В данном поле указываем ссылку на сторонный сайт, 
	 	если по клику на банер должен быть переход на другой сайт. 
	 	Данное поле оставляем пустым, 
	 	если банер ведет на наш сайт. 
	 	Документы при этом публикуем на 
	 	этой же странице', 
	 	'teh_meta_box_callback', // колбэк функция
	 	'bottom_baner', 		// типы постов, для которых его подключим
		'normal',   			// расположение (normal, side, advanced)
		'default'   			// приоритет (default, low, high, core) 
	);
}
add_action('add_meta_boxes', 'teh_add_custom_url');

function teh_meta_box_callback($post){
	
	$value = get_post_meta( $post->ID, 'teh_meta_url', 1 );
	
	echo '<label for="teh_meta_url">' . __("Ссылка на сторонный сайт (можно оставить пустым)", 'teh' ) . '</label> ';
	echo '<input type="text" id="teh_url_field" name="teh_meta_url" value="'. $value .'" size="100" />';
}

function teh_save_data_url( $post_id ) {	
	
	$url = $_POST['teh_meta_url'];
	
	update_post_meta( $post_id, 'teh_meta_url', $url );
}
add_action( 'save_post', 'teh_save_data_url' );

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