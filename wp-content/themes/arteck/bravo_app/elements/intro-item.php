<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 12/18/15
 * Time: 9:16 PM
 */

if (!function_exists('bravo_intro_item_func')) {
	function bravo_intro_item_func($attr, $content = false)
	{
		$attr = wp_parse_args($attr, array(
			'background' => '',
			'pattern'    => 'yes',
			'version'    => '',
			'button'     => ''
		));

		$attr['content'] = do_shortcode($content);

		return BravoTemplate::load_view('elements/intro_item', false, $attr);
	}

	bravo_reg_shortcode('bravo_intro_item', 'bravo_intro_item_func');

	vc_map(array(
		"name"     =>esc_html__("Bravo Intro", 'bs-smarty'),
		"base"     => "bravo_intro_item",
		"category" => "CMSBlueTheme",
		"params"   => array(


			array(
				"type"        => "vc_link",
				"heading"     =>esc_html__("Button", 'bs-smarty'),
				"param_name"  => "button",
			),
			array(
				"type"        => "dropdown",
				"heading"     =>esc_html__("Choose Version", 'bs-smarty'),
				"param_name"  => "version",
				'value'       => array(
					esc_html__("Light", 'bs-smarty') => '',
					esc_html__("Dark", 'bs-smarty')  => 'dark',
				),
				'admin_label' => true
			),
			array(
				"type"       => "textarea_html",
				"heading"    =>esc_html__("Content", 'bs-smarty'),
				"param_name" => "content",
			),


		)
	));
}