<?php get_header(); ?>
	<div id="content" class="grid_12 content-column">
		<h1><span class="404-number">404:</span> <?php _e('Page not found','bukvar') ?></h1>

		<div class="error-div">
			<?php _e('Dear user, the page you requested was not found on our website. Possible that the page has been moved or deleted. If you came to our site from another site and did not find the desired page, you can use the search box and try to find the data you are interested.
If you reached this page from the pages of our site, please contact the site administrator and report error. In the future it will help users do not get errors about missing pages and reduce the likelihood of broken links.','bukvar') ?>
		</div>


		<p>
			<?php e(get_search_form()) ?>
		</p>
	</div>
<?php get_footer(); ?>