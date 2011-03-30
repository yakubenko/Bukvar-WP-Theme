<div class="wrap">

	<?php if(isset($_GET['settings-updated']) && $_GET['settings-updated']=='true'): ?>
		<div id='setting-error-settings_updated' class='updated settings-error'>
		<p><strong><?php _e('Настройки темы оформления сохранены') ?></strong></p></div>
	<?php endif; ?>

	<h2><?php _e('Настройка темы Bukvar') ?></h2>

	<form method="POST" action="options.php">
		<?php settings_fields( 'bukvar-theme-options' ); ?>
		<?php do_settings_fields('bukvar-main-options','bukvar-theme-options' ); ?>

		<?php //wp_nonce_field('update-options'); ?>
		<?php //wp_nonce_field('bukvar_update_options','bukvar_options_page_check') ?>

		<table class="form-table">
			<tr valign="top">
				<th scope="row"><?php _e('Выберите категорию для Featured') ?></th>
				<td>
					<?php wp_dropdown_categories('name=bukvar-featured-category&hide_empty=0&selected='.$featuredCat); ?>
				</td>
			</tr>


			<tr valign="top">
				<th scope="row"><?php _e('Показывать Excert в Featured категории') ?></th>
				<td>
					<input type="checkbox" name="bukvar-show-featured-excert" value="1" <?php e($showFeaturedExcert) ?> />
				</td>
			</tr>


			<tr valign="top">
				<th scope="row"><?php _e('Показывать Extended Footer') ?></th>
				<td>
					<input type="checkbox" name="bukvar-show-extended-footer" value="1" <?php e($showExtendedFooter) ?> />
				</td>
			</tr>


			<tr valign="top">
				<th scope="row"><?php _e('Показывать Metadata для страниц') ?></th>
				<td>
					<input type="checkbox" name="bukvar-show-metadata-for-pages" value="1" <?php e($showMetadataForPages) ?> />
				</td>
			</tr>


			<tr valign="top">
				<th scope="row"><?php _e('Выберите тему оформления') ?></th>
				<td>
					<select name="bukvar-default-skin">
						<?php foreach ($bukvarListSkins as $skin): ?>
							<?php $selectedSkin = ($bukvarCurrentSkin==$skin)?'selected="selected"':'' ?>
							<option <?php echo $selectedSkin ?>><?php echo $skin ?></option>
						<?php endforeach; ?>
					</select>
				</td>
			</tr>
		</table>


<!--		<input type="hidden" name="action" value="update" />
		
		<input type="hidden" name="page_options" value="bukvar-featured-category" />
		<input type="hidden" name="page_options" value="bukvar-show-extended-footer" />
		<input type="hidden" name="page_options" value="bukvar-default-skin" />-->

		

		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save') ?>" />
		</p>

	</form>
</div>
