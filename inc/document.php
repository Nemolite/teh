<?php
/**
 * Блок документов на главной
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
        <section class="teh-section-block-document">       
        <?php echo do_shortcode('[metaslider id="795"]'); ?>  
        </section>

        <?php
    }
endif;
add_action('teh_front_page_block_document', 'teh_front_page_block_document_html', 50);
?>