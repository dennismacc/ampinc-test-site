<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ampinc
 */

?>

<?php 
$footer_logo = get_field('footer_logo','option');
$footer_address = get_field('footer_address','option');
$footer_contact_link = get_field('footer_contact_link','option');
$footer_mail_link = get_field('footer_mail_link','option');

$form_shortcode = get_field('signup_form_shortcode','option');

?>
<section class="footer-signup-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-4 mr-auto">
				<?php if($footer_logo) : ?>
				<div class="footer-logo-size">
					<img src="<?php echo $footer_logo['url']; ?>" alt="">
				</div>
				<?php endif; ?>

				<?php if($footer_address) : ?>
				<p class="footer-address"><?php echo $footer_address; ?></p>
				<?php endif; ?>
				<?php if($footer_contact_link) : ?>
				<a class="footer-contact" href="<?php echo $footer_contact_link['url']; ?>"><i class="fa fa-phone" aria-hidden="true"></i> <?php echo $footer_contact_link['title']; ?></a><br/>
				<?php endif; ?>
				<?php if($footer_mail_link) : ?>
				<a class="footer-mail" href="<?php echo $footer_mail_link['url']; ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo $footer_mail_link['title']; ?></a>
				<?php endif; ?>
			</div>
			<div class="col-lg-4 col-md-5">
				<div class="footer-signup-main">
					<?php if($form_shortcode) :  echo do_shortcode($form_shortcode); endif; ?>
					<?php 
					$social_links = get_field('social_links','option'); 
					if($social_links) : 
					?>
					<ul class="social-links">
						<?php foreach($social_links as $sl): ?>
						<?php if($sl['link']): ?>
						<li><a href="<?php echo $sl['link']; ?>" target="_blank"><?php echo $sl['font_awesome_icon_code']; ?></a></li>
						<?php endif; ?>
						<?php endforeach; ?>
					</ul>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<footer id="colophon" class="site-footer">
	<div class="container">
		<?php if ( is_active_sidebar( 'footer-1' ) ) { ?>
		<div class="footer-widget">
			<?php dynamic_sidebar('footer-1'); ?>
		</div>
		<?php } ?>
		<?php if ( is_active_sidebar( 'footer-2' ) ) { ?>
		<div class="footer-widget">
			<?php dynamic_sidebar('footer-2'); ?>
		</div>
		<?php } ?>
		<?php if ( is_active_sidebar( 'footer-3' ) ) { ?>
		<div class="footer-widget">
			<?php dynamic_sidebar('footer-3'); ?>
		</div>
		<?php } ?>
		<?php if ( is_active_sidebar( 'footer-4' ) ) { ?>
		<div class="footer-widget">
			<?php dynamic_sidebar('footer-4'); ?>
		</div>
		<?php } ?>
		<?php if ( is_active_sidebar( 'footer-5' ) ) { ?>
		<div class="footer-widget">
			<?php dynamic_sidebar('footer-5'); ?>
		</div>
		<?php } ?>
		<?php if ( is_active_sidebar( 'footer-6' ) ) { ?>
		<div class="footer-widget">
			<?php dynamic_sidebar('footer-6'); ?>
		</div>
		<?php } ?>
	</div>
</footer><!-- #colophon -->

<?php if(get_field('copyright_text','option')) : ?>
<div class="footer-copyright-text text-center">
	<div class="container">
		<?php 
		$copyright = get_field('copyright_text', 'option'); 
		$year = date("Y"); 
		$dynamic_year  = str_replace("{year}", $year, $copyright); 
		echo $dynamic_year; 
		?>
	</div>
</div>
<?php endif; ?>

</div><!-- #page -->

<?php wp_footer(); ?>
<!--<script src="//code.tidio.co/axcnpgbsukqvcoyu9jkcswdkhpiuxsqe.js" async></script>-->
<script type="text/javascript">
	jQuery(document).on("change",'.cap-memory ul li input[name="vehicle1"]',function(e){	
		hidevoltages();
	});
	function hidevoltages(){
		var arr = [];
		let ddr5 = 0;
			let ddr4 = 0;
			let ddr3 = 0;
		jQuery('.cap-memory ul li input[name="vehicle1"]:checked').each(function() {
			var str2 = "ddr5";
	        var str3 = "ddr4";
	        var str4 = "ddr3";
			arr.push( this.value );
			
				for (var i = 0; i < arr.length; i++) {
					var str1 = arr[i];
					
					if(str1.indexOf(str2) != -1){
						ddr5++;
					}
					if(str1.indexOf(str3) != -1){
						ddr4++;
					}
					if(str1.indexOf(str4) != -1){
						ddr3++;
					}
				}
			if(ddr5 == 1 && arr.length == 1){
				jQuery("#12V").parent('li').hide();
			}else{
				jQuery("#12V").parent('li').show();
			}
			if(ddr4 >= 1 && ddr5 == 0 && ddr3 == 0){
				jQuery("#11V").parent('li').hide();
			}else{
				jQuery("#11V").parent('li').show();
			}
			if((ddr5 == 0 && ddr4 == 0)){
				jQuery("#11V").parent('li').show();
				jQuery("#12V").parent('li').show();
			}
			});
		console.log(arr); 
		if( arr.length === 0){
		jQuery("#11V").parent('li').show();
				jQuery("#12V").parent('li').show();
		}
	}
</script>


<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/64ada5b5cc26a871b027cb3a/1h534uj89';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->


</body>
</html>
