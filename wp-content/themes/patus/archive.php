<?php get_header(); ?>

		<!-- Row for main content area -->
		<div id="responsive-content">
		<div id="content" class="eight columns" role="main">
	
			<div class="post-box">
				<h1 class="page-title">
					<?php if (is_day()) : ?>
						<?php printf(__('Daily Archives: %s', 'uxde'), get_the_date()); ?>
					<?php elseif (is_month()) : ?>
						<?php printf(__('Monthly Archives: %s', 'uxde'), get_the_date('F Y')); ?>
					<?php elseif (is_year()) : ?>
						<?php printf(__('Yearly Archives: %s', 'uxde'), get_the_date('Y')); ?>
					<?php elseif (is_tag()) : ?>
						<?php echo __('Posts Tagged', 'uxde'); ?>: "<?php single_cat_title(); ?>"
					<?php elseif (is_author()) : ?>
						<?php 
						// Get author data
						if(get_query_var('author_name')) :
							$curauth = get_user_by('login', get_query_var('author_name'));
						else :
							$curauth = get_userdata(get_query_var('author'));
						endif;
						printf(__('Posts by: %s', 'uxde'), $curauth->display_name); 
						?>
					<?php else : ?>
						<?php _e('Posts Selected From the Category', 'uxde'); ?> "<?php single_cat_title(); ?>"
					<?php endif; ?>
				</h1>
				<?php get_template_part('loop', 'category'); ?>
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