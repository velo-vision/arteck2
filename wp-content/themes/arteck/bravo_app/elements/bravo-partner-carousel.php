<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 12/18/15
 * Time: 9:16 PM
 */

if (!function_exists('bravo_partner_func')) {
	function bravo_partner_func($attr, $content = false)
	{
		$attr = wp_parse_args($attr, array(
			'autoplay' => '',
			'number_per_row' => '',
			'logos' => '',

		));

		$attr['content'] = do_shortcode($content);

		return BravoTemplate::load_view('elements/bravo_partner', false, $attr);
	}

	bravo_reg_shortcode('bravo_partner', 'bravo_partner_func');

	vc_map(array(
		"name"     => esc_html__("Bravo Partner Carousel", 'bs-smarty'),
		"base"     => "bravo_partner",
		"category" => "CMSBlueTheme",
		"params"   => array(

			array(
				"type"        => "textfield",
				"heading"     => esc_html__("Autoplay", 'bs-smarty'),
				'description' => esc_html__('Set to 0 for disable auto play ', 'bs-smarty'),
				"param_name"  => "autoplay",
			),
			array(
				"type"        => "textfield",
				"heading"     => esc_html__("Item per row", 'bs-smarty'),
				"param_name"  => "number_per_row",
				'std'=>3
			),
			array(
				"type"        => "attach_images",
				"heading"     => esc_html__("Partner Logos", 'bs-smarty'),
				"param_name"  => "logos",
			),


		)
	));
}