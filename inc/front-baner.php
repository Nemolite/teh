<?php
/**
 * Блок верхних банеров
 */
if (!function_exists('teh_front_page_block_top_baner_html')) :
    /**
     *
     * @param null
     * @return null
     *
     * @since teh 1.0.0
     *
     */
    function teh_front_page_block_top_baner_html()
    {      
    ?>
        <section class="teh-section-block-top-baner">       
                 
        </section>

        <?php
    }
endif;
add_action('teh_front_page_block_top_baner', 'teh_front_page_block_top_baner_html', 50);

/**
 * Блок нижних банеров
 */
if (!function_exists('teh_front_page_block_bottom_baner_html')) :
    /**
     *
     * @param null
     * @return null
     *
     * @since teh 1.0.0
     *
     */
    function teh_front_page_block_bottom_baner_html()
    {      
    ?>
        <section class="teh-section-bottom-baner">       
                 
        </section>

        <?php
    }
endif;
add_action('teh_front_page_block_bottom_baner', 'teh_front_page_block_bottom_baner_html', 50);
?>