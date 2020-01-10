<?php
/**
 * Template Name: Blog
 */
get_header(); ?>

	<section class="blog">
		<div class="container">
			<div class="row">
				<div class="blog__left">
					<div class="section-head">
						<h1 class="section-title"><?php the_title(); ?></h1>

						<?php $descr = get_field( 'description' );
						if ($descr): ?>
							<p class="section-descr"><?php echo $descr; ?></p>
						<?php endif; ?>

						<?php get_template_part( 'template-parts/subscribe' ); ?>
					</div>

					<?php $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
					$args = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => $count ? $count : get_option('posts_per_page'),
						'paged' => $paged
					);

					$articles = new WP_Query( $args );

					if ($articles->have_posts()): ?>
						<div class="blog-list row" id="response">
							<?php while ($articles->have_posts()): $articles->the_post(); ?>
								<?php get_template_part( 'template-parts/blog', 'card' ); ?>
							<?php endwhile; wp_reset_postdata(); ?>
							<?php if ( $articles->max_num_pages > 1 ) : ?>
                <script>
                  var true_posts = '<?php echo serialize($articles->query_vars); ?>';
                  var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
                  var max_pages = '<?php echo $articles->max_num_pages; ?>';
                </script>
                <div class="blog-list__btn text-center">
                  <a href="#" class="btn load-more">Load More Posts</a>
                </div>
							<?php endif; ?>
						</div>
					<?php endif; ?>

				</div>

				<div class="blog__right">
					<div class="sidebar">
            <h3 class="sidebar__title">The latest news</h3>

            <div class="widget widget-search">
              <form action="<?php echo home_url( '/' ); ?>"  method="get">
                <input type="text" name="s" placeholder="Enter a topic or title you’d like to learn more about…" required>
                <input type="submit" class="btn" value="Search">
              </form>
            </div>

            <div class="widget widget-last-post">

              <?php
              $args_last_post = array(
	              'post_type' => 'post',
	              'post_status' => 'publish',
	              'posts_per_page' => 3
              );

              $last_post = new WP_Query( $args_last_post );

              if ($last_post->have_posts()):
              ?>
              <div class="last-post">
                <?php while ($last_post->have_posts()): $last_post->the_post(); ?>
                  <div class="last-post__item">
                    <h4 class="last-post__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>" class="btn btn--transparent">Read More</a>
                  </div>
                <?php endwhile; wp_reset_postdata(); ?>
              </div>
              <?php endif; ?>

            </div>

					</div>
				</div>
			</div>
		</div>
	</section>

<?php get_footer();
