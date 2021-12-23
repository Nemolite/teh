<?php
/*
Template Name: Отчеты
*/
get_header();
global $query_sno;
query_posts( $query_sno .'&post_type=post&posts_per_page=-1' );
?>
<div class="section-block-upper">

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <!--<div class="af-container-row">-->               
        
        <h2 class="widget-title widget-title-1" id="fix-news">
            <span class="heading-line-before"></span>
            <span class="heading-line">Отчеты</span>
            <span class="heading-line-after"></span>
        </h2>  
            <?php       
                while (have_posts()) : the_post();
                ?>
                <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                    <p><?php echo get_the_date();?>  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                    
                </div>

            <?php
                endwhile;
            ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
    wp_reset_query(); // сброс запроса
get_sidebar();
?>
</div> <!-- .section-block-upper -->
<?php
get_footer();

