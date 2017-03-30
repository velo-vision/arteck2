<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 6/9/15
 * Time: 8:47 PM
 */
if (!function_exists('bravo_counter_up_func')) {
    vc_map(array(
        "name"                    =>esc_html__("Bravo Counter Up", 'bs-smarty'),
        "base"                    => "bravo_counter_up",
        "content_element"         => true,
        "show_settings_on_create" => true,
        "category"                => "CMSBlueTheme",
        "params"                  => array(


            array(
                'param_name'  => 'number',
                'type'        => 'textfield',
                'heading'     =>esc_html__("Number", 'bs-smarty'),
                'admin_label' => true,
            ),

            array(
                'param_name'  => 'name',
                'type'        => 'textfield',
                'heading'     =>esc_html__("Name", 'bs-smarty'),
                'admin_label' => true,
            ),
            array(
                "type"        => "textarea_html",
                "heading"     =>esc_html__("Content", 'bs-smarty'),
                "param_name"  => "content",
                'admin_label' => true
            ),
        )
    ));

    function bravo_counter_up_func($attr, $content = false)
    {
        $default = array(
            'name'  => '',
            'number' => '',
            'icon'   => ''
        );
        $attr = wp_parse_args($attr, $default);

        $content = do_shortcode($content);
        $attr['content'] = $content;

        return BravoTemplate::load_view('elements/counter-up', null, $attr);
    }

    bravo_reg_shortcode('bravo_counter_up', 'bravo_counter_up_func');
}