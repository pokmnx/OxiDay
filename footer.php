<section class="section radial-gradient-black news-letter">
<div class="container">
<div class="row">
<div class="col-xl-11 offset-xl-1">
<h3 class="white-color montserrat-font font-weight-600">Receive News Alerts</h3>
<div class="news-letter-form-wrap d-flex">
<h5 class="montserrat-font font-weight-300 white-color">Get notified <br/> about news and events</h5>
<div class="col p-0 d-lg-flex justify-content-end">
<div class="news-letter-form d-inline-flex">
<?php print do_shortcode('[mc4wp_form id="1489"]'); ?>

</div>
</div>
</div>
</div>
</div>
</div>
</section>


<footer class="footer">
<div class="container">
<div class="row rows">
<div class="col-lg-8 columns">
<div class="d-md-flex footer-links-wrap">

<div class="col p-0"><div class="footer-block"><?php dynamic_sidebar( 'footer_first' ); ?></div></div>
<div class="col p-0"><div class="footer-block"><?php dynamic_sidebar( 'footer_second' ); ?></div></div>
<div class=""><div class="footer-block"><?php dynamic_sidebar( 'footer_third' ); ?><?php dynamic_sidebar( 'footer_third_social' ); ?></div></div>

</div>
</div>

<div class="col-lg-4 columns d-md-flex">
<div class="col footer-right-block">
<div class="montserrat-font font-weight-600 footer-bold-text"><?php dynamic_sidebar( 'footer_fourth' ); ?></div>
<div class="copyright">
<span class="d-block font-weight-600 montserrat-font">&copy;<?php print date('Y');?> <?php dynamic_sidebar( 'footer_fourth_copyright' ); ?></span>
<div class="montserrat-font footer_fourth_adress"><?php dynamic_sidebar( 'footer_fourth_adress' ); ?></div>
</div>
</div>
</div>

</div>
</div>
</footer><!--//End Footer-->
  <script>
	var ajax_web_url = '<?php echo admin_url('admin-ajax.php', 'relative') ?>';
	
</script>
<div id="fancy-bg"></div>
<?php 
wp_footer(); 
?> 
</body>
</html>



 