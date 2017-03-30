<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 3/1/15
 * Time: 6:20 PM
 */
?>

<article <?php post_class('article')?>>

    <?php echo BravoTemplate::load_view('posts/loop',get_post_format()) ?>

    <div class="article-meta-box"><span class="article-icon article-date-icon"></span> <span class="meta-box-text"><?php the_time('d M') ?></span></div>
    <div class="article-meta-box article-meta-comments"><span class="article-icon article-comment-icon"></span> <a href="<?php echo get_comments_link()?>" class="meta-box-text"><?php echo get_comments_number_text(esc_html__('0 Com','bs-smarty'),esc_html__('1 COM','bs-smarty'),esc_html__('%s Com','bs-smarty'));?></a></div>
    <header class="entry-header">
        <?php
        the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
        ?>
    </header><!-- .entry-header -->
    <div class="entry-content">
        <?php
        /* translators: %s: Name of current post */
        the_content( sprintf(
            esc_html__( 'Continue reading %s', 'bs-smarty' ),
            the_title( '<span class="screen-reader-text">', '</span>', false )
        ) );

        wp_link_pages( array(
            'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'bs-smarty' ) . '</span>',
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
            'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'bs-smarty' ) . ' </span>%',
            'separator'   => '<span class="screen-reader-text">, </span>',
        ) );

        ?>
        <div class="sm-margin"></div>
        <div class="article-meta-container clearfix">
            <ul class="article-meta-list pull-left">
                <li><span><?php esc_html_e('Author','bs-smarty')?>:</span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author_meta( 'display_name' ); ?>"><?php the_author_meta( 'display_name' ); ?></a></li>
                <li><?php the_tags()?></li>
                <li><?php echo get_the_term_list(get_the_ID(),'category',esc_html__('Category: ','bs-smarty'))?></li>
            </ul>


            <ul class="social-links social-share clearfix pull-right">
                <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink()?>&amp;title=<?php the_title()?>" target="_blank" class="social-icon icon-facebook" title="<?php esc_html_e('Facebook','bs-smarty')?>"></a></li>
                <li><a href="http://twitter.com/share?url=<?php the_permalink()?>&amp;title=<?php the_title()?>" target="_blank" class="social-icon icon-twitter" title="<?php esc_html_e('Twitter','bs-smarty')?>"></a></li>
                <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink()?>&amp;title=<?php the_title()?>" target="_blank" class="social-icon icon-linkedin" title="<?php esc_html_e('Linkedin','bs-smarty')?>"></a></li>
                <li><a href="mailto:?subject=<?php esc_html_e('I wanted you to see this site','bs-smarty')?>&amp;body=<?php esc_html_e('Check out this site','bs-smarty'); echo  ' '.get_permalink()?>" class="social-icon icon-email no-open" title="<?php esc_html_e('Email','bs-smarty')?>"></a></li>
                <li><a href="https://plus.google.com/share?url=<?php the_permalink() ?>&amp;title=<?php the_title()?>" target="_blank" class="social-icon icon-googleplus" title="<?php esc_html_e('Google +','bs-smarty')?>"></a></li>
            </ul>
        </div>


    </div><!-- .entry-content -->

    <div class="sm-margin"></div>

</article>
<div class="clearfix mb50">
    <?php
    // Previous/next post navigation.
        the_post_navigation( array(
            'next_text' =>
                '<span class="btn btn-custom-5"> <span class="">' . esc_html__( 'Next:', 'bs-smarty' ) . '</span> ' .
                '<span class="post-title">%title</span></span>',
            'prev_text' =>
                '<span class="btn btn-custom-5"><span class="">' . esc_html__( 'Previous:', 'bs-smarty' ) . '</span> ' .
                '<span class="post-title">%title</span></span>',
        ) );
    ?>
</div>
<?php echo BravoTemplate::load_view('posts/author-box') ?>
<?php echo BravoTemplate::load_view('posts/related-posts') ?>
