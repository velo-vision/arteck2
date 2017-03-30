<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 12/18/15
 * Time: 11:44 PM
 */

if (function_exists('vc_map')) {
	//Register "container" content element. It will hold all your inner (child) content elements
	vc_map(array(
			"name"     => esc_html__("Bravo Blog Carousel", 'bs-smarty'),
			"base"     => "bravo_list_blog",
			"category" => "CMSBlueTheme",
			'params'   => array(
				array(
					"type"        => "textfield",
					"heading"     => esc_html__("Title", 'bs-smarty'),
					"param_name"  => "title",
					'admin_label' => TRUE,
					'std'         => 'Blog'
				),
				array(
					"type"        => "textfield",
					"heading"     => esc_html__("Number post", 'bs-smarty'),
					"param_name"  => "number",
					"value"       => 8,
					"description" => esc_html__("Post number", 'bs-smarty'),
					'admin_label' => TRUE
				),
				array(
					"type"        => "dropdown",
					"heading"     => esc_html__("Post per row", 'bs-smarty'),
					"param_name"  => "number_per_row",
					"value"       => array(
						2, 3, 4, 5, 6
					),
					"description" => esc_html__("Number of post per row", 'bs-smarty'),
					'admin_label' => TRUE
				),
				array(
					"type"       => "checkbox",
					"holder"     => "div",
					"heading"    => esc_html__("Category", 'bs-smarty'),
					"param_name" => "category",
					"value"      => bravo_get_list_taxonomy_id('category', array('hide_empty' => FALSE))
				),
				array(
					"type"        => "dropdown",
					"heading"     => esc_html__("Order", 'bs-smarty'),
					"param_name"  => "order",
					'value'       => array(
						esc_html__('Asc', 'bs-smarty')  => 'asc',
						esc_html__('Desc', 'bs-smarty') => 'desc'
					),
					"description" => esc_html__("Order", 'bs-smarty')
				),
				array(
					"type"        => "dropdown",
					"heading"     => esc_html__("Order By", 'bs-smarty'),
					"param_name"  => "orderby",
					"value"       => bravo_vc_get_order_list(),
					"description" => esc_html__("Order By", 'bs-smarty')
				),
				array(
					"type"        => "textfield",
					"heading"     => esc_html__("Post IDs", 'bs-smarty'),
					"param_name"  => "ids",
					"description" => esc_html__("Specific post id, separate by commas", 'bs-smarty')
				),
				array(
					"type"       => "dropdown",
					"heading"    => esc_html__("Button Action", 'bs-smarty'),
					"param_name" => "action",
					'value'      => array(
						esc_html__("Open Popup", 'bs-smarty')   => 'popup',
						esc_html__("Go To Detail", 'bs-smarty') => 'detail',
					),
					'std'        => 'popup'
				),

			)
		)
	);


	if (!function_exists('bravo_list_blog_func')) {
		function bravo_list_blog_func($attr, $content = FALSE)
		{
			$attr = wp_parse_args($attr, array(
				'title'            => '',
				'number'           => '',
				'category'         => '',
				'order'            => 'asc',
				'orderby'          => '',
				'ids'              => '',
				'number_per_row'   => 2,
				'show_more_button' => '',
				'action'           => 'popup'
			));

			$category = $attr['category'];

			$query = array(
				'post_type'      => 'post',
				'posts_per_page' => $attr['number'],
				'orderby'        => $attr['orderby'],
				'order'          => $attr['order'],
			);
			if ($category != '0' && $category != '') {
				$query['tax_query'][] = array(
					'taxonomy' => 'category',
					'terms'    => explode(',', $category)
				);
			}

			if ($attr['ids']) {
				$query['post__in'] = explode(',', $attr['ids']);
			}

			$attr['query'] = new WP_Query($query);


			$html = BravoTemplate::load_view('elements/blog-carousel', FALSE, $attr);
			wp_reset_postdata();

			return $html;
		}

		bravo_reg_shortcode('bravo_list_blog', 'bravo_list_blog_func');
	}
}