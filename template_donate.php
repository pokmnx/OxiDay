<?php 
/*
*   Template Name: Donate
*/
global $wp_query,$post;
get_header(); 
?>
<div class="breadcrumbs">
<div class="container">
<ul class="clearfix"> 
<?php 
$now_post_id=$post->ID;
 
if ($post->post_parent!=0) {
$post_parent=get_post($post->post_parent); 
if (isset($post_parent->ID))
{
?>
<li><a href="<?php echo get_permalink($post_parent->ID); ?>"><?php echo $post_parent->post_title; ?></a></li>  
<?
}
}
else
{
}
?>
<li><a href="<?php echo get_permalink($post->ID); ?>"><?php print $post->post_title;?></a></li>
</ul>
</div>
</div>
<div class="sub-page-menu light-gray-bg d-flex align-items-center">
<div class="container d-flex justify-content-center">
<ul class="text-center">
<?php
$donate=get_page_by_path( 'donate' );
$args = array('post_parent'   => $donate->ID,'post_type'   => 'page','post_status' => 'publish','numberposts' => -1,'orderby'=>'menu_order','order'=>'desc');
$donate_child = get_posts($args);
foreach( $donate_child as $post ):setup_postdata($post);
?>
<li  <?php if ($now_post_id==get_the_ID()) print 'class="current"'; ?>   ><a href="<?php the_permalink(get_the_ID()); ?>"><?php the_title(); ?></a></li>  
<?
endforeach;
wp_reset_postdata();
?>
<li  <?php if ($now_post_id==$donate->ID) print 'class="current"'; ?>   ><a href="<?php the_permalink($donate->ID); ?>"><?php print $donate->post_title; ?></a></li>  
<?
?> 
</ul>
</div>
</div>

<div class="pages">
<div class="container">
<?php the_content();  ?>
</div> 
</div>
<?php
get_footer();
?>