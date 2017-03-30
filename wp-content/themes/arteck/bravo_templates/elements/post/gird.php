<h1 class="page-top-heading"><?php
	if(is_archive() or is_search()){
		the_archive_title();
	}else
	echo bravo_get_option('post_blog_title') ?></h1>
<div class="blog-layout<?php echo ($view=='gird'?1:2) ?>">
	<div class="row">
		<?php
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				get_template_part( 'loop', 'post' );
			}
		} else {
			get_template_part( 'loop', 'none' );
		}

		?>
	</div>
</div><!-- .blog-layout1 -->

<?php
if(!isset($paging_key))$paging_key='bravoposts';

bravo_paging( $query,$paging_key);

wp_reset_postdata();?>