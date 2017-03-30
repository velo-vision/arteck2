<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 1/19/16
 * Time: 8:26 PM
 */
if(!class_exists('Bravo_Category_Widget')){
	class Bravo_Category_Widget extends WP_Widget{
		public function __construct(){

			parent::__construct( false, 'Bravo Category Widget' );

		}
		static function st_add_widget()
		{
			register_widget( 'Bravo_Category_Widget' );
		}

		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget( $args, $instance ) {

			$title = apply_filters( 'widget_title', $instance['title'] );
			echo ($args['before_widget']);
			if ( ! empty( $title ) ) {
				echo ($args['before_title'] . $title . $args['after_title']);
			}
			$cat=get_categories();
			if(!is_wp_error($cat) and !empty($cat)){
				echo '<ul class="list-catgs">';
				foreach($cat as $key=>$value){
					printf('<li>
                                <a href="%s">
                                    <span class="list-catg-name">%s</span>
                                    <span class="list-catg-val">%d</span>
                                </a>
                            </li>',get_category_link($value),$value->name,$value->count);
				}
				echo "</ul>";
			}

			echo ($args['after_widget']);
		}
		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */
		public function form( $instance ) {
			if(isset($instance['title']))
			{
				$title=$instance['title'];
			}
			if ( isset( $instance[ 'user_id' ] ) ) {
				$user_id = $instance[ 'user_id' ];
			}else
			{
				$user_id=0;
			}
			if ( isset( $instance[ 'number_images' ] ) ) {
				$number_images = $instance[ 'number_images' ];
			}else
			{
				$number_images=9;
			}
			?>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:','bs-smarty' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
			</p>
			<?php
		}
		/**
		 * Sanitize widget form values as they are saved.
		 *
		 * @see WP_Widget::update()
		 *
		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.
		 *
		 * @return array Updated safe values to be saved.
		 */
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['user_id'] = ( ! empty( $new_instance['user_id'] ) ) ? strip_tags( $new_instance['user_id'] ) : '';
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['number_images'] = ( ! empty( $new_instance['number_images'] ) ) ? strip_tags( $new_instance['number_images'] ) : '';
			return $instance;
		}
	}
	add_action( 'widgets_init', array('Bravo_Category_Widget','st_add_widget'));
}


