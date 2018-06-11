<?php
/**
 * @package oxiday
 */
 
add_filter('the_generator', '__return_empty_string');
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
add_filter( 'tiny_mce_plugins', 'disable_wp_emojis_in_tinymce' );

 
add_filter('pll_get_post_types', 'unset_cpt_pll', 10, 2);
function unset_cpt_pll( $post_types, $is_settings ) {
$post_types['acf-field-group'] = 'acf-field-group';
    $post_types['acf'] = 'acf';
    return $post_types;
}

remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action( 'wp_head',      'rest_output_link_wp_head'              );
remove_action( 'wp_head',      'wp_oembed_add_discovery_links'         );
 



function disable_wp_emojis_in_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}
function _remove_script_version( $src ){
	$parts = explode( '?', $src );
	return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 ); 
add_theme_support( 'post-thumbnails' ); 
 
 
 
 

function load_theme_styles() {
		if ( ! is_admin() ) {
			
			wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), 'null', 'all');	 
			wp_register_style( 'awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), 'null', 'all');
			wp_register_style( 'global', get_template_directory_uri() . '/css/global.css', array(), 'null', 'all'); 	 			
			wp_register_style( 'megamenus', get_template_directory_uri() . '/css/mega-menu.css', array(), 'null', 'all' );	
			wp_register_style( 'slick', get_template_directory_uri() . '/css/slick.css', array(), 'null', 'all' );
			wp_register_style( 'slicktheme', get_template_directory_uri() . '/css/slick-theme.css', array(), 'null', 'all' );
			wp_register_style( 'stylecss', get_template_directory_uri() . '/css/style.css', array(), 'null', 'all' );
			wp_register_style( 'style', get_template_directory_uri() . '/style.css', array(), 'null', 'all' );
			
			
			wp_enqueue_style( 'bootstrap' );  
			wp_enqueue_style( 'awesome' ); 
			wp_enqueue_style( 'global' );  
			wp_enqueue_style( 'megamenus' );  
			wp_enqueue_style( 'slick' );
			wp_enqueue_style( 'slicktheme' );
			wp_enqueue_style( 'stylecss' );
			wp_enqueue_style( 'style' );
			 
			 
			$js_directory_uri = get_template_directory_uri() . '/js/';    
			wp_register_script('bootstrap',$js_directory_uri . 'bootstrap.min.js',array( 'jquery' ),'null');
			wp_register_script('custom',$js_directory_uri . 'custom.js',array( 'jquery' ),'null');
			//wp_register_script('jquerymin',$js_directory_uri . 'jquery-3.2.1.min.js',array( 'jquery' ),'null' );
			wp_register_script('modernizr',$js_directory_uri . 'modernizr.js',array( 'jquery' ),'null' );
			//wp_register_script('popper',$js_directory_uri . 'popper.min.js',array( 'jquery' ),'null' );
			wp_register_script('slick',$js_directory_uri . 'slick.min.js',array( 'jquery' ),'null' );
			wp_register_script('fancybox',$js_directory_uri . 'jquery.fancybox.js',array( 'jquery' ),'null' );
			
			wp_enqueue_script( 'bootstrap' );  
			wp_enqueue_script( 'custom' );  
			///wp_enqueue_script( 'jquerymin' );  
			wp_enqueue_script( 'modernizr' );  
			///wp_enqueue_script( 'popper' );
			wp_enqueue_script( 'slick' );				
			wp_enqueue_script( 'fancybox' );				
		}
	}		
	add_action( 'wp_enqueue_scripts', 'load_theme_styles' ,100);
	
function menulang_setup(){
load_theme_textdomain('oxidayfoundation', get_template_directory() . '/languages');
	register_nav_menus( array('footer_first_menu'   => __( 'Footer First Menu', 'oxidayfoundation' )) );   
	register_nav_menus( array('footer_second_menu'   => __( 'Footer Second Menu', 'oxidayfoundation' )) );   
	register_nav_menus( array('footer_third_menu'   => __( 'Footer Third Menu', 'oxidayfoundation' )) );     
	register_nav_menus( array('header_menu'   => __( 'Header Menu', 'oxidayfoundation' )) );  
}	
add_action('after_setup_theme', 'menulang_setup');

function inspiry_theme_sidebars() {
	register_sidebar( array('name' => __( 'Footer First Column', 'oxidayfoundation' ),'id' => 'footer_first','description' => __( 'Footer First Column', 'oxidayfoundation' ),'before_widget' => '','after_widget' => '','before_title' => '<div class="footer-block-headding montserrat-font text-uppercase">','after_title' => '</div>' )); 
	register_sidebar( array('name' => __( 'Footer Second Column', 'oxidayfoundation' ),'id' => 'footer_second','description' => __( 'Footer Second Column', 'oxidayfoundation' ),'before_widget' => '','after_widget' => '','before_title' => '<div class="footer-block-headding montserrat-font text-uppercase">','after_title' => '</div>' )); 	 
	register_sidebar( array('name' => __( 'Footer Third Column', 'oxidayfoundation' ),'id' => 'footer_third','description' => __( 'Footer Third Column', 'oxidayfoundation' ),'before_widget' => '','after_widget' => '','before_title' => '<div class="footer-block-headding montserrat-font text-uppercase">','after_title' => '</div>' )); 	
	register_sidebar( array('name' => __( 'Footer Fourth Column', 'oxidayfoundation' ),'id' => 'footer_fourth','description' => __( 'Footer Fourth Column', 'oxidayfoundation' ), 'before_widget' => '','after_widget' => '','before_title' => '','after_title' => '' )); 
	register_sidebar( array('name' => __( 'Footer Third Social', 'oxidayfoundation' ),'id' => 'footer_third_social','description' => __( 'Footer Third Social', 'oxidayfoundation' ),'before_widget' => '<div class="footer-social-media">','after_widget' => '</div></div>','before_title' => '<span class="footer-social-media-headding montserrat-font font-weight-600">','after_title' => '</span><div class="footer-social-media-group clearfix d-flex">' )); 
	register_sidebar( array('name' => __( 'Footer Fourth copyright', 'oxidayfoundation' ),'id' => 'footer_fourth_copyright','description' => __( 'Footer Fourth Column copyright', 'oxidayfoundation' ), 'before_widget' => '','after_widget' => '','before_title' => '','after_title' => '' )); 
	register_sidebar( array('name' => __( 'Footer Fourth adress', 'oxidayfoundation' ),'id' => 'footer_fourth_adress','description' => __( 'Footer Fourth Column adress', 'oxidayfoundation' ), 'before_widget' => '','after_widget' => '','before_title' => '','after_title' => '' )); 
	
}
add_action( 'widgets_init', 'inspiry_theme_sidebars' );	
 
 add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){
 return '
 <nav class="%1$s" role="navigation">
  <div class="nav-links">%3$s</div>
 </nav>    
 ';
}

add_theme_support( 'post-thumbnails' ); 

