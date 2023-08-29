<?php
/**
 * ampinc functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ampinc
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ampinc_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on ampinc, use a find and replace
		* to change 'ampinc' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'ampinc', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'ampinc' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'ampinc_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'ampinc_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ampinc_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ampinc_content_width', 640 );
}
add_action( 'after_setup_theme', 'ampinc_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ampinc_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ampinc' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ampinc' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
/**
 * Enqueue scripts and styles.
 */
function ampinc_scripts() {
	wp_enqueue_style('ampinc-slick', get_template_directory_uri() . '/css/slick.css', array(), time());
	wp_enqueue_style('ampinc-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), time());
	wp_enqueue_style('ampinc-bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), time());
	wp_enqueue_style('ampinc-custom', get_template_directory_uri() . '/css/custom.css', array(), time());
	wp_enqueue_style( 'ampinc-style', get_stylesheet_uri(), array(), time() );
	wp_enqueue_style('ampinc-response', get_template_directory_uri() . '/css/resposnive.css', array(), time());
	wp_style_add_data( 'ampinc-style', 'rtl', 'replace' );

	wp_enqueue_script('jquery');
	wp_enqueue_script('ampinc-slick-js', get_template_directory_uri() . '/js/slick.js', array(), time(), true);
	wp_enqueue_script('ampinc-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array(), time(), true);
	wp_enqueue_script('ampinc-custom', get_template_directory_uri() . '/js/script.js', array(), time(), true);
	wp_localize_script( 'ampinc-custom', 'amp_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ampinc_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/*Theme Settings*/

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header General settings',
		'menu_title'	=> 'Header Settings',
		'parent_slug'	=> 'theme-general-settings',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer General settings',
		'menu_title'	=> 'Footer Settings',
		'parent_slug'	=> 'theme-general-settings',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Blog General settings',
		'menu_title'	=> 'Blog Settings',
		'parent_slug'	=> 'theme-general-settings',
		'redirect'		=> false
	));
}


/* ACF BLOCKS */
add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        acf_register_block_type(array(
            'name'              => 'explore-products',
            'title'             => __('Explore Products Taxonomy'),
            'description'       => __('A custom Explore Products block.'),
            'render_template'   => 'template-parts/blocks/explore-products-tax.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'explore-products', 'exloreproduct' ),
        ));	

		acf_register_block_type(array(
            'name'              => 'explore-products-2',
            'title'             => __('Explore Products'),
            'description'       => __('A custom Explore Products block.'),
            'render_template'   => 'template-parts/blocks/explore-products.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'explore-product', 'product' ),
        ));	

        // Register a Hero Banner block.
        acf_register_block_type(array(
            'name'              => 'hero-banner',
            'title'             => __('Hero Banner'),
            'description'       => __('A hero banner block.'),
            'render_template'   => 'template-parts/blocks/hero-banner.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'hero-banner', 'Banner' ),
        ));

		acf_register_block_type(array(
            'name'              => 'two-column-block-content',
            'title'             => __('Two Column Block Content'),
            'description'       => __('A Two Column Block Content'),
            'render_template'   => 'template-parts/blocks/two-column-content-block.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'two-column-block-content', 'Column' ),
        ));

		acf_register_block_type(array(
            'name'              => 'explore-products-three-sections',
            'title'             => __('Explore Products Three Sections'),
            'description'       => __('A custom Explore three sections block.'),
            'render_template'   => 'template-parts/blocks/explore-three-sections.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'three-sections', 'proudctthreesections' ),
        ));	

		acf_register_block_type(array(
            'name'              => 'full-width-content',
            'title'             => __('Full Width Content Block'),
            'description'       => __('A Full Width Content block.'),
            'render_template'   => 'template-parts/blocks/full-width-content.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'full-width-content', 'content' ),
        ));	

		acf_register_block_type(array(
            'name'              => 'news-room-section',
            'title'             => __('News Room Section'),
            'description'       => __('A News Room Section block.'),
            'render_template'   => 'template-parts/blocks/news-room.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'news-room-section', 'News' ),
        ));	

		acf_register_block_type(array(
            'name'              => 'content-with-images',
            'title'             => __('Content With Images'),
            'description'       => __('A Content With Images block.'),
            'render_template'   => 'template-parts/blocks/content-with-images.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'content-with-images', 'contentwithimages' ),
        ));	

		acf_register_block_type(array(
            'name'              => 'two-column-details',
            'title'             => __('Two Column Details'),
            'description'       => __('A Two Column Details block.'),
            'render_template'   => 'template-parts/blocks/two-column-details.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'two-column-details', 'twocolumndetails' ),
        ));	

		acf_register_block_type(array(
            'name'              => 'normal-text-banner',
            'title'             => __('Normal Text Banner'),
            'description'       => __('A Normal Text Banner block.'),
            'render_template'   => 'template-parts/blocks/normal-text-banner.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'normal-text-banner', 'normaltextbanner' ),
        ));	

		acf_register_block_type(array(
            'name'              => 'form-with-background',
            'title'             => __('Form With Background'),
            'description'       => __('A Form With Background block.'),
            'render_template'   => 'template-parts/blocks/form-with-background.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'form-with-background', 'formwithbackground' ),
        ));	

		acf_register_block_type(array(
            'name'              => 'logo-with-contact',
            'title'             => __('Logo With Contact'),
            'description'       => __('A Logo With Contact block.'),
            'render_template'   => 'template-parts/blocks/logo-with-contact.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'logo-with-contact', 'logowithcontact' ),
        ));	

		acf_register_block_type(array(
            'name'              => 'map-location',
            'title'             => __('Map Location'),
            'description'       => __('A Map Location block.'),
            'render_template'   => 'template-parts/blocks/map-location.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'map-location', 'maplocation' ),
        ));	
		
		acf_register_block_type(array(
            'name'              => 'page-banner-section',
            'title'             => __('Page Banner Block'),
            'description'       => __('Page Banner Block'),
            'render_template'   => 'template-parts/blocks/page-banner-block.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'Page Banner Block', 'Banner' ),
        ));
		acf_register_block_type(array(
            'name'              => 'normal-content',
            'title'             => __('Normal Content'),
            'description'       => __('Normal Content'),
            'render_template'   => 'template-parts/blocks/normal-content.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'Normal Content', 'Content' ),
        ));
        acf_register_block_type(array(
            'name'              => 'boxed-width-content',
            'title'             => __('Boxed Width Content'),
            'description'       => __('Boxed Width Content'),
            'render_template'   => 'template-parts/blocks/boxed-width-content.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'Boxed Width Content', 'Content' ),
        ));
        acf_register_block_type(array(
            'name'              => 'features-section',
            'title'             => __('Features Section'),
            'description'       => __('Features Section'),
            'render_template'   => 'template-parts/blocks/features-section.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'Features Section', 'Features' ),
        ));
        acf_register_block_type(array(
            'name'              => 'two-column-text-content',
            'title'             => __('Two Column Text Content'),
            'description'       => __('Two Column Text Content'),
            'render_template'   => 'template-parts/blocks/two-column-text-content.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'Two Column Text Content', 'Two Column' ),
        ));
        acf_register_block_type(array(
            'name'              => 'featured-products',
            'title'             => __('Featured Products'),
            'description'       => __('Featured Products'),
            'render_template'   => 'template-parts/blocks/featured-products.php',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'Featured Products', 'Product' ),
        ));

    }
}

