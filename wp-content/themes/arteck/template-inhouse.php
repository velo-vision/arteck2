<?php
/**
 * Template Name: Template inhouse
 * Created by PhpStorm.
 * User: me664
 * Date: 2/28/15
 * Time: 10:48 PM
 */

get_header();

do_action( 'bravo_before_main_content' );

$sidebar = bravo_get_sidebar();
the_post();

$bg = get_post_meta( get_the_ID(), '_background_image', true );;

$ex_class=BravoAssets::build_css('
    background-image:url('.$bg.');
');
?>

	<section class="single-page bravo-single-page bravo-single- <?php  echo esc_attr($ex_class) ?>"
	         >
		<?php
			$dark = bravo_get_option('gen_enable_dark_style');
		if($dark == 'on'){
			$dark_class = 'dark-screen';
		}else{
			$dark_class = 'white-screen';

		}
		;?>
		<div class="section-content bg-pattern <?php echo ($dark_class);?>">
			<div class="container clearfix">
				<?php if ( $sidebar['position'] == 'left' ) {
					get_sidebar();
				} ?>
				<div class="<?php if($sidebar['position'] != 'no')echo 'content-main';?>">
					<span class="page-top-heading"><?php the_title(); ?></span>
					<!-- <div class="clearfix">
						<h1 class="page-top-heading pull-left"><?php // echo esc_html__('Concursos','bs-smarty')?></h1>

					</div> -->
					<?php the_content();?>
					
				</div>
				<?php if ( $sidebar['position'] == 'right' ) {
					get_sidebar();
				} ?>

			</div><!-- .container -->
		</div><!-- .section-content -->

	</section>
<?php
get_footer();