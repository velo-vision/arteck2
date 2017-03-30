<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 1/19/16
 * Time: 8:26 PM
 */
if(!class_exists('Bravo_Testimonial_Widget')){
	class Bravo_Testimonial_Widget extends WP_Widget{
		public function __construct(){

			parent::__construct( false, 'Bravo Testimonial Widget' );
			add_action('wp_enqueue_scripts',array($this,'add_scripts'));

		}
		static function st_add_widget()
		{
			register_widget( 'Bravo_Testimonial_Widget' );
		}
		public function add_scripts()
		{

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
			$instance=wp_parse_args($instance,array(
				'title'=>'',
				'items'=>''
			));
			echo ($args['before_widget']);
			if ( ! empty( $instance['title'] ) ) {
				echo do_shortcode($args['before_title'] . $instance['title'] . $args['after_title']);
			}

			$testimonal=bravo_get_option('testimonials');
			if(!empty($testimonal)){
				echo "<div class='single-slider-v2 top-small-arrows'>";
				foreach($testimonal as $key=>$value){
					?>
					<div class="testimonial-small">
						<div class="testimonial-small-img">
							<?php if($value['avatar']){ ?>
								<img alt="<?php esc_html_e('author','bs-smarty') ?>" src="<?php echo esc_attr($value['avatar']); ?>">
							<?php }?>
						</div>
						<div class="p">
							<?php echo do_shortcode($value['content']); ?>
						</div>
						<p class="testimonial-small-detail">
							<strong><?php echo esc_attr($value['title']); ?></strong><br>
							<?php if($value['company']){ echo '('.$value['company'].')'; } ?></strong>
						</p>
					</div>
					<?php
				}
				echo "</div>";
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
			$instance=wp_parse_args($instance,array(
				'title'=>'',
				'items'=>''
			));
			if(isset($instance['title']))
			{
				$title=$instance['title'];
			}else
			{
				$title=esc_html__('TESTIMONIALS','bs-smarty');
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
	add_action( 'widgets_init', array('Bravo_Testimonial_Widget','st_add_widget'));
}


