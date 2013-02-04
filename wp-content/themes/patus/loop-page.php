<?php /* Start loop */ ?>

<?php while (have_posts()) : the_post(); ?>

<h1 class="post-title"><?php the_title(); ?></h1>

<div class="post-content">

	<?php the_content(); ?>
	<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'uxde'), 'after' => '</p></nav>' )); ?>

</div>
			
<?php // comments_template(); ?>	
	
<?php endwhile; // End the loop ?>