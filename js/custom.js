function map_height()
{
	var mapblock =jQuery('.mapblock').height();
	 jQuery('.mapblock .wpb_map_wraper').height(mapblock);
}

jQuery(document).ready(function($){

map_height(); 
$(window).resize(function(){
		map_height();
	}); 

	
	//Mobile Menu
	$('.nav-icon').click(function(){
		$('nav.menu').stop().slideToggle('fast');
		$(this).find('i').toggleClass('fa-navicon fa-close');
	});

	//News Background
	function newsBg(){
		$('.news-item').each(function(){
			var imgURL = $(this).find('img').attr('src');
			 
			$(this).find('.news-item-image').css({'background':'url('+imgURL+') center center'});
		});
	}
	newsBg();
	
	//Quote Background
	function quoteBg(){
		$('.quote-slide-column').each(function(){
			var imgURL = $(this).find('figure img').attr('src');
			$(this).find('figure').css({'background-image':'url('+imgURL+')'});
		});
	}
	quoteBg();
	
	//Mega Menu dropdown
	$('.at-drop-down').on('click', function(e){
		if(Modernizr.mq('screen and (max-width:991px)')) {
			e.preventDefault();
			$(this).next($('.mega-menu')).slideToggle();
		}
	});
    $(window).resize(function() {
        $('.sub-menu').attr("style", "");
    });
	
	//Mega Menu Inner
	$('.at-drop-inner-down').on('click', function(e){
		if(Modernizr.mq('screen and (max-width:991px)')) {
		  e.preventDefault();
		  $(this).find($('.sub_menu')).slideToggle();
		  $(this).find('i').toggleClass('fa-minus fa-plus');
		}
	});

	
	
//Quote Slider
	jQuery('.quote-slider').slick({
	  dots: false,
	  arrows: true,
	  infinite: true,
	  speed: 500,
	  fade: true,
	  cssEase: 'linear'
	});
	
	//Philotimo Gallery
	jQuery('.philotimo-slider-for').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: false,
	  fade: true,
	  asNavFor: '.philotimo-slider-nav'
	});
	jQuery('.philotimo-slider-nav').slick({
	  slidesToShow: 3,
	  slidesToScroll: 1,
	  asNavFor: '.philotimo-slider-for',
	  dots: false,
	  focusOnSelect: true
	});
	
	//Video Slider
	jQuery('.video-slider').slick({
	  dots: false,
	  arrows: true,
	  infinite: true,
	  speed: 500,
	  fade: true,
	  cssEase: 'linear'
	});
	
	
	
	//Custom Tab
	$('#custom-tabs li a:not(:first)').addClass('inactive');
	$('#custom-tabs li:first-child a').addClass('current');
	$('.custom-tab-item').hide();
	$('.custom-tab-item:first').show();
	
	$('#custom-tabs li a').click(function(e){
		var t = $(this).attr('id');
		if($(this).hasClass('inactive')){ //this is the start of our condition 
			$('#custom-tabs li a').addClass('inactive').removeClass('current');           
			$(this).removeClass('inactive').addClass('current');
			$('.custom-tab-item').hide();
			$('#'+ t + 'C').fadeIn('slow');
		}
		e.preventDefault();
	});
	
	/*--Photo Gallery--*/
	$('.photo-gallery-for').each(function(key, item) {
	
		var sliderIdName = 'slider' + key;
		var sliderNavIdName = 'sliderNav' + key;
		
		this.id = sliderIdName;
		$('.photo-gallery-nav')[key].id = sliderNavIdName;
		
		var sliderId = '#' + sliderIdName;
		var sliderNavId = '#' + sliderNavIdName;
		
		jQuery(sliderId).slick({
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: true,
			fade: true,
			asNavFor: sliderNavId,
			prevArrow: $(this).parent().find('.prev'),
      		nextArrow: $(this).parent().find('.next') 
		});
		
		jQuery(sliderNavId).slick({
			slidesToShow: 12,
			slidesToScroll: 1,
			asNavFor: sliderId,
			dots: false,
			arrows: false,
			centerMode: true,
			focusOnSelect: true,
			responsive: [
			{
			breakpoint: 1210,
			settings: {
			slidesToShow: 10,
			slidesToScroll: 1,
			}
			},
			{
			breakpoint: 991,
			settings: {
			slidesToShow: 8,
			slidesToScroll: 1
			}
			},
			{
			breakpoint: 767,
			settings: {
			slidesToShow: 6,
			slidesToScroll: 1
			}
			},
			{
			breakpoint: 640,
			settings: {
			slidesToShow: 4,
			slidesToScroll: 1
			}
			},
			{
			breakpoint: 480,
			settings: {
			slidesToShow: 3,
			slidesToScroll: 1
			}
			}
			]
		});
	
	});
	
	//Honorees Slider
	jQuery('.honorees-slider-for').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  arrows: false,
	  fade: true,
	  asNavFor: '.honorees-slider-nav',adaptiveHeight: true
	});
	jQuery('.honorees-slider-nav').slick({
	  slidesToShow: 7,
	  slidesToScroll: 1,
	  infinite: false,
	  asNavFor: '.honorees-slider-for',
	  dots: false,
	  focusOnSelect: true,
	  responsive: [
			{
			breakpoint: 1199,
				settings: {
				slidesToShow: 5,
				slidesToScroll: 1,
				}
			},
			{
			breakpoint: 767,
				settings: {
				slidesToShow: 4,
				slidesToScroll: 1
				}
			},
			{
			breakpoint: 575,
				settings: {
				slidesToShow: 3,
				slidesToScroll: 1
				}
			}
	  ]
	});

	 