function create_media_post_type() {

		$post_type_labels = array(
			'name' => 'Media for site',
			'singular_name' =>'Media', 
			'parent_item_colon' => '',
		);

		$post_type_args = array(
			'labels' => apply_filters( 'inspiry_property_post_type_labels', $post_type_labels ),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'has_archive' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			'menu_icon' => 'dashicons-images-alt2',
			'menu_position' => 5,
			'supports' => array( 'title', 'editor', 'thumbnail',  'page-attributes','excerpt' ,'post-formats' ),
			'rewrite' => array(
				'slug' => apply_filters( 'inspiry_property_slug',  'media' ),
			),
		);
 
		register_post_type( 'media', $post_type_args );
		 
		 $post_type_labels = array(
			'name' => 'Front page slider',
			'singular_name' =>'Slider', 
			'parent_item_colon' => '',
		);

		$post_type_args = array(
			'labels' => apply_filters( 'inspiry_property_post_type_labels', $post_type_labels ),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'has_archive' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			'menu_icon' => 'dashicons-images-alt',
			'menu_position' => 6,
			'supports' => array( 'title', 'editor', 'thumbnail',  'page-attributes' ),
			'rewrite' => array(
				'slug' => apply_filters( 'inspiry_property_slug',  'slider' ),
			),
		);
 
		register_post_type( 'slider', $post_type_args );
		 

$post_type_labels = array(
			'name' => 'World Leaders Praise',
			'singular_name' =>'World Leaders Praise', 
			'parent_item_colon' => '',
		);

		$post_type_args = array(
			'labels' => apply_filters( 'inspiry_property_post_type_labels', $post_type_labels ),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'has_archive' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			'menu_icon' => 'dashicons-universal-access-alt',
			'menu_position' => 5,
			'supports' => array( 'title', 'editor', 'thumbnail',  'page-attributes'  ),
			'rewrite' => array(
				'slug' => apply_filters( 'inspiry_property_slug',  'world_leaders' ),
			),
		);
 
		register_post_type( 'world_leaders', $post_type_args );
		
		
			  
		$post_type_labels = array(
			'name' => 'Videos',
			'singular_name' =>'Videos', 
			'parent_item_colon' => '',
		);
		$post_type_args = array(
			'labels' => apply_filters( 'inspiry_property_post_type_labels', $post_type_labels ),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'has_archive' => true,
			'capability_type' => 'page',
			'hierarchical' => true,
			'menu_icon' => 'dashicons-media-interactive',
			'menu_position' => 5,
			'supports' => array( 'title', 'editor','page-attributes'  ),
			'rewrite' => array(
				'slug' => apply_filters( 'inspiry_property_slug',  'videos' ),
			),
		);
 
		register_post_type( 'videos', $post_type_args );
		
		
		$post_type_labels = array(
			'name' => 'Heroes',
			'singular_name' =>'Heroes', 
			'parent_item_colon' => '',
		);
		$post_type_args = array(
			'labels' => apply_filters( 'inspiry_property_post_type_labels', $post_type_labels ),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'has_archive' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			'menu_icon' => 'dashicons-universal-access',
			'menu_position' => 5,
			'supports' => array(  'title', 'editor', 'thumbnail',  'page-attributes','excerpt' ),
			'rewrite' => array(
				'slug' => apply_filters( 'inspiry_property_slug',  'heroes' ),
			),
		);
 
		register_post_type( 'heroes', $post_type_args );
		
		
		
		$post_type_labels = array(
			'name' => 'Honorees',
			'singular_name' =>'Honorees', 
			'parent_item_colon' => '',
		);
		$post_type_args = array(
			'labels' => apply_filters( 'inspiry_property_post_type_labels', $post_type_labels ),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'has_archive' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			'menu_icon' => 'dashicons-universal-access',
			'menu_position' => 5,
			'supports' => array(  'title', 'editor', 'thumbnail',  'page-attributes','excerpt' ),
			'rewrite' => array(
				'slug' => apply_filters( 'inspiry_property_slug',  'honorees' ),
			),
		);
 
		register_post_type( 'honorees', $post_type_args );
		
		$post_type_labels = array(
			'name' => 'Members',
			'singular_name' =>'Members', 
			'parent_item_colon' => '',
		);
		$post_type_args = array(
			'labels' => apply_filters( 'inspiry_property_post_type_labels', $post_type_labels ),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'has_archive' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			'menu_icon' => 'dashicons-universal-access',
			'menu_position' => 5,
			'supports' => array(  'title', 'editor', 'thumbnail',  'page-attributes','excerpt' ),
			'rewrite' => array(
				'slug' => apply_filters( 'inspiry_property_slug',  'members' ),
			),
		);
 
		register_post_type( 'members', $post_type_args );
		
		
		
		$post_type_labels = array(
			'name' => 'Schedule',
			'singular_name' =>'Schedule',  
			'add_new' => 'Add Daily Schedule',
			'add_new_item' => 'Add Daily Schedule',
			'edit_item' =>'Edit Schedule',
			'new_item' =>  'New Daily Schedule' ,
			'view_item' =>'View Schedule',
			'search_items' => 'Search Schedule',
			'not_found' =>  'No found Schedule',
			'not_found_in_trash' =>  'No found in Trash',
			'parent_item_colon' => '',
		);

		$post_type_args = array(
			'labels' => apply_filters( 'inspiry_property_post_type_labels', $post_type_labels ),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'has_archive' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			'menu_icon' => 'dashicons-calendar-alt',
			'menu_position' => 5,
			'supports' => array( 'title',  'page-attributes' ),
			'rewrite' => array(
				'slug' => apply_filters( 'inspiry_property_slug',  'scheduler' ),
			),
		);
 
		register_post_type( 'scheduler', $post_type_args );
		
		
	}
	add_action( 'init', 'create_media_post_type' );
function build_taxonomies() {
		$feature_labels = array(
			'name' => 'Category media', 
			'menu_name' => 'Category media' 
		);

		register_taxonomy(
			'media-category',
			array( 'media' ),
			array(
				'hierarchical' => true,
				'labels' => $feature_labels,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array(
					'slug' =>'media-category' 
				),
				 'update_count_callback' => '_update_post_term_count',
			)
		); 
 
 
		$feature_labels = array(
			'name' => 'Category honorees', 
			'menu_name' => 'Category honorees' 
		);

		register_taxonomy(
			'honorees-category',
			array( 'honorees' ),
			array(
				'hierarchical' => true,
				'labels' => $feature_labels,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array(
					'slug' =>'honorees-category' 
				),
				 'update_count_callback' => '_update_post_term_count',
			)
		); 
 
 
 $feature_labels = array(
			'name' => 'Category members', 
			'menu_name' => 'Category members' 
		);

		register_taxonomy(
			'members-category',
			array( 'members' ),
			array(
				'hierarchical' => true,
				'labels' => $feature_labels,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array(
					'slug' =>'members-category' 
				),
				 'update_count_callback' => '_update_post_term_count',
			)
		); 
		
		$feature_labels = array(
			'name' => 'Years', 
			'menu_name' => 'Years' ,
			'add_new_item'      => 'Add Year',
			'edit_item'         => 'Edit Year',
			'update_item'       => 'Update Year',
		);

		register_taxonomy(
			'scheduler-category',
			array( 'scheduler' ),
			array(
				'hierarchical' => true,
				'labels' => $feature_labels,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array(
					'slug' =>'scheduler-category' 
				),
				 'update_count_callback' => '_update_post_term_count',
			)
		); 
		
		
 
	}
	add_action( 'init', 'build_taxonomies', 0 );
	
function theme_pagination( $pages = '' ) {

		global $paged;

		if ( is_page_template( 'template-home.php' ) ) {
			$paged = intval( get_query_var( 'page' ) );
		}

		if ( empty( $paged ) ) {
			$paged = 1;
		}

		$prev = $paged - 1;
		$next = $paged + 1;
		$range = 2; // only change it to show more links
		$show_items = ( $range * 2 ) + 1;

		if ( $pages == '' ) {
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if ( ! $pages ) {
				$pages = 1;
			}
		}

		if ( 1 != $pages ) {
			echo '<nav class="pagination" role="navigation"><div class="nav-links">';
			
			echo ( $paged > 1 && $show_items < $pages ) ? "<a href='" . get_pagenum_link( $prev ) . "' class='prev page-numbers' >".'<img src="'.get_template_directory_uri().'/images/arrow-left.png" alt="" >'."</a> " : "";

			for ( $i = 1; $i <= $pages; $i++ ) {
				if ( 1 != $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $show_items ) ) {
					echo ( $paged == $i ) ? "<span  class='page-numbers current' >" . $i . "</span> " : "<a href='" . get_pagenum_link( $i ) . "' class='page-numbers'>" . $i . "</a> ";
				}
			}

			echo ( $paged < $pages && $show_items < $pages ) ? "<a href='" . get_pagenum_link( $next ) . "' class='next page-numbers' >".'<img src="'.get_template_directory_uri().'/images/arrow-right.png" alt="" >'."</a> " : "";
			
			echo "</div></nav>";
		}
	}	
	
	
	
	
function theme_number_of_pages(  ) {
$number_of_pages=10;
}	
add_action( 'init', 'theme_number_of_pages');

function show_world_leaders_slider_func($attr)
{
global $wp_query;
//if (isset($attr['redirects']))$redirects=$attr['redirects'];

?>
<div class="arrow-sliders">
<div class="quote-slider arrow-slider box-shadow-blue">
<?php
$temp_query = $wp_query;
$args1 = array('post_type' => 'world_leaders', 'post_status'=>'publish','posts_per_page' =>-1,  'orderby'=>'menu_order','order'=>'desc');
 
$posts = new WP_Query( $args1 ); 
 if ( $posts->have_posts() ) : 
 while ( $posts->have_posts() ) {
 $posts->the_post(); 
 ?>
 <div class="quote-slider-item">
<div class="row no-gutters">
<div class="col-lg-5 quote-slider-item-quote-wrap">
<div class="quote-slide-column p-0 h-100 quote-slide-image-column">
<div class="quote-slide-image-column-contents d-flex align-items-end justify-content-end">
<div class="footer-social-media-group clearfix d-inline-flex m-0">
<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook-square"></i></a>
<a href="https://twitter.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-twitter"></i></a>
<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus"></i></a>
</div>
</div>
<figure class="h-100">
<?php
if ( has_post_thumbnail() ) {
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
if ($featured_img_url!='')
{
	?>
	<img src="<?php print $featured_img_url;?>" alt="">
	<?php
	}
}
?>
</figure>
</div>
</div>
<div class="col-lg-7">
<div class="quote-slide-column text-left">
<div class="personal-quote">
<h5 class="montserrat-font font-weight-500"><?php the_content();?></h5>
<p class="montserrat-font text-md text-uppercase red-color"><?php the_title();?></p>
</div>
</div>
</div>
</div>
</div>

<?php
 }
 endif;
 wp_reset_postdata();
 $wp_query = NULL;
$wp_query = $temp_query; 
?>
</div>
</div>
<?php

}
add_shortcode('show_world_leaders_slider', 'show_world_leaders_slider_func');
function show_video_slider_func($attr)
{
global $wp_query;
$temp_query = $wp_query;
if (isset($attr['path']))
{
$args1 = array('post_type' => 'videos', 'post_status'=>'publish','posts_per_page' =>-1,  'orderby'=>'menu_order','order'=>'desc',
'meta_query' => array(array('key' => $attr['path'],'value' => 1,'compare' => '=')));
$posts = new WP_Query( $args1 ); 
if ( $posts->have_posts() ) : 
?> 
	<div class="video-slider">
	<?php
while ( $posts->have_posts() ) {
	$posts->the_post(); 
	?>
	
	
	<div class="video-slide">
<div class="video-wrapper">
<div class="video">
<?php the_content();?>
</div>
</div>
</div>

	
	<?php
}
?>
</div>  
<?php
endif; 
}
wp_reset_postdata();
$wp_query = NULL;
$wp_query = $temp_query; 
}
add_shortcode('show_video_slider', 'show_video_slider_func');


