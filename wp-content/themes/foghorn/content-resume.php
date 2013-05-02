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
	<header class="entry-header clearfix">
    <ul class="resume-links">
      <li><a href="<?=bloginfo('url')?>" target="_blank" title="Robin's Personal Site"><i class="icons link"></i>noheadesigns.com</a></li>
      <li><a href="<?=bloginfo('url')?>/contact" target="_blank" title="Contact Robin"><i class="icons email"></i>&#104;&#106;&#101;&#108;&#109;&#101;&#105;&#114; at &#103;&#109;&#097;&#105;&#108;</a></li>
      <li><a href="http://github.com/hjelmeir" target="_blank" title="Robin's Github Account"><i class="icons github"></i>github.com/hjelmeir</a></li>
      <li><a href="http://twitter.com/RobinHjelmeir" target="_blank" title="Robin's Twitter Account"><i class="icons twitter"></i>twitter.com/RobinHjelmeir</a></li>
      <li><a href="http://dribbble.com/hjelmeir" target="_blank" title="Robin's Dribbble Account"><i class="icons dribbble"></i>dribbble.com/hjelmeir</a></li>
      <li><a href="http://www.linkedin.com/in/hjelmeir" target="_blank" title="Robin's Linkedin Account"><i class="icons dribbble"></i>linkedin.com/in/hjelmeir</a></li>
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
        <p>Started as secretary/front-end developer in basic PHP, then grew into WordPress, Codeigniter, OpenCart, etc. Grew into larger scale development both front and back-end in PHP and Ruby. My focus was front-end while growing in my back-end skills with a dab of design here and there.</p>
      </article>
      <div class="clearfix"></div>
      <aside class="date">05. 2008<br/>02. 2007</aside>
      <article>
        <h4 class="green"><a href="http://www.tiffe.org/" target="_blank" rel="nofollow">The Institute For Family Enrichment</a> <em>Hilo,  HI  USA</em></h4>
        <h2>Skills Trainer, ParaProfessional</h2>
        <p>Assisted children with mental, physical and/or behavioral issues within an academic or home environment with growth in fine motor, social, and job skills through the use of positive reinforcement techniques.</p>
      </article>
      <div class="clearfix"></div>
      <aside class="date">05. 2006<br/>12. 2006</aside>
      <article>
        <h4 class="green"><a href="http://www.kilauea.net/" target="_blank" rel="nofollow">Kilauea WebWorks</a> <em>Hilo,  HI  USA</em></h4>
        <h2>Web Developer</h2>
        <p>Introduction into web development and into building PHP sites. Mostly the ‘updater’. Helped build features on an internal custom time tracker system/CMS.</p>
      </article>
    </div>
  </section>
  <div class="clearfix"></div>
  <section class="floatleft education">
    <div class="decor"><i class="icons education"></i>
      <h4 class="blue">University of Hawaii at Hilo <em>Hilo, Hawaii USA</em></h4>
      <p><strong>Major:</strong>  Computer Science<br>
      <strong>Degree:</strong>  BS in Computer Science</p>
      <h4 class="blue">Tool List</h4>
      <small class="lightgrey">jQuery, CoffeeScript, CSS3, SASS, HAML, Ruby, PHP, HTML5, WordPress, OpenCart, Codeigniter, Magento, Concrete5, Mysql, MacVim, Git ...</small>
    </div>
   </section>
  <section class="floatleft skills">
    <div class="decor"><i class="icons skills"></i>
      <h4>HTML5</h4>
      <div class="stars">
        <div class="row">
          <i class="icons star"></i>
          <i class="icons star"></i>
          <i class="icons star"></i>
          <i class="icons star"></i>
          <i class="icons grey"></i>
          <i class="icons grey"></i>
        </div>
      </div>
      <h4>css3</h4>
      <div class="stars">
        <div class="row">
          <i class="icons star"></i>
          <i class="icons star"></i>
          <i class="icons star"></i>
          <i class="icons star"></i>
          <i class="icons star"></i>
          <i class="icons grey"></i>
        </div>
      </div>
      <h4>Ruby/Rails</h4>
      <div class="stars">
        <div class="row">
          <i class="icons star"></i>
          <i class="icons star"></i>
          <i class="icons half"></i>
          <i class="icons grey"></i>
          <i class="icons grey"></i>
          <i class="icons grey"></i>
        </div>
      </div>
      <h4>WordPress</h4>
      <div class="stars">
        <div class="row">
          <i class="icons star"></i>
          <i class="icons star"></i>
          <i class="icons star"></i>
          <i class="icons star"></i>
          <i class="icons half"></i>
          <i class="icons grey"></i>
        </div>
      </div>
      <h4>Photoshop</h4>
      <div class="stars">
        <div class="row">
          <i class="icons star"></i>
          <i class="icons star"></i>
          <i class="icons star"></i>
          <i class="icons grey"></i>
          <i class="icons grey"></i>
          <i class="icons grey"></i>
        </div>
      </div>
      <h4>JS/jQuery</h4>
      <div class="stars">
        <div class="row">
          <i class="icons star"></i>
          <i class="icons star"></i>
          <i class="icons star"></i>
          <i class="icons half"></i>
          <i class="icons grey"></i>
          <i class="icons grey"></i>
        </div>
      </div>
    </div>
  </section>

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
<?php get_footer(); ?>
