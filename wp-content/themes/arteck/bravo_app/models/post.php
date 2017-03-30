<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 6/18/15
 * Time: 9:36 PM
 */
if (!class_exists('Bravo_Post_Model')) {
	class Bravo_Post_Model
	{
		static function _init()
		{
			add_action('init', array(__CLASS__, '_add_metabox'));
			add_action('init', array(__CLASS__, '_add_metabox2'));

			add_filter('bravo_post_single_label', array(__CLASS__, '_bravo_post_single_label'));
			add_filter('bravo_post_single_icon', array(__CLASS__, '_bravo_post_single_icon'));
			add_filter('bravo_header_bg_line', array(__CLASS__, '_bravo_header_bg_line'));
		}

		static function _bravo_header_bg_line($label)
		{
			if (!is_page_template('template-blank.php')) {
				return FALSE;
			}

			return $label;
		}

		static function _bravo_post_single_icon($icon)
		{
			if (is_singular()) {
				$meta = get_post_meta(get_the_ID(), 'page_icon', TRUE);
				if ($meta) $icon = $meta;
			}

			return $icon;
		}

		static function _bravo_post_single_label($label)
		{
			if (is_singular()) {
				$meta = get_post_meta(get_the_ID(), 'page_label', TRUE);
				if ($meta) $label = $meta;
			}

			return $label;
		}

		static function _add_metabox()
		{
			$my_meta_box = array(
				'id'       => 'bravo_post_metabox',
				'title'    =>esc_html__('Post Information', 'bs-smarty'),
				'desc'     => '',
				'pages'    => array('post'),
				'context'  => 'normal',
				'priority' => 'high',
				'fields'   => array(
					array(
						'label' =>esc_html__('Gallery', 'bs-smarty'),
						'desc'  =>esc_html__('Gallery', 'bs-smarty'),
						'id'    => 'gallery',
						'type'  => 'gallery'
					),
					array(
						'id'    => 'media_url',
						'label' =>esc_html__('Media URL', 'bs-smarty'),
						'desc'  =>esc_html__('You can use Youtube and Vimeo URL, also sounclound for audio post format', 'bs-smarty'),
						'type'  => 'text',

					),
					array(
						'id'    => 'media_selfhost',
						'label' =>esc_html__('Media selfhost', 'bs-smarty'),
						'desc'  =>esc_html__('You can upload video or audio file', 'bs-smarty'),
						'type'  => 'upload',

					),
					array(
						'id'    => 'quote_content',
						'label' =>esc_html__('Quote Content', 'bs-smarty'),
						'desc'  =>esc_html__('Only use for Quote Format', 'bs-smarty'),
						'type'  => 'textarea',
					),
					array(
						'id'    => 'link_address',
						'label' =>esc_html__('Link', 'bs-smarty'),
						'desc'  =>esc_html__('Only use for Link Format', 'bs-smarty'),
						'type'  => 'text',
					),
					array(
						'id'    => 'author_name',
						'label' =>esc_html__('Author Name', 'bs-smarty'),
						'desc'  =>esc_html__('Only use for Link and Quote Format', 'bs-smarty'),
						'type'  => 'text',

					),

				)
			);

			/**
			 * Register our meta boxes using the
			 * ot_register_meta_box() function.
			 */
			if (function_exists('ot_register_meta_box')) {
				ot_register_meta_box($my_meta_box);
			}
		}

		static function _add_metabox2()
		{
			$my_meta_box = array(
				'id'       => 'bravo_other_options',
				'title'    =>esc_html__('Other Options', 'bs-smarty'),
				'desc'     => '',
				'pages'    => array('post', 'page', 'portfolio'),
				'context'  => 'side',
				'priority' => 'default',
				'fields'   => array(
					array(
						'label' =>esc_html__('Background Image', 'bs-smarty'),
						'id'    => '_background_image',
						'type'  => 'upload'
					),
					array(
						'label'   =>esc_html__('Menu Position', 'bs-smarty'),
						'id'      => 'menu_pos',
						'type'    => 'select',
						'choices' => array(
							array(
								'value' => '',
								'label' =>esc_html__("-- Select --", 'bs-smarty')
							),
							array(
								'value' => 'left',
								'label' =>esc_html__("Menu Left", 'bs-smarty')
							),
							array(
								'value' => 'right',
								'label' =>esc_html__("Menu Right", 'bs-smarty')
							),
						)
					),
					array(
						'label'   =>esc_html__('Menu ID', 'bs-smarty'),
						'id'      => 'menu_id',
						'type'    => 'select',
						'choices' => bravo_get_list_menu()
					),
					array(
						'label'   =>esc_html__('Sidebar Position', 'bs-smarty'),
						'id'      => 'sidebar_pos',
						'type'    => 'select',
						'choices' => array(
							array(
								'value' => '',
								'label' =>esc_html__("-- Select --", 'bs-smarty')
							),
							array(
								'value' => 'no',
								'label' =>esc_html__("No Sidebar", 'bs-smarty')
							),
							array(
								'value' => 'left',
								'label' =>esc_html__("Sidebar Left", 'bs-smarty')
							),
							array(
								'value' => 'right',
								'label' =>esc_html__("Sidebar Right", 'bs-smarty')
							),
						)
					),
					array(
						'label' =>esc_html__('Sidebar ID', 'bs-smarty'),
						'id'    => 'sidebar_id',
						'type'  => 'sidebar-select'
					),

				)
			);

			/**
			 * Register our meta boxes using the
			 * ot_register_meta_box() function.
			 */
			if (function_exists('ot_register_meta_box')) {
				ot_register_meta_box($my_meta_box);
			}
		}
	}

	Bravo_Post_Model::_init();
}