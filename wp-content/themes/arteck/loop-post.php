<?php
/**
 * Created by Velosoft.
 */
?>

<article <?php post_class('col-xxxl-4 col-lg-12 blog-item')?> >
	<?php
	echo BravoTemplate::load_view( 'posts/content', get_post_format() ); ?>
	<div class="blog-content">
		<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
		<p><?php echo strip_tags( apply_filters( 'the_excerpt', get_the_excerpt() ) ) ?></p>

		<!-- <div class="blog-details">
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
			?></div> -->
	</div>
</article>
