<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 3/16/15
 * Time: 3:01 PM
 */
if(empty($main_color))
$main_color=bravo_get_option('main_color','#01bab0');

$bg_preload=bravo_get_option('bg_preload');

?>
a:hover,
.main-navigation ul li a:hover,
.main-navigation ul li.current-menu-item> a,
.text-highlight,
/* Fix loi social icon o menu*/
 /*#menu .menu-bottom a, */
.section-page a, .section-page-dark a,
.blog-layout1 .blog-content a, .blog-layout2 .blog-content a, .blog-layout3 .blog-content a, .blog-layout-big .blog-content a, .blog-layout-single .blog-content a,
.post-small:hover .post-small-content,
.blog-layout-big .blog-content h4 a:hover,
.filter-list-alt li a:hover,
.main-navigation ul li.active > a, .main-navigation ul li.active > a:focus, .main-navigation ul li.current-menu-item > a,
.main-navigation ul li.current-menu-item > a:focus,
#all .list-catgs a:hover
{
    color:<?php echo esc_attr($main_color) ?>;
}


#all .button, #all .button-big, #all .button-border-light, #all .button-void,
.bravo-services-tabs.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab > a:hover,
.bravo-services-tabs.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab > a:focus,
.profile-short:hover .profile-short-job,
.main-navigation ul li.current-menu-item> a:after,
.main-navigation ul li a:hover:after,
input[type=submit],
.owl-carousel.top-small-arrows > .owl-controls .owl-next:hover, .owl-carousel.top-small-arrows > .owl-controls .owl-prev:hover,
html.csstransforms3d .pace .pace-progress,
.main-navigation ul li a:after,
#all .list-catgs a:after,
.page-numbers .current,
#all .button-long:hover
{
    background-color:<?php echo esc_attr($main_color) ?>;
}

.post-small .post-small-img:after,
.master-slider .ms-thumb-list.ms-dir-h .ms-thumb-frame.ms-thumb-frame-selected:after{
	border-color:<?php echo esc_attr($main_color) ?>;
}
#all .button-border:hover, #all .button-border-dark:hover, #all .button-border-light:hover, #all .button-simple:hover
{
	background-color: <?php echo esc_attr($main_color) ?>;
	border-color: <?php echo esc_attr($main_color) ?>;
}

.post.standard-blog-item.sticky{
	border:1px solid  <?php echo esc_attr($main_color) ?>;
}
<?php  if($bg_preload) {?>
	#page-loader .loader-square .loader-square-content{
		background-image:url('<?php echo esc_attr($bg_preload) ?>');
	}
<?php }?>
