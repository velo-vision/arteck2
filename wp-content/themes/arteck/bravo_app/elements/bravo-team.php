<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 12/18/15
 * Time: 9:16 PM
 */

if (!function_exists('bravo_team_func')) {
	function bravo_team_func($attr, $content = false)
	{
		$attr = wp_parse_args($attr, array(
			'author'                  => '',
			'job'                     => '',
			'social'                  => '',
			'avatar'                  => '',
			'other_members'           => '',
			'email_address'       => '',
			'show_send_resume_button' => '',
			'resume_form_code'        => '',

		));

		parse_str( urldecode( $attr['social'] ), $data);

		$attr['content'] = do_shortcode($content);
		$attr['social_array']=$data;

		return BravoTemplate::load_view('elements/bravo_team', false, $attr);
	}

	bravo_reg_shortcode('bravo_team', 'bravo_team_func');

	vc_map(array(
		"name"     =>esc_html__("Bravo Team ", 'bs-smarty'),
		"base"     => "bravo_team",
		"category" => "CMSBlueTheme",
		"params"   => array(

			array(
				"type"        => "textfield",
				"heading"     =>esc_html__("Author", 'bs-smarty'),
				"param_name"  => "author",
				'admin_label' => true
			),
			array(
				"type"        => "textfield",
				"heading"     =>esc_html__("Job", 'bs-smarty'),
				"param_name"  => "job",
				'admin_label' => true
			),
			array(
				"type"        => "add_social",
				"heading"     =>esc_html__("Social", 'bs-smarty'),
				"param_name"  => "social",
			),
			array(
				"type"       => "textfield",
				"heading"    =>esc_html__("Email Address", 'bs-smarty'),
				"param_name" => "email_address",
			),
			array(
				"type"       => "attach_image",
				"heading"    =>esc_html__("Avatar", 'bs-smarty'),
				"param_name" => "avatar",
			),
			array(
				"type"       => "attach_images",
				"heading"    =>esc_html__("Other Team Members", 'bs-smarty'),
				"param_name" => "other_members",
			),
			array(
				"type"       => "checkbox",
				"heading"    =>esc_html__("Show Send Resume Button?", 'bs-smarty'),
				"param_name" => "show_send_resume_button",
			),
			array(
				"type"       => "dropdown",
				"heading"    =>esc_html__("Resume Form Code", 'bs-smarty'),
				"param_name" => "resume_form_code",
				"value"=>bravo_vc_post_dropdown(array(
					'post_type'=>'wpcf7_contact_form',
					'posts_per_page'=>100
				))
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