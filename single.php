<?php get_header();?>
<div class="breadcrumbs">
<div class="container">
<ul class="clearfix"> 
<?php
 $blog_post_id =get_option('page_for_posts'); 
$blog_post=get_post($blog_post_id); 
if ($blog_post->post_parent!=0) {
$post_parent=get_post($blog_post->post_parent); 
if (isset($post_parent->ID))
{
?>
<li><a href="<?php echo get_permalink($post_parent->ID); ?>"><?php echo $post_parent->post_title; ?></a></li>  
<?
}
}
?>
<li><a href="<?php echo get_permalink($blog_post->ID); ?>"><?php print $blog_post->post_title;?></a></li>
<?php
$category=get_the_category();
	$cat_title=''; $cat_id=0; $cat_term='';
	if (isset($category[0]->name)) {$cat_title=$category[0]->name;  $cat_id=$category[0]->term_id;$cat_term=$category[0];}
	if ($cat_title!='' AND $cat_id>0)
	{
	?>
<li><a href="<?php print get_term_link($cat_id);?>"><?php print $cat_title;?></a></li>
<?php } ?>
<li><?php print the_title();?></li>
</ul>
</div>
</div>
<?php
$big_image = get_field('big_image',$post->ID);
?>
<section class="page-banner " <?php if (isset($big_image['url'])) print ' style="background:url('.$big_image['url'].') center center no-repeat;" ';?>>
<div class="page-banner-contents d-flex align-items-center">
<div class="container">
<div class="row">
<div class="col-lg-8 offset-lg-2">
<h2 class="text-center montserrat-font font-weight-600 white-color"><?php print the_title();?></h2>

<div class="page-banner-text-block text-center montserrat-font font-weight-600">
<?php if ($cat_id!=0 AND $cat_term!='')
{
	$image_post_category=get_field('svgimage_post_category', $cat_term); 
if (isset($image_post_category)) print '<span>'.$image_post_category.'</span>';
}
if ($cat_title!='') print '<span>'.$cat_title.'</span>';
?>
</div>

</div>
</div>
</div>
</div>
</section>

<div class="pages">
<div class="container">
<?php
$template_for_post = get_field('template_for_post',$post->ID);
if ($template_for_post==1)
{
?>
<?php the_content();  ?>
<?php
}
else
{
?>
<section class="vc_section section-2 white-bg-color about-intro container single_content"><div class="row"><div class="col-md-12">
<?php the_content();  ?>
</div></div></section>
<?
}
?>
</div>
<section class="section white-bg-color about-intro">
<div class="container text-center">
<div class="page-share d-md-inline-flex align-items-center">
<h5 class="font-weight-300 blue-color col p-0">Share <span class="font-weight-600">#OXIcourage</span> with your friends:</h5>
<div class="">

<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook-square"></i></a>
<a href="https://twitter.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-twitter"></i></a>
<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus"></i></a>
</div>
</div>
</div>
</section>
</div> 
<?php get_footer();?>