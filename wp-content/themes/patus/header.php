<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">

	<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
	
	<!-- Mobile viewport optimized: j.mp/bplateviewport -->
	<meta name="viewport" content="width=device-width,initial-scale=1">
	
	<!-- Included Foundation CSS Files -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/foundation.css">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/media-queries.css">
	<link href='http://fonts.googleapis.com/css?family=Dosis:300' rel='stylesheet' type='text/css'>
	
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie.css">
	<![endif]-->
	
	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<!--[if (gte IE 6)&(lte IE 8)]>
	  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/selectivizr-min.js"></script>
	<![endif]-->
	
	<!-- Favicon and Feed -->
	<?php $favicon = of_get_option('uxde_favicon'); ?>
	<?php if($favicon == '') :?>
	<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
	<?php else: ?>
	<link rel="shortcut icon" type="image/png" href="<?php echo $favicon; ?>">
	<?php endif; ?>
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
	
	<!--  iPhone Web App Home Screen Icon -->
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png" />
	
	<?php wp_head(); ?>

	<style type="text/css">

	#secondary-nav ul a:hover,#secondary-nav ul li.current-menu-item a,.widget a:hover { color: <?php $colorpicker = of_get_option('uxde_colorpicker'); ?><?php echo $colorpicker; ?>;}
	#secondary-nav .sub-menu .sfHover li a:hover,#secondary-nav .sub-menu .sfHover a,#secondary-nav .sub-menu a:hover,a:hover.more-link,a.more-link,h5.related-article a:hover,.comment-body .fn a { color: <?php $colorpicker = of_get_option('uxde_colorpicker'); ?><?php echo $colorpicker; ?>;}
	.meta-info,.pagination span,.pagination a,.contact #submit:hover,#respond #submit:hover,#respond #submit:active,.comment-header ul li a { background: <?php $colorpicker = of_get_option('uxde_colorpicker'); ?><?php echo $colorpicker; ?>;}
	blockquote,pre { border-left:3px solid <?php $colorpicker = of_get_option('uxde_colorpicker'); ?><?php echo $colorpicker; ?>;}
	a,a:focus,a:hover { color: <?php $colorlink = of_get_option('uxde_colorlink'); ?><?php echo $colorlink; ?>;}

	</style>

	<?php $headerscripts = of_get_option('uxde_header_scripts'); ?><?php echo $headerscripts; ?>
	
</head>

<body <?php body_class(); ?>>
	
	<!-- Start the main container -->
	<div id="container" class="container" role="document">

		<!-- .container -->
		<div id="header-wrap" class="container">
		
			<!-- Row for navigation -->
			<div class="row">
			
				<header id="header" class="twelve columns" role="banner">
					
					<?php $logo = of_get_option('uxde_logo'); ?>
					
					<div class="logo">

						<?php if($logo == '') :?>
						
						<h1><a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" /></a></h1>
				
						<?php else: ?>
						
							<?php if(is_home() || is_front_page()) : ?>
							<h1>
								<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
									<img src="<?php echo $logo; ?>" alt="<?php bloginfo('name'); ?>" />
								</a>
							</h1>
							<?php else: ?>
							<div>
								<a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>">
									<img src="<?php echo $logo; ?>" alt="<?php bloginfo('name'); ?>" />
								</a>
							</div>
							<?php endif; ?>

						<?php endif; ?>
						
					</div>

					<?php $topad = of_get_option('uxde_top_ad'); ?>
					<?php if($topad == '') :?>
					<?php else: ?>
					<div class="header-banner">
						<?php echo $topad; ?>
					</div>
					<?php endif; ?>
					
				</header>
				
			</div>
		
		</div>
		<!-- /.container -->

		<!-- .container -->
		<div id="menu-wrap" class="container">
		
			<div id="menu-buttons" class="row">

				<nav id="secondary-nav">

					<?php /*
						    Our navigation menu. If one isn't filled out, wp_nav_menu falls
						    back to wp_page_menu. The menu assigned to the primary position is
						    the one used. If none is assigned, the menu with the lowest ID is
						    used. */
							
						    wp_nav_menu( array(
							'theme_location' => 'primary_navigation',
							'container' =>false,
							'menu_class' => '',
							'echo' => true,
							'before' => '',
							'after' => '',
							'link_before' => '',
							'link_after' => '',
							'depth' => 3,
							'items_wrap' => '<ul class="nav hide-on-phones">%3$s</ul>')
						); ?>

				</nav>

				<!-- .custom -->
				<form action="/" class="hide-on-desktops">
							<?php 
							
							$locations = get_registered_nav_menus();
							$menus = wp_get_nav_menus();
							$menu_locations = get_nav_menu_locations();
							
							$location_id = 'mobile_navigation';
							
							if (isset($menu_locations[ $location_id ])) {
								foreach ($menus as $menu) {
									// If the ID of this menu is the ID associated with the location we're searching for
									if ($menu->term_id == $menu_locations[ $location_id ]) {
										// Get the items for this menu
										echo uxde_get_page_selector($menu);
							
										// Now do something with them here.
										//
										//
										break;
									}
								}
							}
							
							?>
						
						
				</form>
				<!-- /.custom -->

				<div id="social-buttons">

					<ul>
						<li class="item-rss"><?php $rss = of_get_option('uxde_rss'); ?><a href="http://feeds.feedburner.com/<?php echo $rss; ?>">RSS</a></li>
						<li class="item-email"><?php $rss = of_get_option('uxde_rss'); ?><a href="http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $rss; ?>">Email</a></li>
						<li class="item-twitter"><?php $twitter = of_get_option('uxde_twitter'); ?><a href="https://twitter.com/<?php echo $twitter; ?>">Twitter</a></li>
						<li class="item-facebook"><?php $facebook = of_get_option('uxde_facebook'); ?><a href="<?php echo $facebook; ?>">Facebook</a></li>
						<li class="item-google"><?php $google = of_get_option('uxde_google'); ?><a href="<?php echo $google; ?>">Google</a></li>
					</ul>

				</div>

			</div>

		</div>
		<!-- /.container -->

		<?php if ( function_exists( 'patus' ) ) patus( 0, true ); ?>
		
		<!-- .container -->
		<div id="main-wrap" class="container">
		
			<!-- Row for main content area -->
			<div id="main" class="row">