	<?php global $bukvarSettings; ?>
	<span class="clear">&nbsp;</span>
	</div>


	<span class="clear">&nbsp;</span>

	
	<?php if($bukvarSettings['bukvar-show-extended-footer']=='1'): ?>
	<div id="extended-footer-wrapper" class="container_12">
		<div class="grid_3 footer-col omega" id="first-footer-col">
			<ul id="primary-widget-area">
				<?php dynamic_sidebar('first-footercol-bukvar');?>
			</ul>
		</div>

		<div class="grid_5 footer-col omega" id="second-footer-col">
			<ul id="primary-widget-area">
				<?php dynamic_sidebar('second-footercol-bukvar');?>
			</ul>
		</div>

		<div class="grid_4 footer-col" id="third-footer-col">
			<ul id="primary-widget-area">
				<?php dynamic_sidebar('third-footercol-bukvar');?>
			</ul>
		</div>

		<div class="clear">&nbsp;</div>
	</div>
	<?php endif; ?>

	<div id="footer-wrapper" class="container_12">

		<div class="grid_12 alpha menu-hr-box footer-menu">
			<?php wp_nav_menu( array( 'menu' => 'footer','container'=>'','menu_class'=>'default-hr-box-menu' ) ); ?>
		</div>
		<span class="clear">&nbsp;</span>

	</div>

	<span class="clear">&nbsp;</span>

	<div id="copyright-wrapper" class="container_12">
		<?php bukvarLicenseFooter(); ?>
	</div>

	<span class="clear">&nbsp;</span>

	</div>



	

	</body>
</html>