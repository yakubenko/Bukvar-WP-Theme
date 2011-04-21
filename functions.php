<?php

	// Internationalization loading
	// You can create your own translation. Just fork *.po file from lang folder
	// You can use this filter to test your translation
	//add_filter( 'locale', 'bukvarSetLocale' );
	load_theme_textdomain('bukvar', dirname(__FILE__).'/lang/');


	add_theme_support('post-thumbnails');
	add_editor_style('css/editor-stylesheet.css');

	add_action( 'init',		'bukvarRegMenus' );
	add_filter('excerpt_length',	'bukvarExcertLength');
	add_filter('pre_get_posts',	'bukvarSearchFilter');
	add_action('login_head',	'bukvarCustomLoginCss');
	add_action('admin_menu',	'bukvarThemeOptions');
	add_action('admin_init',	'bukvarRegisterDefaultSettings');

	
	$bukvarSettings = get_option('bukvar-settings');
	
	

	add_action('bukvar_header','bukvarLoadSkin');


	if ( function_exists( 'add_image_size' ) ) {
		add_image_size( 'post-list-thumb', 100, 100, false );
		add_image_size( 'featured-thumb', 300, 180, true );
	}


	function bukvarSetLocale() {
		return 'ru_RU';
	}


	function bukvarRegmenus() {
		register_nav_menus(array(
		    'first','second','footer'
		));
	}


	function bukvarExcertLength($length) {
		return 20;
	}



	function bukvarSearchFilter($query) {
		if ($query->is_search) {
			$query->set('post_type', 'post');
		}
		return $query;
	}



	// Register main widget areas
	if ( function_exists('register_sidebar') ) {
		register_sidebar( array(
			'name' => __( 'Primary Widget Area', 'bukvar' ),
			'id' => 'primary-sidebar-bukvar',
			'description' => __( 'The primary widget area for Bukvar journalistic Wordpress theme. Just drop your favourite widgets here.', 'bukvar' ),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</li>',
			'before_title' => '',
			'after_title' => '',
		) );


		register_sidebar( array(
			'name' => __( 'Firs footer column', 'bukvar' ),
			'id' => 'first-footercol-bukvar',
			'description' => __( 'First footer col', 'bukvar' ),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		) );


		register_sidebar( array(
			'name' => __( 'Second footer column', 'bukvar' ),
			'id' => 'second-footercol-bukvar',
			'description' => __( 'Second footer col', 'bukvar' ),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		) );


		register_sidebar( array(
			'name' => __( 'Third footer column', 'bukvar' ),
			'id' => 'third-footercol-bukvar',
			'description' => __( 'Third footer col', 'bukvar' ),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		) );


		register_sidebar( array(
			'name' => __( 'Featured posts column', 'bukvar' ),
			'id' => 'featured-widgetbar-bukvar',
			'description' => __( 'Widgets bar for column with Featured posts', 'bukvar' ),
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		) );
	}



	if(!function_exists('e')) {
		function e($text='') {
			echo $text;
		}
	}


	// Prints navigation links to Older or Newer content
	// Prints Paged navigation if WP-Paginate plugin installed
	function bukvarPages() {
		if(function_exists('wp_paginate')) {
			wp_paginate();
		} else {
			echo'<div class="navigation-pages"><p>';
			echo posts_nav_link(' &mdash; ',' ←'.__('Newer posts','bukvar'),__('Older posts','bukvar').' → ');
			echo '</p></div>';
		}
	}



	function bukvarPostTagsAndCats() {
		global $post;
		?>
		<div class="wp-post-tags">
			<?php the_tags(__('Tagged as: ','bukvar')); ?>
		</div>

		<div class="wp-post-categories">
			<?php _e('Posted in: ','bukvar'); ?>
			<?php the_category(', '); ?>
		</div>
	<?php
	}



	function bukvarPostMeta($single=false) {
		global $post;?>

		<?php if(!$single): ?>
			<div class="wp-post-meta">
				<?php _e('By','bukvar') ?> <?php the_author_posts_link() ?><br/>
				<?php the_date() ?> - <a href="<?php comments_link() ?>" class="comments-link">
					<?php e(get_comments_number()) ?>
				</a>
			</div>
		<?php else: ?>
			<div class="wp-singlepost-meta">
				<?php _e('By','bukvar') ?> <?php the_author_posts_link() ?> <?php edit_post_link(__('Edit the article','bukvar'),' &mdash; ') ?><br/>
				<?php the_date() ?> - <a href="<?php comments_link() ?>" class="comments-link"><?php e(get_comments_number()) ?></a>
			</div>
		<?php endif; ?>
	<?php
	}



	function bukvarNoThumbClass() {
		global $post;
		return (has_post_thumbnail())?'':'no-thumb';
	}





	// http://wordpress.org/support/topic/featured-image-display-image-caption
	function bukvarFeaturedImageCaption() {
		  global $post;

		  $thumbnail_id    = get_post_thumbnail_id($post->ID);
		  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

		  if ($thumbnail_image && isset($thumbnail_image[0]) && $thumbnail_image[0]->post_excerpt!=='') {
			  return '<p class="wp-singlepost-thumb-caption">'.$thumbnail_image[0]->post_excerpt.'</p>';
		  }
	}




	// Just a replace for default WP comments Walker function
	function bukvarComments($comment, $args, $depth) {
	   $GLOBALS['comment'] = $comment;
	?>

		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
			<div id="comment-<?php comment_ID(); ?>">
				<div class="comment-author vcard">
					<?php echo get_avatar($comment,$size='24' ); ?>
					<span class="comment-author-name"><?php e(comment_author_link()) ?></span>

					<div class="comment-meta commentmetadata">
						<?php e(get_comment_date().' в '.get_comment_time('H:m')) ?>
						<?php edit_comment_link(__('Edit comment','bukvar'),'  ','') ?>

						<a href="#comment-<?php e(comment_ID()) ?>" title="<?php e(__('current comment link','bukvar')) ?>" rel="noindex, nofollow">#</a>
					</div>
				</div>

				<div class="comment-text">
					<?php if ($comment->comment_approved == '0') : ?>
						<em><?php _e('Comment is awaiting moderation.','bukvar') ?></em>
					<?php else: ?>
						<?php comment_text() ?>
					<?php endif; ?>
						<span class="clear">&nbsp;</span>
				</div>

				<div class="comment-reply">
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>
			</div>
		</li>
	<?php
        }



	function bukvarDeleteCommentLink($id) {
		  if (current_user_can('edit_post')) {
		    e('| <a href="'.admin_url('comment.php?action=cdc&c=$id').'">Удалить</a> ');
		    e('| <a href="'.admin_url('comment.php?action=cdc&dt=spam&c=$id').'">Спам</a>');
		  }
	}


	function bukvarCustomLoginCss() {
		e('<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_directory').'/css/login/login.css" />');
	}


	/**
	 *
	 * @param Integer $id The Post ID
	 * @return String returns HTML formatted link with custom CR text
	 */
	function customMoreText($id) {
		$customMoreText = get_post_meta($id, 'custom_more_text', TRUE);
		$customMoreText = (!$customMoreText)?__('Continue reading','bukvar'):$customMoreText;
		return $customMoreText;
	}








	/**
	 *
	 * @param String $skinName Skin name
	 * @return Array Returns Array contain all information about specified skin
	 */
	function bukvarGetSkinInfo($skinName) {

		$default_headers = array(
		    'name' => 'Skin name',
		    'author' => 'Author',
		    'parent' => 'Parent',
		    'scripts' => 'Scripts'
		);

		$skinInfo = get_file_data(dirname(__FILE__).'/skins/'.$skinName.'/style.css', $default_headers);

		// Dirty trick I know
		$skinInfo['scripts'].=',';
		$scriptsToLoad = explode(',',$skinInfo['scripts']);

		for($i=0;$i<=count($scriptsToLoad)-1;$i++) {
			if(trim($scriptsToLoad[$i])==='') {
				unset($scriptsToLoad[$i]);
			}
		}

		$skinInfo['scripts'] = $scriptsToLoad;
		return $skinInfo;
	}



	/**
	 *
	 * @return Array Return an Array of all installed skins
	 */
	function bukvarGetSkins() {
		$skinsDirPath = dirname(__FILE__).'/skins/';
		$skinsDir = opendir($skinsDirPath);
		$allSkins = array( array('',array('name'=>__('Do not use the skin','bukvar'),'author'=>'','parent'=>'') ));

		while( ($singleSkinDir = readdir($skinsDir))!==false ) {
			if(is_dir($skinsDirPath.$singleSkinDir)  && $singleSkinDir!='.' && $singleSkinDir!='..') {
				$allSkins[] = array($singleSkinDir,bukvarGetSkinInfo($singleSkinDir));
			}
		}
		return $allSkins;
	}



	function bukvarLoadSkin() {
		global $bukvarSettings;
		
		if(isset($bukvarSettings['bukvar-default-skin']) && !empty($bukvarSettings['bukvar-default-skin'])) {
			$bukvarCurrentSkin = $bukvarSettings['bukvar-default-skin'];
			
			$skinInfo = bukvarGetSkinInfo($bukvarCurrentSkin);

			if(isset($skinInfo['parent']) && $skinInfo['parent']!='') {
				echo '<link rel="stylesheet" type="text/css" media="all" href="'.get_stylesheet_directory_uri().'/skins/'.$skinInfo['parent'].'/style.css" />';
			}

			echo '<link rel="stylesheet" type="text/css" media="all" href="'.get_stylesheet_directory_uri().'/skins/'.$bukvarCurrentSkin.'/style.css" />';




			if(is_array($skinInfo['scripts']) && !empty($skinInfo['scripts'])) {
				foreach($skinInfo['scripts'] as $script) {
				echo '<script type="text/javascript" src="'.get_stylesheet_directory_uri().'/skins/'.$bukvarCurrentSkin.'/js/'.$script.'.js"></script>';
				}
			}
		}
	}




	function bukvar_header() {
		do_action('bukvar_header');
	}


	function bukvarThemeOptions() {
		add_theme_page(__('Bukvar theme settings','bukvar'),
			__('Bukvar','bukvar').' <sup>beta</sup>',
			'manage_options',
			'bukvar-main-options',
			'bukvarMainOptionsForm'
			);
	}




	function bukvarDefaultSettings() {
		$options = array(
			'bukvar-featured-category'=>'0',
			'bukvar-show-featured-excert'=>'1',
			'bukvar-show-extended-footer'=>'1',
			'bukvar-show-metadata-for-pages'=>'1',
			'bukvar-show-loginbox'=>'1',
			'bukvar-default-skin'=>'default'
		);

		return $options;
	}
	

	
	function bukvarOldOptionsCleenup() {
		$allOptions = bukvarDefaultOptions();
		
		foreach ($allOptions as $k => $v) {
			delete_option($k);
		}
	}


	// Register our settings holder
	// This function will be called via INIT hook
	// After setting is registred we can check is setting were saved before
	// If no, then we can reset all settings to default
	function bukvarRegisterDefaultSettings() {		
		register_setting('bukvar-theme-options', 'bukvar-settings');
		
		
		$bukvarSettings = get_option('bukvar-settings');
		if(!is_array($bukvarSettings) || empty($bukvarSettings)) {
			bukvarResetSettings();
		}
	}
	
	
	
	function bukvarResetSettings() {
		update_option('bukvar-settings', bukvarDefaultSettings());
	}
	
	


	function bukvarGetOptionValue($option,$options,$optionType='value') {
		
		$option = (isset($options[$option]))?$option = $options[$option]:'';
		
		switch($optionType) {
			case 'checkbox':
				$option = ($option=='1')?'checked="checked"':'';
		}
		
		return $option;
	}




	function bukvarMainOptionsForm() {
		global $bukvarSettings;
		
		if(!current_user_can('manage_options'))  {
			wp_die( __('You do not have sufficient permissions to access this page.','bukvar') );
		}

		
		$featuredCat =		bukvarGetOptionValue('bukvar-featured-category',$bukvarSettings);
		$showFeaturedExcert =	bukvarGetOptionValue('bukvar-show-featured-excert',$bukvarSettings,'checkbox');

		$showExtendedFooter =	bukvarGetOptionValue('bukvar-show-extended-footer',$bukvarSettings,'checkbox');
		$showMetadataForPages = bukvarGetOptionValue('bukvar-show-metadata-for-pages',$bukvarSettings,'checkbox');
		$showLoginBox =		bukvarGetOptionValue('bukvar-show-loginbox',$bukvarSettings,'checkbox');



		$bukvarListSkins =	bukvarGetSkins();
		$bukvarCurrentSkin =	bukvarGetOptionValue('bukvar-default-skin',$bukvarSettings);

		?><?php require_once 'settings/main-settings-form.php'; ?><?php
	}



	function bukvarLicenseFooter() {
	?><?php require_once 'license.php'; ?><?php }


?>