function show_video_slider_all_func($attr)
{
global $wp_query;
$temp_query = $wp_query;
if (isset($attr['path']))
{
$args1 = array('post_type' => 'videos', 'post_status'=>'publish','posts_per_page' =>-1,  'orderby'=>'menu_order','order'=>'desc',
'meta_query' => array(array('key' => $attr['path'],'value' => 1,'compare' => '=')));
$posts = new WP_Query( $args1 ); 
if ( $posts->have_posts() ) : 
?> 
	<div class="row vc_inner">
	<?php
while ( $posts->have_posts() ) {
	$posts->the_post(); 
	?> 
	<div class="col-md-6 columns2 col-sm-30"><div class="vc_column-inner "><div class="wpb_wrapper">
	<div class="wpb_video_widget wpb_content_element vc_clearfix  video video-item box-shadow-blue  vc_video-aspect-ratio-169 vc_video-el-width-100 vc_video-align-left">
		<div class="wpb_wrapper">
<?php the_content();?>
</div></div>
<div class="wpb_text_column wpb_content_element  video-item-title montserrat-font blue-color show_cat_video">
		<div class="wpb_wrapper">
			<p><?php the_title();?></p>
		</div>
	</div> 
</div>
</div>
</div> 
	<?php
}
?>
</div> 
<?php
endif; 
}
wp_reset_postdata();
$wp_query = NULL;
$wp_query = $temp_query; 
}
add_shortcode('show_video_slider_all', 'show_video_slider_all_func');


function show_honorees_history_func($attr)
{
global $wp_query,$wpdb;
$temp_query = $wp_query;

 
$search_idproperty = $wpdb->get_results("SELECT meta_value FROM  `".$wpdb->prefix."postmeta`  WHERE  `meta_key` LIKE  'honorees_year' GROUP BY meta_value "); 
foreach ($search_idproperty as $key=>$block)
{
 $honorees_year_arr[$block->meta_value]=$block->meta_value;
} 
 
print '<div class="honorees_tabs">';
if (count($honorees_year_arr)>0)
{
krsort($honorees_year_arr);
print '<div class="honorees_tab_links d-flex align-items-center">
<div class="container">
<ul class="honorees-slider-nav">
'; 
foreach ( $honorees_year_arr as $key=>$block ){

$args1 = array('post_type' => 'honorees', 'post_status'=>'publish','posts_per_page' =>-1,
'meta_query' => array(array('key' => 'honorees_year','value' => $block,'compare' => '=')));
$posts = new WP_Query( $args1 );  
if ( $posts->have_posts() ) :
print '<li data-nowyear="'.$block.'"><span>'.$block.'</span></li>';
endif;
}

print '</ul></div></div>';
}
print '<div class="honorees-slider-for">';
foreach ( $honorees_year_arr as $key=>$block )
{
	 
$args1 = array('post_type' => 'honorees', 'post_status'=>'publish','posts_per_page' =>-1,
'meta_query' => array(array('key' => 'honorees_year','value' => $block,'compare' => '=')));
$posts = new WP_Query( $args1 );  
if ( $posts->have_posts() ) :
print '<div class="honorees_tab_item" id="show_'.$block.'">
<div class="container">
<div class="recipients-list">
<div class="row rows2">';
$nom_row=1;
$nom_plans=1;
$nom_row_com=1;
$nom_row_plans=1;
$nom_row_mob=1; 
while ( $posts->have_posts() ) {
	$posts->the_post(); 
	?>
<div class="col-md-4 col-sm-6 columns2 text-center recipient-item_block" id="show_recipient<?php the_ID();?>_<?php print $key;?>" >
<div class="recipient-item text-center"    onclick="show_recipient(<?php the_ID();?>,<?php print $key;?>,<?php print $nom_row_com;?>,<?php print $nom_row_plans;?>,<?php print $nom_row_mob;?>)">
<div class="recipient-item-image rounded-circle box-shadow-blue">
<div class="recipient-item-read">Read Biography</div>
<?php
if ( has_post_thumbnail() ) {
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
	?>
	<img src="<?php print $featured_img_url;?>" alt="">
	<?php
}
$honorees_title = get_field('honorees_title',get_the_ID());
$category=$categories = get_the_terms( get_the_ID(), 'honorees-category' );
$cat_title='';
	if (isset($category[0]->name)) $cat_title=$category[0]->name; 
?>
</div>
<p class="text-sm montserrat-font blue-color text-uppercase font-weight-bold"><a href="#" class="blue-color"><?php the_title();?></a></p>
<p class="text-xs font-weight-300"><?php print $honorees_title;?></p>
<p class="text-xs font-weight-500 montserrat-font red-color text-uppercase mt-3"><?php print $cat_title;?></p>
</div>
</div>
<div class="show_block_content_hide_mob" id="show_block_content_hide_mob<?php print $key;?>_<?php print $nom_row_mob;?>"></div>
 

<?php
if ($nom_plans==2) {
?>
<div class="show_block_content_hide_plans" id="show_block_content_hide_plans<?php print $key;?>_<?php print $nom_row_plans;?>"></div>
<?php
$nom_row_plans++;
}
?>
<?php
if ($nom_row==3) {
?>
<div class="show_block_content_hide_comp" id="show_block_content_hide_comp<?php print $key;?>_<?php print $nom_row_com;?>"></div>
<?php
$nom_row_com++;
}
?>
<?php
$nom_row_mob++;
$nom_row++;
if ($nom_row==4) $nom_row=1;
$nom_plans++;
if ($nom_plans==3) $nom_plans=1;

}
?>
<div class="show_block_content_hide_plans" id="show_block_content_hide_plans<?php print $key;?>_<?php print $nom_row_plans;?>"></div>
<div class="show_block_content_hide_comp" id="show_block_content_hide_comp<?php print $key;?>_<?php print $nom_row_com;?>"></div>
<?php  
print '</div></div></div></div>';	
endif; 
wp_reset_postdata();
}
print '</div>';
print '</div>';


?>
<script>
jQuery(document).ready(function($) { 
	var str=window.location.hash;
	var str_p=str.substring(0,6) ;
	if (str_p=='#show_') { 
		var str_l=str.substring(6) ;
		var slider = $( '.honorees-slider-nav' );				
		$('.honorees-slider-nav li').each(function(){
			var li = $(this).data('nowyear');
			var sindex= $(this).data('slick-index');
			if (str_l==li)
			{
				slider[0].slick.slickGoTo(parseInt(sindex)); 
			}			 
		});				
	}
});
</script>
<?
wp_reset_postdata();
$wp_query = NULL;
$wp_query = $temp_query; 
}
add_shortcode('show_honorees_history', 'show_honorees_history_func');
 


