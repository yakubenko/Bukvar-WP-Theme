<?php if(have_posts ()): ?>
		<h3 class="category-title"><?php _e('Category','bukvar') ?> <span class="single-cat-title"><?php single_cat_title() ?></span> </h3>

		<?php while(have_posts ()) : the_post(); ?>
				<div <?php post_class(array('wp-post-entry','incategory-entry')); ?>>
					
					<?php if(has_post_thumbnail ()):?>
						<div class="wp-post-thumbnail">
							<a href="<?php the_permalink() ?>">
								<?php the_post_thumbnail('post-list-thumb'); ?>
							</a>
						</div>
					<?php endif; ?>


					<div class="wp-post-full-content <?php e(bukvarNoThumbClass()) ?> ">
						<h3 class="wp-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

						<?php bukvarPostMeta(); ?>
						
						<div class="post-content">
							<?php the_content(__('Continue reading','bukvar')); ?>
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
			<?php _e('No articles in this category. Use search to find something.','bukvar'); ?>
		</div>
<?php endif; ?>


