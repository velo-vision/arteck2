<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
$sidebar=bravo_get_sidebar();
$sidebar_pos=$sidebar['position'];
get_header();
$ex_class=false;
$ex_class=BravoAssets::build_css('
    background-image:url('.apply_filters('bs_blog_header_image',bravo_get_option('post_blog_image')).');
');

?>
    <!-- BLOG PAGE TITLE test  -->

    <div class="blog_header parallax <?php echo esc_attr($ex_class) ?>" >
        <div class="blog_header_overlay ">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section_header">
                            <h1><?php esc_html_e( 'Oops! That page can"t be found.', 'bs-smarty' ); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single_blog_page type_one">
        <div class="container">
            <div class="row">
                <?php if($sidebar['position']=='left') get_sidebar(); ?>
                <div class="col-md-<?php echo ($sidebar['position']=='no')?12:9; ?>">
                    <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'bs-smarty'); ?></p>

                    <?php get_search_form(); ?>
                </div>
                <?php if($sidebar['position']=='right') get_sidebar(); ?>
            </div>
        </div>
    </div>
<?php
get_footer();