add_filter( 'wp_nav_menu_objects',  'add_widgets_to_menu_new' ,30, 2 );
function add_widgets_to_menu_new( $items, $args ) {

        // make sure we're working with a Mega Menu
        if ( ! is_a( $args->walker, 'Mega_Menu_Walker' ) ) {
		 
            return $items;
			 
        }
		$widget_manager = new Mega_Menu_Widget_Manager();
        $items = apply_filters( "megamenu_nav_menu_objects_before", $items, $args );
		$menu_items=array();
		$menu_items_ins=array();
		$all_menus=array();
		foreach ( $items as $key=>$item ) 
		{
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$class_names =  join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
			$class_names_arr=array();
			$class_names_arr[] = esc_attr( $class_names );
		 if ( $item->depth === 0 && $item->megamenu_settings['type'] == 'grid' || ( $item->depth === 1 && $item->parent_submenu_type == 'tabbed' && $item->megamenu_settings['type'] == 'grid' ) ) 
		{
			
			$menu_items[$item->ID]= '<li class="main-menu-link-wrap '. implode(' ', $class_names_arr) . '"><a href="'.$item->url.'" class="main-menu-link at-drop-down">'.$item->title.'</a>';
		}
		else 
		{
			if (isset($item->url) AND isset($item->title)) $menu_items[$item->ID]= '<li class="main-menu-link-wrap '. implode(' ', $class_names_arr) . '"><a href="'.$item->url.'" class="main-menu-link">'.$item->title.'</a>';
		}
		$all_menus[$item->ID]=$key;		
		}
		
		  
		foreach ( $items as $item ) { 
		 if ( $item->depth === 0 && $item->megamenu_settings['type'] == 'grid' || ( $item->depth === 1 && $item->parent_submenu_type == 'tabbed' && $item->megamenu_settings['type'] == 'grid' ) ) {
			$saved_grid = $widget_manager->get_grid_widgets_and_menu_items_for_menu_id( $item->ID, $args->menu->term_id );
			
			foreach ($saved_grid as $key=>$block)
			{ 
				if (isset($block['columns']))
				{
					$i=1;
					foreach ($block['columns'] as $key_c=>$block_c)
					{
						$span=3;
						if (isset($block_c['meta']['span'])) $span=$block_c['meta']['span'];
						$class="";
						if (isset($block_c['meta']['class'])) $class=$block_c['meta']['class'];
						$val=0;
						if (isset($block_c['items']))
						{
						
						$menu_items_ins[$item->ID][$i]='<div class="col-lg-'.$span.' columns"><div class="mega-menu-block '.$class.'">';
							$arr=array();
							foreach ($block_c['items'] as $key_v=>$block_v)
							{
								if (isset($all_menus[$block_v['id']]))
								{
									if (isset($items[$all_menus[$block_v['id']]]->content))
									{
										$arr[]=$items[$all_menus[$block_v['id']]]->content;
									}
								}
							}
							$menu_items_ins[$item->ID][$i].=implode('',$arr);
						$menu_items_ins[$item->ID][$i].='</div></div>';
						}
						$i++;
					}
					 
				}
			}
		 
		 }
		
		}
		
		foreach ($menu_items  as $key=>$block)
		{
			print $block;
			if (isset($menu_items_ins[$key])) {
				print '<div class="mega-menu radial-gradient-blue" id="menus'.$key.'">
				<div class="row rows mega_menu_row">';
				
				foreach ($menu_items_ins[$key]  as $key1=>$block1)
				{ 
print $block1; 
				}
				print '</div>
				</div>';
			}
			print '</li>';
		}
		 
    }


  

	
function gallery_flickr_func($attr)
{
global $wp_query,$wpdb; 

 $userId=get_option('flickr_user_id');
$apiKey=get_option('flickr_api_key'); 
if (isset($attr['album']))
{



$photos = simplexml_load_file("https://api.flickr.com/services/rest/?method=flickr.photosets.getPhotos&api_key=$apiKey&user_id=$userId&photoset_id=".$attr['album']);              
$perPage = 500; 
if (isset($photos->photoset->photo))
{
if (isset($photos->photoset['per_page'][0]))$perPage = $photos->photoset['per_page'][0]; 
 
 $photoKeys_thumb=$photoKeys=array();
 for ($p = 0; $p < $perPage; $p++) {
                if (!empty($photos->photoset->photo[$p]['id'])) {
				
                        $id = $photos->photoset->photo[$p]['id'];    
                        $secret = $photos->photoset->photo[$p]['secret'];
                        $server = $photos->photoset->photo[$p]['server'];
                        $farm = $photos->photoset->photo[$p]['farm'];
                        $title = $photos->photoset->photo[$p]['title'];
                        $thumbNail = "http://farm$farm.static.flickr.com/$server/".$id."_".$secret."_s.jpg";
                        $img_url = "http://farm$farm.static.flickr.com/$server/".$id."_".$secret.".jpg";
                        $photoKeys_thumb[$p] = $thumbNail;
						$photoKeys[$p] = $img_url;
                    }
            }
	if (count($photoKeys)>0 AND count($photoKeys_thumb)>0)
	{
		print '<div class="photo-gallery">';
		print '<div class="photo-gallery-single-wrapper">
		<div class="photo-gallery-single photo-gallery-for">';
		foreach ($photoKeys as $key=>$block)
		{
			print '<div class="photo-gallery-single-item"><figure class="box-shadow-blue"><img src="'.$block.'"></figure></div>';
		}
		print '</div><span class="prev"></span><span class="next"></span></div>';

		print '<div class="photo-gallery-thumbnails photo-gallery-nav">';
		foreach ($photoKeys_thumb as $key=>$block)
		{
			print '<div class="photo-gallery-thumbnail-item"><span class="d-block"><img src="'.$block.'"></span></div>';
		}
		print '</div>';
		print '</div>';
	}	
}
 

}
}	
add_shortcode('gallery_flickr', 'gallery_flickr_func');	
	
	
	
	


function show_honorees_func($attr)
{
global $wp_query,$wpdb;
$temp_query = $wp_query;
 
 if (isset($attr['year']))
 {
 $args1 = array('post_type' => 'honorees', 'post_status'=>'publish','posts_per_page' =>-1,
'meta_query' => array(array('key' => 'honorees_year','value' => $attr['year'],'compare' => '=')));
$posts = new WP_Query( $args1 );  
if ( $posts->have_posts() ) :
print '<div class="recipients-list"><div class="row rows2">
'; 
$nom_row=1;
$nom_plans=1;
$nom_row_com=1;
$nom_row_plans=1;
$nom_row_mob=1; 
 while ( $posts->have_posts() ) {
	$posts->the_post(); 
	
	?>
 <div class="col-md-4 col-sm-6 columns2 text-center recipient-item_block" id="show_recipient<?php the_ID();?>_<?php print $attr['year'];?>" >
<div class="recipient-item text-center"    onclick="show_recipient(<?php the_ID();?>,<?php print $attr['year'];?>,<?php print $nom_row_com;?>,<?php print $nom_row_plans;?>,<?php print $nom_row_mob;?>)">
<div class="recipient-item-image rounded-circle box-shadow-blue">
<div class="recipient-item-read">Read Biography</div>
<?php
if ( has_post_thumbnail() ) {
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
if ($featured_img_url!='')
{
	?>
	<img src="<?php print $featured_img_url;?>" alt="">
	<?php
	}
}
$honorees_title = get_field('honorees_title',get_the_ID());
$category=$categories = get_the_terms( get_the_ID(), 'honorees-category' );
$cat_title='';
if (isset($category[0]->name)) $cat_title=$category[0]->name; 
?>
</div>
<p class="text-sm montserrat-font blue-color text-uppercase font-weight-bold"><span class="blue-color"><?php the_title();?></span></p>
<p class="text-xs font-weight-300"><?php print $honorees_title;?></p>
<p class="text-xs font-weight-500 montserrat-font red-color text-uppercase mt-3"><?php print $cat_title;?></p>
</div>
</div>
 <div class="show_block_content_hide_mob" id="show_block_content_hide_mob<?php print $attr['year'];?>_<?php print $nom_row_mob;?>"></div>
<?php
if ($nom_plans==2) {
?>
<div class="show_block_content_hide_plans" id="show_block_content_hide_plans<?php print $attr['year'];?>_<?php print $nom_row_plans;?>"></div>
<?php
$nom_row_plans++;
}
?>
<?php
if ($nom_row==3) {
?>
<div class="show_block_content_hide_comp" id="show_block_content_hide_comp<?php print $attr['year'];?>_<?php print $nom_row_com;?>"></div>
<?php
$nom_row_com++;
}
?>
<?php

$nom_row_mob++;
$nom_row++;
if ($nom_row==4) $nom_row=1;
$nom_plans++;
if ($nom_plans==3) $nom_plans=1;
}
?>
<div class="show_block_content_hide_plans" id="show_block_content_hide_plans<?php print $attr['year'];?>_<?php print $nom_row_plans;?>"></div>
<div class="show_block_content_hide_comp" id="show_block_content_hide_comp<?php print $attr['year'];?>_<?php print $nom_row_com;?>"></div>
<?php 
 endif;  
wp_reset_postdata();
$wp_query = NULL;
$wp_query = $temp_query; 
 }
 
}
add_shortcode('show_honorees', 'show_honorees_func');
 
 
 
function show_honorees_content()
{
if ( isset($_REQUEST) ) {  
if ($_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest'){
	$id=$_REQUEST['id']; 
	 $nowpost=get_post( $id);
	 print '
	 <div class="recipient-item-content-flex">
	 <div class="recipient-item-content-container col-md-12"><div class="recipient-item-content-container-ins">
	 <div class="recipient-item-content">'.$nowpost->post_content.'</div></div></div></div>';
	  
 }
 }
 
 die();	
}
add_action( 'wp_ajax_show_honorees_content', 'show_honorees_content' );
add_action( 'wp_ajax_nopriv_show_honorees_content', 'show_honorees_content' ); 




