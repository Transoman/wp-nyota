<?php
function load_more_post(){
	$args = unserialize( stripslashes( $_POST['query'] ) );
	$args['paged'] = $_POST['page'] + 1;
	$args['post_status'] = 'publish';

	query_posts( $args );
	if ( have_posts() ) :
		while( have_posts() ): the_post();
			get_template_part( 'template-parts/blog', 'card' );
		endwhile;
	endif;
	die();
}
add_action('wp_ajax_load_more_post', 'load_more_post');
add_action('wp_ajax_nopriv_load_more_post', 'load_more_post');