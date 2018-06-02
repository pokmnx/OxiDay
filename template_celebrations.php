<?php 
/*
*   Template Name: Celebrations year
*/
global $wp_query,$post,$wpdb;
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

<?php
$now_post_id=$post->ID;
$celebrations_year_page = get_field('celebrations_year_page',$post->ID);
if ($celebrations_year_page!='')
{
$search_year=array(); 
$search_year = $wpdb->get_results("SELECT post_id  FROM {$wpdb->postmeta} WHERE meta_key='celebrations_year_page'  AND meta_value='$celebrations_year_page' ");
$all_dop_menu=array();
if (is_array($search_year))
{
$pageses=array();
$showli=array(); 
foreach ($search_year as $key=>$block){$pageses[$block->post_id]=$block->post_id;}
$temp_query = $wp_query;
$args = array('numberposts' => -1, 'include'     =>$pageses, 'post_type'   => 'page','suppress_filters' => true);
$posts = get_posts( $args );

foreach( $posts as $post ){ setup_postdata($post);
$celebrations_year_position_page_page = get_field('celebrations_year_position_page_page',get_the_ID());
$celebrations_year_title=get_field('celebrations_year_title',get_the_ID());
if ($celebrations_year_title=='') $celebrations_year_title=get_the_title();
 
if ($celebrations_year_position_page_page!='') 
{
$showli[$celebrations_year_position_page_page]='<li '.(($now_post_id==get_the_ID()) ? 'class="current"' : '' ).'><a href="'.get_the_permalink().'" >'.$celebrations_year_title.'</a></li>';
}
else 	$showli[]='<li '.(($now_post_id==get_the_ID()) ? 'class="current"' : '' ).'><a href="'.get_the_permalink().'">'.$celebrations_year_title.'</a></li>';
}
ksort($showli); 
?>
<div class="sub-page-menu light-gray-bg d-flex align-items-center">
<div class="container d-flex justify-content-center">
<ul class="text-center">
<?php
print implode('',$showli);
wp_reset_postdata();
$wp_query = NULL;
$wp_query = $temp_query; 

?> 
</ul>
</div>
</div>
<?php } } ?>

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
get_footer();
?>