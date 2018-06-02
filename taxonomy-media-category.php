<?php 
global $wp_query,$post;
get_header(); 
?>
<?php 
$cat = get_term_by('name', single_cat_title('',false), 'media-category'); 
$media=get_page_by_path( 'medias' ); 
?>
<div class="breadcrumbs">
<div class="container">
<ul class="clearfix"> 
<?php  
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
<li><?php print $cat->name;?></li>
</ul>
</div>
</div>

<div class="sub-page-menu light-gray-bg d-flex align-items-center">
<div class="container d-flex justify-content-center">
<ul class="text-center">
<li ><a href="<?php echo get_permalink($media->ID); ?>">All Media</a></li>
<?php

$args = array('taxonomy' => 'media-category','hide_empty' => false,'orderby'=>'title','order'=>'desc');
$terms = get_terms( $args );
$arr_term=array();
$arr_term_dop=array();
	$i=0;
	foreach ($terms as $termses) : 
	if ($termses->count>0)
	{
	$poz = get_field('position', $termses);
	if ($poz=='') 
	{
		$arr_term_dop[$i]['title']=$termses->name;
		$arr_term_dop[$i]['id']=$termses->term_id;
		$i++;
	}
	else	
	{
		$arr_term[$poz]['title']=$termses->name;
		$arr_term[$poz]['id']=$termses->term_id;
	}
	}
	endforeach;
	if (count($arr_term)>0)
	{
		foreach ($arr_term as $block) :
		?>
		<li <?php if ($cat->term_id==$block['id']) print 'class="current"';?>><a href="<?php print get_term_link($block['id']);?>"><?php print $block['title'];?></a></li>
		<?php 
		endforeach;
	} 
	if (count($arr_term_dop)>0)
	{
		foreach ($arr_term_dop as $block) :
		?>
		<li <?php if ($cat->term_id==$block['id']) print 'class="current"';?>><a href="<?php print get_term_link($block['id']);?>"><?php print $block['title'];?></a></li>
		<?php 
		endforeach;
	} 
?>
</ul>
</div>
</div>

<?php
 global $paged,$number_of_pages; 
$args1 = array('post_type' => 'media', 'post_status'=>'publish','posts_per_page' => $number_of_pages,'paged' => $paged,
'tax_query' => array(
                array(
                    'taxonomy' => 'media-category',
                    'field'    => 'id',
                    'terms'    => $cat->term_id
                )
            ) );
 
$posts = new WP_Query( $args1 ); 
 if ( $posts->have_posts() ) :
		 
		?>
<div class="pages">
<section class="section-2 white-bg-color about-intro">
<div class="container">
<div class="news">
<div class="row rows2">
<?php
	while ( $posts->have_posts() ) :
	  $posts->the_post();
	$category=$categories = get_the_terms( $post->ID, 'media-category');  
	$cat_title='';
	$cat_img='';
	if (isset($category[0]))
	{
	$title_for_media_category = get_field('title_for_media_category', $category[0]);
	if ($title_for_media_category!='') $cat_title=$title_for_media_category; else $cat_title=$category[0]->name; 
	$image_post_category = get_field('image_post_category', $category[0]);
	if (isset($image_post_category['url'])) $cat_img='<span class="d-inline-block news-item-icon"><img src="'.$image_post_category['url'].'" alt=""></span>';	
	$svgimage_post_category = get_field('svgimage_post_category', $category[0]);
	if ($svgimage_post_category!='')
	{
	$cat_img='<span class="d-inline-block news-item-icon">'.$svgimage_post_category.'</span>';	
	}
	}
		?>
<div class="col-lg-6 columns2">
<div class="news-item white-box white-box-hover p-0 d-flex">
<a href="<?php print the_permalink(get_the_ID());?>" class="news-item-image col p-0">
<div class="news-item-label"><?php print $cat_title;?></div>
<figure>
<?php
if ( has_post_thumbnail() ) {
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'pic_350_350'); 
	?>
	<img src="<?php print $featured_img_url;?>" alt="">
	<?php
}
?>
</figure></a> 
<div class="news-item-contents col p-0">
<div class="news-item-contents-wrap">
<div class="news-item-header">
<p class="montserrat-font"><a href="<?php print the_permalink(get_the_ID());?>" class="d-inline-block"><?php print $cat_img;?><?php print the_title();?></a></p>
<span class="d-block montserrat-font font-weight-bold text-uppercase"><?php print the_date('F j, Y');?></span>
</div>
<div class="news-item-texts">
<div class="montserrat-font"><?php  echo wph_cut_by_words(get_the_excerpt());?></div>
</div>
</div>
</div>
</div>
</div><!--//News Item-->
<?php endwhile; ?>
</div>
</div>
</div>
</section> 

<section class="section-3 pt-0">
<div class="paginations">
<div class="container d-flex justify-content-center">
<div class="pagination-wrapper d-flex align-items-center"> 
<?php
				
  theme_pagination( $posts->max_num_pages);  
					
					?>
</div>
</div>
</div><!--//End Paginations-->
</section>

<?php  
wp_reset_postdata();
endif; ?>
<?php
get_footer();
?>