function theme_settings_page(){

if (isset($_POST['flickr_user_id'])){update_option('flickr_user_id',sanitize_text_field($_POST['flickr_user_id']));	}
if (isset($_POST['flickr_api_key'])){update_option('flickr_api_key',  stripslashes($_POST['flickr_api_key']));	}
if (isset($_POST['google_api_key'])){update_option('google_api_key',  stripslashes($_POST['google_api_key']));	}
if (isset($_POST['yu_channel_name'])){update_option('yu_channel_name',  stripslashes($_POST['yu_channel_name']));	}
  

$flickr_user_id=get_option('flickr_user_id');
$flickr_api_key=get_option('flickr_api_key'); 
$google_api_key=get_option('google_api_key'); 
$yu_channel_name=get_option('yu_channel_name'); 



?>
	    <div class="wrap"> 
	    <form method="post" action="<? echo $_SERVER['REQUEST_URI'];?>">
<table class="form-table">
		<tr valign="top">
<th scope="row" >Flickr user id</th>
<td>
<input type="text" name="flickr_user_id"    value="<? print $flickr_user_id;?>" style="width:100%;" />
</td>
</tr>
<tr valign="top">
<th scope="row" >Flickr api key</th>
<td>
<input type="text" name="flickr_api_key"  style="width:100%;  "    value="<? print $flickr_api_key;?>" />
</td>
</tr> 
		<tr valign="top">
<th scope="row" >Google api key</th>
<td>
<input type="text" name="google_api_key"    value="<? print $google_api_key;?>" style="width:100%;" />
</td>
</tr>
<tr valign="top">
<th scope="row" >Youtube user name</th>
<td>
<input type="text" name="yu_channel_name"  style="width:100%;  "    value="<? print $yu_channel_name;?>" />
</td>
</tr>
</table>	       
		   <?php	                
	            submit_button(); 
	        ?>          
	    </form>
		</div>
	 <?php
	  
	
}

function add_theme_menu_item()
{
	add_menu_page('Theme Settings','Theme Settings', "manage_options", "oxidayfoundation-panel", "theme_settings_page", null, 99);
}
add_action("admin_menu", "add_theme_menu_item");



function show_heroes_func($attr)
{
global $wp_query,$wpdb;
$temp_query = $wp_query;
  
 $args1 = array('post_type' => 'heroes', 'post_status'=>'publish','posts_per_page' =>-1,'orderby'=>'title','order'=>'ASC');
$posts = new WP_Query( $args1 );  
if ( $posts->have_posts() ) :
print '<div class="recipients-list"><div class="row rows2">';
$nom_row=1;
$nom_plans=1;
$nom_com=1;
$nom_row_com=1;
$nom_row_plans=1;
$nom_row_mob=1; 
$nom_row_com_s=1;
while ( $posts->have_posts() ) {
	$posts->the_post(); 	
	?>
 <div class="col-md-3 col-sm-6 columns2 text-center recipient-item_block" id="show_recipient<?php the_ID();?>" >
<div class="recipient-item text-center"    onclick="show_recipient_heroes(<?php the_ID();?>,<?php print $nom_row_com;?>,<?php print $nom_row_com_s;?>,<?php print $nom_row_plans;?>,<?php print $nom_row_mob;?>)">
<div class="heroes-item-image rounded-circle box-shadow-blue">
<div class="heroes-item-read">Read Biography</div>
<?php
if ( has_post_thumbnail() ) {
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
if ($featured_img_url!='')
{
	?>
	<img src="<?php print $featured_img_url;?>" alt="">
	<?php
	}
} 
?>
</div>
<p class="text-sm montserrat-font blue-color text-uppercase font-weight-bold"><span class="blue-color"><?php the_title();?></span></p>
</div>
</div>
<div class="show_block_content_hide_mob" id="show_block_content_hide_mob<?php print $nom_row_mob;?>"></div>
<?php
if ($nom_plans==2) {
?>
<div class="show_block_content_hide_plans" id="show_block_content_hide_plans<?php print $nom_row_plans;?>"></div>
<?php
$nom_row_plans++;
}
?>
<?php
if ($nom_com==3) {
?>
<div class="show_block_content_hide_comp_s" id="show_block_content_hide_comp_s<?php print $nom_row_com_s;?>"></div>
<?php
$nom_row_com_s++;
}
?>
<?php
if ($nom_row==4) {
?>
<div class="show_block_content_hide_comp" id="show_block_content_hide_comp<?php print $nom_row_com;?>"></div>
<?php
$nom_row_com++;
}
?>
<?php
$nom_row_mob++;
$nom_row++;
if ($nom_row==5) $nom_row=1;
$nom_plans++;
if ($nom_plans==3) $nom_plans=1;
$nom_com++;
if ($nom_com==4) $nom_com=1;
 
}
?>
<div class="show_block_content_hide_plans" id="show_block_content_hide_plans<?php print $nom_row_plans;?>"></div>
<div class="show_block_content_hide_comp" id="show_block_content_hide_comp_s<?php print $nom_row_com_s;?>"></div>
<div class="show_block_content_hide_comp" id="show_block_content_hide_comp<?php print $nom_row_com;?>"></div>
<?php

 print '</div></div>';
 endif;  
wp_reset_postdata();
$wp_query = NULL;
$wp_query = $temp_query; 
 
}
add_shortcode('show_heroes', 'show_heroes_func');



function show_heroes_content()
{
if ( isset($_REQUEST) ) {  
if ($_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest'){
	$id=$_REQUEST['id']; 
	 $nowpost=get_post( $id);
	 print '<div class="recipient-item-content-container_f" id="recipient_container"><div class="recipient-item-content-container-ins_f">
	  
	 <div class="recipient-item-content_f">'.$nowpost->post_content.'</div></div></div>';	  
 }
 }
 
 die();	
}
add_action( 'wp_ajax_show_heroes_content', 'show_heroes_content' );
add_action( 'wp_ajax_nopriv_show_heroes_content', 'show_heroes_content' );







function show_members_func($attr)
{
global $wp_query,$wpdb;
$temp_query = $wp_query;
 
 
$members_cat = get_terms('members-category');
if (is_array($members_cat))
{
$members_cat_show=array();
foreach ($members_cat as $members_c)
{
if ($members_c->count>0)
{
$poz = get_field( "position_for_members_category", $members_c );
if ($poz!=0) $members_cat_show[$poz]=$members_c;
else $members_cat_show[]=$members_c;

}
}
if (count($members_cat_show)>1) sort($members_cat_show);

foreach ($members_cat_show as $cat_show)
{
?>
<section class="vc_section section-2 white-bg-color about-intro"><div class="row container"><div class="col-sm-12"><div class="vc_column-inner "><div class="wpb_wrapper"><div class="row vc_inner"><div class="col-sm-12"><div class="vc_column-inner "><div class="wpb_wrapper">
  
	 <div class="page-section-header col-sm-12"><div class="vc_column-inner "><div class="wpb_wrapper">
	<div class="wpb_text_column wpb_content_element ">
		<div class="wpb_wrapper">
			<h4 class="blue-color font-weight-500 text-center montserrat-font"><?php print $cat_show->name;?></h4>

		</div>
	</div>
</div></div></div>
<?php	 
$args1 = array('post_type' => 'members', 'post_status'=>'publish','posts_per_page' =>-1
,'orderby'=>'menu_order','order'=>'asc',			
            'tax_query' => array(
                array(
                    'taxonomy' => 'members-category',
                    'field'    => 'id',
                    'terms'    => $cat_show->term_id
                )
            ));
$posts = new WP_Query( $args1 );  
if ( $posts->have_posts() ) :
print '<div class="recipients-list"><div class="row rows2">
';
$nom_row=1;
$nom_plans=1;
$nom_row_com=1;
$nom_row_plans=1;
$nom_row_mob=1; 
while ( $posts->have_posts() ) {
	$posts->the_post();  	
?>
 <div class="col-md-4 col-sm-6 columns2 text-center recipient-item_block" id="show_recipient<?php the_ID();?>_<?php print $cat_show->term_id;?>" >
<div class="recipient-item text-center"    onclick="show_recipient(<?php the_ID();?>,<?php print $cat_show->term_id;?>,<?php print $nom_row_com;?>,<?php print $nom_row_plans;?>,<?php print $nom_row_mob;?>)">
<div class="recipient-item-image rounded-circle box-shadow-blue">
<div class="recipient-item-read">Read Biography</div>
<?php
if ( has_post_thumbnail() ) {
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
if ($featured_img_url!='')
{
	?>
	<img src="<?php print $featured_img_url;?>" alt="">
	<?php
	}
} 
?>
</div>
<p class="text-sm montserrat-font blue-color text-uppercase font-weight-bold"><span class="blue-color"><?php the_title();?></span></p>
<p class="text-xs font-weight-300"><?php the_excerpt();?></p> 
</div>
</div>
<div class="show_block_content_hide_mob" id="show_block_content_hide_mob<?php print $cat_show->term_id;?>_<?php print $nom_row_mob;?>"></div>
<?php
if ($nom_plans==2) {
?>
<div class="show_block_content_hide_plans" id="show_block_content_hide_plans<?php print $cat_show->term_id;?>_<?php print $nom_row_plans;?>"></div>
<?php
$nom_row_plans++;
}
?>
<?php
if ($nom_row==3) {
?>
<div class="show_block_content_hide_comp" id="show_block_content_hide_comp<?php print $cat_show->term_id;?>_<?php print $nom_row_com;?>"></div>
<?php
$nom_row_com++;
}
?>
<?php
$nom_row_mob++;
$nom_row++;
if ($nom_row==4) $nom_row=1;
$nom_plans++;
if ($nom_plans==3) $nom_plans=1;
}
?>
<div class="show_block_content_hide_plans" id="show_block_content_hide_plans<?php print $cat_show->term_id;?>_<?php print $nom_row_plans;?>"></div>
<div class="show_block_content_hide_comp" id="show_block_content_hide_comp<?php print $cat_show->term_id;?>_<?php print $nom_row_com;?>"></div>
<?php  
endif;
?>	 
</div></div></div></div></div></div></div></div></section>
<?php
}
 

}
 
wp_reset_postdata();
$wp_query = NULL;
$wp_query = $temp_query; 
 }
