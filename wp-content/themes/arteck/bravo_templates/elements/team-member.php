<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 1/14/16
 * Time: 10:03 PM
 */
$class=false;
if(!empty($custom_bg)){
	$class.=' '.BravoAssets::build_css('
		background-color:'.$custom_bg.'
	');
}
?>
<article class="profile-short bravo-team-member <?php echo esc_attr($class)?>">
	<div class="profile-short-img">
		<?php echo wp_get_attachment_image($avatar) ?>
		<div class="profile-short-job"><?php echo ($position) ?></div>
	</div>
	<div class="profile-short-info">
		<h3><?php echo esc_html($name) ?></h3>
		<div class="profile-content">
			<?php echo ($content) ?>
		</div>
		<div class="profile-short-socials">
			<?php if(!empty($list)){
				foreach($list as $key=>$v){
					printf('<a href="%s"><i class="fa %s"></i></a>
                            ',$v['url'],$v['social']);
				}
			}?>
		</div>
	</div>
</article>
