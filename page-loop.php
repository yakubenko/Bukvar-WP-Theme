<?php while ( have_posts() ) : the_post(); ?>
	<div class="wp-singlepost-entry">
		<h1 class="wp-singlepost-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

		<?php $showMetadataForPages = get_option('bukvar-show-metadata-for-pages'); ?>

		<?php if($showMetadataForPages=='1'): ?>
		<div class="wp-singlepost-meta">
			<?php the_date('d M Y') ?> от <?php the_author_posts_link() ?> <?php edit_post_link(__('Редактировать статью'),' &mdash; ') ?>
		</div>
		<?php endif; ?>


		<div class="wp-singlepost-thumb">
			<?php the_post_thumbnail('featured-thumb'); ?>
		</div>

		<div class="wp-singlepost-content">
			<?php the_content() ?>
		</div>
	</div>

<span class="clear">&nbsp;</span>

<?php endwhile; ?>
