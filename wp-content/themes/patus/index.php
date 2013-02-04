<?php get_header(); ?>

		<!-- Row for main content area -->
		<div id="responsive-content">
		<div id="content" class="eight columns" role="main">
	
			<div class="post-box">
				<?php get_template_part('loop', 'index'); ?>
			</div>
			
			<?php /* Display navigation to next/previous pages when applicable */ ?>

			<?php if ($wp_query->max_num_pages > 1) : ?>
			
			<nav id="post-nav">
				<?php pt_pagination(); ?>
			</nav>
				
			<?php endif; ?>

		</div><!-- End Content row -->
		</div>
		
		<?php get_sidebar(); ?>
		
<?php get_footer(); ?>