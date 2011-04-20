<?php	$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>


	<h3><?php e($curauth->display_name) ?></h3>

	<div class="wp-entry-author-info">
		<div class="author-bio-avatar">
			<?php echo get_avatar($curauth->ID,60); ?>
		</div>

		<div class="author-bio-text">
			<?php e($curauth->display_name.' '.$curauth->user_description); ?>

			<a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a>
		</div>
	</div>


<?php if(have_posts ()): ?>
		<h4><?php _e('All posts by author','bukvar') ?></h4>

		<?php while(have_posts ()) : the_post(); ?>
				<div <?php post_class(array('wp-post-entry','incategory-entry')); ?>>
					<?php if(has_post_thumbnail ()):?>
						<div class="wp-post-thumbnail">
							<a href="<?php the_permalink() ?>">
								<?php the_post_thumbnail('post-list-thumb'); ?>
							</a>
						</div>
					<?php endif; ?>


					<div class="wp-post-full-content <?php e(bukvarNoThumbClass()) ?>">
						<h3 class="wp-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

						<?php bukvarPostMeta(); ?>

						<div class="post-content">
							<?php the_excerpt(); ?>
							<?php wp_link_pages('before=<div class="page-splitter">'.__('Pages:','bukvar').' &after=</div>');?>
						</div>

						<?php bukvarPostTagsAndCats(); ?>
					</div>
				</div>
		<?php endwhile; ?>

		<?php bukvarPages(); ?>
<?php else: ?>
		<h3><?php _e('Category is empty','bukvar'); ?></h3>
		<div class="error-div">
			<?php _e('This author has no posts','bukvar'); ?>
		</div>
<?php endif; ?>
