<div class="wrap">

	<?php if(isset($_GET['settings-updated']) && $_GET['settings-updated']=='true'): ?>
		<div id='setting-error-settings_updated' class='updated settings-error'>
		<p><strong><?php _e('Bukvar settings saved','bukvar') ?></strong></p></div>
	<?php endif; ?>

	<h2><?php _e('Settings for The Bukvar Theme','bukvar') ?></h2>

	<form method="POST" action="options.php">
		<?php settings_fields( 'bukvar-theme-options' ); ?>
		<?php do_settings_fields('bukvar-main-options','bukvar-theme-options' ); ?>

		

		<table class="form-table">
			<tr valign="top">
				<th scope="row"><?php _e('Choose category with Featured posts','bukvar') ?></th>
				<td>
					<?php wp_dropdown_categories('name=bukvar-settings[bukvar-featured-category]&hide_empty=0&selected='.$featuredCat); ?>
				</td>
			</tr>


			<tr valign="top">
				<th scope="row"><?php _e('Show excert in "Featured posts"','bukvar') ?></th>
				<td>
					<input type="checkbox" name="bukvar-settings[bukvar-show-featured-excert]" value="1" <?php e($showFeaturedExcert) ?> />
				</td>
			</tr>


			<tr valign="top">
				<th scope="row"><?php _e('Show footer','bukvar') ?></th>
				<td>
					<input type="checkbox" name="bukvar-settings[bukvar-show-extended-footer]" value="1" <?php e($showExtendedFooter) ?> />
				</td>
			</tr>


			<tr valign="top">
				<th scope="row"><?php _e('Show Metadata for Pages','bukvar') ?></th>
				<td>
					<input type="checkbox" name="bukvar-settings[bukvar-show-metadata-for-pages]" value="1" <?php e($showMetadataForPages) ?> />
				</td>
			</tr>


			<tr valign="top">
				<th scope="row"><?php _e('Show Login box in sidebar','bukvar') ?></th>
				<td>
					<input type="checkbox" name="bukvar-settings[bukvar-show-loginbox]" value="1" <?php e($showLoginBox) ?> />
				</td>
			</tr>




			<tr valign="top">
				<th scope="row"><?php _e('Choose deafult skin','bukvar') ?></th>
				<td>
					<select name="bukvar-settings[bukvar-default-skin]">
						<?php foreach ($bukvarListSkins as $skin): ?>
							<?php $selectedSkin = ($bukvarCurrentSkin==$skin[0])?'selected="selected"':'' ?>
							<?php $parent = ($skin[1]['parent']!='')?' ('.__('based on ','bukvar').$skin[1]['parent'].')':'' ?>
							<option <?php echo $selectedSkin ?> value="<?php echo $skin[0] ?>"><?php echo $skin[1]['name'].$parent ?></option>
						<?php endforeach; ?>
					</select>
				</td>
			</tr>
		</table>

		

		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Bukvar settings','bukvar') ?>" />
		</p>

	</form>
</div>
