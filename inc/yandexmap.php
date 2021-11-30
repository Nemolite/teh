<?php
/**
 * Блок Яндекс.Карта
 */
function teh_yandex_map_upper_footer_section_html() {
    ?>
    <div class="yanmap">
    <h2 class="widget-title widget-title-1">
                <span class="heading-line-before"></span>
                <span class="heading-line">Наши координаты</span>
                <span class="heading-line-after"></span>
            </h2>
    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ad41786932cc0070656d6cd90afa3cf1aa65ea9e7114b31cde0e5ed997e6f5532&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>  
    </div>
    <?php
}
add_action('teh_yandex_map_upper_footer_section', 'teh_yandex_map_upper_footer_section_html', 20);
?>