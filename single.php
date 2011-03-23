<?php get_header() ?>
	<div id="main-content" class="grid_7 alpha">
		<?php get_template_part('single-loop'); ?>
		<?php comments_template(); ?>
	</div>

	<div class="grid_5 alpha side-column">
		<div id="search-form-wrap">
			<?php get_search_form(); ?>
		</div>

		<div id="sidebar">
			<?php get_sidebar(); ?>
		</div>
	</div>
<?php get_footer() ?>