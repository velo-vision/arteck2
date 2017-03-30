<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 1/19/16
 * Time: 8:26 PM
 */
if(!class_exists('Bravo_Popular_Widget')){
	class Bravo_Popular_Widget extends WP_Widget{
		public function __construct(){

			parent::__construct( false, 'Bravo Popular Post' );

		}
		static function st_add_widget()
		{
			register_widget( 'Bravo_Popular_Widget' );
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
				'number'=>5
			));

			$title = apply_filters( 'widget_title', $instance['title'] );
			echo do_shortcode($args['before_widget']);
			if ( ! empty( $title ) ) {
				echo do_shortcode($args['before_title'] . $title . $args['after_title']);
			}
			$query=new WP_Query(array(
				'post_type'=>'post',
				'posts_per_page'=>$instance['number']
			));
			while($query->have_posts()){
				$query->the_post();
				?>
				<a href="<?php the_permalink()?>" class="post-small-container">
					<article class="post-small">
						<div class="post-small-img">
							<?php
							if(has_post_thumbnail())
							the_post_thumbnail(array(100,100));
							else printf('<img alt="%s" src="%s">',get_the_title(),BravoAssets::url('images/default.png'))?>
						</div>
						<p class="post-small-content"><?php the_title()?></p>
					</article>
				</a>
				<?php
			}

			wp_reset_postdata();

			echo do_shortcode($args['after_widget']);
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
				'number'=>''
			));
			?>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:','bs-smarty' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>">
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php esc_html_e( 'Number:','bs-smarty' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="text" value="<?php echo esc_attr( $instance['number'] ); ?>">
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
			$instance=wp_parse_args($new_instance,array(
				'title'=>'',
				'number'=>5
			));
			return $instance;
		}
	}
	add_action( 'widgets_init', array('Bravo_Popular_Widget','st_add_widget'));
}


