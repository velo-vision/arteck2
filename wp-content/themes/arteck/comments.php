<?php
	/**
	 * The template for displaying comments
	 *
	 * The area of the page that contains both current comments
	 * and the comment form.
	 *
	 * @package WordPress
	 * @subpackage Twenty_Fifteen
	 * @since Twenty Fifteen 1.0
	 */

	/*
	 * If the current post is protected by a password and
	 * the visitor has not yet entered the password we will
	 * return early without loading the comments.
	 */
	if ( post_password_required() ) {
		return;
	}

?>
	<div class="section-page-dark pad100-70">
		<?php if ( have_comments() ) : ?>
			<h2 class=" no-top-margin"><?php comments_number( esc_html__( 'No comment', 'bs-smarty' ),
					esc_html__( '1 Comment', 'bs-smarty' ), esc_html__( '% Comments', 'bs-smarty' ) ) ?></h2>

			<?php bravo_comment_nav(); ?>


			<?php
			wp_list_comments( array(
				'style'       => 'ol',
				'short_ping'  => true,
				'avatar_size' => 127,
				'callback'    => 'bravo_comment_list'
			) );
			?>

			<?php bravo_comment_nav(); ?>

		<?php endif; // have_comments() ?>

		<?php
			// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
				?>
				<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'bs-smarty' ); ?></p>
			<?php endif; ?>
		<div class="respond_section">
			<?php
				$comment_field = '';
				if ( is_user_logged_in() ) {
					$comment_field = '<div class="form-group">
                                                <textarea class="form-control" id="comment" name="comment" cols="40" rows="5" placeholder="' . esc_html__( 'Write comment',
							'bs-smarty' ) . '"></textarea>
                                        </div>';
				} ?>
			<?php
			$commenter=wp_parse_args($commenter,array(
				'comment_author_email'=>'',
				'comment_author_website'=>'',
				'comment_author'=>''
			));
				$comment_form = array(
					'fields'         => array(

						'author'  => '<div class="row"><div class="col-sm-6"><div class="input-container">'.'<input id="author"  name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" aria-required="true"  class="form-control" placeholder="' . esc_html__( 'Name',
								'bs-smarty' ) . '" />
							                     </div>   ',
						'email'   => '<div class="input-container">' .
						             '<input  placeholder="' . esc_html__( 'Email',
								'bs-smarty' ) . '"  class="form-control" id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" aria-required="true" />
							                 </div><!--End row-->',
						'website'   => '<div class="input-container">' .
						               '<input  placeholder="' . esc_html__( 'Website',
								'bs-smarty' ) . '"  class="form-control" id="website" name="website" type="text" value="' . esc_attr( $commenter['comment_author_website'] ) . '" size="30" aria-required="true" />
							                </div> </div><!--End row-->',
						'message' => '<div class="col-sm-6">
				<div class="input-container">
                                                <textarea class="form-control" id="comment" name="comment" cols="40" rows="5" placeholder="' . esc_html__( 'Message',
								'bs-smarty' ) . '"></textarea>
                                        </div></div> </div>',
					),
					'comment_field'  => $comment_field,
					'class_submit'   => 'submit-small',
					'title_reply'    => '<h2>'.esc_html__( 'Leave a comment', 'bs-smarty' ).'</h2>',
					'title_reply_to' => esc_html__( 'Leave a COMMENT to %s', 'bs-smarty' ),
					'label_submit' => esc_html__( 'Submit Comment', 'bs-smarty' ),
				);

				comment_form( $comment_form ); ?>
		</div>

	</div>
