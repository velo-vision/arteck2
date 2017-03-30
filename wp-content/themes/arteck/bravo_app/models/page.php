<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 3/3/15
 * Time: 7:41 PM
 */

if (!class_exists('BravoPage')) {
    class BravoPage
    {
        static function _init()
        {
            if (function_exists('vc_add_param')) {
                add_action('init', array(__CLASS__, '_init_elements'));

            }
            //add_action('init', array(__CLASS__, '_init_metabox'));

            //add_filter('vc_tta_container_classes', array(__CLASS__, '_add_tab_class'), 10, 2);

            //add_filter('vc-tta-get-params-tabs-list',array(__CLASS__,'_add_tab_icon'),10,4);

        }

        static function _add_tab_icon($html, $atts, $content, $this_object){



            $isPageEditabe = vc_is_page_editable();

            $html = array();
            $html[] = '<div class="vc_tta-tabs-container">';
            $html[] = '<ul class="vc_tta-tabs-list">';
            if ( ! $isPageEditabe ) {

                $active_section = $this_object->getActiveSection( $atts, true );

                foreach ( WPBakeryShortCode_VC_Tta_Section::$section_info as $nth => $section ) {
                    $classes = array( 'vc_tta-tab' );
                    if ( ( $nth + 1 ) === $active_section ) {
                        $classes[] = $this_object->activeClass;
                    }
                    $data_icon=false;
                    $data_icon=isset($section['bravo_icon'])?$section['bravo_icon']:false;

                    $title = '<span class="vc_tta-title-text">' . $section['title'] . '</span>';
                    if ( 'true' === $section['add_icon'] ) {
                        $icon_html = '<span class="bravo_js_icon" data-icon="'.$data_icon.'">'.$this_object->constructIcon( $section ).'</span>';
                        if ( 'left' === $section['i_position'] ) {
                            $title = $icon_html . $title;
                        } else {
                            $title = $title . $icon_html;
                        }
                    }
                    $a_html = '<a href="#' . $section['tab_id'] . '" data-vc-tabs data-vc-container=".vc_tta">' . $title . '</a>';
                    $html[] = '<li class="' . implode( ' ', $classes ) . '" data-vc-tab>' . $a_html . '</li>';
                }
            }

            $html[] = '</ul>';
            $html[] = '</div>';

            return apply_filters( 'bravo-tta-get-params-tabs-list', $html, $atts, $content, $this_object );
        }
        static function _add_tab_class($class, $att = array())
        {
            $att = wp_parse_args($att, array(
                'bravo_service_tab' => ''
            ));

            if ($att['bravo_service_tab'] == 'true') {
                $class[] = 'services';
            }

            return $class;
        }

        static function _init_elements()
        {

            vc_add_param('vc_row', array(
                'type'       => 'dropdown',
                'param_name' => 'bravo_overlay',
                'value'      => array(
                    esc_html__('Hide Overlay', 'bs-smarty')  => 'no',
                    esc_html__('Show Overlay', 'bs-smarty') => 'yes',
                ),
                'heading'    => esc_html__('Bravo Parallax', 'bs-smarty'),
            ));
            vc_add_param('vc_row', array(
                'type'       => 'colorpicker',
                'param_name' => 'bravo_overlay_bg',
                'heading'    => esc_html__('Overlay Background Color', 'bs-smarty'),
            ));
            vc_add_param('vc_row', array(
                'type'       => 'attach_image',
                'param_name' => 'bravo_custom_overlay',
                'heading'    => esc_html__('Custom Overlay Image', 'bs-smarty'),
            ));


        }

        static function _init_metabox()
        {
        }
    }

    BravoPage::_init();
}
