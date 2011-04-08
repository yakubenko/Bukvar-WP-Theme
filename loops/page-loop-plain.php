<?php while ( have_posts() ) : the_post(); ?>
	<div class="wp-singlepost-entry">
		<div class="wp-singlepost-content">
			<?php the_content() ?>
		</div>
	</div>

<span class="clear">&nbsp;</span>

<?php endwhile; ?>
