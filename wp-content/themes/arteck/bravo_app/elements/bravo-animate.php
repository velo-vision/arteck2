<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 12/18/15
 * Time: 9:16 PM
 */

if (!function_exists('bravo_animate_shortcode_func')) {
	function bravo_animate_shortcode_func($attr, $content = false)
	{
		$attr = wp_parse_args($attr, array(
			'animate' => '',
			'delay'   => '',

		));


		$attr['content'] = $content;

		return BravoTemplate::load_view('elements/bravo_animate', false, $attr);
	}

	bravo_reg_shortcode('bravo_animate', 'bravo_animate_shortcode_func');

	vc_map(array(
		"name"     => esc_html__("Bravo Animate ", 'bs-smarty'),
		"base"     => "bravo_animate",
		"category" => "CMSBlueTheme",
		"params"   => array(

			array(
				"type"        => "textfield",
				"heading"     => esc_html__("Animation Name", 'bs-smarty'),
				"param_name"  => "animate",
				'admin_label' => true
			),
			array(
				"type"        => "textfield",
				"heading"     => esc_html__("Delay in millisecond", 'bs-smarty'),
				"param_name"  => "delay",
				'admin_label' => true
			),

			array(
				"type"        => "textarea_html",
				"heading"     => esc_html__("Content", 'bs-smarty'),
				"param_name"  => "content",
				'admin_label' => true
			),


		)
	));
}