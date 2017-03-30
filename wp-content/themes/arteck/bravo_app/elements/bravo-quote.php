<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 12/18/15
 * Time: 9:16 PM
 */

if (!function_exists('bravo_quote_func')) {
	function bravo_quote_func($attr, $content = false)
	{
		$attr = wp_parse_args($attr, array(
			'author' => '',

		));

		$attr['content'] = do_shortcode($content);

		return BravoTemplate::load_view('elements/bravo_quote', false, $attr);
	}

	bravo_reg_shortcode('bravo_quote', 'bravo_quote_func');

	vc_map(array(
		"name"     =>  esc_html__("Bravo Quote", 'bs-smarty'),
		"base"     => "bravo_quote",
		"category" => "CMSBlueTheme",
		"params"   => array(

			array(
				"type"        => "textfield",
				"heading"     => esc_html__("Author", 'bs-smarty'),
				"param_name"  => "author",
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