add_shortcode('show_members', 'show_members_func');



function show_honorees_category_func($attr)
{
global $wp_query,$wpdb;
$temp_query = $wp_query;
if (isset($attr['categoryid']))
{
$honorees_cat = get_term( $attr['categoryid'], 'honorees-category' ); 
$cat_show=$attr['categoryid'];
$args1 = array('post_type' => 'honorees', 'post_status'=>'publish','posts_per_page' =>-1
,'orderby'=>'menu_order','order'=>'desc',			
            'tax_query' => array(
                array(
                    'taxonomy' => 'honorees-category',
                    'field'    => 'id',
                    'terms'    => $attr['categoryid']
                )
            ));
 $posts = new WP_Query( $args1 ); 
if ( $posts->have_posts() ) :
$show_posts=array();
$nom_row=1;
$nom_plans=1;
$nom_row_com=1;
$nom_row_plans=1;
$nom_row_mob=1; 
 while ( $posts->have_posts() ) {
	$posts->the_post(); 	
	$honorees_year = get_field('honorees_year',get_the_ID());
	$show_posts[$honorees_year][]=get_the_ID();
	}
	krsort($show_posts);
print '<div class="recipients-list"><div class="row rows2">
';	
foreach ($show_posts as $key=>$block)
{
foreach ($block as $key1=>$block1)
{
	$post=get_post( $block1 ); 
?>
 <div class="col-md-4 col-sm-6 columns2 text-center recipient-item_block" id="show_recipient<?php print $post->ID;?>_<?php print $cat_show;?>" >
<div class="recipient-item text-center"    onclick="show_recipient(<?php print $post->ID;?>,<?php print $cat_show;?>,<?php print $nom_row_com;?>,<?php print $nom_row_plans;?>,<?php print $nom_row_mob;?>)">
<div class="recipient-item-image rounded-circle box-shadow-blue">
<div class="recipient-item-read">Read Biography</div>
<?php
if ( has_post_thumbnail($post->ID) ) {
$featured_img_url = get_the_post_thumbnail_url($post->ID,'full'); 
if ($featured_img_url!='')
{
	?>
	<img src="<?php print $featured_img_url;?>" alt="">
	<?php
	}
} 
?>
</div>
<p class="text-sm montserrat-font blue-color text-uppercase font-weight-bold"><span class="blue-color"><?php print $key;?> | <?php print  $post->post_title;?></span></p>

</div>
</div>
<div class="show_block_content_hide_mob" id="show_block_content_hide_mob<?php print $cat_show;?>_<?php print $nom_row_mob;?>"></div>
<?php
if ($nom_plans==2) {
?>
<div class="show_block_content_hide_plans" id="show_block_content_hide_plans<?php print $cat_show;?>_<?php print $nom_row_plans;?>"></div>
<?php
$nom_row_plans++;
}
?>
<?php
if ($nom_row==3) {
?>
<div class="show_block_content_hide_comp" id="show_block_content_hide_comp<?php print $cat_show;?>_<?php print $nom_row_com;?>"></div>
<?php
$nom_row_com++;
}
?>
<?php
$nom_row_mob++;
$nom_row++;
if ($nom_row==4) $nom_row=1;
$nom_plans++;
if ($nom_plans==3) $nom_plans=1;
 
	}
}	
?>
<div class="show_block_content_hide_plans" id="show_block_content_hide_plans<?php print $cat_show;?>_<?php print $nom_row_plans;?>"></div>
<div class="show_block_content_hide_comp" id="show_block_content_hide_comp<?php print $cat_show;?>_<?php print $nom_row_com;?>"></div>
<?php 
print '</div></div>';
endif;
}
wp_reset_postdata();
$wp_query = NULL;
$wp_query = $temp_query; 
}
add_shortcode('show_honorees_category', 'show_honorees_category_func');



function insert_page_func($attr)
{
global $wp_query,$wpdb;
$temp_query = $wp_query;
if (isset($attr['padeid']))
{ 
	$post=get_post($attr['padeid']);  	
	if (isset($post->post_content))
	{
	print do_shortcode($post->post_content); 
	}
}
wp_reset_postdata();
$wp_query = NULL;
$wp_query = $temp_query; 
}
add_shortcode('insert_page', 'insert_page_func');




