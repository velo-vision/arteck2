<?php
/**
 * Created by PhpStorm.
 * User: Dungdt
 * Date: 2/2/2016
 * Time: 10:39 AM
 */
if(!empty($title)){
	printf('<h1 class="onscroll-animate" data-animation="fadeInRight">%s</h1>',$title);
}
?>

<div class="onscroll-animate" data-animation="fadeInUp">
	<div id="blog-slider" class="top-arrows row">
		<?php while($query->have_posts()){
			$query->the_post();
			BravoPortfolio::addFooterHtml(BravoTemplate::load_view('elements/post/popup-single-blog'));
			?>
				<article <?php post_class('post')?> >
					<div class="post-preview">
						<div class="post-date">
							<?php the_time('d')?>
							<span class="date-month"><?php the_time('F') ?></span>
						</div>
						<?php echo BravoTemplate::load_view('elements/post/format-content',FALSE,array('action'=>@$action));  ?>

					</div>
					<h2><?php the_title()?></h2>
					<div class="post-content">
						<?php the_excerpt()?>
					</div>
					<?php if(!empty($action) or $action=='popup'){ ?>
						<a href="#" onclick="return false" class="button-border popup-window-trigger" data-popup="#popup-blog-<?php the_ID()?>"><?php esc_html_e('Read More','bs-smarty'); ?></a>
					<?php } else{ ?>
						<a href="<?php the_permalink()?>" class="button-border " ><?php esc_html_e('Read More','bs-smarty');?></a>
					<?php } ?>
				</article>
		<?php


		}?>
	</div><!-- #blog-slider -->
</div><!-- .onscroll-animate -->