$(".past_celebrations").mouseover(function(){     
$(this).addClass("focus");
 })
$(".past_celebrations").mouseleave(function(){ 
$(this).removeClass("focus"); 
})
jQuery('.past_celebrations').click(function(e){ 
if ($(this).hasClass('focus'))
{$(this).removeClass("focus"); }
else
{$(this).addClass("focus");}  
})
	
	jQuery('#recipient_container').click(function(){   jQuery.fancybox.close();})
	
	jQuery('.home_news_slider').slick({
			slidesToShow: 3,
			slidesToScroll: 1, 
			dots: false,
			arrows: false, 
			 asNavFor: '.home_news_slider_nav',
			responsive: [ 
			{
			breakpoint: 991,
			settings: {
			slidesToShow: 2,
			slidesToScroll: 1
			}
			},
			{
			breakpoint: 767,
			settings: {
			slidesToShow: 1,
			slidesToScroll: 1
			}
			} 
			]
		}); 
		 
	jQuery('.home_news_slider_nav').slick({
	  slidesToShow: 3,
	  slidesToScroll: 1,
	  asNavFor: '.home_news_slider',
	  dots: false,
	  focusOnSelect: true,responsive: [ 
			{
			breakpoint: 991,
			settings: {
			slidesToShow: 2,
			slidesToScroll: 1
			}
			},
			{
			breakpoint: 767,
			settings: {
			slidesToShow: 1,
			slidesToScroll: 1
			}
			} 
			]
	});
		
		jQuery('.home_news_slider').each(function(){
			var max=0;
			jQuery('.home_news_slider .item').each(function(){
				if (jQuery(this).height()>max) max=jQuery(this).height(); 
			});
			jQuery('.home_news_slider .item_ins').height(max);
		});
	
	jQuery('.news').each(function(){
			var max=0;
			jQuery('.news .news-item').each(function(){
				if (jQuery(this).height()>max) max=jQuery(this).height(); 
			}); 
			jQuery('.news .news-item').height(max);
		});
	
	
});


function show_recipient(id,cat,com,plans,mob)
{	
	var winWidth=jQuery(document).width();
	jQuery(window).resize(function(){winWidth=jQuery(document).width();}); 
	jQuery('.show_block_content_hide_comp').removeClass('active');
	jQuery('.show_block_content_hide_plans').removeClass('active');
	jQuery('.show_block_content_hide_mob').removeClass('active');		
	var now=jQuery('#show_recipient'+id+'_'+cat); 
	if (!now.hasClass('activeborder'))
	{
	jQuery('.recipient-item_block').removeClass('activeborder');
	jQuery.ajax({url: ajax_web_url, type: 'post',  data:'action=show_honorees_content&id='+id ,  success: function(data){ 
	now.addClass('activeborder');
	if (winWidth>768)
	{
		jQuery('#show_block_content_hide_comp'+cat+'_'+com).html(data);
		jQuery('#show_block_content_hide_comp'+cat+'_'+com).addClass('active');	
	}
	else
	{
		if (winWidth>575)
		{  
			jQuery('#show_block_content_hide_plans'+cat+'_'+plans).html(data);
			jQuery('#show_block_content_hide_plans'+cat+'_'+plans).addClass('active');
		}
		else
		{		 			
			jQuery('#show_block_content_hide_mob'+cat+'_'+mob).html(data);
			jQuery('#show_block_content_hide_mob'+cat+'_'+mob).addClass('active');			
		}
	}	
	} }); 
	} else { now.removeClass('activeborder'); }
}

function show_heroes(id)
{	
	jQuery.ajax({url: ajax_web_url, type: 'post',  data:'action=show_heroes_content&id='+id ,  success: function(data){ 
	jQuery.fancybox.close();
	jQuery.fancybox({ fitToView: false, content: data, 'titleShow': false,'padding':0 , margin:0,helpers: {overlay: {closeClick : true, showEarly  : true,locked: true }}});
	} }); 
}



function show_recipient_heroes(id,com,com_s,plans,mob)
{	
	var winWidth=jQuery(document).width();
	jQuery(window).resize(function(){winWidth=jQuery(document).width();}); 
	jQuery('.show_block_content_hide_comp').removeClass('active');
	jQuery('.show_block_content_hide_comp_s').removeClass('active');	
	jQuery('.show_block_content_hide_plans').removeClass('active');
	jQuery('.show_block_content_hide_mob').removeClass('active');		
	var now=jQuery('#show_recipient'+id); 
	if (!now.hasClass('activeborder'))
	{
	jQuery('.recipient-item_block').removeClass('activeborder');
	jQuery.ajax({url: ajax_web_url, type: 'post',  data:'action=show_honorees_content&id='+id ,  success: function(data){ 
	now.addClass('activeborder');
	if (winWidth>991)
	{
		jQuery('#show_block_content_hide_comp'+com).html(data);
		jQuery('#show_block_content_hide_comp'+com).addClass('active');	
	}
	else
	{
		if (winWidth>787)
		{  
			jQuery('#show_block_content_hide_comp_s'+com_s).html(data);
			jQuery('#show_block_content_hide_comp_s'+com_s).addClass('active');
		}
		else if (winWidth>480)
		{  
			jQuery('#show_block_content_hide_plans'+plans).html(data);
			jQuery('#show_block_content_hide_plans'+plans).addClass('active');
		} else
		{		 			
			jQuery('#show_block_content_hide_mob'+mob).html(data);
			jQuery('#show_block_content_hide_mob'+mob).addClass('active');			
		}
	}	
	} }); 
	} else { now.removeClass('activeborder'); }
}