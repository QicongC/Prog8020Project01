<?php if ( post_password_required() ) return; ?>

<?php if ( have_comments() ) : ?>

	<div class="comments-container">

		<div class="comments-inner">

			<a name="comments"></a>

			<div class="comments-title-container">

				<h3 class="comments-title">

					<span class="fa fw fa-comment"></span><?php echo count($wp_query->comments_by_type[comment]) . ' ';
					echo _n( 'Comment' , 'Comments' , count($wp_query->comments_by_type[comment]), 'rowling' ); ?>

				</h3>

				<?php if ( comments_open() ) : ?>

					<p class="comments-title-link">

						<a href="#respond"><?php _e('Add Comment','rowling'); ?> &rarr;</a>

					</p>

				<?php endif; ?>

				<div class="clear"></div>

			</div>

			<div class="comments">

				<ol class="commentlist">
				    <?php wp_list_comments( array( 'type' => 'comment', 'callback' => 'rowling_comment' ) ); ?>
				</ol>

				<?php if (!empty($comments_by_type['pings'])) : ?>

					<div class="pingbacks">

						<h3 class="pingbacks-title">

							<?php echo count($wp_query->comments_by_type[pings]) . ' ';
							echo _n( 'Pingback', 'Pingbacks', count($wp_query->comments_by_type[pings]), 'rowling' ); ?>

						</h3>

						<ol class="pingbacklist">
						    <?php wp_list_comments( array( 'type' => 'pings', 'callback' => 'rowling_comment' ) ); ?>
						</ol>

					</div> <!-- /pingbacks -->

				<?php endif; ?>

				<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

					<div class="comments-nav" role="navigation">

						<div class="fleft">

							<?php previous_comments_link( '&larr; ' . __( 'Previous', 'rowling' ) ); ?>

						</div>

						<div class="fright">

							<?php next_comments_link( __( 'Next', 'rowling' ) . ' &rarr;' ); ?>

						</div>

						<div class="clear"></div>

					</div> <!-- /comment-nav -->

				<?php endif; ?>

			</div> <!-- /comments -->

		</div> <!-- /comments-inner -->

	</div> <!-- /comments-container -->

<?php endif; ?>

<?php if ( ! comments_open() && ! is_page() ) : ?>

	<p class="no-comments"><span class="fa fw fa-times"></span><?php _e( 'Comments are Closed', 'rowling' ); ?></p>

<?php endif; ?>

<?php $comments_args = array(

	'title_reply' =>
		'<span class="fa fw fa-pencil"></span>' . _('Leave a Reply'),

	'title_reply_to' =>
		'<span class="fa fw fa-pencil"></span>' . _('Leave a Reply to'),

	'comment_notes_before' =>
		'',

	'comment_notes_after' =>
		'',

	'comment_field' =>
		'<p class="comment-form-comment">
			<label for="comment">' . __('Comment','rowling') . ( $req ? '<span class="required">*</span>' : '' ) . '</label>
			<textarea id="comment" name="comment" cols="45" rows="6" required></textarea>
		</p>',

	'fields' => apply_filters( 'comment_form_default_fields', array(

		'author' =>
			'<p class="comment-form-author">
				<label for="author">' . __('Name','rowling') . ( $req ? '<span class="required">*</span>' : '' ) . '</label>
				<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" />
			</p>',

		'email' =>
			'<p class="comment-form-email">
				<label for="email">' . __('Email','rowling') . ( $req ? '<span class="required">*</span>' : '' ) . '</label>
				<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" />
			</p>',

		'url' =>
			'<p class="comment-form-url">
				<label for="url">' . __('Website','rowling') . '</label>
				<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" />
			</p>')
	),
);

if ( comments_open() ) { echo '<div class="respond-container">'; }

comment_form($comments_args);

if ( comments_open() ) { echo '</div> <!-- /respond-container -->'; }

?>
