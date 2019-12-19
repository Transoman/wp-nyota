<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="format-detection" content="telephone=no">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv-printshiv.min.js"></script>
  <![endif]-->
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="wrapper">
  <header class="header">
    <div class="container">

      <a href="<?php echo home_url( '/' ); ?>" class="logo header__logo">
        <img src="<?php echo THEME_URL; ?>/images/general/logo.png" width="172" alt="Nyota">
      </a>

      <?php
      $socials = get_field( 'socials', 'option' );
      $fb = $socials['facebook'];
      $twitter = $socials['twitter'];
      $medium = $socials['medium'];
      $linkedin = $socials['linkedin'];
      $instagram = $socials['instagram'];
      $youtube = $socials['youtube'];
      ?>

      <?php if (has_nav_menu( 'primary' )): ?>
        <nav class="nav header__nav">
          <button type="button" class="nav__close"></button>
          <?php
          wp_nav_menu( array(
            'theme_location' => 'primary',
            'menu'            => '',
            'container'       => '',
            'container_class' => '',
            'container_id'    => '',
            'menu_class'      => 'nav-list',
            'menu_id'         => '',
          ) );
          ?>

          <?php if ($fb || $twitter || $medium || $linkedin || $instagram ||$youtube ): ?>
            <ul class="socials">
              <?php if ($fb): ?>
                <li class="socials__item">
                  <a href="<?php echo esc_url( $fb ); ?>" class="socials__link" target="_blank">
                    <?php ith_the_icon( 'facebook', 'socials__icon' ); ?>
                  </a>
                </li>
              <?php endif; ?>
              <?php if ($twitter): ?>
                <li class="socials__item">
                  <a href="<?php echo esc_url( $twitter ); ?>" class="socials__link" target="_blank">
                    <?php ith_the_icon( 'twitter', 'socials__icon' ); ?>
                  </a>
                </li>
              <?php endif; ?>
              <?php if ($medium): ?>
                <li class="socials__item">
                  <a href="<?php echo esc_url( $medium ); ?>" class="socials__link" target="_blank">
                    <?php ith_the_icon( 'medium', 'socials__icon' ); ?>
                  </a>
                </li>
              <?php endif; ?>
              <?php if ($linkedin): ?>
                <li class="socials__item">
                  <a href="<?php echo esc_url( $linkedin ); ?>" class="socials__link" target="_blank">
                    <?php ith_the_icon( 'linkedin', 'socials__icon' ); ?>
                  </a>
                </li>
              <?php endif; ?>
              <?php if ($instagram): ?>
                <li class="socials__item">
                  <a href="<?php echo esc_url( $instagram ); ?>" class="socials__link" target="_blank">
                    <?php ith_the_icon( 'instagram', 'socials__icon' ); ?>
                  </a>
                </li>
              <?php endif; ?>
              <?php if ($youtube): ?>
                <li class="socials__item">
                  <a href="<?php echo esc_url( $youtube ); ?>" class="socials__link" target="_blank">
                    <?php ith_the_icon( 'youtube', 'socials__icon' ); ?>
                  </a>
                </li>
              <?php endif; ?>
            </ul>
          <?php endif; ?>

          <div class="header__btns">
            <a href="#" class="btn btn--transparent contact-modal_open">Contact us</a>
            <a href="#" class="btn request-modal_open">Request a quote</a>
          </div>

        </nav>
      <?php endif; ?>

      <div class="nav-overlay"></div>

      <?php if ($fb || $twitter || $medium || $linkedin || $instagram ||$youtube ): ?>
        <ul class="socials header__socials">
          <?php if ($fb): ?>
            <li class="socials__item">
              <a href="<?php echo esc_url( $fb ); ?>" class="socials__link" target="_blank">
                <?php ith_the_icon( 'facebook', 'socials__icon' ); ?>
              </a>
            </li>
          <?php endif; ?>
          <?php if ($twitter): ?>
            <li class="socials__item">
              <a href="<?php echo esc_url( $twitter ); ?>" class="socials__link" target="_blank">
                <?php ith_the_icon( 'twitter', 'socials__icon' ); ?>
              </a>
            </li>
          <?php endif; ?>
          <?php if ($medium): ?>
            <li class="socials__item">
              <a href="<?php echo esc_url( $medium ); ?>" class="socials__link" target="_blank">
                <?php ith_the_icon( 'medium', 'socials__icon' ); ?>
              </a>
            </li>
          <?php endif; ?>
          <?php if ($linkedin): ?>
            <li class="socials__item">
              <a href="<?php echo esc_url( $linkedin ); ?>" class="socials__link" target="_blank">
                <?php ith_the_icon( 'linkedin', 'socials__icon' ); ?>
              </a>
            </li>
          <?php endif; ?>
          <?php if ($instagram): ?>
            <li class="socials__item">
              <a href="<?php echo esc_url( $instagram ); ?>" class="socials__link" target="_blank">
                <?php ith_the_icon( 'instagram', 'socials__icon' ); ?>
              </a>
            </li>
          <?php endif; ?>
          <?php if ($youtube): ?>
            <li class="socials__item">
              <a href="<?php echo esc_url( $youtube ); ?>" class="socials__link" target="_blank">
                <?php ith_the_icon( 'youtube', 'socials__icon' ); ?>
              </a>
            </li>
          <?php endif; ?>
        </ul>
      <?php endif; ?>

      <div class="header__btns">
        <a href="#" class="btn btn--transparent contact-modal_open">Contact us</a>
        <a href="#" class="btn request-modal_open">Request a quote</a>
      </div>

      <button type="button" class="nav-toggle">
        <span class="nav-toggle__line"></span>
      </button>

    </div>
  </header><!-- /.header-->

  <div class="content">