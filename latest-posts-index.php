<?php global $featuredCategory; ?>
<h4 id="latest-posts-title"><?php _e('Latest articles','bukvar') ?></h4>


<?php query_posts('cat=-'.$featuredCategory.'&paged='.$paged); ?>
<?php //query_posts('cat=-'.$featuredCategory); ?>



<?php if(have_posts ()): ?>
	<?php while(have_posts ()) : the_post(); ?>
		<?php $postThumbClass = 'no-thumb'; ?>

		<div <?php post_class('wp-post-entry'); ?>>
			<?php if(has_post_thumbnail ()):?>
				<?php $postThumbClass = '' ?>
				<div class="wp-post-thumbnail">
					<a href="<?php the_permalink() ?>">
						<?php the_post_thumbnail('post-list-thumb'); ?>
					</a>
				</div>
			<?php endif; ?>

			<div class="wp-post-full-content <?php e($postThumbClass) ?>">
				<h3 class="wp-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

				<div class="wp-post-meta">
					<?php the_author_posts_link() ?><br/>
					<?php the_time('d M Y') ?> - <a href="<?php comments_link() ?>" class="comments-link"><?php e(get_comments_number()) ?></a>
				</div>


				<div class="wp-post-content">
					<?php the_content(customMoreText($post->ID)); ?>

					<?php wp_link_pages('before=<div class="page-splitter">'.__('Pages:','bukvar').' &after=</div>');?>
				</div>

				<div class="wp-post-tags">
					<?php the_tags(__('Tags: ','bukvar')); ?>
				</div>
			</div>
		</div>
	<?php endwhile; ?>

	<?php bukvarPages(); ?>

<?php endif; ?>