<?php get_header();?>
<div class="breadcrumbs">
<div class="container">
<ul class="clearfix"> 
<?php
$media=get_page_by_path( 'medias' );  
if ($media->post_parent!=0) {
$post_parent=get_post($media->post_parent); 
if (isset($post_parent->ID))
{
?>
<li><a href="<?php echo get_permalink($post_parent->ID); ?>"><?php echo $post_parent->post_title; ?></a></li>  
<?
}
}
?>
<li><a href="<?php echo get_permalink($media->ID); ?>"><?php print $media->post_title;?></a></li>
<?php
$category=get_the_terms( $post->ID, 'media-category');  
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
$big_image = get_field('big_image',get_the_ID());
$big_image_url='';
if ($big_image!='')
{
if (isset($big_image['url'])) $big_image_url=$big_image['url'];
else
{
	$urls=wp_get_attachment_image_src($big_image,'full'); 
	if (isset($urls[0])) $big_image_url=$urls[0];
}
}
?>
<section class="page-banner " <?php if ($big_image_url!='') print ' style="background:url('.$big_image_url.') center center no-repeat;" ';?>>
<div class="page-banner-contents d-flex align-items-center">
<div class="container">
<div class="row">
<div class="col-lg-8 offset-lg-2">
<h2 class="text-center montserrat-font font-weight-600 white-color"><?php print the_title();?></h2>

<div class="page-banner-text-block text-center montserrat-font font-weight-600">
<?php if ($cat_id!=0 AND $cat_term!='')
{
	$image_post_category=get_field('svgimage_post_category', $cat_term); 
	$title_for_media_category = get_field('title_for_media_category', $cat_term);
	if ($title_for_media_category!='') $cat_title=$title_for_media_category;    
$cat_img='';	
if (isset($image_post_category['url'])) 
{
$image=wp_get_attachment_image_src( $image_post_category['ID'],'full' );
$cat_img= '<span><img src="'.$image[0].'"></span>';
}
}
$svgimage_post_category = get_field('svgimage_post_category', $cat_term);
	if ($svgimage_post_category!='')
	{
	$cat_img='<span >'.$svgimage_post_category.'</span>';	
	}
$category_media_type = get_field('category_media_type', $cat_term);
if ($category_media_type=='photos') 
{

print '<div class="cat_short_text">'.get_the_excerpt().'</div>';
}	
if ($cat_title!='') print $cat_img.'<span>'.$cat_title.'</span>';
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
$oxiday_photoset_id=get_post_meta(get_the_ID(), 'oxiday_photoset_id') ;
 if (!empty($oxiday_photoset_id[0])) {
?>
<section class="vc_section section-2 white-bg-color about-intro"><div class="row container"><div class="col-sm-12">
<div class="vc_column-inner "><div class="wpb_wrapper">

<div class="row vc_inner"><div class="col-sm-12"><div class="vc_column-inner "><div class="wpb_wrapper">
	<div class="wpb_raw_code wpb_content_element wpb_raw_html">
		<div class="wpb_wrapper">
	<?php
	$attr=array();
					$attr['album']=$oxiday_photoset_id[0];
					 gallery_flickr_func($attr);
					 ?>

			</div>
	</div>
</div></div></div></div>


</div></div></div></div></section>
<?php
} 

$oxiday_video_id=get_post_meta(get_the_ID(), 'oxiday_video_id') ;
 if (!empty($oxiday_video_id[0])) {
 ?>
<section class="vc_section section-2 white-bg-color about-intro"><div class="row container"><div class="col-sm-12">
<div class="vc_column-inner "><div class="wpb_wrapper">

<div class="row vc_inner"><div class="col-lg-8 offset-lg-2 col-sm-12">
<div class="vc_column-inner "><div class="wpb_wrapper">
	<div class="wpb_raw_code wpb_content_element wpb_raw_html">
		<div class="wpb_wrapper">
		 <div class="wpb_video_widget wpb_content_element vc_clearfix  video  vc_video-aspect-ratio-169 vc_video-el-width-100 vc_video-align-left">
		<div class="wpb_wrapper">
			
			<div class="wpb_video_wrapper">
	
	<iframe width="500" height="281" src="https://www.youtube.com/embed/<?php print $oxiday_video_id[0];?>?feature=oembed" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe></div>
		 
</div>
	</div>
	<div class="wpb_text_column wpb_content_element  video-item-title montserrat-font blue-color show_cat_video">
		<div class="wpb_wrapper">
			<p><a href="https://www.youtube.com/watch?v=<?php print $oxiday_video_id[0];?>"><?php the_title();?></a></p>
		</div>
	</div>
	
			</div>
	</div>
</div></div></div></div>


</div></div></div></div></section>
<?php
 }
  if (!empty($oxiday_video_id[0])) {
  if (get_the_content()!='')
  {
	?>
	<section class="vc_section section-2 white-bg-color about-intro"><div class="row container"><div class="col-lg-8 offset-lg-2 col-sm-12"><div class="vc_column-inner "><div class="wpb_wrapper"><div class="row vc_inner"><div class="col-sm-12"><div class="vc_column-inner "><div class="wpb_wrapper">
	<div class="wpb_text_column wpb_content_element  text-md montserrat-font font-weight-300 text-center">
		<div class="wpb_wrapper">
			<?php the_content(); ?>
		</div>
	</div>
</div></div></div></div></div></div></div></div></section>
<?php
  }}
  else  the_content();  ?>
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