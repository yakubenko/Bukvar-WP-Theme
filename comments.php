<?php if(!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) : ?>
	<?php die('You can not access this page directly!'); ?>
<?php endif; ?>

<?php if(!empty($post->post_password)) : ?>
  	<?php if($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
		<p><?php __('This post is password protected. Enter the password to view comments') ?></p>
  	<?php endif; ?>
<?php endif; ?>

<?php if($comments) : ?>	
		<h3 class="all-comments-title"><?php comments_number() ?> </h3>

	<div id="comments">
		<ol id="comments-list">
			<?php wp_list_comments('type=comment&callback=bukvarComments'); ?>
		</ol>
	</div>

<?php else : ?>
	<p class="no-comments" id="comments"><?php e(__('Комментариев нет')) ?></p>
<?php endif; ?>

<?php if(comments_open()) : ?>
	<?php if(get_option('comment_registration') && !$user_ID) : ?>
		<p>Вы должны <a href="<?php e(get_option('siteurl')); ?>/wp-login.php?redirect_to=<?php e(urlencode(get_permalink())); ?>">войти в систему</a>
		чтобы опубликовать комментарий</p>
	<?php else : ?>
		<?php comment_form() ?>
	<?php endif; ?>
	
<?php else : ?>
	<p><?php e(__('Комментарии закрыты')); ?></p>
<?php endif; ?>

