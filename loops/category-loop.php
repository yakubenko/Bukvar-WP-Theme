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
							<?php the_content(__('Continue reading','bukvar')); ?>
						</div>
					</div>
				</div>
		<?php endwhile; ?>

			<?php bukvarPages(); ?>
<?php else: ?>
		<h3><?php _e('Category is empty','bukvar'); ?></h3>
		<div class="error-div">
			<?php _e('There is no articles in the category. Use search to find something.','bukvar'); ?>
		</div>
<?php endif; ?>


