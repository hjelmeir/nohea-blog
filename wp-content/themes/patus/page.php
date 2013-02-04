<?php get_header(); ?>

		<!-- Row for main content area -->
		<div id="responsive-content">
		<div id="content" class="eight columns" role="main">
	
			<div class="post-box">
				<?php get_template_part('loop', 'page'); ?>
			</div>

		</div><!-- End Content row -->
		</div>
		
		<?php get_sidebar(); ?>
		
<?php get_footer(); ?>