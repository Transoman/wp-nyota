<?php
/**
 * Template Name: Story
 */
get_header(); ?>

<?php

if ( have_rows('story_layout') ):

  while ( have_rows('story_layout') ) : the_row();

    if ( get_row_layout() == 'facts_1' ): ?>

      <section class="our-story-1">
        <div class="container">
          <div class="section-head text-center">
            <?php $title = get_sub_field( 'title' );
            $descr = get_sub_field( 'description' );
            if ($title): ?>
              <h2 class="section-title"><?php echo $title; ?></h2>
            <?php endif; ?>

            <?php if ($descr): ?>
              <p class="section-descr"><?php echo $descr; ?></p>
            <?php endif; ?>
          </div>

          <?php if (have_rows( 'list' )): ?>
            <div class="our-story-1__list row">
              <?php while (have_rows( 'list' )): the_row(); ?>
                <div class="our-story-1__list-item">
                  <div class="icon-box">
                    <div class="icon-box__icon-wrap">
                      <div class="icon-box__icon-inner">
                        <?php echo wp_get_attachment_image( get_sub_field( 'icon' ), 'full', '', array('class' => 'icon-box__icon') ); ?>
                      </div>
                    </div>
                    <h3 class="icon-box__title"><?php the_sub_field( 'title' ); ?></h3>
                    <p class="icon-box__descr"><?php the_sub_field( 'text' ); ?></p>
                  </div>
                </div>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>
        </div>
      </section>

    <?php elseif ( get_row_layout() == 'facts_2' ): ?>

      <section class="our-story-2">
        <div class="container">
          <?php $title = get_sub_field( 'title' );
          $descr = get_sub_field( 'text' );
          if ($title): ?>
            <h2 class="section-title text-center"><?php echo $title; ?></h2>
          <?php endif; ?>

          <?php if (have_rows( 'list' )): ?>
            <div class="our-story-2__list row">
              <?php while (have_rows( 'list' )): the_row(); ?>
                <div class="our-story-2__list-item">
                  <div class="icon-box">
                    <div class="icon-box__icon-wrap">
                      <div class="icon-box__icon-inner">
                        <?php echo wp_get_attachment_image( get_sub_field( 'icon' ), 'full', '', array('class' => 'icon-box__icon') ); ?>
                      </div>
                    </div>
                    <h3 class="icon-box__title"><?php the_sub_field( 'title' ); ?></h3>
                  </div>
                </div>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>

          <?php if ($descr): ?>
            <div class="our-story-2__descr"><?php echo $descr; ?></div>
          <?php endif; ?>
        </div>
      </section>

    <?php endif;

  endwhile;
endif; ?>

<?php get_footer();