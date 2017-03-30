<?php
	/**
	 * Created by PhpStorm.
	 * User: TranThaiHa
	 * Date: 1/9/2016
	 * Time: 12:36 AM
	 */
?>
<section class="bravo-section-info bravo-section">
	<div class="<?php echo ($version=='dark')?'dark-screen':false ?>">
		<div class="container">
			<?php echo ($content) ?>
			<?php if($button){
				$href=vc_build_link($button);
				echo '<div class="margin-30"></div>';
				printf('<a href="%s" class="button-big" target="%s">%s</a>',$href['url'],$href['target'],$href['title']);
			} ?>
		</div><!-- .container -->
	</div><!-- .section-content -->
</section><!-- #section-intro -->

