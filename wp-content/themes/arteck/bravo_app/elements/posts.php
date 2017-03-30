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
            "name"     =>esc_html__("Bravo Posts", 'bs-smarty'),
            "base"     => "bravo_posts",
            "category" => "CMSBlueTheme",
            'params'   => array(
                array(
                    "type"        => "dropdown",
                    "heading"     =>esc_html__("Blog type view", 'bs-smarty'),
                    "param_name"  => "view",
                    'value'       => array(
                       esc_html__('Gird', 'bs-smarty') => 'gird'  ,
                       esc_html__('Gird 2', 'bs-smarty') => 'gird2'  ,
                       esc_html__('Masonry', 'bs-smarty')  => 'mansory',
                       esc_html__('Standard', 'bs-smarty')  => 'standart',
                    ),
                    'admin_label' => true
                ),
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
                    "holder"     => "div",
                    "heading"    =>esc_html__("Category", 'bs-smarty'),
                    "param_name" => "category",
                    "value"      => bravo_get_list_taxonomy_id('category', array('hide_empty' => false))
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
                    "heading"     =>esc_html__("Post IDs", 'bs-smarty'),
                    "param_name"  => "ids",
                    "description" =>esc_html__("Specific post id, separate by commas", 'bs-smarty')
                ),
            )
        )
    );
    if (!function_exists('bravo_posts_func')) {
        function bravo_posts_func($attr, $content = false)
        {
            $attr = wp_parse_args($attr, array(
                'number'         => '',
                'category'       => '',
                'order'          => 'asc',
                'orderby'        => '',
                'view'        => 'gird',
                'ids'            => '',
                'number_per_row' => '',
                'click_action'   => 'feature_image'
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
            $paged=get_query_var('paged');
            if(!empty($_GET['bravoposts'])){
                $paged=$_GET['bravoposts'];
            }
            $query['paged']=$paged;
            if ($attr['ids']) {
                $query['post__in'] = explode(',', $attr['ids']);
            }

            $attr['query'] = new WP_Query($query);

            if($attr['view']=='gird' or $attr['view']=='gird2'){
                $html = BravoTemplate::load_view('elements/post/gird', false, $attr);
            }elseif($attr['view']=='standart'){
                $html = BravoTemplate::load_view('elements/post/standart', false, $attr);
            }else{
                $html = BravoTemplate::load_view('elements/post/mansory', false, $attr);

            }
            wp_reset_postdata();

            return $html;
        }

        bravo_reg_shortcode('bravo_posts', 'bravo_posts_func');
    }
}