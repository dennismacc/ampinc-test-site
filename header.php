<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ampinc
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <meta name="google-site-verification" content="0evVsygDzNJpZpfZy5xYCL-LextgFpflCDn9M94X9Rs" />
	<meta name="msvalidate.01" content="B93C99D727A42A524E6539A45B107490" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">

	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-WP57QTN');</script>
	<!-- End Google Tag Manager -->
	
	<script>
	    var llcookieless = false;
	    var formalyze = [];
	    formalyze.auto = true;
	    formalyze.callback = function(options) {};
	    (function() {
	        var a = document.createElement('script');
	        a.src = 'https://lltrck.com/scripts/lt-v3.js?llid=19428';
	        var s = document.getElementsByTagName('script')[0];
	        s.parentNode.insertBefore(a, s);
	    })();
</script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WP57QTN"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?php wp_body_open(); ?>
<div id="amp-page" class="amp-site">

<div class="fixed-header">
	<div class="top-bar">
		<div class="container">
			<ul>
				<?php 
					$header_links  = get_field('header_top_links','option');
					//print_r($header_links);
					foreach($header_links as $link) :
					
					$link_target = $link['link']['target'] ? $link['link']['target'] : '_self'; 
					$mobile_hide = $link['mobile_hide'];
				?>
					<li class="<?php if($mobile_hide == 1) { echo 'mobile-hide'; } ?>"><a href="<?php echo $link['link']['url']; ?>" target="<?php echo $link_target; ?>"><?php echo $link['link']['title']; ?></a></li>
				<?php endforeach; ?>
				<?php if ( is_user_logged_in()){ ?>
					<li class=""><a href="<?php echo home_url('/my-account'); ?>" target="_self">My Account</a></li>
				<?php }
				else { ?>
					<li class=""><a href="<?php echo home_url('/my-account'); ?>" target="_self">Log In</a></li>
					<li class=""><a href="<?php echo home_url('/my-account'); ?>" target="_self">Sign up</a></li>
				<?php } ?>
				<li><a href="<?php echo home_url('/cart'); ?>" class="cart-bag cart-header"><i class="fa fa-shopping-bag" aria-hidden="true"></i><span class="cart-count"></span></a></li>
			</ul>
		</div>
	</div>

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-sm-2">
					<div class="site-branding">
						<div class="header-logo">
							<?php if(get_field('header_logo','option')): ?>
							<a href="<?php echo site_url(); ?>"><img src="<?php echo get_field('header_logo','option')['url']; ?>" alt=""></a>
							<?php endif;?>
					</div>
					</div><!-- .site-branding -->
				</div>
				<div class="col-sm-10 d-flex">
					<div class="header-side-menu">
						<div id="main-menu-container">
							<div id="main-menu" class="header-menu">
								<nav id="main-navigation" class="site-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
									<a href="javascript:void;" id="mobile-nav-button">
										<img src="<?php echo get_template_directory_uri(); ?>/images/bar-icon.svg" alt="" />
									</a>
									<?php
										wp_nav_menu(array(
											'menu' => 'Main Menu',
											'container'       => 'div',
											'container_class' => 'main-nav',
										)
									);
									?>
									<div class="mobilemenu-overlay"></div>
								</nav><!-- #site-navigation -->
							</div><!-- #main-menu -->
						</div>
					</div>
					
					<form class="searchbox" action="<?php echo home_url('/'); ?>" method="get">
						<input type="search" placeholder="Search......" value="<?php echo  get_search_query(); ?>" name="s" class="searchbox-input" onkeyup="buttonUp();" required>
						<input type="submit" class="searchbox-submit" value="GO">
						<span class="searchbox-icon"><i class="fa fa-search" aria-hidden="true"></i></span>
						<span class="lp-search-close">X</span>
					</form>

				</div>
			</div>
		</div>
	</header><!-- #masthead -->
</div>
<?php 
	$btm_logo = get_field('bottom_logo','option');
	$office_time = get_field('office_time','option');
?>
<section class="bottom-header">
	<div class="container d-flex justify-content-between align-items-center">
		<?php if($btm_logo) : ?>
		<div class="ofc-logo">
			<img src="<?php echo $btm_logo['url']; ?>" alt="">
		</div>
		<?php endif; ?>
		<?php if($office_time) : ?>
 			<div class="ofc-text"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $office_time; ?></div>
		<?php endif; ?>
	</div>
</section>
