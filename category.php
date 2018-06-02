<?php get_header();?>
<?php 
$cat = get_term_by('name', single_cat_title('',false), 'category'); 
?>
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
<li><?php print $cat->name;?></li>
</ul>
</div>
</div>

<div class="sub-page-menu light-gray-bg d-flex align-items-center">
<div class="container d-flex justify-content-center">
<ul class="text-center">
<li><a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">All News</a></li>
<?php
$args = array('taxonomy' => 'category','hide_empty' => false,'orderby'=>'title','order'=>'desc');
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
<?php if ( have_posts() ) : ?>
<div class="pages">
<section class="section-2 white-bg-color about-intro">
<div class="container">
<div class="news">
<div class="row rows2">
<?php
	while ( have_posts() ) : the_post();
	$category=get_the_category();
	$cat_title='';
	if (isset($category[0]->name)) $cat_title=$category[0]->name; 
		?>
<div class="col-lg-6 columns2">
<div class="news-item white-box white-box-hover p-0 d-flex">
<a href="<?php print the_permalink(get_the_ID());?>" class="news-item-image col p-0">
<div class="news-item-label"><?php print $cat_title;?></div>
<figure>
<?php
if ( has_post_thumbnail() ) {
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
	?>
	<img src="<?php print $featured_img_url;?>" alt="">
	<?php
}
?>
</figure></a> 
<div class="news-item-contents col p-0">
<div class="news-item-contents-wrap">
<div class="news-item-header">
<p class="montserrat-font"><a href="<?php print the_permalink(get_the_ID());?>"><?php print the_title();?></a></p>
<span class="d-block montserrat-font font-weight-bold text-uppercase"><?php print the_date('F j, Y');?></span>
</div>
<div class="news-item-texts">
<div class="montserrat-font"><?php echo wph_cut_by_words(get_the_excerpt());?></div>
</div>
</div>
</div>
</div>
</div><!--//News Item-->

<?php
	endwhile;
?>
</div>
</div>
</div>
</section> 

<section class="section-3 pt-0">
<div class="paginations">
<div class="container d-flex justify-content-center">
<div class="pagination-wrapper d-flex align-items-center"> 
<?php
					the_posts_pagination( array(
				'prev_text'          => '<img src="'.get_template_directory_uri().'/images/arrow-left.png" alt="" >',
				'next_text'          => '<img src="'.get_template_directory_uri().'/images/arrow-right.png" alt="" >',
				'before_page_number' => '',
				'screen_reader_text' =>''
			) );
					
					?>
</div>
</div>
</div><!--//End Paginations-->
</section>

</div>
<?php endif;?>
<?php get_footer();?>