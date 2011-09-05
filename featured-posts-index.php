<?php global $featuredCategory,$bukvarSettings; ?>

<?php $featured = new WP_Query('cat='.$featuredCategory.'&posts_per_page=5'); ?>

<?php if($featured->have_posts()): ?>
	<?php while($featured->have_posts()): $featured->the_post(); ?>

		<?php $hasThumb = has_post_thumbnail(); ?>
		<?php $thumbFeaturedClassname = ($hasThumb)?'with-thumb':'no-thumb' ?>

		<div <?php post_class(array('wp-post-entry-featured',$thumbFeaturedClassname) ); ?>>
			
			<?php if($hasThumb):?>
				<div class="wp-post-thumbnail-featured">
					<a href="<?php the_permalink() ?>" title="<?php the_title() ?>">
						<?php the_post_thumbnail('featured-thumb'); ?>
					</a>
				</div>
			<?php endif; ?>

			<h3 class="wp-post-title-featured"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			
			<div class="wp-post-meta">
				<?php the_time(get_option('date_format')) ?> - <a href="<?php comments_link() ?>" class="comments-link">
					<?php e(get_comments_number()) ?>
				</a>
			</div>
			
			<?php if($bukvarSettings['bukvar-show-featured-excert']=='1'): ?>
			<div class="wp-post-full-content-featured">
				<div class="post-content">
					<?php the_excerpt(); ?>
				</div>
			</div>
			<?php endif; ?>
		</div>
	<?php endwhile; ?>
<?php endif; ?>

<div id="featured-widgets-bar">
	<?php dynamic_sidebar('featured-widgetbar-bukvar') ?>
</div>
