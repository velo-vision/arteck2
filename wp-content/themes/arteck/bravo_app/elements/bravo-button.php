<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 12/18/15
 * Time: 9:16 PM
 */

if (!function_exists('bravo_button_func')) {
	function bravo_button_func($attr, $content = false)
	{
		$attr = wp_parse_args($attr, array(
			'text' => '',
			'url'  => '',
			'size' => 'long',
			'effect'=>''

		));

		$attr['content'] = do_shortcode($content);

		return BravoTemplate::load_view('elements/button', false, $attr);
	}

	bravo_reg_shortcode('bravo_button', 'bravo_button_func');

	vc_map(array(
		"name"     => esc_html__("Bravo Button", 'bs-smarty'),
		"base"     => "bravo_button",
		"category" => "CMSBlueTheme",
		"params"   => array(

			array(
				"type"        => "textfield",
				"heading"     => esc_html__("Text", 'bs-smarty'),
				"param_name"  => "text",
				'admin_label' => true
			),
			array(
				"type"        => "textfield",
				"heading"     => esc_html__("URL", 'bs-smarty'),
				"param_name"  => "url",
				'admin_label' => true
			),
			array(
				"type"        => "dropdown",
				"heading"     => esc_html__("Size", 'bs-smarty'),
				"param_name"  => "size",
				'admin_label' => true,
				'value'       => array(
					esc_html__("Normal", 'bs-smarty') => 'normal',
					esc_html__("Big", 'bs-smarty')    => 'big',
				)
			),
			array(
				"type"        => "textfield",
				"heading"     => esc_html__("Effect Name", 'bs-smarty'),
				"param_name"  => "effect",
				'admin_label' => true,
			),


		)
	));
}