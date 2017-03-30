<?php
	/**
	 * Template Name: About Page
	 * Created by PhpStorm.
	 * User: me664
	 * Date: 2/28/15
	 * Time: 10:48 PM
	 */
get_header();
while(have_posts()){
	the_post();

	$class=FALSE;
	if($bg = get_post_meta( get_the_ID(), '_background_image', true )){
		$class=BravoAssets::build_css('
			background-image:url(\''.$bg.'\')
		');
	}

	$version=bravo_get_option('gen_enable_dark_style');
?>
<div class="single-page bravo-single-page <?php echo esc_attr($class) ?> ">
	<div class="section-content bg-pattern <?php echo ($version=='on')?'white-screen':'dark-screen'; ?>">
		<div class="section-page container">
			<?php the_content()?>
		</div>
	</div>
</div>
<?php }
get_footer();
?>

