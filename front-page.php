<?php 
global $wp_query,$post;
get_header(); 
if ( have_posts() ) :
the_content();
endif; 
get_footer();
?>