<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 12/18/15
 * Time: 9:16 PM
 */

if (!function_exists('bravo_service_item_func')) {
	function bravo_service_item_func($attr, $content = false)
	{
		$attr = wp_parse_args($attr, array(
			'title'  => '',
			'button' => '',
			'icon'   => '',
			'align'  => 'center',
			'class'=>'big-icon-single'

		));

		$attr['content'] = do_shortcode($content);

		return BravoTemplate::load_view('elements/bravo_service_item', false, $attr);
	}

	bravo_reg_shortcode('bravo_service_item', 'bravo_service_item_func');

	vc_map(array(
		"name"     =>esc_html__("Bravo Service Item", 'bs-smarty'),
		"base"     => "bravo_service_item",
		"category" => "CMSBlueTheme",
		"params"   => array(

			array(
				"type"        => "dropdown",
				"heading"     =>esc_html__("Align", 'bs-smarty'),
				"param_name"  => "align",
				"value"  => array(
					esc_html__('Center','bs-smarty')=>'center',
					esc_html__('Left','bs-smarty')=>'left',
					esc_html__('Right','bs-smarty')=>'right',
				),
				'admin_label' => true
			),
			array(
				"type"        => "textfield",
				"heading"     =>esc_html__("Title", 'bs-smarty'),
				"param_name"  => "title",
				'admin_label' => true
			),
			array(
				"type"        => "iconpicker",
				"heading"     =>esc_html__("Icon", 'bs-smarty'),
				"param_name"  => "icon",
				'admin_label' => true
			),
			array(
				"type"       => "vc_link",
				"heading"    =>esc_html__("Button", 'bs-smarty'),
				"param_name" => "button",
			),
			array(
				"type"        => "textarea_html",
				"heading"     =>esc_html__("Content", 'bs-smarty'),
				"param_name"  => "content",
				'admin_label' => true
			),


		)
	));
}