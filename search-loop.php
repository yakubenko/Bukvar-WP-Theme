<?php if(have_posts ()): ?>
		<h3>Результаты поиска для <?php the_search_query() ?> ...</h3>

		<?php while(have_posts ()) : the_post(); ?>
				<div <?php post_class(array('wp-post-entry','incategory-entry')); ?>>
					<div class="wp-post-thumbnail">
						<?php the_post_thumbnail('post-list-thumb'); ?>
					</div>


					<div class="wp-post-full-content">
						<h3 class="wp-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

						<div class="wp-post-meta">
							<?php the_author_posts_link() ?><br/>
							<?php the_date('d M Y') ?> - <a href="<?php comments_link() ?>" class="comments-link"><?php e(get_comments_number()) ?></a>
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
		<h3><?php _e('По вашему запросу ничего не найдено') ?></h3>
		<div class="error-div">
			<?php _e('Извините, но мы не можем найти материалов, которые соответствуют заданным критериям поиска') ?>
		</div>
<?php endif; ?>
