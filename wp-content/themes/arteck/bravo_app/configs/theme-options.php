<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 2/28/15
 * Time: 7:01 PM
 */

/**
 *
 * List all theme options fields
 *
 * @see BravoOptiontree::_add_themeoptions();
 *
 *
 * */
$config['theme_options'] = array(
	'sections' => array(
		array(
			'id'    => 'option_general',
			'title' => esc_html__('General Options', 'bs-smarty')
		),
		array(
			'id'    => 'option_preload',
			'title' => esc_html__('Preload Options', 'bs-smarty')
		),
		array(
			'id'    => 'option_header',
			'title' => esc_html__('Menu Options', 'bs-smarty')
		),
		array(
			'id'    => 'option_post',
			'title' => esc_html__('Posts Options', 'bs-smarty')
		),
		array(
			'id'    => 'option_testimonial',
			'title' => esc_html__('Testimonials', 'bs-smarty')
		),
		array(
			'id'    => 'option_style',
			'title' => esc_html__('Styling Options', 'bs-smarty')
		)
	),
	'settings' => array(
		/*----------------Begin General --------------------*/

		array(
			'id'      => 'gen_enable_dark_style',
			'label'   => esc_html__('Enable Dark Version?', 'bs-smarty'),
			'desc'    => esc_html__('This allow you to choose Dark version', 'bs-smarty'),
			'type'    => 'on-off',
			'section' => 'option_general',
			'std'     => 'off'
		)

	, array(
			'id'      => 'logo',
			'label'   => esc_html__('Logo', 'bs-smarty'),
			'desc'    => esc_html__('This allow you to change logo', 'bs-smarty'),
			'type'    => 'upload',
			'section' => 'option_general',
			'std'     => BravoAssets::url() . 'images/logo.png'
		),

		array(
			'id'      => 'logo_retina',
			'label'   => esc_html__('Logo Retina', 'bs-smarty'),
			'desc'    => esc_html__('Note: You MUST re-name Logo Retina to logo-name@2x.ext-name. Example:<br>
                                    Logo is: <em>my-logo.jpg</em><br>Logo Retina must be: <em>my-logo@2x.jpg</em>  ', 'bs-smarty'),
			'type'    => 'upload',
			'section' => 'option_general',
		),

		array(
			'id'       => 'gen_social_list',
			'label'    => esc_html__("Social List", 'bs-smarty'),
			'type'     => 'list-item',
			'desc'     => 'You can use font icon . example : <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/">Font-Awesome</a>',
			'section'  => 'option_general',
			'settings' => array(
				array(
					'id'    => 'icon_social',
					'label' => esc_html__("Icon", 'bs-smarty'),
					'type'  => 'text',
				),
				array(
					'id'    => 'url_social',
					'label' => esc_html__("Url", 'bs-smarty'),
					'type'  => 'text',
				),
			)
		),

		/*----------------End General ----------------------*/
		array(
			'id'      => 'gen_enable_preload',
			'label'   => esc_html__('Enable Preload', 'bs-smarty'),
			'desc'    => esc_html__('This allow you to turn on or off <em>Preload Effect</em>', 'bs-smarty'),
			'type'    => 'on-off',
			'section' => 'option_preload',
			'std'     => 'on'
		),
		array(
			'id'        => 'logo_preload',
			'label'     => esc_html__('Logo Preload', 'bs-smarty'),
			'desc'      => esc_html__('This allow you to change logo', 'bs-smarty'),
			'type'      => 'upload',
			'section'   => 'option_preload',
			'std'       => BravoAssets::url() . 'images/logo2.png',
			'condition' => 'gen_enable_preload:is(on)'
		),
		array(
			'id'        => 'bg_preload',
			'label'     => esc_html__('Background Preload', 'bs-smarty'),
			'desc'      => esc_html__('This allow you to change background image', 'bs-smarty'),
			'type'      => 'upload',
			'section'   => 'option_preload',
			'condition' => 'gen_enable_preload:is(on)'
		),
		array(
			'id'        => 'preload_copyright',
			'label'     => esc_html__('Preload Copy Right', 'bs-smarty'),
			'type'      => 'textarea',
			'section'   => 'option_preload',
			'condition' => 'gen_enable_preload:is(on)'
		),


		/*----------------Begin Header ----------------------*/
		array(
			'id'      => 'header_menu_position',
			'type'    => 'select',
			'section' => 'option_header',
			'label'   => esc_html__('Menu Position', 'bs-smarty'),
			'choices' => array(
				array(
					'value' => 'left',
					'label' => esc_html__("Menus Left", 'bs-smarty')
				),
				array(
					'value' => 'right',
					'label' => esc_html__("Menus Right", 'bs-smarty')
				),
			)
		),
		array(
			'id'      => 'header_menu_bg',
			'type'    => 'background',
			'section' => 'option_header',
			'label'   => esc_html__('Menu Background', 'bs-smarty'),
			'desc'    => esc_html__('Menu Background', 'bs-smarty'),
			'output'  => '.navbar.on-scroll'
		),
		array(
			'id'      => 'header_menu_typo',
			'type'    => 'typography',
			'section' => 'option_header',
			'label'   => esc_html__('Menu Typo', 'bs-smarty'),
			'desc'    => esc_html__('Menu Typo', 'bs-smarty'),
			'output'  => '.navbar,.navbar a'
		),
		array(
			'id'      => 'menu_copy_right',
			'type'    => 'textarea',
			'section' => 'option_header',
			'label'   => esc_html__('Menu copyright text', 'bs-smarty'),
			'desc'    => esc_html__('Menu copyright text', 'bs-smarty'),
		),


		/*----------------End Header ----------------------*/


		/*----------------Begin  Styling ----------------------*/
		array(
			'id'      => 'main_color',
			'label'   => esc_html__('Main Color', 'bs-smarty'),
			'desc'    => esc_html__('Choose your own main color', 'bs-smarty'),
			'type'    => 'colorpicker',
			'section' => 'option_style',
			'std'     => '#01bab0'
		),
		array(
			'id'      => 'google_fonts',
			'label'   => esc_html__('Google Fonts', 'bs-smarty'),
			'desc'    => esc_html__('Google Fonts', 'bs-smarty'),
			'type'    => 'google-fonts',
			'section' => 'option_style'
		),
		array(
			'id'      => 'body_font',
			'label'   => esc_html__("Typography", 'bs-smarty'),
			'desc'    => esc_html__("Typography", 'bs-smarty'),
			'type'    => 'typography',
			'section' => 'option_style',
			'output'  => 'body,p'
		),
		array(
			'id'      => 'heading_font',
			'label'   => esc_html__("Heading Font", 'bs-smarty'),
			'desc'    => esc_html__("Heading Font", 'bs-smarty'),
			'type'    => 'typography',
			'section' => 'option_style',
			'output'  => 'h1,h2,h3,h4,h5'
		),
		array(
			'id'      => 'style_custom_css',
			'label'   => esc_html__('Custom CSS', 'bs-smarty'),
			'desc'    => esc_html__('Custom CSS', 'bs-smarty'),
			'type'    => 'css',
			'section' => 'option_style',
		),
		/*----------------End Styling ----------------------*/
		/*----------------Begin Posts Options ----------------------*/
		array(
			'id'      => 'post_blog_tab',
			'label'   => esc_html__('Blog Options', 'bs-smarty'),
			'type'    => 'tab',
			'section' => 'option_post'
		),
		array(
			'id'      => 'post_blog_title',
			'label'   => esc_html__('Blog page title', 'bs-smarty'),
			'type'    => 'text',
			'std'     => 'Blog',
			'section' => 'option_post'
		),
		array(
			'id'      => 'post_blog_desc',
			'label'   => esc_html__('Blog page description', 'bs-smarty'),
			'type'    => 'textarea',
			'std'     => '',
			'section' => 'option_post'
		),
		array(
			'id'      => 'blog_background_image',
			'label'   => esc_html__('Blog page background image', 'bs-smarty'),
			'desc'    => esc_html__('Blog page background image', 'bs-smarty'),
			'type'    => 'upload',
			'std'     => '',
			'section' => 'option_post'
		),
		array(
			'id'      => 'page_blog_view',
			'label'   => esc_html__("Blog type view", 'bs-smarty'),
			'type'    => 'select',
			'section' => 'option_post',
			'choices' => array(
				array(
					'value' => 'standart',
					'label' => esc_html__("Standard", 'bs-smarty')
				),
				array(
					'value' => 'default',
					'label' => esc_html__("Grid", 'bs-smarty')
				),
				array(
					'value' => 'mansory',
					'label' => esc_html__("Masonry", 'bs-smarty')
				),
			)
		),
		array(
			'id'      => 'page_sidebar_pos',
			'label'   => esc_html__("Sidebar Position", 'bs-smarty'),
			'type'    => 'select',
			'section' => 'option_post',
			'choices' => array(
				array(
					'value' => 'no',
					'label' => esc_html__("No Sidebar", 'bs-smarty')
				),
				array(
					'value' => 'left',
					'label' => esc_html__("Sidebar Left", 'bs-smarty')
				),
				array(
					'value' => 'right',
					'label' => esc_html__("Sidebar Right", 'bs-smarty')
				),
			)
		),
		array(
			'id'      => 'page_sidebar_id',
			'label'   => esc_html__("Widget Area Selection", 'bs-smarty'),
			'type'    => 'sidebar-select',
			'section' => 'option_post',
			'std'     => 'blog-sidebar'
		),
		array(
			'id'      => 'post_single_tab',
			'label'   => esc_html__('Post Options', 'bs-smarty'),
			'type'    => 'tab',
			'section' => 'option_post'
		),

		array(
			'id'      => 'page_single_sidebar_pos',
			'label'   => esc_html__("Sidebar Position", 'bs-smarty'),
			'type'    => 'select',
			'section' => 'option_post',
			'choices' => array(
				array(
					'value' => 'no',
					'label' => esc_html__("No Sidebar", 'bs-smarty')
				),
				array(
					'value' => 'left',
					'label' => esc_html__("Sidebar Left", 'bs-smarty')
				),
				array(
					'value' => 'right',
					'label' => esc_html__("Sidebar Right", 'bs-smarty')
				),
			)
		),
		array(
			'id'      => 'page_single_sidebar_id',
			'label'   => esc_html__("Widget Area Selection", 'bs-smarty'),
			'type'    => 'sidebar-select',
			'section' => 'option_post',
			'std'     => 'blog-sidebar'
		),
		array(
			'id'      => 'post_exerpt_length',
			'label'   => esc_html__("Except content length", 'bs-smarty'),
			'desc'    => esc_html__("Left empty for default", 'bs-smarty'),
			'type'    => 'text',
			'section' => 'option_post',
			'std'     => ''
		),
		array(
			'id'       => 'testimonials',
			'label'    => esc_html__("Testimonials", 'bs-smarty'),
			'desc'     => esc_html__("Testimonials", 'bs-smarty'),
			'type'     => 'list-item',
			'section'  => 'option_testimonial',
			'settings' => array(
				array(
					'id'    => 'company',
					'label' => esc_html__("Company name", 'bs-smarty'),
					'type'  => 'text',
				),
				array(
					'id'    => 'avatar',
					'label' => esc_html__("Avatar", 'bs-smarty'),
					'type'  => 'upload',
				),
				array(
					'id'    => 'content',
					'label' => esc_html__("Content", 'bs-smarty'),
					'type'  => 'textarea_simple',
				),
			)

		)
		/*----------------End Posts Options ----------------------*/
	)
);
