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
            "name"     =>esc_html__("Bravo Portfolio Masonry", 'bs-smarty'),
            "base"     => "bravo_portfolio_masonry",
            "category" => "CMSBlueTheme",
            'params'   => array(
                array(
                    "type"        => "textfield",
                    "heading"     =>esc_html__("Number post", 'bs-smarty'),
                    "param_name"  => "number",
                    "value"       => 8,
                    "description" =>esc_html__("Post number", 'bs-smarty'),
                    'admin_label' => true
                ),
                array(
                    "type"       => "checkbox",
                    "heading"    =>esc_html__("Category", 'bs-smarty'),
                    "param_name" => "category",
                    "value"      => bravo_get_list_taxonomy_id('portfolio_cat', array('hide_empty' => false))
                ),
                array(
                    "type"       => "dropdown",
                    "heading"    =>esc_html__( "Select type view", 'bs-smarty' ),
                    "param_name" => "type_view",
                    "value"      => array(
                       esc_html__( 'One Page', 'bs-smarty' ) => 'view_1',
                       esc_html__( 'Masonry v1', 'bs-smarty' ) => 'view_2',
                       esc_html__( 'Masonry v2', 'bs-smarty' ) => 'view_3',
                       esc_html__( 'Masonry v3', 'bs-smarty' ) => 'view_4',
                       esc_html__( 'Masonry v4', 'bs-smarty' ) => 'view_5',
                    )
                ),
                array(
                    "type"        => "dropdown",
                    "heading"     =>esc_html__("Order", 'bs-smarty'),
                    "param_name"  => "order",
                    'value'       => array(
                       esc_html__('Asc', 'bs-smarty')  => 'asc',
                       esc_html__('Desc', 'bs-smarty') => 'desc'
                    ),
                    "description" =>esc_html__("Order", 'bs-smarty')
                ),
                array(
                    "type"        => "dropdown",
                    "heading"     =>esc_html__("Order By", 'bs-smarty'),
                    "param_name"  => "orderby",
                    "value"       => bravo_vc_get_order_list(),
                    "description" =>esc_html__("Order By", 'bs-smarty')
                ),
                array(
                    "type"        => "textfield",
                    "heading"     =>esc_html__("Portfolio IDs", 'bs-smarty'),
                    "param_name"  => "ids",
                    "description" =>esc_html__("Specific portfolio id, separate by commas", 'bs-smarty')
                ),
            )
        )
    );


    if (!function_exists('bravo_portfolio_masonry_func')) {
        function bravo_portfolio_masonry_func($attr, $content = false)
        {
            $attr = wp_parse_args($attr, array(
                'number'         => '',
                'category'       => '',
                'order'          => 'asc',
                'orderby'        => '',
                'type_view'        => 'view_1',
                'ids'            => '',
                'number_per_row' => '',
                'click_action'   => 'feature_image'
            ));

            $category = $attr['category'];

            $query = array(
                'post_type'      => 'portfolio',
                'posts_per_page' => $attr['number'],
                'orderby'        => $attr['orderby'],
                'order'          => $attr['order'],
            );
            if ($category != '0' && $category != '') {
                $query['tax_query'][] = array(
                    'taxonomy' => 'portfolio_cat',
                    'terms'    => explode(',', $category)
                );
            }
            $paged = !empty($_GET['bravoportfolio'])?$_GET['bravoportfolio'] :1;
            $query['paged']=$paged;
            if ($attr['ids']) {
                $query['post__in'] = explode(',', $attr['ids']);
            }


            $attr['query'] = new WP_Query($query);


            $html = BravoTemplate::load_view('elements/portfolio/portfolio_masonry_'.$attr
                ['type_view'], false, $attr);
            wp_reset_postdata();

            return $html;
        }

        bravo_reg_shortcode('bravo_portfolio_masonry', 'bravo_portfolio_masonry_func');
    }
}