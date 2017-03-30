<?php
	if($position!='no'){
		$class='col-xxxl-3 col-xxl-4 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12 blog-item';
	}else{
		$class='col-xxxl-12-5 col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 col-xs-12 blog-item';
	}

	;?>
<article class="<?php echo ($class);?>" >
	<?php
	echo BravoTemplate::load_view( 'posts/content', get_post_format() ); ?>
	<div class="blog-content">
		<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
		<p><?php echo strip_tags( apply_filters( 'the_excerpt', get_the_excerpt() ) ) ?></p>

		<div class="blog-details">
			<?php
			printf(esc_html__('By %s','bs-smarty'),'<a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author().'</a>');
			echo '<span class="delimiter-inline-alt"></span> ';
			printf(esc_html__('In %s','bs-smarty'),get_the_term_list(get_the_ID(),'category',false,', '));
			if(get_comments_number()) {
				echo '<span class="delimiter-inline-alt"></span> ';
				printf(esc_html__('Comments: %s', 'bs-smarty'), sprintf('<a href="%s" >%d</a> ', get_comments_link(), get_comments_number()));
			}

			echo '<span class="delimiter-inline-alt"></span> ';
			printf(esc_html__('Tags: %s','bs-smarty'),get_the_tag_list(false,', '));

			?>

		</div>

	</div>
</article>