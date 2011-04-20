<?php get_header(); ?>

	<?php
		$featuredCategory = get_option('bukvar-featured-category',0);
//		$featuredCategory = ($featuredCategory)?$featuredCategory:0;
	?>

	<div class="featured-posts-list grid_5 alpha content-column" id="featured-posts">
		<?php get_template_part('featured-posts-index'); ?>
	</div>

	<div class="sidebar-posts-list grid_7 alpha content-column" id="sidebar-posts">
		<div id="search-form-wrap">
			<?php get_search_form(); ?>
		</div>

		<?php get_template_part('login-box'); ?>

		<div class="latest-posts-column">
			<?php get_template_part('latest-posts-index'); ?>
		</div>
	</div>
<?php get_footer(); ?>