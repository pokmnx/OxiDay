<?php 
/*
*   Template Name: Product
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
 
$temp_query = $wp_query;
$args1 = array('post_type' => 'page', 'post_status'=>'publish','posts_per_page' =>-1,  'orderby'=>'menu_order','order'=>'asc',
'meta_query' => array(array('key' => 'add_to_product_breadcump','value' => 1,'compare' => '=')));
$posts = new WP_Query( $args1 ); 
if ( $posts->have_posts() ) : 
while ( $posts->have_posts() ) {
$posts->the_post(); 
?>
<li <?php if ($now_post_id==get_the_ID()) print ' class="current"'; ?>><a href="<?php echo get_permalink(); ?>"><?php the_title();?></a></li>
<?php
}
endif;
wp_reset_postdata();
$wp_query = NULL;
$wp_query = $temp_query; 
?> 
</ul>
</div>
</div>

<?php
if ( has_post_thumbnail() ) {
$big_image = get_the_post_thumbnail_url($post->ID,'full'); 
if ($big_image!='')
{
?>
<section class="image-banner">
<div class="container"><img src="<?php print $big_image;?>" class="wd_100"></div>
</section> 

<?
}
}
?>
<div class="pages">
<div class="container">
<section class="section white-bg-color about-intro">
<div class="row rows3">
<div class="col-xl-4 col-md-5 columns3">
<?php
$image_product = get_field('image_product',$post->ID);
if (is_array($image_product))
{
print '<div class="philotimo-gallery"><div class="philotimo-gallery-lg philotimo-slider-for">
';
foreach ($image_product as $key=>$block)
{
	print '<figure><img src="'.$block['url'].'"></figure>';
}
print '</div><ul class="philotimo-gallery-thumbs clearfix philotimo-slider-nav">';
 
foreach ($image_product as $key=>$block)
{
	print '<li><span><img src="'.$block['url'].'"></span></li>';
}

print '</ul></div>';
} 
?>


<div class="philotimo-gallery-footer text-center">
<a href="#" class="btn text-uppercase gradient-red-linear">Buy Now</a>
<p class="text-md blue-color montserrat-font">
<?
$price_product = get_field('price_product',$post->ID);
if ($price_product!='') print $price_product;
?>
</p>
</div>


</div>
<div class="col-xl-8 col-md-7 columns3 philotimo-contents">
<?php the_content();  ?>
</div>
</div>
</section>
</div> 
</div>

<?php
get_footer();
?>