add_theme_support( 'block-templates' );



function wpdocs_theme_slug_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Footer 1', 'textdomain' ),
        'id'            => 'footer-1',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h5 class="widgettitle">',
        'after_title'   => '</h5>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Footer 2', 'textdomain' ),
        'id'            => 'footer-2',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h5 class="widgettitle">',
        'after_title'   => '</h5>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Footer 3', 'textdomain' ),
        'id'            => 'footer-3',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h5 class="widgettitle">',
        'after_title'   => '</h5>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Footer 4', 'textdomain' ),
        'id'            => 'footer-4',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h5 class="widgettitle">',
        'after_title'   => '</h5>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Footer 5', 'textdomain' ),
        'id'            => 'footer-5',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h5 class="widgettitle">',
        'after_title'   => '</h5>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Footer 6', 'textdomain' ),
        'id'            => 'footer-6',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h5 class="widgettitle">',
        'after_title'   => '</h5>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Sidebar', 'textdomain' ),
        'id'            => 'sidebar',	
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="widgettitle">',
        'after_title'   => '</h5>',
    ) );
}
add_action( 'widgets_init', 'wpdocs_theme_slug_widgets_init' );



// Numbered Pagination
if ( !function_exists( 'wpex_pagination' ) ) {
	
	function wpex_pagination() {
		
		$prev_arrow = is_rtl() ? '→' : '←';
		$next_arrow = is_rtl() ? '←' : '→';
		
		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if( $total > 1 )  {
			 if( !$current_page = get_query_var('paged') )
				 $current_page = 1;
			 if( get_option('permalink_structure') ) {
				 $format = 'page/%#%/';
			 } else {
				 $format = '&paged=%#%';
			 }
			echo paginate_links(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'prev_text'		=> $prev_arrow,
				'next_text'		=> $next_arrow,
			 ) );
		}
	}
	
}

