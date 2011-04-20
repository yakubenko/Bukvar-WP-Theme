<?php while ( have_posts() ) : the_post(); ?>
	<?php $hasThumb = has_post_thumbnail(); ?>

	<div class="wp-singlepost-entry">
		<h1 class="wp-singlepost-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		
		<?php bukvarPostMeta(true); ?>
		
		<?php if($hasThumb): ?>
			<div class="wp-singlepost-thumb">
				<?php the_post_thumbnail('featured-thumb'); ?>

				<?php echo bukvarFeaturedImageCaption(); ?>
			</div>
		<?php endif; ?>

		<div class="wp-post-content wp-singlepost-content">
			<?php the_content() ?>

			<span class="clear">&nbsp;</span>

			<?php wp_link_pages('before=<div class="page-splitter">'.__('Pages:','bukvar').' &after=</div>');?>
		</div>

		

		<?php if(function_exists('nshare_displayButtons')): ?>
			<?php echo nshare_displayButtons(); ?>
		<?php endif; ?>
	</div>


	<div class="wp-entry-author-info">
		<div class="author-bio-avatar">
			<?php echo get_avatar($post->post_author,60); ?>
		</div>

		<div class="author-bio-text">
			<?php the_author_posts_link() ?>
			<?php the_author_description(); ?>
		</div>
	</div>

	<div class="prev-next-posts">
		<div class="prev-post-span"><?php previous_post_link(); ?></div>
		<div class="next-post-span"><?php next_post_link(); ?></div>
	</div>

<span class="clear">&nbsp;</span>

<?php endwhile; ?>