<?php
/**
 * Created by Velosoft.
 */

if (!class_exists('BravoGeneral')) {

    class BravoGeneral
    {
        static function _init()
        {
            //Default Framwork Hooked

            add_action('wp', array(__CLASS__, '_setup_author'));
            add_action('after_setup_theme', array(__CLASS__, '_after_setup_theme'));
            add_action('widgets_init', array(__CLASS__, '_add_sidebars'));

            add_action('wp_enqueue_scripts', array(__CLASS__, '_add_scripts'));

            //Custom hooked
            add_filter('bravo_get_sidebar', array(__CLASS__, '_blog_filter_sidebar'));
            add_action('init', array(__CLASS__, '_init_elements'));
            //add_action('bravo_before_main_content', array(__CLASS__, '_add_breadcrumb'));
            add_action('wp_head', array(__CLASS__, '_show_custom_css'), 100);

            add_filter('body_class', array(__CLASS__, '_add_body_class'));

            add_action('wp_head', array(__CLASS__, '_add_custom_head'));



            // Header image
            add_action('bravo_header_image_src', array(__CLASS__, '_home_page_header_img'));

            add_filter('st_blog_title',array(__CLASS__,'_st_blog_title'));

            add_filter( 'excerpt_length',array(__CLASS__,'_excerpt_length') );


            add_filter('bs_blog_single_header_image',array(__CLASS__,'_change_image'));

            if(class_exists('WpbakeryShortcodeParams')){

                WpbakeryShortcodeParams::addField( 'add_social', array(__CLASS__,'add_social_param'), BravoAssets::url('js/vc_js.js') );

            }

            add_filter('get_the_archive_title',array(__CLASS__,'_change_archive_title'));
        }

        static function _change_archive_title($title)
        {
            if(is_search()){
                $title=sprintf(esc_html__("Resultados: %s",'bs-smarty'),get_query_var('s'));
            }
            return $title;
        }
        static function add_social_param($settings, $value)
        {
            $val = $value;
            $html = '<div class="st_add_social">';

            parse_str(urldecode($value), $social);

            if(is_array($social))
            {
                $i = 1;
                foreach ($social as $key => $value) {
                    if(!isset($value['url'])) $value['url'] = '';
                    $html .= '<div class="social-item" data-item="'.$i.'">';
                    $html .= '<label>Social '.$i.':</label></br><label>Icon </label><input style="width:65%;margin-right:10px;margin-bottom:15px" class="st-social st_iconpicker" name="'.$i.'[social]" value="'.$value['social'].'" type="text" ></br>';
                    $html .= '<label>Link </label><input style="width:65%;margin-right:10px;margin-bottom:15px" class="st-social" name="'.$i.'[url]" value="'.$value['url'].'" type="text" >';
                    $html .= '<a style="color:red" href="#" class="st-del-item">Delete</a>';
                    $html .= '</div>';
                    $i++;
                }
            }
            $html .= '</div>';
            $html .= '<div class="st-add"><button class="vc_btn vc_btn-primary vc_btn-sm st-button-add" type="button">'.esc_html__('Add social', 'bs-smarty').' </button></div>';
            $html .= '<input name="'.$settings['param_name'].'" class="st-social-value wpb_vc_param_value wpb-textinput '.$settings['param_name'].' '.$settings['type'].'_field" type="hidden" value="'.$val.'" >';
            return $html;
        }
        static function _change_image($src){
            if(is_singular()){
                if($meta=get_post_meta(get_the_ID(),'_header_image',true)){
                    $src=$meta;
                }
            }

            return $src;

        }
        static function _excerpt_length($length)
        {
            return bravo_get_option('post_exerpt_length',$length);
        }

        static function _st_blog_title($title)
        {
            if(is_archive()){
                $title=get_the_archive_title();
            }

            if(is_search()){
                $title= sprintf( esc_html__( 'Search Results for: %s', 'bs-smarty' ), get_search_query() );

            }
            return $title;
        }
        static function _home_page_header_img($image_src)
        {
            if (is_page_template('template-blank.php')) {
                $image_src = bravo_get_option('header_image', $image_src);
            }

            if (is_singular()) {
                if ($meta = get_post_meta(get_the_ID(), '_header_image', true)) {
                    $image_src = $meta;
                }
            }

            return $image_src;
        }

        static function _add_body_class($class)
        {
            $menu = bravo_get_option('menu_width_fullwidth', 'on');
            if (is_singular()) {
                $meta = get_post_meta(get_the_ID(), 'menu_width_fullwidth', true);
                if ($meta) $menu = $meta;
            }

            $transparent_header = bravo_get_option('transparent_header', 'off');
            if (is_singular() and get_post_meta(get_the_ID(), 'custom_header_style', true) == 'on') {
                $meta = get_post_meta(get_the_ID(), 'transparent_header', true);
                if ($meta) $transparent_header = $meta;
            }

            if ($transparent_header == 'on') {
                $class[] = 'header_transparent';
            }

            if ($menu == 'on')
                $class[] = 'bravo_fullwidth_menu';
            else
                $class[] = 'bravo_boxed_menu';


            $class[] = 'woocommerce';

			if(bravo_get_option('gen_enable_preload')=='on'){
				$class[]='gen_enable_preload';
			}


            $positionMenu = bravo_menu_pos();
            $class[]=$positionMenu.'-menu';

            return $class;
        }

        static function _show_custom_css()
        {
            echo "\n";
            $style = BravoTemplate::load_view('custom_css');
            ?>
            <style id="bravo_cutom_css">
                <?php echo ($style);?>
            </style>

            <style>
                <?php echo bravo_get_option('style_custom_css') ?>
            </style>
            <?php
            echo "\n";

        }

        static function _add_breadcrumb()
        {
            get_template_part('bc');
        }

        static function _init_elements()
        {

        }

        static function _blog_filter_sidebar($sidebar)
        {
            $pos = bravo_get_option('page_sidebar_pos', 'right');
            $sidebar_id = bravo_get_option('page_sidebar_id', 'blog-sidebar');
            if (is_singular()) {

                $sidebar_id = bravo_get_option('page_single_sidebar_id', 'blog-sidebar');

                if ($meta = get_post_meta(get_the_ID(), 'sidebar_id', true)) {
                    $sidebar_id = $meta;
                }

            }
            if ($sidebar_id) {
                $sidebar['id'] = $sidebar_id;
            }

            $sidebar['position'] = $pos;
            if (is_singular()) {
                $sidebar['position']  = bravo_get_option('page_single_sidebar_pos', 'right');
                if ($meta = get_post_meta(get_the_ID(), 'sidebar_pos', true)) {
                    $sidebar['position'] = $meta;
                }
            }
            if (BravoInput::get('sidebar_pos')) {
                $sidebar['position'] = BravoInput::get('sidebar_pos');
            }
            if (BravoInput::get('sidebar_id')) {
                $sidebar['id'] = BravoInput::get('sidebar_id');
            }


            return $sidebar;
        }

        static function _top_page()
        {
            echo BravoTemplate::load_view('top_page');
        }

        static function _add_scripts()
        {
            /*
             * Javascript
             * */



            wp_enqueue_script('bootstrap.min.js',BravoAssets::url('js/bootstrap.min.js'),array('jquery'),null,true);
            wp_enqueue_script('waypoints.min.js',BravoAssets::url('js/waypoints.min.js'),array('jquery'),null,true);
            wp_enqueue_script('lightbox.js',BravoAssets::url('js/lightbox.min.js'),array('jquery'),null,true);
            wp_enqueue_script('owl.carousel.min.js',BravoAssets::url('js/owl.carousel.min.js'),array('jquery'),null,true);
            wp_enqueue_script('jquery.nicescroll.min.js',BravoAssets::url('js/jquery.nicescroll.min.js'),array('jquery'),null,true);
            wp_enqueue_script('jquery.nav.min.js',BravoAssets::url('js/jquery.nav.min.js'),array('jquery'),null,true);
            wp_enqueue_script('jquery.scrollTo.min.js',BravoAssets::url('js/jquery.scrollTo.min.js'),array('jquery'),null,true);
            wp_enqueue_script('isotope.pkgd.min.js',BravoAssets::url('js/isotope.pkgd.min.js'),array('jquery'),null,true);
            wp_enqueue_script('jquery.inview.min.js',BravoAssets::url('js/jquery.inview.min.js'),array('jquery'),null,true);

			if(bravo_get_option('gen_enable_preload')=='on')
            wp_enqueue_script('pace.min.js',BravoAssets::url('js/pace.min.js'),array('jquery'),null,true);


            wp_enqueue_script('modernizr.min.js',BravoAssets::url('js/modernizr.min.js'),array('jquery'),null,true);
            wp_enqueue_script('bs-custom.js',BravoAssets::url('js/custom.js'),array('jquery'),null,true);
            $http=is_ssl()?'https':'http';
            wp_enqueue_script( 'google-map-api', $http."://maps.googleapis.com/maps/api/js", array('jquery'), null,true );



            if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

            $data = array(
                'ajaxurl'   => esc_url(admin_url('admin-ajax.php')),
                'site_url'  => site_url(),
                'theme_url' => get_template_directory_uri(),
            );
            wp_localize_script('bootstrap', 'ajax_param', $data);
            wp_localize_script('jquery', 'paceOptions', array(
                'ajax'=>false
            ));

            wp_localize_script('jquery', 'bravo_params', array(
                'on_loading_text' => esc_html__("Loading ....", 'bs-smarty'),
                'loadmore_text'   => esc_html__('Load More', 'bs-smarty'),
                'ajax_url'        => esc_url(admin_url('admin-ajax.php')),
                'nomore_text'     => esc_html__('No More', 'bs-smarty')
            ));


            // Style
            add_editor_style();
            $roboto=add_query_arg( 'family', urlencode( 'Roboto:400,700,900,900italic,700italic,400italic' ), "//fonts.googleapis.com/css" );
            $fjalla=add_query_arg( 'family', urlencode( 'Fjalla One' ), "//fonts.googleapis.com/css" );
            wp_register_style('font-Roboto',$roboto);
            wp_register_style('font-Fjalla',$fjalla);
            wp_register_style('font-awesome.min.css',BravoAssets::url('css/font-awesome.min.css'));
            wp_register_style('bootstrap.min.css',BravoAssets::url('css/bootstrap.min.css'));
            wp_register_style('owl.carousel.css',BravoAssets::url('css/owl.carousel.css'));
            wp_register_style('lightbox.css',BravoAssets::url('css/lightbox.css'));
            wp_register_style('animate.min.css',BravoAssets::url('css/animate.min.css'));
            wp_register_style('bs-main.css',BravoAssets::url('css/main.css'));
            wp_register_style('bs-custom.css',BravoAssets::url('css/custom.css'));
            wp_register_style('bs-ht.css',BravoAssets::url('css/ht.css'));


            wp_enqueue_style('bs-main-style',get_template_directory_uri().'/style.css');

            wp_enqueue_style('font-Roboto');
            wp_enqueue_style('font-Fjalla');
            wp_enqueue_style('font-awesome.min.css');
            wp_enqueue_style('bootstrap.min.css');
            wp_enqueue_style('owl.carousel.css');
            wp_enqueue_style('lightbox.css');
            wp_enqueue_style('animate.min.css');
            wp_enqueue_style('bs-main.css');
            wp_enqueue_style('bs-custom.css');
            wp_enqueue_style('bs-ht.css');

            if(bravo_get_option('gen_enable_dark_style')=='on'){
                wp_enqueue_style('bs-dark-layout',BravoAssets::url('css/dark-version.css'));
            }else{
                wp_enqueue_style('bs-light-layout',BravoAssets::url('css/white.css'));
            }

        }



        // -----------------------------------------------------
        // Default Hooked, Do not edit

        /**
         * Hook setup theme
         *
         *
         * */

        static function _after_setup_theme()
        {
            /*
             * Make theme available for translation.
             * Translations can be filed in the /languages/ directory.
             * If you're building a theme based on stframework, use a find and replace
             * to change $st_textdomain to the name of your theme in all the template files
             */

            // This theme uses wp_nav_menu() in one location.
            $menus = BravoConfig::get('nav_menus');
            if (is_array($menus) and !empty($menus)) {
                register_nav_menus($menus);
            }


            //Theme supports from config

            add_theme_support('automatic-feed-links');
            add_theme_support('post-thumbnails');
            add_theme_support('html5', array(
                'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
            ));
            add_theme_support('post-formats', array(
                'image', 'video', 'gallery', 'audio', 'quote'
            ));
            add_theme_support('woocommerce');
            add_theme_support('custom-header', array());
            add_theme_support('custom-background', array());
            add_theme_support('title-tag', array());

            if (!isset($content_width)) $content_width = 900;

        }

        /**
         * Add default sidebar to website
         *
         *
         * */
        static function _add_sidebars()
        {
            // From config file
            $sidebars = BravoConfig::get('sidebars');
            if (is_array($sidebars) and !empty($sidebars)) {
                foreach ($sidebars as $value) {
                    register_sidebar($value);
                }
            }

        }


        /**
         * Set up author data
         *
         * */
        static function _setup_author()
        {
            global $wp_query;

            if ($wp_query->is_author() && isset($wp_query->post)) {
                $GLOBALS['authordata'] = get_userdata($wp_query->post->post_author);
            }
        }


        /**
         * Hook to wp_title
         *
         * */
        static function _wp_title($title, $sep)
        {
            if (is_feed()) {
                return $title;
            }

            global $page, $paged;

            // Add the blog name
            $title .= get_bloginfo('name', 'display');

            // Add the blog description for the home/front page.
            $site_description = get_bloginfo('description', 'display');
            if ($site_description && (is_home() || is_front_page())) {
                $title .= " $sep $site_description";
            }

            // Add a page number if necessary:
            if (($paged >= 2 || $page >= 2) && !is_404()) {
                $title .= " $sep " . sprintf(esc_html__('Page %s', 'bs-smarty'), max($paged, $page));
            }

            return $title;
        }

        /**
         * Hook to add_custom_head
         *
         * */
        static function _add_custom_head()
        {
//            $adv_ga_code = bravo_get_option('adv_ga_code');
//            if (!empty($adv_ga_code)) {
//                echo balanceTags($adv_ga_code);
//            }

            self::_add_favicon();
        }


        static function _add_favicon()
        {
            if ( function_exists( 'has_site_icon' ) and  has_site_icon() )return;

            $favicon = bravo_get_option('favicon');
            if(!$favicon) return;

            $ext = pathinfo($favicon, PATHINFO_EXTENSION);

            //if(strtolower($ext)=="pne")

            $type = "";

            switch (strtolower($ext)) {

                case "png":
                    $type = "image/png";
                    break;

                case "jpg":
                    $type = "image/jpg";
                    break;

                case "jpeg":
                    $type = "image/jpeg";
                    break;

                case "gif":
                    $type = "image/gif";
                    break;
            }

            echo '<link rel="icon"  type="' . esc_attr($type) . '"  href="' . esc_url($favicon) . '">';
        }

        static function _change_favicon(){

        }


    }

    BravoGeneral::_init();
}