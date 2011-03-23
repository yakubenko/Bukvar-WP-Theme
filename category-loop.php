<?php if(have_posts ()): ?>
		<h3 class="category-title">Рубрика <span class="single-cat-title"><?php single_cat_title() ?></span> </h3>

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


					<div class="wp-post-full-content <?php e($postThumbClass) ?> ">
						<h3 class="wp-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

						<div class="wp-post-meta">
							<?php the_author_posts_link() ?><br/>
							<?php the_time('d M Y') ?> - <a href="<?php comments_link() ?>" class="comments-link">
								<?php e(get_comments_number()) ?>
							</a>
						</div>


						<div class="post-content">
							<?php the_content(__('Читать полностью ...')); ?>
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
		<h3><?php _e('Рубрика пуста'); ?></h3>
		<div class="error-div">
			<?php _e('Извините, но в данной рубрике нет статей.
				Вы можете воспользоваться формой поиска в
				правой колонке для поиска интересных материаллов.'); ?>
		</div>
<?php endif; ?>


