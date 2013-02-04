<?php

function ux_load_optin_widget()
{
	register_widget('Optin_Widget');
}
	add_action('widgets_init', 'ux_load_optin_widget');


class Optin_Widget extends WP_Widget
{
	function __construct() {
		$widget_ops = array('classname' => 'optin', 'description' => __('Create an elaborate optin form, usable anywhere you can drag a widget to!', 'uxde'));
		$control_ops = array('width' => 200, 'height' => 350, 'id_base' => 'optin-widget');
		parent::__construct('optin-widget', __('Optin Form', 'uxde'), $widget_ops, $control_ops);
	}

	function widget($args, $instance)
	{
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$description = apply_filters('widget_text', $instance['description']);
		$optin_code = $instance['optin_code'];
		$social_proof = $instance['social_proof'];
		$social_said = $instance['social_said'];
		$single = isset($instance['single']) ? $instance['single'] : false;
		$spacing = isset($instance['spacing']) ? $instance['spacing'] : false;

		if($single)
		{
			if(is_single())
			{
				echo $before_widget;

				if($spacing)
					echo '<div class="optin_outer no-spacing">';
				else
					echo '<div class="optin_outer">';

				echo '<div class="optin_wrapper">';
				if($title)
					echo $before_title . $title . $after_title;
		
				if($description)
					echo wpautop($description);

				if($optin_code)
					echo $optin_code;
		
				if(!empty($social_proof) || !empty($social_said))
				{
					echo '<p class="social_proof">';
					echo $social_proof;

					if($social_said)
						echo '<cite>' . $social_said . '</cite>';
					echo '</p>';
				}

				echo '</div></div>';
				echo $after_widget;
			}
		}
		else
		{
			echo $before_widget;

			if($spacing)
				echo '<div class="optin_outer no-spacing">';
			else
				echo '<div class="optin_outer">';

			echo '<div class="optin_wrapper">';

			if($title)
				echo $before_title . $title . $after_title;
		
			if($description)
				echo wpautop($description);

			if($optin_code)
				echo $optin_code;
		
			if(!empty($social_proof) || !empty($social_said))
			{
				echo '<p class="social_proof">';
					echo $social_proof;

				if($social_said)
					echo '<cite>' . $social_said . '</cite>';
				echo '</p>';
			}

			echo '</div></div>';
			echo $after_widget;
		}
	}

	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['description'] = $new_instance['description'];
		$instance['optin_code'] = $new_instance['optin_code'];
		$instance['social_proof'] = $new_instance['social_proof'];
		$instance['social_said'] = $new_instance['social_said'];
		$instance['single'] = $new_instance['single'];
		$instance['spacing'] = $new_instance['spacing'];

		return $instance;
	}

	function form($instance)
	{
		$defaults = array(
			'title' => __('Optin Headline', 'uxde'), 
			'description' => __('Explain to people why people should signup to your newsletter. Be as concise as possible, and <em>very</em> convincing!', 'uxde'),
			'optin_code' => __('Paste your optin code here (read documentation if you need help finding your optin code)', 'uxde'),
			'social_proof' => __('"Social proof helps convert &mdash; if you can find a testimonial about your blog somewhere, you should put it in this space."', 'uxde'),
			'social_said' => __('&mdash; Toan Nguyen Minh', 'uxde'),
			'single' => 0,
			'spacing' => 0
		);
		$instance = wp_parse_args((array) $instance, $defaults); ?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'uxde'); ?></label>
			<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('description'); ?>"><?php _e('Description:', 'uxde'); ?></label>
			<textarea id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>" class="widefat" rows="4" cols="20"><?php echo $instance['description']; ?></textarea>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('optin_code'); ?>"><?php _e('Optin Code:', 'uxde'); ?></label>
			<textarea id="<?php echo $this->get_field_id('optin_code'); ?>" name="<?php echo $this->get_field_name('optin_code'); ?>" class="widefat" rows="7" cols="20"><?php echo $instance['optin_code']; ?></textarea>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('social_proof'); ?>"><?php _e('Social Proof:', 'uxde'); ?></label>
			<textarea id="<?php echo $this->get_field_id('social_proof'); ?>" name="<?php echo $this->get_field_name('social_proof'); ?>" class="widefat" rows="4" cols="20"><?php echo $instance['social_proof']; ?></textarea>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('social_said'); ?>"><?php _e('Who said it:', 'uxde'); ?></label>
			<input id="<?php echo $this->get_field_id('social_said'); ?>" name="<?php echo $this->get_field_name('social_said'); ?>" value="<?php echo $instance['social_said']; ?>" class="widefat" type="text" />
		</p>
		<p>
	    	<input class="checkbox" type="checkbox" <?php checked((bool) $instance['single'], true); ?> id="<?php echo $this->get_field_id('single'); ?>" name="<?php echo $this->get_field_name('single'); ?>" />
	    	<label for="<?php echo $this->get_field_id('single'); ?>"><?php _e('Show on single post only', 'uxde'); ?></label>
		</p>
		<p>
	    	<input class="checkbox" type="checkbox" <?php checked((bool) $instance['spacing'], true); ?> id="<?php echo $this->get_field_id('spacing'); ?>" name="<?php echo $this->get_field_name('spacing'); ?>" />
	    	<label for="<?php echo $this->get_field_id('spacing'); ?>"><?php _e('Don\'t wrap to edge of content area', 'uxde'); ?></label>
		</p>
	<?php
	}
}