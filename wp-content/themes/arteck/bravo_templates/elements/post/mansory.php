<h1 class="page-top-heading"><?php
	if(is_archive() or is_search()){
		the_archive_title();
	}else
		echo bravo_get_option('post_blog_title') ?></h1>

<div class="blog-layout3">
	<div id="blog1" class="row">
		<?php
			$sidebar = bravo_get_sidebar();

			if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				echo BravoTemplate::load_view('elements/post/mansory', 'post', $sidebar);
//				get_template_part( 'loop', 'post' );
			}
		} else {
			get_template_part( 'loop', 'none' );
		}

		wp_reset_postdata() ;
		?>
	</div>
	<?php
	$paged = !empty($_GET['bravoposts'])?$_GET['bravoposts'] :1;
	if($query->max_num_pages >$paged):
		$url = add_query_arg('bravoposts',$paged+1,get_the_permalink(get_the_ID()));

		;?>
		<div class="text-center">
			<a class="button-simple" href="<?php echo  esc_url($url);?>"><?php esc_html_e('Load More','bs-smarty')?></a>
		</div>
	<?php endif;;?>
</div><!-- .blog-layout1 -->
