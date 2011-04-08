<?php
/*
Template Name: One column page for Bukvar Theme
*/
?>

<?php global $post; ?>
<?php get_header() ?>
	<div id="main-content" class="grid_12 alpha">
		<?php get_template_part('loops/page-loop'); ?>
	</div>
<?php get_footer() ?>
