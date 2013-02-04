<?php

function ux_load_popularposts_widget()
{
	register_widget( 'UXDE_Popularposts' );
}

add_action('widgets_init', 'ux_load_popularposts_widget');


/* ==  Widget ==============================*/
class UXDE_Popularposts extends WP_Widget {


/* ==  Widget Setup ==============================*/	

	function UXDE_Popularposts() {
	
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'UXDE_Popularposts', 'description' => __('A widget that displays your most commented posts.', 'uxde') );

		/* Widget control settings. */
		$control_ops = array( 'id_base' => 'uxde_popularposts_widget' );

		/* Create the widget. */
		$this->WP_Widget( 'uxde_popularposts_widget', __('Popular Posts', 'uxde'), $widget_ops, $control_ops );
	}


/* ==  Display Widget ==============================*/

	function widget( $args, $instance ) {
	
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$number = $instance['number'];
		

		$a = array(
			'orderby' => 'comment_count',
			'posts_per_page' => $number
		);
		
		$pop = new WP_Query($a);

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}
		
		if ($pop->have_posts()) : while ($pop->have_posts()) : $pop->the_post(); ?>

         <article id="post-<?php the_ID(); ?>-popular" <?php post_class(); ?>>
	
			<header>
			
				<h4 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							
			</header>
			
		</article>	
         		
		<?php endwhile; else: ?>
		
		<p><?php _e('There are no posts available right now.', 'uxde'); ?></p>
		
		<?php 
		
		endif;

		/* After widget (defined by themes). */
		echo $after_widget;
	}



/* ==  Update Widget ==============================*/
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['number'] = $new_instance['number'];

		/* No need to strip tags for.. */

		return $instance;
	}
	
	
	
/* ==  Widget Settings ==============================*/
	
	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	 
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
			'title' => 'Popular Posts',
			'number' => '3'
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'engine') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<!-- Widget Number: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e('Number:', 'engine') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" value="<?php echo $instance['number']; ?>" />
		</p>

		
	<?php
	}
}