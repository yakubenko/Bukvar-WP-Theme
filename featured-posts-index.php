<?php global $featuredCategory; ?>

<?php $featured = new WP_Query('cat='.$featuredCategory.'&posts_per_page=5'); ?>

<?php if($featured->have_posts()): ?>
	<?php while($featured->have_posts()): $featured->the_post(); ?>
		
		<div <?php post_class('wp-post-entry-featured'); ?>>
			<h3 class="wp-post-title-featured"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

			
			<div class="wp-post-thumbnail-featured">
				<a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
					<?php the_post_thumbnail('featured-thumb'); ?>
				</a>
			</div>


			<div class="wp-post-full-content-featured">
				<?php $showFeaturedExcert = get_option('bukvar-show-featured-excert','0'); ?>

				<?php if($showFeaturedExcert=='1'): ?>
				<div class="post-content">
					<?php the_excerpt(); ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	<?php endwhile; ?>
<?php endif; ?>
