<?php
$subscribe = get_field( 'subscribe', 'option' );

if ($subscribe['shortcode_form']): ?>
<div class="subscribe">
  <?php if ($subscribe['title']): ?>
	  <h4 class="subscribe__title"><?php echo $subscribe['title']; ?></h4>
  <?php endif; ?>

  <?php echo do_shortcode( $subscribe['shortcode_form'] ); ?>

</div>
<?php endif; ?>