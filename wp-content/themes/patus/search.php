<?php get_header(); ?>

		<!-- Row for main content area -->
		<div id="responsive-content">
		<div id="content" class="eight columns" role="main">
	
			<div class="post-box">
				<h1 class="page-title"><?php _e('Search Results for', 'uxde'); ?> "<?php echo get_search_query(); ?>"</h1>
				<?php get_template_part('loop', 'search'); ?>
			</div>
			
			<?php if ($wp_query->max_num_pages > 1) : ?>
			
			<nav id="post-nav">
				<?php pt_pagination(); ?>
			</nav>
				
			<?php endif; ?>

		</div><!-- End Content row -->
		</div>
		
		<?php get_sidebar(); ?>
		
<?php get_footer(); ?>