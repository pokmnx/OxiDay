<?php 
/*
*   Template Name: Contact
*/
global $wp_query,$post;
get_header(); 
?> 
<div class="breadcrumbs">
<div class="container">
<ul class="clearfix"> 
<?php
  
if ($post->post_parent!=0) {
$post_parent=get_post($post->post_parent); 
if (isset($post_parent->ID))
{
?>
<li><a href="<?php echo get_permalink($post_parent->ID); ?>"><?php echo $post_parent->post_title; ?></a></li>  
<li><?php print the_title();?></li>
<?
}
}
else
{
?>
<li><a href="<?php echo get_permalink($post->ID); ?>"><?php print $post->post_title;?></a></li> 
<?php } ?>
</ul>
</div>
</div> 
<div class="pages">
<div class="container"> 
<?php the_content(); ?>
</div>
</div> 
<?php	
	  
get_footer();
?>