<?php
/**
 * Template Name: Give a campaign
 */
get_header(); ?>

<?php

if ( have_rows('give_layout') ):

	while ( have_rows('give_layout') ) : the_row();

		if ( get_row_layout() == 'content' ): ?>

			<section class="give">
				<div class="container">
					<?php $logo = get_sub_field( 'logo' );
					if ($logo): ?>
            <div class="give__logo">
              <?php echo wp_get_attachment_image( $logo, 'full' ); ?>
            </div>
					<?php endif; ?>
					<div class="give__row">
						<div class="give__left">

							<?php $goal_title = get_sub_field( 'goal_title' );
							$goal_text = get_sub_field( 'goal_text' );

							if ($goal_text): ?>
								<div class="give__goal">
									<?php if ($goal_title): ?>
										<h3 class="give__goal-title"><?php echo $goal_title; ?></h3>
									<?php endif; ?>
									<?php echo $goal_text; ?>
								</div>
							<?php endif; ?>

              <div class="give__text">
							  <?php the_sub_field( 'text' ); ?>
              </div>

              <?php get_template_part( 'template-parts/subscribe' ); ?>

						</div>
						<!-- /.give__left -->

						<div class="give__right">
							<?php if (have_rows( 'slider' )): ?>
								<div class="give-slider swiper-container">
									<div class="swiper-wrapper">
										<?php while (have_rows( 'slider' )): the_row(); ?>
										<div class="give-slider__item swiper-slide">
											<div class="video">
												<a href="<?php echo esc_url(get_sub_field('video_link')); ?>" class="video__link">
													<?php echo wp_get_attachment_image( get_sub_field( 'video_poster' ), 'full', '', array('class' => 'video__media') ); ?>
												</a>
												<button type="button" aria-label="Play Video" class="video__button"></button>
											</div>
										</div>
										<?php endwhile; ?>
									</div>
                  <div class="swiper-pagination"></div>
								</div>
							<?php endif; ?>
						</div>
						<!-- /.give__right -->

					</div>
				</div>
			</section>


		<?php elseif ( get_row_layout() == 'donation' ): ?>

      <section class="donation">
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
            <div class="donation-list row">
              <?php $i = 0; while (have_rows( 'list' )): the_row(); ?>
                <div class="donation-list__item">
                  <div class="donation-list__img">
                    <?php echo wp_get_attachment_image( get_sub_field( 'image' ), 'donation' ); ?>
                  </div>
                  <div class="donation-list__body">
                    <h3 class="donation-list__title"><?php the_sub_field( 'title'); ?></h3>
                    <?php $descr = get_sub_field( 'description' );
                    if ($descr): ?>
                      <p class="donation-list__descr"><?php echo $descr; ?></p>
                    <?php endif; ?>
                  </div>
                  <div class="donation-list__bottom">
                    <p class="donation-list__price">$ <?php the_sub_field( 'price' ); ?></p>
                    <a href="#" class="btn donation-modal-<?php echo $i; ?>_open">Make a gift</a>
                  </div>

                  <div class="modal" id="donation-modal-<?php echo $i; ?>">
                    <button class="donation-modal-<?php echo $i; ?>_close modal__close"></button>

                    <?php echo do_shortcode( '[wp_paypal button="buynow" name="'. get_sub_field( 'title' ) .'" amount="'. get_sub_field( 'price' ) .'" return="'. home_url( '/' ) .'" no_shipping="1"]' ); ?>
                  </div>

                </div>
              <?php $i++; endwhile; ?>
            </div>
          <?php endif; ?>

        </div>
      </section>

		<?php endif;

	endwhile;
endif; ?>

<?php get_footer();