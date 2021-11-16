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

/**
 * Блок документов
 */

if (!function_exists('teh_front_page_block_document_html')) :
    /**
     *
     * @param null
     * @return null
     *
     * @since teh 1.0.0
     *
     */
    function teh_front_page_block_document_html()
    {      
    ?>

        <section class="section-block-upper">
        
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                          
                </main>
            </div>         

        </section>

        <?php
    }
endif;
add_action('teh_front_page_block_document', 'teh_front_page_block_document_html', 50);
?>