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
		<section id="popup-portfolio-<?php the_ID();?>" class="popup-window-container">
			<div class="section-content">
				<div class="popup-window-closing-area"></div>
				<div class="container">
					<div class="popup-window portfolio-work">
						<div class="popup-window-close popup-window-close-light popup-window-close-small"></div>
						<div class="col-sm-12 col-md-12 col-lg-12">
							<div class="portfolio-work-img ancho-carr">
								<div class="single-slider-v2 black-arrows">
									<?php
									if ( ! empty( $gallery ) ):
										$gallery = explode( ',', $gallery );
										foreach ( $gallery as $value ):
											echo( wp_get_attachment_image( $value, 'full', false,
												array( 'class' => 'img-responsive' ) ) );endforeach;
									else:
										the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) );
									endif ?>
								</div>
							</div><!-- .portfolio-work-img -->
						</div>
						<div class="portfolio-work-detail">
							<h3 class="titulo-cat"><?php the_title();?></h3>
						<!-- <div class="subtitulo-gal"><?php the_excerpt();?></div> -->
							<div class="col-sm-12 col-md-12 col-lg-12 sepracion-personalizada">
								<div class="col-sm-4 col-md-1 col-lg-2 sinpadding gorditas">
									<span>Año: </span><?php echo the_field("ano"); ?>
								</div>
								<div class="col-sm-4 col-md-8 col-lg-6 gorditas">
									<span>Ubicación: </span><?php echo the_field("ubicacion"); ?>
								</div>
								<div class="col-sm-4 col-md-2 col-lg-2 gorditas">
									<span>Status: </span><?php echo the_field("status"); ?>
								</div>
							</div>
						</div>
						<div class="portfolio-work-nav">
							<a class="popup-window-close-trigger"><i class="fa fa-th"></i></a>
							<a class="popup-window-prev"><i class="fa fa-2x fa-angle-left"></i></a>
							<a class="popup-window-next"><i class="fa fa-2x fa-angle-right"></i></a>
						</div><!-- .portfolio-work-detail -->
					</div><!-- .popup-window -->
				</div><!-- .container -->
			</div><!-- .section-content -->
		</section><!-- #popup-portfolio-1 -->


		<section id="popup-portfolio-<?php echo esc_attr( get_the_ID() ); ?>" class="popup-window-container">
			<div class="section-content">
				<div class="popup-window-closing-area"></div>
				<div class="container">
					<div class="popup-window portfolio-work">
						<div class="popup-window-close popup-window-close-light popup-window-close-small"></div>
							<div class="portfolio-work-img">
								<div class="single-slider-v2 black-arrows">
								</div>
							</div>
						<div class="portfolio-work-detail">
							<h3 class="no-top-margin"><?php the_title();?></h3>
								<?php the_content(); ?>
							<div class="margin-20"></div>
							<a class="button" href="<?php the_permalink();?>"><?php esc_html_e('Buy This Photo','bs-smarty')?></a>
							<div class="margin-30"></div>
							<div class="links-box">
								<span class="links-box-text"><?php esc_html_e('Share','bs-smarty')?></span>
								<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ;?>" target="_blank">
									<img alt="<?php esc_html_e('facebook','bs-smarty')?>" src="<?php echo BravoAssets::$asset_url; ?>/images/share/facebook.png">
								</a>
								<a href="https://plus.google.com/share?url=<?php the_permalink();?>" target="_blank">
									<img alt="<?php esc_html_e('google plus','bs-smarty')?>" src="<?php echo BravoAssets::$asset_url; ?>/images/share/google_plus.png">
								</a>
								<a href="https://twitter.com/home?status=<?php the_permalink();?>" target="_blank">
									<img alt="<?php esc_html_e('twitter','bs-smarty')?>" src="<?php echo BravoAssets::$asset_url; ?>/images/share/twitter.png">
								</a>
								<a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&media=<?php the_title();?>&description=<?php the_title();?>" target="blank">
									<img alt="<?php esc_html_e('pinterest','bs-smarty')?>" src="<?php echo BravoAssets::$asset_url; ?>/images/share/pinterest.png">
								</a>
							</div>
						</div>
							<div class="portfolio-work-nav">
								<a class="popup-window-close-trigger"><i class="fa fa-th"></i></a>
								<a class="popup-window-prev"><i class="fa fa-2x fa-angle-left"></i></a>
								<a class="popup-window-next"><i class="fa fa-2x fa-angle-right"></i></a>
							</div><!-- .portfolio-work-detail -->
					</div><!-- .popup-window -->
				</div><!-- .container -->
			</div><!-- .section-content -->
		</section><!-- #popup-portfolio-3 -->
		<?php
		$html = @ob_get_clean();
		BravoPortfolio::addFooterHtml( $html );
	}
?>
<section class="single-page">
	<div class="section-content ">
		<div class="container">
			<div class="clearfix">
				<h1 class="page-top-heading pull-left"><?php echo the_category(); ?><!-- <?php echo esc_html__('Proyectos','bs-smarty')?> --></h1>

				<!-- <ul id="isotope-filter-list3" class="pull-right filter-list-alt"> -->

				<!-- <li><a data-filter="*"  href="#" class="active isotope-filter"><?php esc_html_e( 'All','bs-smarty' ) ?></a></li>
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
					<li class="isotope-filter-button"><a href="#"><i class="fa fa-reorder"></i> <?php esc_html_e('Filter','bs_smarty')?></a></li>

				</ul> -->


			</div>
			<div id="portfolio3" class="portfolio-layout5  row row-clean">
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


						<article class="col-xxxl-12-5 col-xxl-3 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12 portfolio-item <?php echo esc_attr( $term_class ) ?> fotos-size-galeri">
							<div class="portfolio-item-content popup-window-trigger"
							     data-popup="#popup-portfolio-<?php echo esc_attr( get_the_ID() ); ?>">
								<div class="portfolio-img">
									<?php the_post_thumbnail( apply_filters( 'bravo_portfolio_thumb_size',array( 500, 289 ) ),
										array( 'data-animation' => 'fadeInUp', 'class' => 'onscroll-animate' ) ); ?>
									<div class="portfolio-img-detail">
									<div class="portfolio-img-detail-inner">
										<div class="portfolio-img-detail-content mayuscula">
											<div class="portfolio-item-cat">
												<?php // the_terms( get_the_ID(), 'portfolio_cat', '', ', ', '' ); ?>
											</div>
											<?php the_title(); ?>
										</div>
									</div>
								</div>
							</div>

						</article>
						<?php
					}

				?>



			</div><!-- #portfolio -->
			<?php
				bravo_paging( $query,'bravoportfolio' );
			wp_reset_postdata();
				;?>
		</div><!-- .container -->
	</div><!-- .section-content -->
</section><!-- #section-portfolio -->
<?php


;?>
