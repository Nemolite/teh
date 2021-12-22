<?php
/**
 * СНО, Новости СНО
 */
 
add_action('init', 'ds4_sno_news');
function ds4_sno_news(){
	$labels = array(
		'name'               => 'Новости СНО', 
		'singular_name'      => 'Новости СНО', 
		'add_new'            => 'Добавить Новости СНО',
		'add_new_item'       => 'Добавить новую Новость СНО',
		'edit_item'          => 'Редактировать Новость СНО',
		'new_item'           => 'Новая Новости СНО',
		'view_item'          => 'Посмотреть Новость СНО',
		'search_items'       => 'Найти Новости СНО',
		'not_found'          => 'Новости СНО не найдено',
		'not_found_in_trash' => 'В корзине Новость СНО не найдена',
		'parent_item_colon'  => '',
		'menu_name'          => 'Новости СНО'
	  );
	 
	  $args = array(
		'labels' => $labels,
		'public' => true, 
		'show_ui' => true, 
		'has_archive' => true, 
		'menu_icon' => 'dashicons-welcome-widgets-menus', 
		'menu_position' => 21, 
		'supports' => array( 'title', 'editor', 'thumbnail' )
	);	
	register_post_type('snonews', $args  );
}
?>