<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 1/14/16
 * Time: 9:16 PM
 */

?>
<div class="bravo-team">
	<div class="row">
		<div class="col-sm-7">
			<div class="margin-60"></div>
			<h1 class="onscroll-animate" data-animation="fadeInRight" data-delay="350"><?php echo esc_html($author) ?> <span class="heading-detail"><?php echo esc_html($job) ?></span></h1>

			<div class="onscroll-animate">
				<div class="p text-bigger">
					<?php echo ($content) ?>
				</div>
				<div class="margin-30"></div>
				<?php if(!empty($social_array)){?>
				<div class="profile-socials">
					<?php foreach($social_array as $key=>$value){
						printf('<a href="%s"><i class="%s"></i></a>',$value['url'],$value['social']);
					}?>
				</div>
				<?php } ?>
				<?php
					if(!empty($email_address)){
						printf('<a href="mailto:%s" class="button"><i class="fa fa-envelope"></i> %s</a>',$email_address,esc_html__('Message','bs-smarty'));
					}
				?>
			</div>
		</div>

		<div class="col-md-5 content-column">
			<div class="profile-photo-big">
				<?php if($avatar) echo wp_get_attachment_image($avatar) ?>
			</div>
		</div>

	</div>

	<div class="margin-40"></div>
	<div class="text-center">
		<?php
		if(!empty($other_members)){
			$logo_array=explode(',',$other_members);

			if(!empty($logo_array)){
				foreach($logo_array as $key=>$value){
					$attachment = get_post( $value );
					if(!$attachment) continue;

					printf('<div class="profile-photo-small onscroll-animate" data-animation="fadeInUp" data-toggle="tooltip" data-placement="bottom" title="%s" data-delay="%s">%s
		</div>',$attachment->post_title,($key*100),wp_get_attachment_image($value));
				}
			}
		}
		?>

		<?php  if($show_send_resume_button){?>
			<div class="profile-photo-new onscroll-animate popup-window-trigger" data-popup="#popup-send-resume" data-animation="fadeInUp" data-delay="600">
				<div class="profile-photo-new-inner">
					<div class="profile-photo-new-content">
						<i class="fa fa-plus"></i><br>
						<?php esc_html__('Send your resume','bs-smarty')?>
					</div>
				</div>
			</div>
		<?php }?>
	</div>
</div>
<?php
ob_start();
?>
<div id="popup-send-resume" class="popup-window-container">
	<div class="section-content">
		<div class="popup-window-closing-area"></div>
		<div class="container">
			<div class="popup-window">
				<div class="popup-window-content-big">
					<div class="popup-window-close"></div>
					<?php

					echo do_shortcode(sprintf('[contact-form-7 id="%s"]',$resume_form_code)); ?>
				</div><!-- .popup-window-content-big -->
			</div><!-- .popup-window -->
		</div><!-- .container -->
	</div><!-- .section-content -->
</div>
<?php
$html=@ob_get_clean();
BravoPortfolio::addFooterHtml( $html );
?>