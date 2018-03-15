<?php
if ( ! function_exists( 'molecular_theme_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function molecular_theme_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<?php echo get_avatar( $comment, 20 ); ?>
		<div class="comment-body">
			<?php _e( 'Pingback:', 'molecular' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'molecular' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php 

						$cd = get_comment_date();
						$ct = get_comment_time();
						$ctr = get_comment_time('c');

					 ?>
					 <table class="comment-meta-table">
					 	<tr>
					 		<td><?php echo get_avatar( $comment, 30 ); ?></td>
					 		<td><?php echo get_comment_author_link(); ?></td>
					 		<td>&#10148;</td>
					 		<td><?php echo time2str( $ctr ); ?></td>
					 		<td>&#10148;</td>
					 		<td>
								<?php
									comment_reply_link( array_merge( $args, array(
										'add_below' => 'div-comment',
										'depth'     => $depth,
										'max_depth' => $args['max_depth'],
										'before'    => '',
										'after'     => '',
									) ) );
								?>
					 		</td>
					 	</tr>
					 </table>
				</div><!-- .comment-author -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'molecular' ); ?></p>
				<?php endif; ?>
			</footer><!-- .comment-meta -->

			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->

		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for molecular_theme_comment()
?>