// Remove Archive Title
add_filter( 'get_the_archive_title', function ($title) {
	if ( is_category() ) {
	  $title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
	  $title = single_tag_title( '', false );
	} elseif ( is_author() ) {
	  $title = '<span class="vcard">' . get_the_author() . '</span>' ;
	} elseif ( is_tax() ) { //for custom post types
	  $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
	} elseif (is_post_type_archive()) {
	  $title = post_type_archive_title( '', false );
	}
	return $title;
});

function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );


function filter_woocommerce_post_class( $classes, $product ) {
    // is_product() - Returns true on a single product page
    // NOT single product page, so return
    if ( ! is_product() ) return $classes;
    
    // Add new class
    $classes[] = 'container';
    
    return $classes;
}
//add_filter( 'woocommerce_post_class', 'filter_woocommerce_post_class', 10, 2 );

add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );


// Remove links from thumbnails
add_action( 'init', function() {

	// Woo core hooks
	remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

	// Theme hooks
	remove_action( 'wpex_woocommerce_loop_thumbnail_before', 'woocommerce_template_loop_product_link_open', 0 );
	remove_action( 'wpex_woocommerce_loop_thumbnail_after', 'woocommerce_template_loop_product_link_close', 11 );

} );

// Custom heading output
if ( ! function_exists( 'woocommerce_template_loop_product_title' ) ) {
	function woocommerce_template_loop_product_title() {
		echo '<a href="'.get_the_permalink().'"><h2 class="woocommerce-loop-product__title">' . get_the_title() . '</h2></a>';
	}
}

remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);


add_filter( 'woocommerce_loop_add_to_cart_link', 'quantity_inputs_for_woocommerce_loop_add_to_cart_link', 10, 2 );
/**
 * Override loop template and show quantities next to add to cart buttons
 * @link https://gist.github.com/mikejolley/2793710
 */
function quantity_inputs_for_woocommerce_loop_add_to_cart_link( $html, $product ) {
    if ( is_shop() && $product && $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually() || is_tax() && $product && $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually()  ) {
        $html = '<form action="' . esc_url( $product->add_to_cart_url() ) . '" class="cart" method="post" enctype="multipart/form-data">';
        $html .= woocommerce_quantity_input( array(), $product, false );
        $html .= '<button type="submit" class="button alt">' . esc_html( $product->add_to_cart_text() ) . '</button>';
        $html .= '</form>';
    }
    return $html;
}

/*  Change Description Position For Single Page */
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 32 );

/**
 * Exclude products from a particular category on the shop page
 */
function custom_pre_get_posts_query( $q ) {

    $tax_query = (array) $q->get( 'tax_query' );

    $tax_query[] = array(
           'taxonomy' => 'product_cat',
           'field' => 'slug',
           'terms' => array( 'rdimm-amp','sodimm','udimm','lrdimm','memory-modules' ), 
           'operator' => 'NOT IN'
    );


    $q->set( 'tax_query', $tax_query );

}
//add_action( 'woocommerce_product_query', 'custom_pre_get_posts_query' );  


add_action( 'wp_ajax_nopriv_search_by_attributes', 'search_by_attributes' );
add_action( 'wp_ajax_search_by_attributes', 'search_by_attributes' );

include('memory-module-filter.php');


//* Add stock status to archive pages
function envy_stock_catalog() {
    global $product;
    if ( $product->is_in_stock() ) {
        echo '<div class="stock" >' . $product->get_stock_quantity() . __( ' in stock', 'envy' ) . '</div>';
    } else {
        echo '<div class="out-of-stock" >' . __( 'out of stock', 'envy' ) . '</div>';
    }
}
add_action( 'woocommerce_after_shop_loop_item_title', 'envy_stock_catalog' );


add_filter( 'woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_count');
function wc_refresh_mini_cart_count($fragments){
    ob_start();
    $items_count = WC()->cart->get_cart_contents_count();
    ?>
    <span class="cart-count"><?php echo $items_count ? $items_count : '0'; ?></span>
    <?php
        $fragments['.cart-count'] = ob_get_clean();
    return $fragments;
}



add_action( 'woocommerce_after_add_to_cart_button', 'mish_after_add_to_cart_btn' );

function mish_after_add_to_cart_btn(){
	?>
    <a href="<?php echo home_url('/contact-us/'); ?>" class="btn req-btn"><?php _e('Request a Spec','AMP'); ?></a>
    <?php
}
