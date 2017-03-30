<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 7/11/15
 * Time: 10:33 PM
 */
if (function_exists('vc_map')) {
	vc_map(array(
		"name"     => esc_html__("Bravo Popup Map", 'bs-smarty'),
		"base"     => "bravo_google_map",
		"class"    => "",
		"icon"     => "icon-st",
		"category" => "Shinetheme",
		"params"   => array(

			array(
				"type"        => "textfield",
				//"holder"    => "div",
				"class"       => "",
				"heading"     => esc_html__("Popup ID", 'bs-smarty'),
				"param_name"  => "popup_id",
				'admin_label' => TRUE,
				'std'         => 'popup-map'
			),
			array(
				"type"        => "textfield",
				//"holder"    => "div",
				"class"       => "",
				"heading"     => esc_html__("Popup Title", 'bs-smarty'),
				"param_name"  => "title",
				'admin_label' => TRUE,
			),
			array(
				"type"        => "textfield",
				//"holder"    => "div",
				"class"       => "",
				"heading"     => esc_html__("Latitude", 'bs-smarty'),
				"param_name"  => "latitude",
				"value"       => "",
				"description" => esc_html__("Latitude, you can get it from  <a target='_blank' href='http://www.latlong.net/convert-address-to-lat-long.html'>here</a>", 'bs-smarty'),
				'admin_label' => TRUE
			),
			array(
				"type"        => "textfield",
//                    "holder"    => "div",
				"class"       => "",
				"heading"     => esc_html__("Longitude", 'bs-smarty'),
				"param_name"  => "longitude",
				"value"       => "",
				"description" => esc_html__("Longitude", 'bs-smarty'),
				'admin_label' => TRUE
			),

			array(
				"type"       => "textfield",
				"holder"     => "div",
				"class"      => "",
				"heading"    => esc_html__("Zoom", 'bs-smarty'),
				"param_name" => "zoom",
				"value"      => 13,
			),
			array(
				"type"        => "attach_image",
				"holder"      => "div",
				"class"       => "",
				"heading"     => esc_html__("Custom Marker Icon", 'bs-smarty'),
				"param_name"  => "marker",
				"value"       => "",
				"description" => esc_html__("Custom Marker Icon", 'bs-smarty')
			),
			array(
				"type"       => "textfield",
				"class"      => "",
				"heading"    => esc_html__("Custom Height", 'bs-smarty'),
				"param_name" => "height",
				"value"      => "",
			),
		)));

	function bravo_google_map_func($arg, $content = null)
	{

		extract(shortcode_atts(array(
			'address'    => '93 Worth St, New York, NY',
			'type'       => 1,
			'marker'     => '',
			'height'     => '580',
			'lightness'  => 0,
			'saturation' => 0,
			'gama'       => 0.5,
			'zoom'       => 13,
			'longitude'  => FALSE,
			'latitude'   => FALSE,
			'popup_id'   => '',
			'title'      => ''
		), $arg));

		//
		if (bravo_is_https()) {
			wp_enqueue_script('gmap3-init', 'https://maps.google.com/maps/api/js');
		} else {
			wp_enqueue_script('gmap3-init', 'http://maps.google.com/maps/api/js');
		}


		$marker_url = BravoAssets::url('images/pin.png');
		if ($marker) {
			$img_obj = wp_get_attachment_image_src($marker, 'full');
			if (isset($img_obj[0])) {
				$marker_url = $img_obj[0];
			}
		}


		$css = '';
		if ($height) {
			$css .= ' height:' . $height . 'px;';
		}

		$map = "<div style='{$css}' class='bravo_map_wrap' ><div data-content='{$content}' data-type='{$type}' data-lat='{$latitude}' data-lng='{$longitude}' data-zoom='{$zoom}' style='height: {$height}px' data-lightness='{$lightness}' data-saturation='{$saturation}' data-gama='{$gama}'  class='bravo_google_map' data-address='{$address}' data-marker='$marker_url'>
				</div></div>";

		if($title){
			$title='<h2>'.$title.'</h2>';
		}

		$html = '<section id="' . $popup_id . '" class="popup-window-container">
            <div class="section-content">
                <div class="popup-window-closing-area"></div>
            	<div class="container">
                    <div class="popup-window">
                    	<div class="popup-window-header">
                        	<div class="popup-window-close popup-window-close-clean"></div>
                        	'.$title.'
                       	</div>
                        <div class="popup-window-content no-top-padding">
                        	<div class="map-container">
                                '.$map.'
                        	</div>
                        </div>
                    </div><!-- .popup-window -->
            	</div><!-- .container -->
            </div><!-- .section-content -->
      	</section><!-- #popup-blog-6 -->';
	}




	bravo_reg_shortcode('bravo_google_map', 'bravo_google_map_func');
}

