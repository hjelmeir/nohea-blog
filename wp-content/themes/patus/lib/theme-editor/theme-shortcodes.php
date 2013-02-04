<?php

function uxde_contact($atts, $content = null) {
	
	$loading = get_template_directory_uri().'/images/content-loader.gif';
	
	return ' 
	<div class="contact">
	
		<form data-loading="'.$loading.'" action="'.get_template_directory_uri().'/send.php" method="GET" data-email="'.of_get_option('uxde_contact_email').'" data-subject="'.__('Visitor Message', 'uxde').'">
		
			<!-- .alert-box success -->
			<div class="alert-box success">'.__('Thank you!, We\'ll be in touch shortly', 'uxde').'</div>
			<!-- /.alert-box success -->
			
			<!-- .alert-box error -->
			<div class="alert-box error">'.__('Oops!, Looks like something went wrong, ensure you have entered all details correctly!', 'uxde').'</div>
			<!-- /.alert-box error -->
		
			<p>
				<input type="text" class="name" placeholder="'.__('Name', 'uxde').'" />
				<input type="text" class="email" placeholder="'.__('Email', 'uxde').'" />
				<input type="website" class="website" placeholder="'.__('Website', 'uxde').'" />
			</p>
			<p>
				<textarea name="message" class="message" id="" cols="30" rows="10"></textarea>
			</p>
			<p>
				<input type="submit" id="submit" value="'.__('Submit', 'uxde').'" />
			</p>
		</form>
		
	</div>
	';
	
}

add_shortcode('contact-form', 'uxde_contact');


function uxde_slider($atts, $content = null) {
	
	$atts = shortcode_atts(array(
		'autoplay' => 4000
	), $atts);

	$content = do_shortcode( $content );
	
	return ' 
	<!-- .slider-gallery-->
	<div class="slider-gallery" data-autoplay="'.$atts['autoplay'].'"> 
		
		<!-- .slides -->
		<div class="slides">' . $content . '</div>
		<!-- /.slides -->
		
		<!-- .pager -->
		<div class="pager">
			<!-- .inside -->
			<div class="inside"></div>
			<!-- /.inside -->
		</div>
		<!-- /.pager -->
					  		
	</div>
	<!-- /.slider-gallery-->
	';
	
}

add_shortcode('slider', 'uxde_slider');


function uxde_slide($atts, $content = null) {
	
	$atts = shortcode_atts(array(), $atts);
	
	$content = do_shortcode( $content );
		
	return '<div class="slide">' . $content . '</div>';
	
}

add_shortcode('slide', 'uxde_slide');


function uxde_callout($atts, $content = null) {
	
	$atts = shortcode_atts(array(
		'image' => '',
		'quote' => ''
	), $atts);
	
	$content = do_shortcode( $content );
		
	$output = '<div class="callout clearfix">';
	
	if($atts['image']) {
		$output .= '<div class="callout-image"> <img src="' . $atts['image'] . '" alt="" /></div>';
	}
	
	$output .= '<div class="callout-content">';
	
	if($atts['quote']) {
		$output .= '<div class="callout-quote">
						<div class="quote-left"></div>
						<div class="quote-right"></div>
						'.$atts['quote'].'
					</div>';
	}
	
	
	$output .= $content . '</div>';
	
	$output .= '</div>';
	
	return $output;
	
}

add_shortcode('callout', 'uxde_callout');


// Tabs Main [tabs tab1="xxxxx" tab2="xxxxx"][/tabs]
function tabs_main($atts, $content = null) {

	extract(shortcode_atts(array(
    ), $atts));

	global $tab_counter_2;

	$tab_counter_1 = 1;
	$tab_counter_2 = 1;
	
	$output = '';

	$output .= '<dl class="tabs mobile">';

	foreach ($atts as $tab) {
		$output .= '<dd><a href="#tab-' . get_the_ID() . '-' . $tab_counter_1 . '">' .$tab. '</a></dd>';
		$tab_counter_1++;
	} 

	$output .= '</dl>';
	
	$output .= '<ul class="tabs-content">';
	
	$output .= do_shortcode($content);

	$output .='</ul>';

	return shortcode_unautop( $output );

	unset($tab_counter_2);

}

add_shortcode('tabs', 'tabs_main');

// Tab Elements [tab][/tab]
function tab_elements($atts, $content = null) {
	extract(shortcode_atts(array(
    ), $atts));

	global $tab_counter_2;
	
	$output = '';


	$output .= '<li id="tab-' . get_the_ID() . '-' . $tab_counter_2 . 'Tab">' . do_shortcode($content) . '</li>';

	$tab_counter_2++;
	
	return shortcode_unautop($output);

}
add_shortcode('tab', 'tab_elements');
