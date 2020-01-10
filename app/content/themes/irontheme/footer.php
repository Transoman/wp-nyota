  </div><!-- /.content -->

  <footer class="footer">
    <div class="container">
      <div class="footer__top">
        <a href="<?php echo home_url( '/' ); ?>" class="logo footer__logo">
          <img src="<?php echo THEME_URL; ?>/images/general/logo-white.png" width="172" alt="Nyota">
        </a>
      </div>
      <div class="footer__bottom">
        <p class="copy">All Rights Reserved © Nyota Inc</p>

        <?php if (has_nav_menu( 'footer' )): ?>
          <?php
          wp_nav_menu( array(
            'theme_location' => 'footer',
            'menu'            => '',
            'container'       => '',
            'container_class' => '',
            'container_id'    => '',
            'menu_class'      => 'footer-menu',
            'menu_id'         => '',
          ) );
          ?>
        <?php endif; ?>
      </div>
    </div>
  </footer><!-- #colophon -->

</div><!-- /.wrapper -->

  <div class="modal" id="contact-modal">
    <button class="contact-modal_close modal__close"></button>

    <h3 class="modal__title">Contact Us</h3>

    <div class="modal__content">
      <?php echo do_shortcode( '[contact-form-7 id="8" title="Contact Us"]' ); ?>
    </div>
  </div>

  <div class="modal" id="request-modal">
    <button class="request-modal_close modal__close"></button>

    <h3 class="modal__title">Request a Quote</h3>

    <div class="modal__content">
      <?php echo do_shortcode( '[contact-form-7 id="62" title="Request a Quote"]' ); ?>
    </div>
  </div>

  <!--<div class="modal" id="donation-modal">
    <button class="donation-modal_close modal__close"></button>

    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
      <input type="hidden" name="cmd" value="_s-xclick" />
      <input type="hidden" name="hosted_button_id" value="M5SY8DFQE9JGN" />
      <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
      <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
    </form>


    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
      <input type="hidden" name="business"
             value="sb-gploy859293@business.example.com">

      <input type="hidden" name="cmd" value="_xclick">

      <input type="hidden" name="item_name" value="Friends of the Park">
      <input type="hidden" name="item_number" value="Fall Cleanup Campaign">
      <input type="hidden" name="amount" value="1.00">
      <input type="hidden" name="currency_code" value="USD">
      <input type="hidden" name="callback_url" value="http://nyota.loc/give-a-campaign/">

      <input type="image" name="submit"
             src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif"
             alt="Donate">
      <img alt="" width="1" height="1"
           src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
    </form>
  </div>-->

<?php wp_footer(); ?>

</body>
</html>
