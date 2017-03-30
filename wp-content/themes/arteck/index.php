<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 2/25/15
 * Time: 9:20 PM
 */
$sidebar=bravo_get_sidebar();
$sidebar_pos=$sidebar['position'];
global $wp_query;
get_header();
    ?>
	<div class="row">
		<div class="single-page">
		<div class="section-content bg-pattern dark-screen">
			<div class="container clearfix">
				<div class="content-main">
					<?php
						$blog_view = bravo_get_option('page_blog_view','standart');
						if(!$blog_view) $blog_view='standart';
						if($blog_view=='default') $blog_view='gird';
						echo BravoTemplate::load_view('elements/post/'.$blog_view,false,array('query'=>$wp_query,'view'=>'gird','paging_key'=>'paged'));
					?>
				</div>
				<?php get_sidebar()?>
			</div>
		</div>
		</div>
	</div>
    <?php
get_footer();