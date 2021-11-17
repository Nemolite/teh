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
            <h2 class="widget-title widget-title-1">
                <span class="heading-line-before"></span>
                <span class="heading-line">Документы</span>
                <span class="heading-line-after"></span>
            </h2>  
            <div class="teh-top-document-left">
                <?php dynamic_sidebar( 'docleft' ); ?>
             </div>  
            <div class="teh-top-document-right">
                <?php dynamic_sidebar( 'docright' ); ?>   
            </div>                        
        </section>
        <div class="doc-bottom-empty">

        </div>

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
            <div class="bottom-baner-left">

            </div> 
            <div class="bottom-baner-right">
                
            </div>         
                 
        </section>

        <?php
    }
endif;
add_action('teh_front_page_block_bottom_baner', 'teh_front_page_block_bottom_baner_html', 50);
?>