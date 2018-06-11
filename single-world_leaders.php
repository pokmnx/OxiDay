<?php 
global $wp_query,$post;
get_header(); 
if ( have_posts() ) :
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
<?php
$big_image = '';
if ( has_post_thumbnail() ) {
$big_image = get_the_post_thumbnail_url($post->ID,'full'); 

} 
?>
<section class="page-banner " <?php if ($big_image!='') print ' style="background:url('.$big_image.') center center no-repeat;" ';?>>
<div class="page-banner-contents d-flex align-items-center">
<div class="container">
<div class="row">
<div class="col-lg-8 offset-lg-2">
<h2 class="text-center montserrat-font font-weight-600 white-color">
<?php 
$title_for_page = get_field('title_for_page',$post->ID);

if ($title_for_page!='') print '<span>'.$title_for_page.'</span>'; else print the_title();
?>
 </h2> 

</div>
</div>
</div>
</div>
</section>
<div class="pages">
<div class="container">
<?php the_content();  ?>
</div> 
</div> 
<?php	
	 
endif; 
get_footer();
?>