<?php if(have_posts ()): ?>
		<h3><?php _e('Search results for','bukvar') ?> <?php the_search_query() ?> ...</h3>

		<?php while(have_posts ()) : the_post(); ?>
				<div <?php post_class(array('wp-post-entry','incategory-entry')); ?>>
					<div class="wp-post-thumbnail">
						<?php the_post_thumbnail('post-list-thumb'); ?>
					</div>


					<div class="wp-post-full-content">
						<h3 class="wp-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

						<?php bukvarPostMeta(); ?>


						<div class="post-content">
							<?php the_excerpt(); ?>
						</div>
					</div>
				</div>
		<?php endwhile; ?>

		<?php bukvarPages(); ?>
<?php else: ?>
		<h3><?php _e('There is nothing found for your query','bukvar') ?></h3>
		<div class="error-div">
			<?php _e('We are very sorry, but we cant find something relative to your search query.','bukvar') ?>
		</div>
<?php endif; ?>
