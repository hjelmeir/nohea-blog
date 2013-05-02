<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Foghorn
 * @since Foghorn 0.1
 */
?><!DOCTYPE html>
<!--[if lt IE 9]>
<html id="ie" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'foghorn' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?= bloginfo('url') ?>/assets/css/style.css" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?= bloginfo('url') ?>/assets/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
  wp_register_script('jQuery', get_bloginfo('url').'/assets/js/jquery-1.8.1.js');
  wp_enqueue_script('jQuery');
  wp_register_script('nohea-custom', get_bloginfo('url').'/assets/js/custom.js', array('jQuery'), 1.0, true);
  wp_enqueue_script('nohea-custom');

  //wp_register_script( $handle, $src, $deps, $ver, $in_footer )
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed">
  <aside class="connect-with-me">
    <!--a href="<?=bloginfo('url')?>/contact" class="toggle-connect">Connect with me</a-->
    <div id="social-menu-toggle"><img src="<?=bloginfo('url')?>/assets/images/icons/menu.png" alt="Menu"></div>
    <div class="social-connections">
      <a href="http://dribbble.com/hjelmeir" class="dribble" title="Connect with Nohea Designs on Dribble" target="_blank"><img src="<?=bloginfo('url')?>/assets/images/icons/dribbble.png" alt="Nohea Designs on Dribble"></a>

      <a href="https://github.com/hjelmeir" class="github" title="Connect with Nohea Designs on Github" target="_blank"><img src="<?=bloginfo('url')?>/assets/images/icons/github.png" alt="Nohea Designs on Github"></a>

      <a href="http://www.linkedin.com/pub/robin-hjelmeir/40/181/a1a" class="linkedin" title="Connect with Nohea Designs on Linkedin" target="_blank"><img src="<?=bloginfo('url')?>/assets/images/icons/linkedin.png" alt="Nohea Designs on Linkedin"></a>

      <a href="https://twitter.com/RobinHjelmeir" class="twitter" title="Connect with Nohea Designs on Twitter" target="_blank"><img src="<?=bloginfo('url')?>/assets/images/icons/twitter.png" alt="Nohea Designs on Twitter"></a>

     <?php /* <a href="vimeo" class="vimeo" title="Connect with Nohea Designs on Twitter" target="_blank"><img src="<?=bloginfo('url')?>/assets/images/icons/vimeo.png" alt="Nohea Designs on Vimeo"></a>

      <a href="http://www.youtube.com/user/rhjelmeir" class="twitter" title="Connect with Nohea Designs on Twitter" target="_blank"><img src="<?=bloginfo('url')?>/assets/images/icons/youtube.png" alt="Nohea Designs on Twitter"></a> */ ?>

      <a href="<?=bloginfo('url')?>/feed" class="rss" title="Nohea Designs on RSS Feed" target="_blank"><img src="<?=bloginfo('url')?>/assets/images/icons/rss.png" alt="Nohea Designs RSS Feed"></a>

    </div>
  </aside>
	<header id="branding" role="banner" class="clearfix">
			<hgroup>
				<h1 id="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<?php if ( of_get_option('logo', false) ) { ?>
					<img src="<?php echo of_get_option('logo'); ?>" alt="<?php bloginfo( 'name' ) ?>" />
				<?php } else {
					bloginfo( 'name' );
				}?>
				</a></span></h1>
                <?php if ( of_get_option('tagline',false) ) { ?>
					<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
                <?php } ?>
			</hgroup>

			<nav id="access" role="navigation">
				<h1 class="section-heading"><?php _e( 'Main menu', 'foghorn' ); ?></h1>
				<?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'foghorn' ); ?>"><?php _e( 'Skip to content', 'foghorn' ); ?></a></div>
				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assiged to the primary position is the one used. If none is assigned, the menu with the lowest ID is used. */ ?>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #access -->
	</header><!-- #branding -->


	<div id="main" class="clearfix">
