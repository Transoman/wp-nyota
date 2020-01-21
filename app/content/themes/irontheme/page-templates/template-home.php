<?php
/**
 * Template Name: Home
 */
get_header(); ?>

<?php

if ( have_rows('home_layout') ):

  while ( have_rows('home_layout') ) : the_row();

    if ( get_row_layout() == 'hero' ): ?>

    <section class="hero">
      <div class="container">
        <div class="row">
          <div class="hero__left">
            <?php $title = get_sub_field( 'title' );
            if ($title): ?>
              <h1 class="hero__title"><?php echo $title; ?></h1>
            <?php endif; ?>

            <?php the_sub_field( 'text' ); ?>
          </div>
          <?php $image = get_sub_field( 'image' );
          if ($image): ?>
            <div class="hero__right">
              <?php echo wp_get_attachment_image( $image, 'full', '', array('class' => 'hero__img') ); ?>
              <img src="<?php echo THEME_URL; ?>/images/general/lining.png" class="parallax parallax-1" alt="" data-rellax-percentage="0.5">
            </div>
          <?php endif; ?>
        </div>
      </div>
    </section>


    <?php elseif ( get_row_layout() == 'video' ): ?>

      <section class="s-video">
        <div class="container">
          <div class="s-video__wrap">
            <img src="<?php echo THEME_URL; ?>/images/general/lining.png" class="parallax parallax-2" alt="" data-rellax-speed="1" data-rellax-percentage="0.5">
	          <?php
              if (get_sub_field('video_link')): ?>
              <div class="video">
                <?php  global $wp_embed;
                  echo $wp_embed->autoembed( esc_url( get_sub_field( 'video_link' ) ) );
                ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </section>

    <?php endif;

  endwhile;
endif; ?>

<?php get_footer();