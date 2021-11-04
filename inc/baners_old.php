<?php
/**
 * Банеры (как на старом сайте)
 */
defined( 'ABSPATH' ) || exit;

class banersOldWidget extends WP_Widget {
 
	/*
	 * создание виджета
	 */
	function __construct() {
		parent::__construct(
			'banerold', 
			'teh_old_банеры', // заголовок виджета
			array( 'description' => 'Позволяет добавлять банер в сайтбар(old)' ) // описание
		);
	}
 
	/*
	 * фронтэнд виджета
	 */
	public function widget( $args, $param ) {
		?>
     <div class="teh-baners-sitebar">
		 <a href="<?php echo esc_url($param['url']);?>">
			 <img src="<?php echo esc_url($param['img']);?>" alt="">
		 </a>
	 </div>
       
        <?php
	}
 
	/*
	 * бэкэнд виджета
	 */
	public function form( $param ) {
		        
        if ( isset( $param[ 'img' ] ) ) {
			$img = $param[ 'img' ];
		}

        if ( isset( $param[ 'url' ] ) ) {
			$url = $param[ 'url' ];
		}
		?>

       
        <p>
			<label for="<?php echo $this->get_field_id( 'img' ); ?>">Ссылка на изображение 130x90 (url)</label> 
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
		$param = array();	
        $param['img'] = ( ! empty( $new_instance['img'] ) ) ? strip_tags( $new_instance['img'] ) : '';
        $param['url'] = ( ! empty( $new_instance['url'] ) ) ? strip_tags( $new_instance['url'] ) : '';
		return $param;
	}
}
 
/*
 * регистрация виджета
 */
function baners_old_widget_load() {
	register_widget( 'banersOldWidget' );
}
add_action( 'widgets_init', 'baners_old_widget_load' );

?>