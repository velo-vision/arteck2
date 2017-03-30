<?php
	/**
	 * Created by PhpStorm.
	 * User: me664
	 * Date: 12/20/15
	 * Time: 10:25 PM
	 */
?>
<!-- bootFolio content  -->
<?php

	while ( $query->have_posts() ) {
		$query->the_post();
		$term_class = '';
		$terms      = wp_get_post_terms( get_the_ID(), 'portfolio_cat' );
		$gallery    = get_post_meta( get_the_ID(), 'gallery', true );
		ob_start();
		?>
		<section id="popup-portfolio-<?php echo esc_attr( get_the_ID() ); ?>" class="popup-window-container">
			<div class="section-content">
				<div class="popup-window-closing-area"></div>
				<div class="container">
					<div class="popup-window">
						<div class="popup-window-close popup-window-close-out"></div>
						<div class="single-slider-v2 big-arrows">
							<?php
								if ( ! empty( $gallery ) ):
									$gallery = explode( ',', $gallery );
									foreach ( $gallery as $value ):
										echo( wp_get_attachment_image( $value, 'full', false,
											array('class' => 'img-responsive' ) ) );endforeach;
								else:
									the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) );
								endif ?>
						</div>
						<div class="popup-window-detail text-dark">
							<div class="left-detail">
								<?php the_content(); ?>
							</div>
							<div class="right-detail">
								Share:
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
					</div><!-- .popup-window -->
				</div><!-- .container -->
			</div><!-- .section-content -->
		</section><!-- #popup-portfolio-3 -->
		<?php
		$html = @ob_get_clean();
		BravoPortfolio::addFooterHtml( $html );
	}
?>
<section  class="">
	<div class="">
		<div class="container">
			<div class="margin-40"></div>
			<div class="clearfix">
				<h1 class="no-top-margin pull-left onscroll-animate" data-animation="fadeInRight"><?php echo esc_html__('Portfolio','bs-smarty')?></h1>

				<ul id="isotope-filter-list1"  class="pull-right filter-list">
					<li><a  data-filter="*" href="#" class="active isotope-filter"><?php esc_html_e( 'All',
								'bs-smarty' ) ?></a></li>
					<?php
						$term_query = array();
						if ( $category ) {
							$term_query['include']    = explode( ',', $category );
							$term_query['hide_empty'] = false;
						}
						$all_cat = get_terms( 'portfolio_cat', $term_query );
						if ( ! is_wp_error( $all_cat ) and ! empty( $all_cat ) ) {
							foreach ( $all_cat as $key => $value ) {
								?>
								<li><a class="isotope-filter" href="#"
								       data-filter=".filter-<?php echo esc_attr( $value->term_id ) ?>"><?php echo esc_attr( $value->name ) ?></a>
								</li>
								<?php
							}
						} ?>

				</ul>


			</div>

			<div id="portfolio1" class="portfolio-layout1 onscroll-animate">
				<?php
					while ( $query->have_posts() ) {
						$query->the_post();
						$term_class = '';
						$terms      = wp_get_post_terms( get_the_ID(), 'portfolio_cat' );
						if ( ! is_wp_error( $terms ) and ! empty( $terms ) ) {
							foreach ( $terms as $key => $value ) {
								$term_class .= 'filter-' . $value->term_id . ' ';
							}
						}
						?>


						<article class="portfolio-item <?php echo esc_attr( $term_class ) ?>">
							<div class="popup-window-trigger"
							     data-popup="#popup-portfolio-<?php echo esc_attr( get_the_ID() ); ?>">
								<?php
								$feature=get_post_meta(get_the_ID(),'feature',true);
								if($feature){
									printf('<img src="%s" alt="%s" class="onscroll-animate" data-animation="fadeInUp">',$feature,get_the_title());
								}else{
									the_post_thumbnail( apply_filters( 'bravo_portfolio_thumb_size',
										array( 500, 289 ) ),
										array( 'data-animation' => 'fadeInUp', 'class' => 'onscroll-animate' ) );
								}
								 ?>
								<div class="portfolio-detail">
									<div class="portfolio-detail-container">
										<div class="portfolio-detail-content">
											<h2><?php the_title(); ?></h2>
											<div class="ht_898989">
												<?php the_terms( get_the_ID(), 'portfolio_cat', '', ',', '' ); ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</article>


						<?php

					}
				?>


			</div><!-- #portfolio -->

		</div><!-- .container -->
	</div><!-- .section-content -->
</section><!-- #section-portfolio -->

<?php


;?>