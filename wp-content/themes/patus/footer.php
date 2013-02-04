			</div><!-- End Main row -->
		
		</div>
		<!-- /.container -->
		
		<!-- #footer-wrap.container -->
		<div id="footer-wrap" class="container">
			
			<footer id="content-info" role="contentinfo">
				
				<div class="row">
				
					<div class="four columns footer-logo">
					
						<?php $footer = of_get_option('uxde_footer'); ?>

							<?php if($footer == '') :?>

							<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/footer-logo.png" alt="<?php bloginfo('name'); ?>" /></a>

							<?php else: ?>

							<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo $footer; ?>" alt="<?php bloginfo('name'); ?>" /></a>
						
							<?php endif; ?>

					</div>
					
					<div id="social-links" class="eight columns">
					
						<?php _e('Follow on', 'uxde'); ?> <?php $twitter = of_get_option('uxde_twitter'); ?><a href="http://twitter.com/<?php echo $twitter; ?>">Twitter</a> &middot; <?php _e('Like on', 'uxde'); ?> <?php $facebook = of_get_option('uxde_facebook'); ?><a href="<?php echo $facebook; ?>">Facebook</a> &middot; <?php _e('Add on', 'uxde'); ?> <?php $google = of_get_option('uxde_google'); ?><a href="<?php echo $google; ?>">Google</a>

						<p>&copy; <?php echo date('Y'); ?> <?php bloginfo('title'); ?> <?php _e('All rights reserved', 'uxde'); ?>. <?php if ( function_exists( 'theme_link' ) ) theme_link( 0, true ); ?>.</p>
						
					</div>
					
				</div>
				
			</footer>
		
		</div>
		<!-- /#footer-wrap.container -->
			
	</div><!-- Container End -->

	<?php wp_footer(); ?>

	<?php $footerscripts = of_get_option('uxde_footer_scripts'); ?><?php echo $footerscripts; ?>
	
</body>
</html>