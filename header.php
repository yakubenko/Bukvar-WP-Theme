<!DOCTYPE html>
<html <?php language_attributes('xhtml'); ?>>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=<?php bloginfo( 'charset' ); ?>" />
		<title>
			<?php
			/*
			 * Print the <title> tag based on what is being viewed.
			 */
			global $page, $paged;

			wp_title( '|', true, 'right' );

			// Add the blog name.
			bloginfo( 'name' );

			// Add the blog description for the home/front page.
			$site_description = get_bloginfo( 'description', 'display' );

			if ( $site_description && ( is_home() || is_front_page() ) )
				echo " | $site_description";

			// Add a page number if necessary:
			if ( $paged >= 2 || $page >= 2 )
				echo ' | ' . sprintf( __( '%s страница', 'bukvar' ), max( $paged, $page ) );

			?>
		</title>

		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_directory' ); ?>/css/reset.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_directory' ); ?>/css/text.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_directory' ); ?>/css/1024.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_directory' ); ?>/css/comments.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_directory' ); ?>/css/editor-stylesheet.css" />

		<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); wp_head();  ?>
<!--		Miseris succurrere disce» — Учись помогать несчастным (больным)-->
		<?php bukvar_header(); ?>
	</head>



	


	<body>
		<div class="container_12" id="main-wrapper">
			<?php if(is_home() || is_front_page()): ?>
				<div class="grid_6 alpha" id="logo">
					<a href="<?php e(home_url()) ?>" title="<?php e(__('Перейти на главную страницу')) ?>"><?php e(bloginfo('name')) ?></a>
				</div>

				<div class="grid_6 alpha" id="banner">
					<img src="<?php bloginfo( 'template_directory' ); ?>/img/header_advert.jpg" alt="" />
				</div>

			<?php else: ?>
				<div class="grid_3 alpha" id="logo-small">
					<a href="<?php e(home_url()) ?>" title="<?php e(__('Перейти на главную страницу')) ?>"><?php e(bloginfo('name')) ?></a>
				</div>

				<div class="grid_9 alpha" id="banner">
					<img src="<?php bloginfo( 'template_directory' ); ?>/img/header_advert.jpg" alt="" />
				</div>
			<?php endif; ?>

			<span class="clear">&nbsp;</span>

			<?php $menuClass = (is_home() || is_front_page())?'':'default-hr-box-menu left' ?>

			<div class="grid_12 alpha menu-hr-box <?php e($menuClass) ?>" id="main-menu">
				<?php if(!is_home() && !is_front_page()): ?>
					<ul class="default-hr-box-menu">
						<li><a href="<?php e(home_url()) ?>" title="Перейти на главную страницу"><?php _e('Главная') ?></a></li>
					</ul>
				<?php endif; ?>
				
				<?php wp_nav_menu( array( 'menu' => 'first','container'=>'','menu_class'=>'default-hr-box-menu' ) ); ?>
			</div>

			<span class="clear">&nbsp;</span>
