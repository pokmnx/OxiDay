<?php 
/*
*   Template Name: Test
*/
global $wp_query,$post,$wpdb;
get_header(); 

/*

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
 
$photos = simplexml_load_file("https://api.flickr.com/services/rest/?method=flickr.photosets.getList&api_key=$apiKey&user_id=$userId");              
if (isset($photos->photosets->photoset))
{
$perPage = 500;
if (isset($photos->photosets['per_page'][0]))$perPage = $photos->photosets['per_page'][0]; 
 
 for ($p = 0; $p < $perPage; $p++) {
 if (!empty($photos->photosets->photoset[$p]['id'])) { 	 	
	
	$id = $photos->photosets->photoset[$p]['primary'];    
        $secret = $photos->photosets->photoset[$p]['secret'];
        $server = $photos->photosets->photoset[$p]['server'];
        $farm = $photos->photosets->photoset[$p]['farm'];						
		$img_url = "http://farm$farm.static.flickr.com/$server/".$id."_".$secret."_o.jpg";
	print $img_url.'<br>';
	print_r($photos->photosets->photoset[$p]);
	print '<br><Br>';
	
	}
}
}
}

/*
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
	
	
	if (isset($block->snippet->thumbnails->standard->url))
				{
				print $block->snippet->thumbnails->standard->url;
				print '<br>';
				
				}
	
	
	}
			 
		
		}
		}
	
	}
} 
}



 /*
 
 $userId=get_option('flickr_user_id');
$apiKey=get_option('flickr_api_key'); 
 
$photos = simplexml_load_file("https://api.flickr.com/services/rest/?method=flickr.photosets.getList&api_key=$apiKey&user_id=$userId");              
if (isset($photos->photosets->photoset))
{
$perPage = 500;
if (isset($photos->photosets['per_page'][0]))$perPage = $photos->photosets['per_page'][0]; 
 $perPage = 1;
 for ($p = 0; $p < $perPage; $p++) {
 if (!empty($photos->photosets->photoset[$p]['id'])) { 	
 
	  $date_create=(int)$photos->photosets->photoset[$p]['date_create'];
		$d =   DateTime::createFromFormat('U', $date_create); 
 
$eee=$d->format("Y-m-d H:i:s.u");
$post_data = array(
					'post_title'    => wp_strip_all_tags('123'), 
					'post_status'   => 'publish', 
					'post_type'=>'media', 
					'post_date'=>$eee
					);//new post
					
	$post_id = wp_insert_post( $post_data );
 }
 }
 }
  
/*
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

$userId='69307281@N05';
$apiKey='6274cbbec8bc816cbea09820f5100620'; 
$photos = simplexml_load_file("https://api.flickr.com/services/rest/?method=flickr.photosets.getList&api_key=$apiKey&user_id=$userId");              
if (isset($photos->photosets->photoset))
{
$perPage = 500;
if (isset($photos->photosets['per_page'][0]))$perPage = $photos->photosets['per_page'][0]; 
$perPage=1;
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
			
			$post_data = array(
					'post_title'    => wp_strip_all_tags($title), 
					'post_status'   => 'publish',
					'post_excerpt'=>$post_excerpt,
					'post_type'=>'media', 
					'post_date'=>current_time('mysql') 
					);//new post
			$post_id = wp_insert_post( $post_data );
			update_post_meta($post_id, 'oxiday_photoset_id',$ids) ;	 
			$wpdb->query("INSERT INTO `".$wpdb->prefix."term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES (".$post_id.", '".$photos_id."', '0');");
			
			$id = $photos->photosets->photoset[$p]['primary'];    
        $secret = $photos->photosets->photoset[$p]['secret'];
        $server = $photos->photosets->photoset[$p]['server'];
        $farm = $photos->photosets->photoset[$p]['farm'];						
		$img_url = "http://farm$farm.static.flickr.com/$server/".$id."_".$secret.".jpg";
		
			$filename=$id."_".$secret.".jpg";
			$uploaddir = wp_upload_dir();
			$uploadfile = $uploaddir['path'] . '/' . $filename;
			$contents= file_get_contents($img_url);
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
*/
?>  
<div class="pages">
<div class="container"> 
<?php the_content(); ?>
</div>
</div> 
<?php	
	  
get_footer();
?>