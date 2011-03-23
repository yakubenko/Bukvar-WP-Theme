<?php
    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
    ?>


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
		<h4>Все статьи от <?php e($curauth->display_name) ?></h4>

		<?php while(have_posts ()) : the_post(); ?>
				<div <?php post_class(array('wp-post-entry','incategory-entry')); ?>>
					<div class="wp-post-thumbnail">
						<?php the_post_thumbnail('post-list-thumb'); ?>
					</div>


					<div class="wp-post-full-content">
						<h3 class="wp-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

						<div class="wp-post-meta">
							<?php the_time('d M Y') ?> - <a href="<?php comments_link() ?>" class="comments-link">
								<?php e(get_comments_number()) ?>
							</a>
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
		<div class="error-div">
			Извините, но в данной рубрике нет статей. Вы можете воспользоваться формой поиска в правой колонке для поиска интересных материаллов.
		</div>
<?php endif; ?>
