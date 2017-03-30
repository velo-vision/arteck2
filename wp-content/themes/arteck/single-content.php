<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 1/19/16
 * Time: 8:56 PM
 */
switch(get_post_format()){
	case "audio":

	case "video":
		if($media_url=get_post_meta(get_the_ID(),'media_url',true)){
			?>

			<div class="blog-date">
				<div class="blog-date-day"><?php the_time('d'); ?></div>
				<?php the_time('F'); ?>
			</div>
			<div class="blog-media">
				<?php echo wp_oembed_get($media_url);?>
			</div>
			<?php
		}

		break;

	case "gallery":
		if($gallery=get_post_meta(get_the_ID(),'gallery',true)){
			$gallery_array=explode(',',$gallery);
			?>

			<div class="blog-date">
				<div class="blog-date-day"><?php the_time('d'); ?></div>
				<?php the_time('F'); ?>
			</div>
			<div class="single-slider-v2 black-arrows-bottom">
				<?php foreach($gallery_array as $value){
					$image=wp_get_attachment_image_src($value,array(1170,565));
					printf('<a href="%s" data-lightbox="blog-post">%s</a>',$image[0],wp_get_attachment_image($value,'full'));
				} ?>
			</div>
			<?php
		}
		break;

	case "image":
	default:
		if(has_post_thumbnail()) {
			?>

			<div class="blog-date">
				<div class="blog-date-day"><?php the_time('d'); ?></div>
				<?php the_time('F'); ?>
			</div>
			<div class="blog-img">
			<?php
			the_post_thumbnail('full');
			?>
			</div>
		<?php
		}
		break;
}