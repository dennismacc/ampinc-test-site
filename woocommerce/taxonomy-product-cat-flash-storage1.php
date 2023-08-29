<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product-cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     4.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

$general_banner = get_field('general_banner','option');

?>
<header class="woocommerce-products-header">
	<div class="container">
		<div class="woocommerce-banner-main" style="background-image: url(<?php echo $general_banner['url']; ?>);">
			<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
				<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
			<?php endif; ?>

			<?php
			/**
			 * Hook: woocommerce_archive_description.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action( 'woocommerce_archive_description' );
			?>
		</div>
	</div>
</header>

<div class="product-with-sidebar-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="product-sidebar">
                    <div class="product-widget">
                        <h4>Category</h4>
                        <?php
                            $term_id  = get_queried_object_id();
                            $taxonomy = 'product_cat';
                            $terms    = get_terms([
                                'taxonomy'    => $taxonomy,
                                'hide_empty'  => true,
                                'parent'      => get_queried_object_id(),
                            ]);
                            echo '<ul>';
                            foreach ( $terms as $term ) {
                            ?>
                                <?php echo $term->name ?>
                            <?php
                            }
                            echo '</ul>';
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <?php 
                    global $post;
                    $product = new WC_Product( $post->ID );

                    $query = new WP_Query( array(
                    'post_type'      => 'product',
                    'post_status'    => 'publish',
                    'posts_per_page' => -1,
                    'tax_query'      => array( array(
                        'taxonomy'   => 'product_cat',
                        'field'      => 'term_id',
                        'terms'      => array( get_queried_object()->term_id ),
                    ) )
                ) );

                while ( $query->have_posts() ) : $query->the_post();
                ?>
                    <div class="flash-product-box">
                        <div class="flash-thumb">
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" />
                        </div>
                        <div class="flasf-content">
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <?php if(get_field('capacity')) : ?>
                            <div class="storage-capacity">
                                <strong>Storage Capacity</strong> <?php the_field('capacity'); ?>
                            </div>
                            <?php endif; ?>
                            <?php echo $product->get_price_html(); ?>
                            
                        </div>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer( 'shop' );

 