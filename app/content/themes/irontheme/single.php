<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package mytheme
 */

get_header();
?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main article">

    <?php
    while ( have_posts() ) :
      the_post(); ?>

    <div class="article__container">

	    <?php get_template_part( 'template-parts/breadcrumbs' ); ?>

      <div class="article__img">
        <?php the_post_thumbnail('full'); ?>
      </div>

      <div class="article__head">
        <h1 class="article__title"><?php the_title(); ?></h1>
        <time class="article__publish" datetime="<?php echo get_the_date( 'Y-m-d' ); ?>"><?php echo get_the_date(); ?></time>
      </div>

      <div class="article__body">
        <?php the_content(); ?>
      </div>

	    <?php get_template_part( 'template-parts/subscribe' ); ?>

    </div>

    <?php endwhile; // End of the loop.
    ?>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