function cc_mime_types($mimes) {
$mimes['svg'] = 'image/svg+xml';
return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

function show_home_news_func()
{
	
global $wp_query,$wpdb;
$temp_query = $wp_query;

   
$args1 = array('post_type' => 'post', 'post_status'=>'publish','posts_per_page' =>10 );
$posts = new WP_Query( $args1 );  
if ( $posts->have_posts() ) :
$nav_array=array();
print '<div class="home_news_slider" >';
while ( $posts->have_posts() ) {
	$posts->the_post(); 
	 
	?>
	<div class="item"><div class="item_ins">
	<a class="home_news_slider_img"  href="<?php print the_permalink(get_the_ID());?>">
	<div class="dates"><?php print the_date('F j, Y');?></div>
	<div class="title"><?php the_title();?></div>
	<figure>
	<?php
	if ( has_post_thumbnail() ) {
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
	?>
	<div class="home_news_slider_img_bg"></div>
	<img src="<?php print $featured_img_url;?>" alt="">
	<?php
}
	?>
	</figure>
	</a>
	<div class="home_news_slider_text_link">
	<div class="home_news_slider_text">
	<?php the_excerpt();?>	
	</div></div> 
	<a class="goto" href="<?php print the_permalink(get_the_ID());?>">Continue reading</a>
	
</div></div>
<?php
$nav_array[]=get_the_ID();
}
print '</div>';	
print '<div class="row"><div class="col-md-6">';
print '<div class="home_news_slider_nav" >';
foreach ($nav_array as $key=>$block)
{
print '<div class="item">'.$block.'</div>';
}
print '</div></div><div class="col-md-6">';	
print '<div class="read_home_news"><a href="'.get_permalink(get_option('page_for_posts')).'">Read all news</a></div>';
print '</div></div>';
endif; 
wp_reset_postdata();
$wp_query = NULL;
$wp_query = $temp_query;
}
add_shortcode('show_home_news', 'show_home_news_func');
  


function getClient($apiKey) {$client = new Google_Client();$client->setDeveloperKey($apiKey);  return $client;}


function wph_cut_by_words($text) { 
$maxlen=100; 
	if (strlen($text)>$maxlen)
	{
    $len = (mb_strlen($text) > $maxlen)? mb_strripos(mb_substr($text, 0, $maxlen), ' ') : $maxlen;
    $cutStr = mb_substr($text, 0, $len);
    $temp = (mb_strlen($text) > $maxlen)? $cutStr. '...' : $cutStr;
	
	}
	else {
	$temp=$text;  }
    return $temp;
}  




add_action( 'scheduler-category_add_form', function( $taxonomy )
{
    ?><style>.term-description-wrap,.term-slug-wrap,.term-parent-wrap,#wpseo_meta{display:none;}</style><?php
}, 10, 2 );

add_action( 'scheduler-category_edit_form', function( $taxonomy )
{
    ?><style>.term-description-wrap,.term-slug-wrap,.term-parent-wrap,#wpseo_meta{display:none;}</style><?php
}, 10, 2 );

add_filter("manage_edit-scheduler-category_columns", 'theme_columns'); 
 
function theme_columns($theme_columns) {
    $new_columns = array(
        'cb' => '<input type="checkbox" />',
        'name' => __('Name'),
        'header_icon' => '',
//      'description' => __('Description'),
      //  'slug' => __('Slug'),
        'posts' => __('Posts')
        );
    return $new_columns;
}

function show_schedule_year_func($atr)
{ 
global $wp_query;
if (isset($atr['year']))
{
$cat = get_term_by('term_id', $atr['year'], 'scheduler-category');
if (isset($cat))
{
$temp_query = $wp_query;

$args1 = array(
            'post_type' => 'scheduler',
            'posts_per_page' => -1,
            'post_status'=>'publish','orderby'=>'menu_order','order'=>'asc',			
            'tax_query' => array(
                array(
                    'taxonomy' => 'scheduler-category',
                    'field'    => 'id',
                    'terms'    => $cat->term_id
                )
            )
        ); 
 $posts = new WP_Query( $args1 );
if ( $posts->have_posts() )
{
	while ( $posts->have_posts() ) {
	 $posts->the_post(); 
	 ?>
		<div class="row"><div class="col-sm-12"><div class="vc_column-inner "><div class="wpb_wrapper">
	<div class="wpb_text_column wpb_content_element  page_title_red_sm">
		<div class="wpb_wrapper">
			<h4><?php the_title();?></h4>

		</div>
	</div>
</div></div></div></div>
	<?php
	$fields = get_fields(get_the_ID());
	foreach( $fields as $field_name => $value )
	{
		$field = get_field_object($field_name,get_the_ID(), array('load_value' => false)); 			
		if (array_key_exists('order_no', $field)) { $menu_order[$field_name] = $field["order_no"];}
		if (array_key_exists('menu_order', $field)) { $menu_order[$field_name] = $field["menu_order"];}
	}
	array_multisort($menu_order, SORT_ASC, $fields);
	
	foreach( $fields as $field_name => $value ):
		$get_f=get_field_object($field_name,get_the_ID());
		?>
		<div class="row schedule-list-item schedule-list-item-contents box-shadow-blue"><div class="schedule-list-item-block-group col-sm-12"><div class="vc_column-inner "><div class="wpb_wrapper">
 
		<?php
		foreach ($value as $key=>$block)
		{
		?>
		<div class="row vc_inner schedule-list-item-block d-flex">
		<div class="col-sm-30"><div class="vc_column-inner "><div class="wpb_wrapper">
	<div class="wpb_text_column wpb_content_element  montserrat-font font-weight-bold blue-color schedule-list-item-date">
			<div class="wpb_wrapper"><h6><?php print $block['event_time'];?></h6> 
	</div></div>
</div></div></div>
<div class="schedule-list-item-details col col-sm-30"><div class="vc_column-inner "><div class="wpb_wrapper">
	<div class="wpb_text_column wpb_content_element ">
		 <?php if ($block['event_title']!='') { ?>
			<h6 class="montserrat-font font-weight-500 blue-color"><?php print $block['event_title'];?></h6>
		<?php } ?>
		<?php if ($block['category_of_visitors']!='') { ?>
			<p class="montserrat-font text-md font-weight-300 mt-2"><?php print $block['category_of_visitors'];?></p>
		<?php } ?>
		<?php if ($block['location']!='') { ?>
			<div class="schedule-list-item-location d-flex mt-1"><span class="d-inline-block map-marker"></span>
			<p class="text-xs blue-color"><?php print $block['location'];?></p></div>
		<?php } ?>
		<?php 
		if (is_array($block['event_content']))
		{
			foreach ($block['event_content'] as $key1=>$block1)
			{
			print '<div class="schedule-list-item-block-row mt-4">';
				if (isset($block1['speakers_category_title']))
				{
					print '<p class="montserrat-font font-weight-bold red-color text-uppercase">'.$block1['speakers_category_title'].'</p>';
				}
				if (is_array($block1['speakers']))
				{
					foreach ($block1['speakers'] as $key2=>$block2)
					{
					print '<div class="schedule-list-item-block-row mt-4">';
						if (isset($block2['speaker_name']))
						{
						print '<p class="text-sm montserrat-font font-weight-300">'.$block2['speaker_name'].'</p>';
						} 
						
						if (isset($block2['speech_content']))
						{
						?>
						<div class="goals-list dignitaries-list font-weight-300 mt-2">
<div class="goals-item">
<div class="goals-item-contents">
<?php print $block2['speech_content'];?>
</div></div></div>
<?php
						}
									print '</div>';

					}
				}
				
				
							print '</div>';

			
			}
		}
		
		?>
			 
	</div>
</div></div></div>
		</div>
		<?php
		}
		?>
		</div></div></div></div>
		<?php
	endforeach;
	?>
<?
}
		}
wp_reset_postdata();
$wp_query = NULL;
$wp_query = $temp_query; 
}
}
}
add_shortcode('show_schedule_year', 'show_schedule_year_func');
add_shortcode('show_home_slider', 'show_home_slider_func');

function show_home_slider_func() {
	global $wp_query;
$temp_query = $wp_query;
$slider_args = array(
                                'post_type' => 'slider',
                                'posts_per_page' => -1,
                                 'orderby'=>'menu_order','order'=>'asc'
                            );
$posts = new WP_Query( $slider_args );
 if ( $posts->have_posts() )
  {
  ?>
  <div class="slider_slick_home">
  
<?php
while ( $posts->have_posts() ) {
  $posts->the_post();
  $featured_img_url='';
  
  if ( has_post_thumbnail() ) {
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); 
}

 
  ?>
  <div class="item">
  <div class="container">
  <div class="row">
  	<div class="raw col-md-10">
<div class="slider_text">
  <h2><?php the_title();?></h2>
  <h3><?php the_excerpt();?></h3>
  <?php
  $button_text_slider=get_post_meta(get_the_ID(), 'button_text_slider') ;
  $button_link_slider=get_post_meta(get_the_ID(), 'button_link_slider') ;
  
  if (isset($button_link_slider[0])  AND isset($button_text_slider[0]))
  {
  print '<div class="button_oval_link "><a href="'.$button_link_slider[0].'"  >'.$button_text_slider[0].'</a></div>';
  }
  ?>
  </div>
    </div>
    </div></div>
<?php
if ($featured_img_url!='')
{
	?>
	<div class="home_main_slider_img_bg"></div>
 <div class="bg_img" style="background: url(<?php print $featured_img_url;?>) center center;"></div>
</div>
	<?php
}
 
    } ?>
 </div>
<?php
}
?>

 <?php
  wp_reset_postdata();
 $wp_query = NULL;
$wp_query = $temp_query;

}

















if( !wp_next_scheduled('oxidayfoundation_hook' ) ) wp_schedule_event( time(), 'hourly', 'oxidayfoundation_hook' );
add_action( 'oxidayfoundation_hook', 'import_oxidayfoundation_cron' );

