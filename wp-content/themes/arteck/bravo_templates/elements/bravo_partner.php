<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 1/14/16
 * Time: 9:02 PM
 */
?>
<div id="slider-partners" class="big-arrows slider-default text-center" data-autoplay="<?php echo esc_attr($autoplay) ?>" data-per-page="<?php echo esc_attr($number_per_row) ?>">
	<?php
	if(!empty($logos)){
		$logo_array=explode(',',$logos);

		if(!empty($logo_array)){
			foreach($logo_array as $key=>$value){
				printf('<div class="slider-item">
						%s
					</div>',wp_get_attachment_image($value,'full'));
			}
		}
	}
	?>
</div><!-- #slider-partners -->
