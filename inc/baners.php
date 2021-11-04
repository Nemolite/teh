<?php
/**
 * Банеры
 */
defined( 'ABSPATH' ) || exit;

class banersWidget extends WP_Widget {
 
	/*
	 * создание виджета
	 */
	function __construct() {
		parent::__construct(
			'baner', 
			'teh_банеры', // заголовок виджета
			array( 'description' => 'Позволяет добавлять банер в сайтбар' ) // описание
		);
	}
 
	/*
	 * фронтэнд виджета
	 */
	public function widget( $args, $instance ) {
		?>
        <a href="<?php echo esc_url($instance['url']);?>" target="blank">
        <div class="teh_baner">
            <div class="teh_baner-img">
                <img src="<?php echo esc_url($instance['img']);?>" alt="">
            </div> 
            <div class="teh_baner-text">           
                <p><?php echo __( $instance['title'], 'teh');?></p>
            </div> 
        </div>
        </a>  
        <?php
	}
 
	/*
	 * бэкэнд виджета
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
        
        if ( isset( $instance[ 'img' ] ) ) {
			$img = $instance[ 'img' ];
		}

        if ( isset( $instance[ 'url' ] ) ) {
			$url = $instance[ 'url' ];
		}
		?>

        <p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Заголовок</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        <p>
			<label for="<?php echo $this->get_field_id( 'img' ); ?>">Ссылка на изображение 100x100 (url)</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'img' ); ?>" name="<?php echo $this->get_field_name( 'img' ); ?>" type="url" value="<?php echo esc_attr( $img ); ?>" />
		</p>

        <p>
			<label for="<?php echo $this->get_field_id( 'url' ); ?>">Ссылка с банера (url)</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" type="url" value="<?php echo esc_attr( $url ); ?>" />
		</p>		
		<?php 
	}
 
	/*
	 * сохранение настроек виджета
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';	
        $instance['img'] = ( ! empty( $new_instance['img'] ) ) ? strip_tags( $new_instance['img'] ) : '';
        $instance['url'] = ( ! empty( $new_instance['url'] ) ) ? strip_tags( $new_instance['url'] ) : '';
		return $instance;
	}
}
 
/*
 * регистрация виджета
 */
function baners_widget_load() {
	register_widget( 'banersWidget' );
}
add_action( 'widgets_init', 'baners_widget_load' );

?>