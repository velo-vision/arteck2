<article <?php post_class('blog-item centered-columns standard-blog-item')?>>

		<?php
			echo BravoTemplate::load_view( 'elements/post/content', get_post_format() ); ?>
	<div class="blog-content centered-column centered-column-top">
		<h4><a href="<?php the_permalink(); ?>"><?php the_title();?></h4>
		<?php $total_cm = get_comment_count( get_the_ID() );
			$total_cm       = ! empty( $total_cm['total_comments'] ) ? $total_cm['total_comments'] : 0;

		?>
		<div class="blog-details">
			<?php
			printf(esc_html__('By %s','bs-smarty'),'<a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author().'</a> ');
			echo "&nbsp;";
			printf(esc_html__('In %s','bs-smarty'),get_the_term_list(get_the_ID(),'category',false,', '));
			echo "&nbsp;";

			if(get_comments_number()) {
				printf(esc_html__('Comments: %s', 'bs-smarty'), sprintf('<a href="%s" >%d</a>', get_comments_link(), get_comments_number()));
			}
			echo "&nbsp;";


			printf(esc_html__('Tags: %s','bs-smarty'),get_the_tag_list(false,', '));

			   ?>
		</div>
		<p><?php echo strip_tags( apply_filters( 'the_excerpt', get_the_excerpt() ) ) ?></p>
		<a class="button-border-dark" href="<?php the_permalink();?>"><?php esc_html_e('Read More','bs-smarty')?></a>
	</div>
</article>



