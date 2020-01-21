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

  <?php if (get_field( 'donate_form', 'option' )): ?>
    <div class="modal" id="donation-contact-modal">
      <button class="donation-contact-modal_close modal__close"></button>

      <h3 class="modal__title">Contact Information</h3>

      <?php echo do_shortcode( get_field( 'donate_form', 'option' ) ); ?>

      <script>
        jQuery(document).ready(function($) {
          var id,
          productName = '',
          price = 0,
          qty = 0,
          total = 0;

          $('.donation-contact-modal_open').click(function() {
            id = $(this).data('modal-id');
            productName = $(this).parents('.donation-list__item').find('.donation-list__title').text();
            price = $(this).data('donat-price');
            qty = $('#donation-contact-modal input[name="your-quantity"]').val();
            total = qty * parseInt(price);

            $('#donation-contact-modal input[name="your-item"]').val(productName);
            $('#donation-contact-modal input[name="your-sum"]').val('$ ' + total);
          });

          $('#donation-contact-modal input[name="your-quantity"]').change(function() {
            qty = $(this).val();
            total = qty * price;

            $('#donation-contact-modal input[name="your-sum"]').val('$ ' + total);
          });

          var formId = $('#donation-contact-modal input[name="_wpcf7"]').val();

          $('.wpcf7[id*="wpcf7-f' + formId + '"]').on('wpcf7:mailsent', function() {
            var modal = $('.modal');
            modal.popup("hide");

            $("#" + id).find('input[name="amount"]').val(total);

            $("#" + id).popup("show");
          });
        });
      </script>
    </div>
  <?php endif; ?>

  <div class="modal" id="thank-donation-modal">
    <button class="thank-donation-modal_close modal__close"></button>
    <h3 class="modal__title">Thank you for the donation!</h3>
  </div>

<?php wp_footer(); ?>

</body>
</html>
