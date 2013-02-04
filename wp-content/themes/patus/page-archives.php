<?php
/*
Template Name: Archives
*/
get_header(); ?>

		<!-- Row for main content area -->
		<div id="responsive-content">
		<div id="content" class="eight columns" role="main">
	
			<div class="post-box">
				<div class="post-content">
				<div class="archive-lists">
					<h2><?php _e( 'Last 30 Posts', 'uxde' ); ?></h2>
						<?php query_posts( 'showposts=25' ); ?>
						<?php if ( have_posts() ) : ?>
						<ul>
							<?php while (have_posts()) : the_post(); ?>
							<li><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><span class="comments_number"><?php comments_number( '0', '1', '%', '' ); ?></span><span class="archdate"><?php the_time(__ ( 'n.j.y', 'uxde' )); ?></span><?php the_title(); ?></a></li>
							<?php endwhile; endif; ?>
						</ul>
					<h2><?php _e( 'Monthly Archives', 'uxde' ); ?></h2>
						<ul class="archive-month">
							<?php wp_get_archives( 'type=monthly&show_post_count=0' ); ?>
						</ul>		
					<h2><?php _e( 'Archives by Subject', 'uxde' ); ?></h2>
						<ul class="archive-cat">
							<?php wp_list_categories( 'title_li=' ); ?>
						</ul>
				</div>
				</div>
			</div>

		</div><!-- End Content row -->
		</div>
		
		<?php get_sidebar(); ?>
		
<?php get_footer(); ?>