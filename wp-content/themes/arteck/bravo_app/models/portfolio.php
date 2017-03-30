<?php
/**
 * Created by PhpStorm.
 * User: MrHa
 * Date: 3/12/2015
 * Time: 9:22 AM
 */
if (!class_exists('BravoPortfolio')) {

	class BravoPortfolio
	{
		static $content;

		static function __init()
		{

			if (function_exists('bravo_reg_post_type')) {
				add_action('init', array(__CLASS__, '__register_post_type'));
			}

			add_action('init', array(__CLASS__, '__add_metabox'));
			add_action('init', array(__CLASS__, '_init_elements'));


		}

		static function __register_post_type()
		{
			$labels = array(
				'name'               => esc_html__('Portfolios', 'bs-smarty'),
				'singular_name'      => esc_html__('Portfolio', 'bs-smarty'),
				'menu_name'          => esc_html__('Portfolios', 'bs-smarty'),
				'name_admin_bar'     => esc_html__('Portfolio', 'bs-smarty'),
				'add_new'            => esc_html__('Add New', 'bs-smarty'),
				'add_new_item'       => esc_html__('Add New Portfolio', 'bs-smarty'),
				'new_item'           => esc_html__('New Portfolio', 'bs-smarty'),
				'edit_item'          => esc_html__('Edit Portfolio', 'bs-smarty'),
				'view_item'          => esc_html__('View Portfolio', 'bs-smarty'),
				'all_items'          => esc_html__('All Portfolios', 'bs-smarty'),
				'search_items'       => esc_html__('Search Portfolios', 'bs-smarty'),
				'parent_item_colon'  => esc_html__('Parent Portfolios:', 'bs-smarty'),
				'not_found'          => esc_html__('No Portfolios found.', 'bs-smarty'),
				'not_found_in_trash' => esc_html__('No Portfolios found in Trash.', 'bs-smarty')
			);

			$args = array(
				'labels'             => $labels,
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => array('slug' => 'portfolio'),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => null,
				'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt'),
				'menu_icon'          => 'dashicons-bravo-portfolio'
			);
			bravo_reg_post_type('portfolio', $args);


			$labels = array(
				'name'              => esc_html__('Portfolio Categories', 'bs-smarty'),
				'singular_name'     => esc_html__('Portfolio Category', 'bs-smarty'),
				'search_items'      => esc_html__('Search Portfolio Categories', 'bs-smarty'),
				'all_items'         => esc_html__('All Portfolio Categories', 'bs-smarty'),
				'parent_item'       => esc_html__('Parent Portfolio Category', 'bs-smarty'),
				'parent_item_colon' => esc_html__('Parent Portfolio Category:', 'bs-smarty'),
				'edit_item'         => esc_html__('Edit Portfolio Category', 'bs-smarty'),
				'update_item'       => esc_html__('Update Portfolio Category', 'bs-smarty'),
				'add_new_item'      => esc_html__('Add New Portfolio Category', 'bs-smarty'),
				'new_item_name'     => esc_html__('New Portfolio Category Name', 'bs-smarty'),
				'menu_name'         => esc_html__('Portfolio Category', 'bs-smarty'),
			);

			$args = array(
				'hierarchical'      => true,
				'labels'            => $labels,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => array('slug' => 'portfolio_cat'),
			);

			bravo_reg_taxonomy('portfolio_cat', array('portfolio'), $args);


		}

		static function __add_metabox()
		{
			$my_meta_box = array(
				'id'       => 'bravo_portfolio_metabox',
				'title'    => esc_html__('Portfolio Gallery', 'bs-smarty'),
				'desc'     => '',
				'pages'    => array('portfolio'),
				'context'  => 'normal',
				'priority' => 'high',
				'fields'   => array(
					array(
						'label' => esc_html__('Masonry Feature Image', 'bs-smarty'),
						'desc' => esc_html__('Masonry Feature Image', 'bs-smarty'),
						'id'    => 'feature',
						'type'  => 'upload'
					),
					array(
						'label' => esc_html__('Gallery', 'bs-smarty'),
						'id'    => 'gallery',
						'type'  => 'gallery'
					),

					array(
						'id'    => 'masonry_sub_title',
						'label' =>esc_html__("Masonry Sub-title", 'bs-smarty'),
						'desc'  =>esc_html__("Use in Portfolio Masonry Style", 'bs-smarty'),
						'type'  => 'text'
					),
					array(
						'id'      => '_masonry_item_width',
						'label'   =>esc_html__("Masonry Item Width", 'bs-smarty'),
						'desc'    =>esc_html__("Use in Portfolio Masonry Style", 'bs-smarty'),
						'type'    => 'select',
						'choices' => array(
							array(
								'value' => 'wide',
								'label' =>esc_html__('Wide', 'bs-smarty')
							),
							array(
								'value' => 'medium',
								'label' =>esc_html__('Medium', 'bs-smarty')
							),
							array(
								'value' => 'small',
								'label' =>esc_html__('Small', 'bs-smarty')
							),
						)
					)


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

		static function _init_elements()
		{

		}

		static function _like()
		{
			if ($_POST) {
				$ip = $_SERVER['REMOTE_ADDR'];
				$id = $_POST['id'];
			}
		}

		static function addFooterHtml($html)
		{
			self::$content[] = $html;
		}

		static function getFooterHtml()
		{
			if (!empty(self::$content)) {
				foreach (self::$content as $item => $value) {
					echo($value);
				}
			}
		}
	}


	BravoPortfolio::__init();
}