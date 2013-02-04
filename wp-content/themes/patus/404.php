<?php get_header(); ?>

		<!-- Row for main content area -->
		<div id="responsive-content">
		<div id="content" class="eight columns" role="main">
	
			<div class="post-box">
				<h1><?php _e('File Not Found', 'uxde'); ?></h1>
				<div class="error">
					<p class="bottom"><?php _e('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'uxde'); ?></p>
				</div>
				<p><?php _e('Please try the following:', 'uxde'); ?></p>
				<ul> 
					<li><?php _e('Check your spelling', 'uxde'); ?></li>
					<li><?php printf(__('Return to the <a href="%s">home page</a>', 'uxde'), home_url()); ?></li>
					<li><?php _e('Click the <a href="javascript:history.back()">Back</a> button', 'uxde'); ?></li>
				</ul>
			</div>

		</div><!-- End Content row -->
		</div>
		
		<?php get_sidebar(); ?>
		
<?php get_footer(); ?>