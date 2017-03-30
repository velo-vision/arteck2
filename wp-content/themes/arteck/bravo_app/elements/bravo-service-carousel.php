<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 6/13/15
 * Time: 6:26 PM
 */
if (function_exists('vc_map')) {
	//Register "container" content element. It will hold all your inner (child) content elements
	vc_map(array(
		"name"                    =>esc_html__("Bravo Service Slide", 'bs-smarty'),
		"base"                    => "bravo_service_wrapper",
		"as_parent"               => array('only' => 'bravo_service_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
		"content_element"         => true,
		"show_settings_on_create" => false,
		"params"                  => array(
			// add params same as with any other content element
			array(
				"type"        => "textfield",
				"heading"     =>esc_html__("Extra class name", 'bs-smarty'),
				"param_name"  => "el_class",
				"description" =>esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'bs-smarty')
			),
			array(
				"type"        => "textfield",
				"heading"     =>esc_html__("Autoplay", 'bs-smarty'),
				'description' =>esc_html__('Set to 0 for disable auto play ', 'bs-smarty'),
				"param_name"  => "autoplay",
			),
			array(
				"type"        => "textfield",
				"heading"     =>esc_html__("Item per row", 'bs-smarty'),
				"param_name"  => "number_per_row",
				'std'=>3
			),
		),
		"js_view"                 => 'VcColumnView'
	));
	vc_map(array(
		"name"            =>esc_html__("Bravo Service Item", 'bs-smarty'),
		"base"            => "bravo_service_item",
		"content_element" => true,
		"as_child"        => array('only' => 'bravo_service_wrapper'), // Use only|except attributes to limit parent (separate multiple values with comma)
		"params"          => array(

			array(
				'type'        => 'iconpicker',
				'heading'     =>esc_html__("Icon", 'bs-smarty'),
				'param_name'  => 'icon',
				'admin_label' => true
			),
			array(
				'type'        => 'textfield',
				'heading'     =>esc_html__("Title", 'bs-smarty'),
				'param_name'  => 'title',
				'admin_label' => true
			),

			array(
				'type'       => 'textarea_html',
				'heading'    =>esc_html__('Content', 'bs-smarty'),
				'param_name' => 'content',
			)
		)
	));
//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
	if (class_exists('WPBakeryShortCodesContainer')) {
		class WPBakeryShortCode_bravo_service_wrapper extends WPBakeryShortCodesContainer
		{

			function content($attr, $content = false)
			{
				$default = array(
					'el_class' => '',
					'id'       => '',
					'autoplay' => '',
					'number_per_row'=>3
				);
				$bravo_slider_id=Bravo_Params::get('bravo_slider_id');
				if (!$bravo_slider_id) $bravo_slider_id = time();
				$bravo_slider_id++;
				Bravo_Params::set('bravo_slider_id',$bravo_slider_id);

				$attr = wp_parse_args($attr, $default);
				$attr['slider_id'] = $bravo_slider_id;

				$attr['content'] = wpb_js_remove_wpautop($content);
				$attr['autoplay'] = (int)$attr['autoplay'];

				return BravoTemplate::load_view('elements/bravo_service_wrapper', null, $attr);
			}
		}
	}
	if (class_exists('WPBakeryShortCode')) {
		class WPBakeryShortCode_bravo_service_item extends WPBakeryShortCode
		{
			function content($attr, $content = false)
			{
				$default = array(
					'icon'  => '',
					'title' => '',
				);
				$bravo_testimonial_item_id=Bravo_Params::get('bravo_testimonial_item_id');
				if (!$bravo_testimonial_item_id) $bravo_testimonial_item_id = 0;
				$bravo_testimonial_item_id++;

				Bravo_Params::set('bravo_testimonial_item_id',$bravo_testimonial_item_id);

				$attr = wp_parse_args($attr, $default);


				if ($bravo_testimonial_item_id == 1) {
					$attr['class'] = 'active';
				}

				$attr['slider_item_id'] = $bravo_testimonial_item_id;
				$attr['content'] = wpb_js_remove_wpautop($content);

				return BravoTemplate::load_view('elements/bravo_service_item', null, $attr);
			}
		}
	}
}