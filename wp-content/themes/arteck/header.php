<?php
/**
 * Created by Velosoft.
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); ?>
</head>
<?php
    $positionMenu = bravo_menu_pos();
;?>

<body <?php body_class(); ?>>
<?php
if(bravo_get_option('gen_enable_preload')=='on') {
    ?>
    <div id="page-loader" >
        <div class="loader-square loader-square-1">
            <div class="loader-square-content">
                <div class="loader-square-inner bg-pattern dark-screen"></div>
            </div>
        </div>
        <div class="loader-square loader-square-2">
            <div class="loader-square-content">
                <div class="loader-square-inner bg-pattern dark-screen"></div>
            </div>
        </div>
        <div class="loader-square loader-square-3">
            <div class="loader-square-content">
                <div class="loader-square-inner bg-pattern dark-screen"></div>
            </div>
        </div>
        <div class="loader-square loader-square-4">
            <div class="loader-square-content">
                <div class="loader-square-inner bg-pattern dark-screen"></div>
            </div>
        </div>
        <div class="loader-square loader-square-5">
            <div class="loader-square-content">
                <div class="loader-square-inner bg-pattern dark-screen"></div>
            </div>
        </div>
        <div class="loader-square loader-square-6">
            <div class="loader-square-content">
                <div class="loader-square-inner bg-pattern dark-screen"></div>
            </div>
        </div>
        <div class="loader-square loader-square-7">
            <div class="loader-square-content">
                <div class="loader-square-inner bg-pattern dark-screen"></div>
            </div>
        </div>
        <div class="loader-square loader-square-8">
            <div class="loader-square-content">
                <div class="loader-square-inner bg-pattern dark-screen"></div>
            </div>
        </div>
        <div class="loader-square loader-square-9">
            <div class="loader-square-content">
                <div class="loader-square-inner bg-pattern dark-screen"></div>
            </div>
        </div>
        <div class="loader-container">
            <div class="loader-content">
                <img class="loader-logo" alt="<?php echo esc_html__('logo','bs-smarty') ?>" src="<?php echo bravo_get_option('logo_preload');?>">
            </div>
        </div><!-- .loader-container -->
        <div class="loader-footer">
            <?php echo bravo_get_option('preload_copyright') ?>

        </div>
    </div><!-- #page-loader -->

    <?php
}

?>

<!-- =========================
     START HEADER SECTION
============================== -->
<div  id="all">
    <div id="menu">
        <div class="menu-container">
            <div class="menu-inner">
                <div class="logo-container">
                    <a href="<?php echo esc_url(home_url('/')) ?>">
                    <?php if(bravo_get_option('logo')){?>
                    <img alt="<?php esc_html_e('Logo','bs-smarty')?>" src="<?php echo  bravo_get_option('logo');?>">
                    <?php } ?>
                    </a>
                </div>
                <nav class="main-navigation">
                    <?php
                        $menuId = get_post_meta(get_the_ID(),'menu_id',true);
                        if(!empty($menuId)){
                            wp_nav_menu(array('menu'=>$menuId));
                        }else{
                            if(has_nav_menu('primary')){
                                wp_nav_menu(array('theme_option'=>'primary'));
                            }
                        }

                    ;?>
                </nav>
                <div class="menu-content">
                    <?php echo BravoTemplate::load_view('menu-content') ?>
                </div>
                <div class="menu-bottom">
                    <div class="text-center " style="margin-top:10px;">
                        <?php
                            $social = bravo_get_option('gen_social_list',array());
                            if(!empty($social)):foreach($social as $value):
                            ;?>
                        <a href="<?php echo esc_attr($value['url_social']); ?>"><?php echo ($value['icon_social']); ?></a>
                        <?php endforeach;endif;?>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                        <p>by Velosoft</p>
                            
                        </div>
                    </div>
                    <div class="margin-10"></div>
					<?php echo bravo_get_option('menu_copy_right') ?>
                </div>
            </div><!-- .menu-inner -->
        </div><!-- .menu-container -->
    </div><!-- #menu -->
    <div id="menu-trigger">
        <i class="fa fa-reorder"></i>
    </div>


<!-- END HEADER-->
