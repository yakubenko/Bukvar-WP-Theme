<div id="login-box">
	Вы на сайте: 
	<ul class="login-links">
		<?php if(!is_user_logged_in()): ?>
			<li><a href="<?php echo wp_login_url() ?>" title="Войти в систему" rel="noindex, nofollow"><?php e(__('Войти')) ?></a></li> &mdash;
			<li><a href="/wp-login.php?action=register" title="Зарегистрироваться" rel="noindex, nofollow"><?php e(__('Присоединиться')) ?></a></li>
		<?php else: ?>
			<?php global $current_user;get_currentuserinfo(); ?>
			<li><a href="<?php e(home_url()) ?>/wp-admin/profile.php" title="Ваш профиль"><?php e(__($current_user->display_name)) ?></a></li> &mdash;
			<li><a href="<?php echo wp_logout_url() ?>"><?php e(__('Выйти')) ?></a></li>
		<?php endif; ?>
	</ul>
</div>
