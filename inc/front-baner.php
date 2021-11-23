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
            <h2 class="widget-title widget-title-1">
                <span class="heading-line-before"></span>
                <span class="heading-line">Информация</span>
                <span class="heading-line-after"></span>
            </h2> 

            <?php  
                $args = array(
                    'post_type' => 'bottom_baner',                                       
                    'post_status' => 'publish', 
                    'posts_per_page' => -1,                           
                    );   
                $query = new WP_Query($args);
                if( $query->have_posts() ){
                    while( $query->have_posts() ){            
                        $query->the_post(); 
                                                                   
            ?>
            <?php 
            $url = get_post_meta(get_the_ID(), 'teh_meta_url', true);         
            if (''!=$url) {
                $link = $url;
            } else {
               $link = get_permalink();
            }
             
            ?>
            <a href="<?php echo esc_url($link);?>" target="_blank">
                <div class="bottom-baner__item">
                <?php echo get_the_post_thumbnail();?>
                </div>
            </a>

            <?php
                  }       
                }
                wp_reset_postdata();
            ?>
                  
                 
        </section>

        <?php
    }
endif;
add_action('teh_front_page_block_bottom_baner', 'teh_front_page_block_bottom_baner_html', 50);
?>