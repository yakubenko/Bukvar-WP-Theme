<h3><?php _e('Archive for','bukvar') ?> <?php the_time(); ?></h3>

<?php if(have_posts ()): ?>
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
							<?php the_excerpt(); ?>
						</div>
					</div>
				</div>
		<?php endwhile; ?>

			<?php
				if(function_exists('wp_paginate')) {
					wp_paginate();
				}
			?>
<?php else: ?>
		<h3><?php _e('Archive is empty','bukvar') ?></h3>
		<p class="attention-message">
			<?php _e('Nothing found for selected period','bukvar') ?>
		</p>
<?php endif; ?>