function import_oxidayfoundation_cron() {
global $wpdb;
  

 
$args = array('taxonomy' => 'media-category','hide_empty' => false,'orderby'=>'title','order'=>'desc');
$photos_id=0;
$terms = get_terms( $args );
foreach ($terms as $termses) : 
$category_media_type = get_field('category_media_type', $termses);
if ($category_media_type=='photos') $photos_id=$termses->term_id;
endforeach;


if ($photos_id!=0)
{
 
$userId=get_option('flickr_user_id');
$apiKey=get_option('flickr_api_key'); 
 
$photos = simplexml_load_file("https://api.flickr.com/services/rest/?method=flickr.photosets.getList&api_key=$apiKey&user_id=$userId&primary_photo_extras=url_o,url_m");              
if (isset($photos->photosets->photoset))
{

$perPage = 500;
if (isset($photos->photosets['per_page'][0]))$perPage = $photos->photosets['per_page'][0]; 
 
 for ($p = 0; $p < $perPage; $p++) {
 if (!empty($photos->photosets->photoset[$p]['id'])) { 	 	
	$search = $wpdb->get_results("SELECT post_id  FROM {$wpdb->postmeta} WHERE meta_key='oxiday_photoset_id' AND meta_value='".$photos->photosets->photoset[$p]['id']."'  ");	
	
	if (count($search)==0)
	{		
	if (!empty($photos->photosets->photoset[$p]->title)) {
			$title=(string)$photos->photosets->photoset[$p]->title;
			$ids=(string)$photos->photosets->photoset[$p]['id'];
			$post_excerpt='';
			if (isset ($photos->photosets->photoset[$p]->description)) $post_excerpt=(string)$photos->photosets->photoset[$p]->description;
			$save_date=current_time('mysql') ;
			if (isset($photos->photosets->photoset[$p]['date_create']))
			{
				$date_create=(int)$photos->photosets->photoset[$p]['date_create'];
				$d =   DateTime::createFromFormat('U', $date_create); 
				$save_date=$d->format("Y-m-d H:i:s.u");
			}
			
			$post_data = array(
					'post_title'    => wp_strip_all_tags($title), 
					'post_status'   => 'publish',
					'post_excerpt'=>$post_excerpt,
					'post_type'=>'media', 
					'post_date'=>$save_date
					);//new post
			$post_id = wp_insert_post( $post_data );
			update_post_meta($post_id, 'oxiday_photoset_id',$ids) ;	
			
			$primary_photo_extras=(string)$photos->photosets->photoset[$p]->primary_photo_extras['url_m']; 
			$filename=basename($primary_photo_extras);
			$uploaddir = wp_upload_dir();
			$uploadfile = $uploaddir['path'] . '/' . $filename;
			$contents= file_get_contents($primary_photo_extras);
			$savefile = fopen($uploadfile, 'w');
			fwrite($savefile, $contents);
			fclose($savefile);
			$wp_filetype = wp_check_filetype(basename($filename), null );
			$attachment = array(
			'post_mime_type' => $wp_filetype['type'],
			'post_title' => $filename,
			'post_content' => '',
			'post_status' => 'inherit'
			);
			$attach_id = wp_insert_attachment( $attachment, $uploadfile );
			$imagenew = get_post( $attach_id );
			$fullsizepath = get_attached_file( $imagenew->ID );
			$attach_data = wp_generate_attachment_metadata( $attach_id, $fullsizepath );
			wp_update_attachment_metadata( $attach_id, $attach_data );
			set_post_thumbnail( $post_id, $attach_id ) ;	
			
			
			
			$primary_photo_extras=(string)$photos->photosets->photoset[$p]->primary_photo_extras['url_o'];
			 $filename=basename($primary_photo_extras);
			$uploaddir = wp_upload_dir();
			$uploadfile = $uploaddir['path'] . '/' . $filename;
			$contents= file_get_contents($primary_photo_extras);
			$savefile = fopen($uploadfile, 'w');
			fwrite($savefile, $contents);
			fclose($savefile);
			$wp_filetype = wp_check_filetype(basename($filename), null );
			$attachment = array(
			'post_mime_type' => $wp_filetype['type'],
			'post_title' => $filename,
			'post_content' => '',
			'post_status' => 'inherit'
			);
			$attach_id = wp_insert_attachment( $attachment, $uploadfile );
			$imagenew = get_post( $attach_id );
			$fullsizepath = get_attached_file( $imagenew->ID );
			$attach_data = wp_generate_attachment_metadata( $attach_id, $fullsizepath );
			wp_update_attachment_metadata( $attach_id, $attach_data ); 
			update_post_meta($post_id, 'big_image',$attach_id) ;
		}
	}
	else
	{
	if (isset($search[0]))
	{ 
		
		$post_id_f= $search[0]->post_id; 			
		$err=0;
		if ( has_post_thumbnail($post_id_f) ) {
		$featured_img_url = get_the_post_thumbnail_url($post_id_f,'full');
		if(@getimagesize($featured_img_url)){ $err++;   }
		}
		$err=0;
		 
		if ($err==0)
		{
			$primary_photo_extras=(string)$photos->photosets->photoset[$p]->primary_photo_extras['url_m']; 
			$filename=basename($primary_photo_extras);
			$uploaddir = wp_upload_dir();
			$uploadfile = $uploaddir['path'] . '/' . $filename;
			$contents= file_get_contents($primary_photo_extras);
			$savefile = fopen($uploadfile, 'w');
			fwrite($savefile, $contents);
			fclose($savefile);
			$wp_filetype = wp_check_filetype(basename($filename), null );
			$attachment = array(
			'post_mime_type' => $wp_filetype['type'],
			'post_title' => $filename,
			'post_content' => '',
			'post_status' => 'inherit'
			);
			$attach_id = wp_insert_attachment( $attachment, $uploadfile );
			$imagenew = get_post( $attach_id );
			$fullsizepath = get_attached_file( $imagenew->ID );
			$attach_data = wp_generate_attachment_metadata( $attach_id, $fullsizepath );
			wp_update_attachment_metadata( $attach_id, $attach_data );
			set_post_thumbnail( $post_id_f, $attach_id ) ;	
			 
		}
		
		$big_image = get_field('big_image',$post_id_f);
		$big_image='';
		if ($big_image=='') {
		$primary_photo_extras=(string)$photos->photosets->photoset[$p]->primary_photo_extras['url_o'];
			 $filename=basename($primary_photo_extras);
			$uploaddir = wp_upload_dir();
			$uploadfile = $uploaddir['path'] . '/' . $filename;
			$contents= file_get_contents($primary_photo_extras);
			$savefile = fopen($uploadfile, 'w');
			fwrite($savefile, $contents);
			fclose($savefile);
			$wp_filetype = wp_check_filetype(basename($filename), null );
			$attachment = array(
			'post_mime_type' => $wp_filetype['type'],
			'post_title' => $filename,
			'post_content' => '',
			'post_status' => 'inherit'
			);
			$attach_id = wp_insert_attachment( $attachment, $uploadfile );
			$imagenew = get_post( $attach_id );
			$fullsizepath = get_attached_file( $imagenew->ID );
			$attach_data = wp_generate_attachment_metadata( $attach_id, $fullsizepath );
			wp_update_attachment_metadata( $attach_id, $attach_data ); 
			update_post_meta($post_id_f, 'big_image',$attach_id) ;
			}
		
	}
	}
}
}
}
}










/*  video  */
$apiKey=get_option('google_api_key');
$channel_name=get_option('yu_channel_name');
 
$args = array('taxonomy' => 'media-category','hide_empty' => false,'orderby'=>'title','order'=>'desc');
$video_id=0;
$terms = get_terms( $args );
foreach ($terms as $termses) : 
$category_media_type = get_field('category_media_type', $termses); 
if ($category_media_type=='video') $video_id=$termses->term_id;
endforeach; 
if ($video_id!=0)
{ 
require_once  dirname(__FILE__).'/vendor/autoload.php'; 
$client = getClient($apiKey);	
$service = new Google_Service_YouTube($client);
$lastChannel = $service->channels->listChannels('snippet, contentDetails, statistics', array('forUsername' => $channel_name,));
      
if (isset($lastChannel->items[0]->contentDetails->relatedPlaylists->uploads))
{
	$playlistId=$lastChannel->items[0]->contentDetails->relatedPlaylists->uploads;
	$params = ['playlistId' =>$playlistId,'maxResults'=> 50];
	$response = $service->playlistItems->listPlaylistItems('snippet,contentDetails', $params);
	if (isset($response->items))
	{
	$i=1;
		foreach ($response->items as $key=>$block)
		{
			
			
			if (isset($block->contentDetails->videoId))
			{
				$videoId=(string)$block->contentDetails->videoId;
				
	$search = $wpdb->get_results("SELECT post_id  FROM {$wpdb->postmeta} WHERE meta_key='oxiday_video_id' AND meta_value='".$videoId."'  ");		
	if (count($search)==0)
	{				 
				$title=(string)$block->snippet->title;
				$description=(string)$block->snippet->description;
				$post_excerpt=(string)$block->snippet->description;
				$thumbnails='';  
				$publishedAt=current_time('mysql');
				if (isset($block->snippet->publishedAt))$publishedAt=$block->snippet->publishedAt;
				 
				$post_data = array(
					'post_title'    => wp_strip_all_tags($title), 
					'post_status'   => 'publish',
					'post_excerpt'=>$post_excerpt,
					'post_type'=>'media', 
					'post_content'  => $description,
					'post_date'=>$publishedAt 
					); 
				$post_id = wp_insert_post( $post_data );
				update_post_meta($post_id, 'oxiday_video_id',$videoId) ;	 
				$wpdb->query("INSERT INTO `".$wpdb->prefix."term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES (".$post_id.", '".$video_id."', '0');");
				  
				if (isset($block->snippet->thumbnails->standard->url))
				{
					$filename= $videoId.'_'.basename($block->snippet->thumbnails->standard->url);
					$uploaddir = wp_upload_dir();
					$uploadfile = $uploaddir['path'] . '/' . $filename;
					$contents= file_get_contents($block->snippet->thumbnails->standard->url);
					$savefile = fopen($uploadfile, 'w');
					fwrite($savefile, $contents);
					fclose($savefile);
					$wp_filetype = wp_check_filetype(basename($filename), null );
					$attachment = array(
						'post_mime_type' => $wp_filetype['type'],
						'post_title' => $filename,
						'post_content' => '',
						'post_status' => 'inherit'
					);
					$attach_id = wp_insert_attachment( $attachment, $uploadfile );
					$imagenew = get_post( $attach_id );
					$fullsizepath = get_attached_file( $imagenew->ID );
					$attach_data = wp_generate_attachment_metadata( $attach_id, $fullsizepath );
					wp_update_attachment_metadata( $attach_id, $attach_data );
					set_post_thumbnail( $post_id, $attach_id ) ;	
					update_post_meta($post_id, 'big_image',$attach_id) ;
				} 
				 
			}
			 
		
		}
		}
	
	}
} 
}

 
}