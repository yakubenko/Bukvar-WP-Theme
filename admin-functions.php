<?php
add_action('admin_menu', 'bukvar_theme_options');

function bukvar_theme_options() {
	add_options_page(__('Настройки темы Bukvar'), __('Настройки Bukvar'), 'manage_options', 'bukvar-main-options', 'bukvarMainOptions');
}

function bukvarMainOptions() {
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	echo '<div class="wrap">';
	echo '<p>Here is where the form would go if I actually had options.</p>';
	echo '</div>';
}
?>