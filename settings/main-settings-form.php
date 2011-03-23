<div class="wrap">
	<h2><?php _e('Настройка темы Bukvar') ?></h2>

	<form method="post" action="options.php">
		<?php wp_nonce_field('update-options'); ?>
		<?php wp_nonce_field('bukvar_update_options','bukvar_options_page_check') ?>

		<table class="form-table">
			<tr valign="top">
				<th scope="row"><?php _e('Выберите категорию для Featured') ?></th>
				<td>
					<?php wp_dropdown_categories('name=bukvar-featured-category&hide_empty=0&selected='.$featuredCat); ?>
				</td>
			</tr>
		</table>


		<input type="hidden" name="action" value="update" />
		<input type="hidden" name="page_options" value="bukvar-featured-category" />

		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>

	</form>
</div>
