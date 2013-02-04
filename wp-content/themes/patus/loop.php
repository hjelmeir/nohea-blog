<?php $postnum = 1; $showads1 = 1; $showads2 = 2; ?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>

<?php if (!have_posts()) : ?>

	<div class="notice">
		<p class="bottom"><?php _e('Sorry, no results were found.', 'uxde'); ?></p>
	</div>
	
	<?php get_search_form(); ?>	
	
<?php endif; ?>

<?php /* Start loop */ ?>

<?php while (have_posts()) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<header class="post-header">
		
			<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			
			<!-- .meta-info -->
			<div class="meta-info">
			
				<span class="byline author vcard meta-button"><?php _e('Posted by', 'uxde'); ?> <?php the_author_posts_link(); ?></span> 
				<time class="updated meta-button" datetime="<?php the_time(get_option('date_format')); ?>" pubdate> <?php _e('on', 'uxde'); ?> <?php the_time( get_option('date_format') ); ?></time>
				<span class="meta-category meta-button"><?php _e('in', 'uxde'); ?> <?php the_category(', '); ?></span>
				<span class="meta-comment meta-button">/ <?php comments_popup_link(__('No Comments', 'uxde'), __('1 Comment', 'uxde'), __('% Comments', 'uxde')); ?></span>

			</div>
			<!-- /.meta-info -->
						
		</header>
		
		<div class="post-content">
			
			<?php the_content('Continue reading...'); ?>
	
		</div>
		
	</article>	

<?php if ($postnum == $showads1) { include (TEMPLATEPATH . '/lib/theme-widgets/widget-homead.php'); } ?>

<?php if ($postnum == $showads2) { include (TEMPLATEPATH . '/lib/theme-widgets/widget-homead-second.php'); } ?>

<?php $postnum++; ?>
	
<?php endwhile; // End the loop ?>