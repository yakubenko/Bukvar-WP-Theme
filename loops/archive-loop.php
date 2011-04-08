<h3>Архив статей за <?php the_time('F, Y'); ?></h3>

<?php if(have_posts ()): ?>
		<?php while(have_posts ()) : the_post(); ?>
				<div <?php post_class(array('wp-post-entry','incategory-entry')); ?>>
					<?php $postThumbClass = 'no-thumb'; ?>


					<?php if(has_post_thumbnail ()):?>
						<?php $postThumbClass = '' ?>
						<div class="wp-post-thumbnail">
							<a href="<?php the_permalink() ?>">
								<?php the_post_thumbnail('post-list-thumb'); ?>
							</a>
						</div>
					<?php endif; ?>


					<div class="wp-post-full-content <?php echo $postThumbClass; ?> ">
						<h3 class="wp-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

						<div class="wp-post-meta">
							<?php the_author_posts_link() ?><br/>
							<?php the_time('d M Y') ?> - <a href="<?php comments_link() ?>" class="comments-link"><?php e(get_comments_number()) ?></a>
						</div>


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
		<h3>Архив пуст</h3>
		<p class="attention-message">
			Извините, но за выбранный период статей не было.
		</p>
<?php endif; ?>