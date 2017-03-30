<?php
/**
 * Created by PhpStorm.
 * User: Dungdt
 * Date: 2/2/2016
 * Time: 10:50 AM
 */
?>
<section id="popup-blog-<?php the_ID()?>" class="popup-window-container">
	<div class="section-content">
		<div class="popup-window-closing-area"></div>
		<div class="container">
			<div class="popup-window">
				<div class="popup-window-close popup-window-close-light">
				</div>
				<?php
				switch(get_post_format()){
					case "audio":

					case "video":
						if($media_url=get_post_meta(get_the_ID(),'media_url',true)){
						?>

						<div class="embed-responsive embed-responsive-4by3 <?php get_post_format() ?>">
							<?php echo wp_oembed_get($media_url);?>
						</div>
						<?php
						}

						break;

					case "gallery":
						if($gallery=get_post_meta(get_the_ID(),'gallery',true)){
							$gallery_array=explode(',',$gallery);
							?>

							<div class="single-slider simple-arrows">
								<?php foreach($gallery_array as $value){
									$image=wp_get_attachment_image_src($value,array(1170,565));
									wp_get_attachment_image($value,array(1170,565));
								} ?>
							</div>
							<?php
						}
						break;
							}?>
				<div class="popup-window-header">
					<h2><?php the_title()?></h2>
				</div>
				<div class="popup-window-detail">
					<div class="left-detail">
						<?php esc_html_e('Date','bs-smarty')?> <span class="text-dark"><?php the_time(get_option('date_format')) ?></span> <span class="delimiter-inline"></span>
						<?php printf(esc_html__('Posted By %s','bs-smarty'),'<a href="'.get_author_posts_url( get_the_author_meta( 'ID' ) ).'">'.get_the_author().'</a>');
?>
<span class="delimiter-inline"></span>
						<?php printf(esc_html__('Categories %s','bs-smarty'),get_the_term_list(get_the_ID(),'category',false,', '));?>
						<span class="delimiter-inline"></span>
						<?php printf(esc_html__('Comments: %s','bs-smarty'),sprintf('<a href="%s" >%d</a>',get_comments_link(),get_comments_number()));?>
					</div>
					<div class="right-detail">
						<?php esc_html_e('Share:','bs-smarty');?>
						<div class="detail-socials">

							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ;?>" target="_blank"><img alt="<?php esc_html_e('facebook','bs-smarty')?>"
																																  src="<?php echo BravoAssets::$asset_url; ?>/images/share/facebook.png"></a>
							<a href="https://plus.google.com/share?url=<?php the_permalink();?>" target="_blank"><img alt="<?php esc_html_e('google plus','bs-smarty')?>"
																													  src="<?php echo BravoAssets::$asset_url; ?>/images/share/google_plus.png"></a>
							<a href="https://twitter.com/home?status=<?php the_permalink();?>" target="_blank"><img alt="<?php esc_html_e('twitter','bs-smarty')?>"
																													src="<?php echo BravoAssets::$asset_url; ?>/images/share/twitter.png"></a>
							<a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&media=<?php the_title();?>&description=<?php the_title();?>" target="blank"><img alt="<?php esc_html_e('pinterest','bs-smarty')?>"
																																															src="<?php echo BravoAssets::$asset_url; ?>/images/share/pinterest.png"></a>
						</div>
					</div>
				</div>
				<?php if(!get_post_format() or get_post_format()=='image'){
					if(has_post_thumbnail()){
						the_post_thumbnail(array(
							1170,537
						));
					}
				} ?>
				<div class="popup-window-content">
					<?php the_content()?>

				</div>
				<div class="popup-window-detail">
					<div class="left-detail">
						<?php printf(esc_html__('Tags %s','bs-smarty'),get_the_term_list(get_the_ID(),'post_tag',false,', '));?>
					</div>
					<div class="right-detail">
						<?php esc_html_e('Share:','bs-smarty');?>
						<div class="detail-socials">

							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ;?>" target="_blank"><img alt="<?php esc_html_e('facebook','bs-smarty')?>"
																																  src="<?php echo BravoAssets::$asset_url; ?>/images/share/facebook.png"></a>
							<a href="https://plus.google.com/share?url=<?php the_permalink();?>" target="_blank"><img alt="<?php esc_html_e('google plus','bs-smarty')?>"
																													  src="<?php echo BravoAssets::$asset_url; ?>/images/share/google_plus.png"></a>
							<a href="https://twitter.com/home?status=<?php the_permalink();?>" target="_blank"><img alt="<?php esc_html_e('twitter','bs-smarty')?>"
																													src="<?php echo BravoAssets::$asset_url; ?>/images/share/twitter.png"></a>
							<a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&media=<?php the_title();?>&description=<?php the_title();?>" target="blank"><img alt="<?php esc_html_e('pinterest','bs-smarty')?>"
																																															src="<?php echo BravoAssets::$asset_url; ?>/images/share/pinterest.png"></a>
						</div>
					</div>
				</div>
				<div class="popup-window-content">
					<?php if(comments_open()){
						//comments_template();
					}?>
				</div>
			</div><!-- .popup-window -->
		</div><!-- .container -->
	</div><!-- .section-content -->
</section><!-- #popup-blog-1 -->
