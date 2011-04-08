<?php $showLoginBox = get_option('bukvar-show-loginbox','0') ?>

<?php if($showLoginBox=='1'): ?>
<div id="login-box">
	<?php _e('You on the blog:','bukvar') ?>
	<ul class="login-links">
		<?php if(!is_user_logged_in()): ?>
			<li><a href="<?php echo wp_login_url() ?>" title="<?php _e('Login','bukvar') ?>" rel="noindex, nofollow"><?php e(__('Login','bukvar')) ?></a></li> &mdash;
			<li><a href="/wp-login.php?action=register" title="<?php _e('Register','bukvar') ?>" rel="noindex, nofollow"><?php e(__('Register','bukvar')) ?></a></li>
		<?php else: ?>
			<?php global $current_user;get_currentuserinfo(); ?>
			<li><a href="<?php e(home_url()) ?>/wp-admin/profile.php" title="<?php _('Your profile','bukvar') ?>">
				<?php e(__($current_user->display_name)) ?></a></li> &mdash;
			<li><a href="<?php echo wp_logout_url() ?>"><?php e(__('Logout','bukvar')) ?></a></li>
		<?php endif; ?>
	</ul>
</div>
<?php endif; ?>