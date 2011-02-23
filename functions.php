<?php
	add_theme_support('post-thumbnails');
	add_editor_style('css/editor-stylesheet.css');

	if ( function_exists( 'add_image_size' ) ) {
		add_image_size( 'post-list-thumb', 100, 100, false );
		add_image_size( 'featured-thumb', 300, 180, true );
	}


	function reg_menus() {
		register_nav_menus(array(
		    'first','second','footer'
		));
	}

	add_action( 'init', 'reg_menus' );



	function new_excerpt_length($length) {
		return 20;
	}
	add_filter('excerpt_length', 'new_excerpt_length');




	function mySearchFilter($query) {
		if ($query->is_search) {
			$query->set('post_type', 'post');
		}
		return $query;
	}

	add_filter('pre_get_posts','mySearchFilter');


	if ( function_exists('register_sidebar') ) {
		register_sidebar( array(
			'name' => __( 'Primary Widget Area', 'bukvar' ),
			'id' => 'primary-sidebar-bukvar',
			'description' => __( 'The primary widget area', 'bukvar' ),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</li>',
			'before_title' => '',
			'after_title' => '',
		) );

	}


	function e($text='') {
		echo $text;
	}



	function bukvarComments($comment, $args, $depth) {
	   $GLOBALS['comment'] = $comment;
	?>

		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
			<div id="comment-<?php comment_ID(); ?>">
				<div class="comment-author vcard">
					<?php echo get_avatar($comment,$size='24' ); ?>
					<?php e(comment_author_link()) ?>

					<div class="comment-meta commentmetadata">
						<?php e(get_comment_date().' в '.get_comment_time('H:m')) ?>
						<?php edit_comment_link(__('Edit'),'  ','') ?>
						<?php //delete_comment_link(comment_ID()); ?>

						<a href="#comment-<?php e(comment_ID()) ?>" title="<?php e(__('Ссылка на этот комментарий')) ?>" rel="noindex, nofollow">#</a>
					</div>
				</div>
		    
				<?php if ($comment->comment_approved == '0') : ?>
					<em><?php _e('Your comment is awaiting moderation.') ?></em>
					<br />
				<?php endif; ?>

	      
				<div class="comment-text">
					<?php comment_text() ?>

					<?php if(function_exists(ckrating_display_karma)) { ckrating_display_karma(); } ?>
				</div>

				<div class="comment-reply">
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>
			</div>
		</li>
	<?php
        }



	function delete_comment_link($id) {
		  if (current_user_can('edit_post')) {
		    e('| <a href="'.admin_url('comment.php?action=cdc&c=$id').'">Удалить</a> ');
		    e('| <a href="'.admin_url('comment.php?action=cdc&dt=spam&c=$id').'">Спам</a>');
		  }
	}


	function custom_login_css() {
		e('<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_directory').'/css/login/login.css" />');
	}
	add_action('login_head', 'custom_login_css');




	function customMoreText($id) {
		$customMoreText = get_post_meta($id, 'custom_more_text', TRUE);
		$customMoreText = (!$customMoreText)?__('Читать полностью ...'):$customMoreText;
		return $customMoreText;
	}



	

	add_action('admin_menu', 'bukvar_theme_options');

	function bukvar_theme_options() {
		add_theme_page(__('Настройка темы Bukvar'), __('Настройка Bukvar'), 'manage_options', 'bukvar-main-options', 'bukvarMainOptions');
	}

	function bukvarMainOptions() {
		if (!current_user_can('manage_options'))  {
			wp_die( __('You do not have sufficient permissions to access this page.') );
		}

		$bukvarSecretField = 'bukvar-options-posted';
		


		if(isset($_POST[$bukvarSecretField]) && $_POST[$bukvarSecretField]=='Y') {
			update_option('bukvar-featured-category', $_POST['bukvar-featured-category']);
		}


		$featuredCat = get_option('bukvar-featured-category');$featuredCat = (!$featuredCat)?0:$featuredCat;

	?>

		<div class="wrap">
			<h2><?php _e('Настройка темы Bukvar') ?></h2>

			<form method="post" action="options.php">
				<?php wp_nonce_field('update-options'); ?>
				<input type="hidden" name="<?php e($bukvarSecretField) ?>" value="Y" />

				<table class="form-table">
					<tr valign="top">
					<th scope="row"><?php _e('Выберите категорию для Featured') ?></th>
					<td>
						
						<?php wp_dropdown_categories('name=bukvar-featured-category&hide_empty=0&selected='.$featuredCat); ?>
					</td>
					</tr>
				</table>

				<input type="hidden" name="action" value="update" />
				<input type="hidden" name="page_options" value="bukvar-featured-category" />

				<p class="submit">
					<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
				</p>

			</form>
		</div>
		
		
	<?php
	}
?>
