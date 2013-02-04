<?php /* Start loop */ ?>

<?php while (have_posts()) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<header>
		
			<h1 class="post-title"><?php the_title(); ?></h1>
			
			<!-- .meta-info -->
			<div class="meta-info">
			
				<span class="byline author vcard meta-button"><?php _e('Posted by', 'uxde'); ?> <?php the_author_posts_link(); ?></span> 
				<time class="updated meta-button" datetime="<?php the_time(get_option('date_format')); ?>" pubdate> <?php _e('on', 'uxde'); ?> <?php the_time( get_option('date_format') ); ?></time>
				<span class="meta-category meta-button"><?php _e('in', 'uxde'); ?> <?php the_category(', '); ?></span>
				<span class="meta-comment meta-button">/ <?php comments_popup_link(__('No Comments', 'uxde'), __('1 Comment', 'uxde'), __('% Comments', 'uxde')); ?></span>

			</div>
			<!-- /.meta-info -->

			<?php $sharebuttons = of_get_option('uxde_share'); ?>
			<?php if($sharebuttons == '1') :?>
			<!-- .meta-share -->
			<div class="share-buttons">
				<ul>
					<li class="twitter-button"><a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal" data-via="<?php $twitter = of_get_option('uxde_twitter'); ?><?php echo $twitter; ?>">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></li>
					<li class="facebook-button"><iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>&layout=button_count" scrolling="no" frameborder="0" style="height: 21px; width: 92px" allowTransparency="true"></iframe><div id="fb-root"></div></li>
					<li class="google-button"><g:plusone size="medium"></g:plusone></li>
					<li class="pinterest-button"><a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php if (has_post_thumbnail( $post->ID ) ): ?><?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?><?php echo $image[0]; ?><?php endif; ?>&description=<?php the_title(); ?>" class="pin-it-button" count-layout="horizontal" always-show-count="1"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a></li>
					
					<script>(function(d, s, id) {
  					var js, fjs = d.getElementsByTagName(s)[0];
  					if (d.getElementById(id)) return;
  					js = d.createElement(s); js.id = id;
  					js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=143969905702939";
 					 fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));</script>
	
					<script type="text/javascript">
  					(function() {
    				var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    				po.src = 'https://apis.google.com/js/plusone.js';
   				 	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  					})();
					</script>

					<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>

				</ul>
			</div>
			<!-- /.meta-share -->
			<?php else: ?>
			<?php endif; ?>
						
		</header>
		
		<div class="post-content">
	
			<?php the_content(); ?>
	
		</div>
		
		<footer>
			<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'uxde'), 'after' => '</p></nav>' )); ?>
			<p><?php the_tags(); ?></p>
		</footer>

		<!-- .author-wrap -->
		<section class="author-wrap">

				<div class="author-gravatar">
					<?php echo get_avatar( get_the_author_meta('email'), '89' ); ?>
				</div>

				<div class="author-responsive">
				<div class="author-info">
					<div class="author-title"><?php _e('By', 'uxde'); ?> <strong><?php the_author_link(); ?></strong><span>|</span><a href="<?php the_author_meta('url') ?>">Website</a><span>|</span><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">Other Articles</a></div>
					<div class="author-description"><p><?php the_author_meta('description'); ?></p></div>
				</div>
				</div>

		</section>
		<!-- .author-wrap -->

		<!-- .related-posts -->
		<section class="related-posts">
	
			<h4><?php _e('Related Posts', 'uxde'); ?></h4>

			<ul>
			<?php if( has_tag() ) { ?>	
				<?php  
					//for use in the loop, list 4 post titles related to first tag on current post
					$backup = $post;  // backup the current object
					$tags = wp_get_post_tags($post->ID);
					$tagIDs = array();
					
					if ($tags) {
					
						$tagcount = count($tags);
						for ($i = 0; $i < $tagcount; $i++) {
						  $tagIDs[$i] = $tags[$i]->term_id;
						  
						}
						
						$args=array('tag__in' => $tagIDs, 'post__not_in' => array($post->ID), 'showposts'=>4, 'ignore_sticky_posts'=>1);
						$my_query = new WP_Query($args);
						
						if( $my_query->have_posts() ) {
						
							while ($my_query->have_posts()) : $my_query->the_post(); ?>
							
								<li><article class="relate-post-column">
								
									<a href="<?php the_permalink();?>" title="<?php the_title();?>">
									
										<?php if (has_post_thumbnail()) { 
										
												the_post_thumbnail('relatedpost-thumb', array('class' => 'omc-image-resize')); 
												
											} else {
											
												echo('<img src="'.get_template_directory_uri().'/images/no-image-half-landscape.png" class="omc-image-resize" alt="no image" />');
												
										} ?>								
									
									</a>
									
									<h5 class="related-article"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h5>
								
								</article></li>
								
							<?php endwhile; ?>
							
						<?php } else { ?>
						
						  <?php
							global $post;
							$tmp_post = $post;
							$args = array( 'numberposts' => 4 );
							$myposts = get_posts( $args );
							foreach( $myposts as $post ) : setup_postdata($post); ?>
				
								<li><article class="related-post-column">
								
									<a href="<?php the_permalink();?>" title="<?php the_title();?>">
									
										<?php if (has_post_thumbnail()) { 
										
												the_post_thumbnail('relatedpost-thumb', array('class' => 'omc-image-resize')); 
												
											} else {
											
												echo('<img src="'.get_template_directory_uri().'/images/no-image-half-landscape.png" class="omc-image-resize" alt="no image" />');
												
										} ?>								
									
									</a>
									
									<h5 class="related-article"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h5>
								
								</article></li>
				
						<?php endforeach; ?>	
						<?php $post = $tmp_post; ?>
						  
						<?php }
					  		}
					  		$post = $backup;  // copy it back
					  		wp_reset_query(); // to use the original query again
						?>
						<?php } else { ?>	
			
						<?php
							global $post;
							$tmp_post = $post;
							$args = array( 'numberposts' => 4 );
							$myposts = get_posts( $args );
							foreach( $myposts as $post ) : setup_postdata($post); ?>
				
								<li><article class="related-post-column">
								
									<a href="<?php the_permalink();?>" title="<?php the_title();?>">
									
										<?php if (has_post_thumbnail()) { 
										
												the_post_thumbnail('relatedpost-thumb', array('class' => 'omc-image-resize')); 
												
											} else {
											
												echo('<img src="'.get_template_directory_uri().'/images/no-image-half-landscape.png" class="omc-image-resize" alt="no image" />');
												
										} ?>								
									
									</a>
									
									<h5 class="related-article"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h5>
								
								</article></li>
				
						<?php endforeach; ?>	
						<?php $post = $tmp_post; ?>
			
			<?php } ?>
			</ul>

		</section>
		<!-- .related-posts -->
		
		<?php comments_template(); ?>
		
	</article>	
	
<?php endwhile; // End the loop ?>