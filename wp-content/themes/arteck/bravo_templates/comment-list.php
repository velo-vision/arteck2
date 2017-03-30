<?php
/**
 * Created by PhpStorm.
 * User: me664
 * Date: 7/15/15
 * Time: 11:27 PM
 */
?>


<div class="comment">
    <div  id="comment-<?php comment_ID(); ?>" <?php comment_class(['single-comment','comment-container']) ?>>
        <div class="comment-avatar">
            <?php echo get_avatar( $comment, 127 ); ?>
        </div>
        <div class="comment-reply">
            <div class="button-gray-light">
                <?php comment_reply_link( array_merge( $args, array( 'add_below' => 'comment', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>

            </div>
        </div>
        <div class="comment-content">
            <p class="comment-author"><?php printf(  '%s', sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?></p>
            <span class="comment-detail"><?php echo get_comment_time(get_option('date_format').' '.get_option('time_format')) ?></span>
            <p><?php comment_text($comment); ?>
            </p>
        </div>
    </div>
</div>