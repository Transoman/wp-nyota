<div class="blog-list__item">
	<a href="<?php the_permalink(); ?>" class="blog-list__img">
		<?php the_post_thumbnail('blog'); ?>
	</a>
	<div class="blog-list__body">
		<h3 class="blog-list__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<time class="blog-list__publish" datetime="<?php echo get_the_date( 'Y-m-d' ); ?>"><?php echo get_the_date(); ?></time>
		<?php the_excerpt(); ?>
	</div>
	<div class="blog-list__bottom">
		<a href="<?php the_permalink(); ?>" class="btn btn--transparent">Read More</a>
	</div>
</div>