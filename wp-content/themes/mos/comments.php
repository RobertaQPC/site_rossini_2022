<?php if (!empty($_SERVER['SCRIPT_FILENAME']) and 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) die ('Please do not load this page directly. Thanks!'); ?>
<?php if (post_password_required()): ?>
	This post is password protected. Enter the password to view comments.
<?php endif; ?>

<?php if (have_comments()): ?>
	<h2 id="comments-header"><?php comments_number('No Responses', 'One Response', '% Responses' );?></h2>
	<div class="comments-navigation">
		<div class="next-posts"><?php previous_comments_link() ?></div>
		<div class="prev-posts"><?php next_comments_link() ?></div>
	</div>
	<ol id="comment-list">
		<?php wp_list_comments(); ?>
	</ol>
	<div class="comments-navigation">
		<div class="next-posts"><?php previous_comments_link() ?></div>
		<div class="prev-posts"><?php next_comments_link() ?></div>
	</div>
 <?php else: // this is displayed if there are no comments so far ?>
	<?php if (comments_open()): ?>
		<p class="no-coments"><?php esc_html_e( 'Nessun commento finora', 'mos-theme-blog' ); ?>.</p>
	 <?php else: // Commenti disabilitati ?>
		<p class="close-coments"><?php esc_html_e( 'Commenti disabilitati', 'mos-theme-blog' ); ?>.</p>
	<?php endif; ?>
<?php endif; ?>

<?php if ( comments_open() ): ?>
	<div id="comment-form-container">
		<h2 id="comment-form-title"><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h2>
		<div class="cancel-comment_reply">
			<?php cancel_comment_reply_link() ?>
		</div>
		<?php if (get_option('comment_registration') and !is_user_logged_in()): ?>
			<p>You must be <a href="<?= wp_login_url(get_permalink()) ?>">logged in</a> to post a comment.</p>
		<?php else: ?>
		<form action="<?= get_option('siteurl') ?>/wp-comments-post.php" method="post" class="comment-form">
			<?php if (is_user_logged_in()): ?>
				<p>Logged in as <a href="<?= get_option('siteurl') ?>/wp-admin/profile.php"><?= $user_identity ?></a>. <a href="<?= wp_logout_url(get_permalink()) ?>" title="Log out of this account">Log out &raquo;</a></p>
			<?php else : ?>
				<div class="input-wrap text<?= ($req) ? ' required' : ''?>">
					<label for="input-author"><?php esc_html_e( 'Nome', 'mos-theme-blog' ); ?></label>
					<input type="text" name="author" id="input-author" value="<?= esc_attr($comment_author) ?>"<?= ($req) ? ' aria-required="true"' : '' ?> />
				</div>
				<div class="input-wrap text<?= ($req) ? ' required' : ''?>">
					<label for="input-email">Mail</label>
					<input type="text" name="email" id="input-email" value="<?= esc_attr($comment_author_email) ?>"<?= ($req) ? ' aria-required="true"' : '' ?> />
				</div>
				<div class="input-wrap text<?= ($req) ? ' required' : ''?>">
					<label for="input-url">Website</label>
					<input type="text" name="url" id="input-url" value="<?= esc_attr($comment_author_url) ?>" />
				</div>
			<?php endif; ?>
			<div class="input-wrap textarea<?= ($req) ? ' required' : ''?>">
				<label for="input-comment"><?php esc_html_e( 'Messaggio', 'mos-theme-blog' ); ?></label>
				<textarea name="comment" id="input-comment"></textarea>
				<p class="caption"><?php esc_html_e( 'Puoi usare questi tags', 'mos-theme-blog' ); ?> <code><?= allowed_tags() ?></code></p>
			</div>
			<div class="input-wrap submit">
				<a class="btnScheda"><input class="button " type="submit" value="  <?php esc_html_e( 'Invia un commento', 'mos-theme-blog' ); ?>" /></a>
				<?php comment_id_fields() ?>
			</div>
			<?php do_action('comment_form', $post->ID) ?>
		</form>
		<?php endif; ?>
	</div>
<?php endif; ?>
