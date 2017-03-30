<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 7/11/15
 * Time: 9:01 PM
 */

if (!function_exists('bravo_team_member_funct')) {
	vc_map(array(
		"name"            => esc_html__("Bravo Member Profile", 'bs-smarty'),
		"base"            => "bravo_team_member",
		"content_element" => true,
		"category"        => "CMSBlueTheme",
		"params"          => array(

			array(
				"type"        => "attach_image",
//                "holder"           => "div",
				"heading"     => esc_html__("Avatar", 'bs-smarty'),
				"param_name"  => "avatar",
				'admin_label' => true
			),

			array(
				"type"        => "textfield",
//                "holder"           => "div",
				"heading"     => esc_html__("Name", 'bs-smarty'),
				"param_name"  => "name",
				'admin_label' => true
			),
			array(
				"type"        => "textfield",
//                "holder"           => "div",
				"heading"     => esc_html__("Job", 'bs-smarty'),
				"param_name"  => "position",
				'admin_label' => true
			),
			array(
				"type"       => "add_social",
//                "holder"           => "div",
				"heading"    => esc_html__("Social", 'bs-smarty'),
				"param_name" => "social",
			),

			array(
				"type"        => "textarea_html",
				"heading"     => esc_html__("Content", 'bs-smarty'),
				"param_name"  => "content",
				'admin_label' => true
			),

			array(
				"type"       => "colorpicker",
				"heading"    => esc_html__("Custom Background", 'bs-smarty'),
				"param_name" => "custom_bg",
			),


		)
	));

	function bravo_team_member_funct($attr, $content = false)
	{
		$default = array(
			'name'      => '',
			'avatar'    => '',
			'position'  => '',
			'url'       => '',
			'social'    => '',
			'custom_bg' => false

		);
		$attr = wp_parse_args($attr, $default);

		$attr['content'] = $content;

		parse_str(urldecode($attr['social']), $data);
		$attr['list'] = $data;

		$html = BravoTemplate::load_view('elements/team-member', false, $attr);

		return $html;
	}

	bravo_reg_shortcode('bravo_team_member', 'bravo_team_member_funct');
}