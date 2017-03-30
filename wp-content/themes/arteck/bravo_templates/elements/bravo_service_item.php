<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 1/14/16
 * Time: 8:53 PM
 */
?>
<div class="<?php echo (!empty($class))?$class:'slider-item'; ?> <?php echo (!empty($align))?'text-'.$align:false ?>">
	<i class="bravo-icon <?php echo esc_attr($icon) ?>"></i>
	<h3><?php echo esc_html($title)?></h3>
	<div class="p">
		<?php echo ($content) ?>
	</div>
	<?php
	if(!empty($button) and $btn_array=vc_build_link($button)){
		echo "<div class=\"margin-30\"></div>";
		printf('<a href="%s" class="button-dark button-long ocultar">%s</a>',$btn_array['url'],$btn_array['title']);
	}
	?>
</div>
