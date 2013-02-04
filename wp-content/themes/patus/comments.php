<?php function uxde_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="comment-body">
			<header class="comment-author vcard clearfix">
				<?php echo get_avatar($comment,$size='60'); ?>
				<?php printf(__('<cite class="fn">%s</cite>', 'uxde'), get_comment_author_link()) ?>
				<time datetime="<?php echo comment_date('c') ?>"><?php _e('on', 'uxde'); ?> <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s', 'uxde'), get_comment_date(),  get_comment_time()) ?></a></time>
				<?php edit_comment_link(__('(Edit)', 'uxde'), '', '') ?>
			</header>

			<div class="reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div>
			<?php if ($comment->comment_approved == '0') : ?>
       			<div class="notice">
					<p class="bottom"><?php _e('Your comment is awaiting moderation.', 'uxde') ?></p>
          		</div>
			<?php endif; ?>
			
			<section class="comment clearfix">
				<?php comment_text() ?>
			</section>
			
		</article>
<?php } ?>

<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die (__('Please do not load this page directly. Thanks!', 'uxde'));

	if ( post_password_required() ) { ?>
	<section id="comments">
		<div class="notice">
			<p class="bottom"><?php _e('This post is password protected. Enter the password to view comments.', 'uxde'); ?></p>
		</div>
	</section>
	<?php
		return;
	}
?>
<?php // You can start editing here. Customize the respond form below ?>
<?php if ( have_comments() ) : ?>
	<section id="comments">
		<div class="comment-header">
		<h3><?php _e('Discussion', 'uxde'); ?> <?php comments_popup_link(__('No Comments', 'uxde'), __('1 Comment', 'uxde'), __('% Comments', 'uxde')); ?></h3>
		<ul>
			<li><a href="#response">Add Comment</a></li>
		</ul>
		</div>
		<ol class="commentlist">
		<?php wp_list_comments('type=comment&callback=uxde_comments'); ?>
		<?php // wp_list_comments(); ?>
		</ol>
		<footer>
			<nav id="comments-nav">
				<div class="comments-previous"><?php previous_comments_link( __( '&larr; Older comments', 'uxde' ) ); ?></div>
				<div class="comments-next"><?php next_comments_link( __( 'Newer comments &rarr;', 'uxde' ) ); ?></div>
			</nav>
		</footer>
	</section>
<?php else : // this is displayed if there are no comments so far ?>
	<?php if ( comments_open() ) : ?>
	<?php else : // comments are closed ?>
	<section id="comments">
		<div class="notice">
			<p class="bottom"><?php _e('Comments are closed.', 'uxde') ?></p>
		</div>
	</section>
	<?php endif; ?>
<?php endif; ?>
<?php if ( comments_open() ) : ?>
<section id="respond">

	<h3><?php comment_form_title( __('Leave a Reply', 'uxde'), __('Leave a Reply to %s', 'uxde') ); ?></h3>
	
	<?php 
		$respond_desc = of_get_option('pt_respond_desc'); 
		
		if($respond_desc != '') :
	?>
	
	<p class="respond_desc"><?php echo stripslashes(htmlspecialchars_decode(nl2br($respond_desc))); ?></p>
	
	<?php endif; ?>
		
	<p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p>
	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
	<p><?php printf( __('You must be <a href="%s">logged in</a> to post a comment.', 'uxde'), wp_login_url( get_permalink() ) ); ?></p>
	<?php else : ?>
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		<?php if ( is_user_logged_in() ) : ?>
		<p><?php printf(__('Logged in as <a href="%s/wp-admin/profile.php">%s</a>.', 'uxde'), get_option('siteurl'), $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php __('Log out of this account', 'uxde'); ?>"><?php _e('Log out &raquo;', 'uxde'); ?></a></p>
		<?php else : ?>
		<a name="respond"></a>
		<p>
		
			<input placeholder="<?php _e('Name', 'uxde'); if ($req) _e(' *', 'uxde'); ?>" type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?>>

			<input placeholder="<?php _e('Email', 'uxde'); if ($req) _e(' *', 'uxde'); ?>" type="email" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?>>

			<input placeholder="<?php _e('Website', 'uxde'); ?>" type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3">
			
		</p>
		<?php endif; ?>
		<p>
			<textarea name="comment" id="comment" tabindex="4"></textarea>
		</p>
		<p id="allowed_tags" class="small"><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></p>
		<p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment', 'uxde'); ?>"></p>
		<?php comment_id_fields(); ?>
		<?php do_action('comment_form', $post->ID); ?>
	</form>
	<?php endif; // If registration required and not logged in ?>
</section>
<?php endif; // if you delete this the sky will fall on your head ?>