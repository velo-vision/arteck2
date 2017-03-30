<?php
/**
 * Created by PhpStorm.
 * User: Dungdt
 * Date: 2/2/2016
 * Time: 10:43 AM
 */
switch(get_post_format()){

	case "video":
	case "audio":
		if($media=get_post_meta(get_the_ID(),'media_url',true)){
			printf('<div class="embed-responsive embed-responsive-4by3">
                                        %s
                                    </div>',wp_oembed_get($media));
		}
		if($media_selfhost=get_post_meta(get_the_ID(),'media_selfhost',true)){
			?>
			<div class="post-info">
				<<?php echo get_post_format()?> controls class="post-audio">
					<source src="<?php echo esc_attr($media_selfhost) ?>" type="audio/mpeg">
					<?php esc_html_e('Your browser does not support the audio element.','bs-smarty')?>
				</<?php echo get_post_format()?>>
			</div>
			<?php the_post_thumbnail()?>
			<?php
		}
		break;

	case "gallery":
		if($gallery=get_post_meta(get_the_ID(),'gallery',true)){
			if($gallery_array=explode(',',$gallery) and !empty($gallery_array)){
				echo '<div class="post-preview-slider">';
				foreach($gallery_array as $val){
					$full=wp_get_attachment_image_src($val,'full');
					printf('<a href="%s" data-lightbox="blog-post%d">%s</a>',@$full[0],get_the_ID(),wp_get_attachment_image($val,array(370,280)));
				}
				echo '</div>';
			}
		}

		break;

	case "quote":
		?>
			<div class="post-info">
			<div class="post-info-inner">
					<div class="post-info-content">
						<p>
							<?php printf('&ldquo;%s&rdquo;',get_post_meta(get_the_ID(),'quote_content',true)) ?>
						</p>
						<p class="post-info-normal">
							<?php printf('&copy; %s',get_post_meta(get_the_ID(),'author_name',true))?>
						</p>
					</div>
				</div>
			</div>
			<?php the_post_thumbnail()?>
		<?php
	break;
	case "link":
		?>
			<div class="post-info">
			<div class="post-info-inner">
					<div class="post-info-content">
						<p>
							<?php printf('<a href="%s">%s</a>',get_post_meta(get_the_ID(),'link_address',true))?>
						</p>
						<p class="post-info-normal">
							<?php printf('&copy; %s',get_post_meta(get_the_ID(),'author_name',true))?>
						</p>
					</div>
				</div>
			</div>
			<?php the_post_thumbnail()?>
		<?php
	break;

	case "image":
	default:
		if(has_post_thumbnail()){
			$full=wp_get_attachment_image_src(get_post_thumbnail_id(),'full');
			?>
			<div class="post-detail">
				<div class="post-detail-inner">
					<div class="post-detail-content">
						<?php if(!empty($action) or $action=='popup'){ ?>
							<a href="#" class="popup-window-trigger" data-popup="#popup-blog-<?php the_ID()?>"><i class="fa fa-file"></i></a>
						<?php } else{ ?>
							<a href="<?php the_permalink()?>"><i class="fa fa-file"></i></a>
						<?php } ?>
						<a href="<?php echo esc_attr(@$full[0])?>" data-lightbox="blog-post<?php the_ID()?>"><i class="fa fa-search"></i></a>
					</div>
				</div>
			</div>
			<?php the_post_thumbnail()?>
			<?php
		}
		break;
}