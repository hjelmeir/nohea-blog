<?php
/**
 * Template Name: Resume
 *
 * @package WordPress
 * @subpackage Foghorn
 * @since Foghorn 0.1
 */
get_header();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
    <ul class="resume-links">
      <li><a href="<?=bloginfo('url')?>" target="_blank" title="Robin's Personal Site"><i class="icons link"></i>noheadesigns.com</a></li>
      <li><a href="<?=bloginfo('url')?>/contact" target="_blank" title="Contact Robin"><i class="icons link"></i>hjelmeir@gmail.com</a></li>
      <li><a href="http://github.com/hjelmeir" target="_blank" title="Robin's Github Account"><i class="icons link"></i>github.com/hjelmeir</a></li>
      <li><a href="http://twitter.com/RobinHjelmeir" target="_blank" title="Robin's Twitter Account"><i class="icons link"></i>twitter.com/RobinHjelmeir</a></li>
      <li><a href="http://dribbble.com/hjelmeir" target="_blank" title="Robin's Dribbble Account"><i class="icons link"></i>dribbble.com/hjelmeir</a></li>
    </ul>
    <hgroup>
      <h1 class="entry-title">Robin Hjelmeir</h1>
      <h2>Web Developer and Designer</h2>
    </hgroup>
    <p>Peacekeeper. Encourager. Jack of many trades. Searching for a place with a strong development process to learn and grow in both design and development.</p>
	</header><!-- .entry-header -->
  <section class="employment">
    <div class="decor">
      <i class="icons employment"></i>
      <aside class="date">08. 2009<br>01. 2013</aside>
      <article>
        <h4 class="green"><a href="http://glideinteractive.com" target="_blank" rel="nofollow">Glide Interactive</a> <em>Sarasota, FL USA</em></h4>
        <h2>Web Developer</h2>
        <p>Started as secretary/front-end developer in basic PHP, then grew into Wordpress, Codeigniter, OpenCart, etc. I am now at larger scale development (front and back) in PHP and Ruby. My focus is front-end while growing in my back-end skills with a dab of design here and there.</p>
      </article>
      <div class="clearfix"></div>
      <aside class="date">05. 2008<br/>02. 2007</aside>
      <article>
        <h4 class="green">The Institute For Family Enrichment <em>Hilo,  HI  USA</em></h4>
        <h2>Skills Trainer, ParaProfessional</h2>
        <p>Assisted children with mental, physical and/or behavioral issues within an academic or home environment with growth in fine motor, social, and job skills through the use of positive reinforcement techniques.</p>
      </article>
      <div class="clearfix"></div>
      <aside class="date">05. 2006<br/>12. 2006</aside>
      <article>
        <h4 class="green">Kilauea WebWorks <em>Hilo,  HI  USA</em></h4>
        <h2>Web Developer</h2>
        <p>Introduction into web development and into building PHP sites. Mostly the ‘updater’. Helped build features on an internal custom time tracker system/CMS.</p>
      </article>
    </div>
  </section>

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
<?php get_footer(); ?>
