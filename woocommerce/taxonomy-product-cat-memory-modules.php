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
<header class="woocommerce-products-header memory-module-banner">
	<div class="container">
		<div class="woocommerce-banner-main" style="background-image: url(<?php echo $general_banner['url']; ?>);">
			<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
				<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
                <div class="banner-subtext"><?php echo get_field('memory_module_banner_text','option'); ?></div>
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

<section class="find-memory-upgrade-main">
    <div class="container">
        <div class="fm-header">
            <?php echo get_field('memory_module_page_content','option'); ?>
        </div>

        <div class="attr-filter-main">
            <div class="attr-filter-block product-cat">
                <h5>DIMM TYPE</h5>
                <ul>
                <?php   
                    if ( is_product_category() ) {
                        $term_id  = get_queried_object_id();
                        $taxonomy = 'product_cat';
                        $terms    = get_terms([
                            'taxonomy'    => $taxonomy,
                            'hide_empty'  => true,
                            'parent'      => get_queried_object_id(),
                        ]);
                        foreach ( $terms as $term ) {
                        ?>
                            <li>
                                <input type="checkbox" id="<?php echo $term->name ?>" name="vehicle1" value="<?php echo $term->slug; ?>">
                                <label for="<?php echo $term->name ?>"><?php echo $term->name ?></label>
                            </li>
                        <?php
                        }
                    }
                ?>
                </ul>
            </div>
            
            <div class="attr-filter-block cap-memory">
                <h5>Memory Speed</h5>
                <ul>
                    <?php 
                    $scatTerms = get_terms('pa_memory-speed', array('hide_empty' => true, 'parent' =>0)); 
                    usort( $scatTerms, function($a, $b) {
                        $ai = filter_var($a->name, FILTER_SANITIZE_NUMBER_INT);
                        $bi = filter_var($b->name, FILTER_SANITIZE_NUMBER_INT);
                        if ($ai == $bi) {
                            return 0;
                        }
                        return ($ai > $bi) ? -1 : 1;
                    });
                    foreach($scatTerms as $wcatTerm){ 
                        ?>
                        <li>
                            <input type="checkbox" id="<?php echo $wcatTerm->name; ?>" name="vehicle1" value="<?php echo $wcatTerm->slug; ?>">
                            <label for="<?php echo $wcatTerm->name; ?>"><?php echo $wcatTerm->name; ?></label>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>

            <div class="attr-filter-block cap-attr">
                <h5>Capacity</h5>
                <ul>
                    <?php
					$allowed_capacities = array('08gb', '16gb', '32gb', '64gb', '128gb', '256gb');
				
                    $wcatTerms = get_terms('pa_capacity', array( 
						'hide_empty' => true, 
						'parent' => 0,
						'slug' => $allowed_capacities,
					));
					
					//var_dump($wcatTerms);
					
                    usort( $wcatTerms, function($a, $b) {
                        $ai = filter_var($a->slug, FILTER_SANITIZE_NUMBER_INT);
                        $bi = filter_var($b->slug, FILTER_SANITIZE_NUMBER_INT);
                        if ($ai == $bi) {
                            return 0;
                        }
                        return ($ai > $bi) ? -1 : 1;
                    });
                    
                    foreach($wcatTerms as $wcatTerm){ 
                        //print_r($wcatTerm);

                        //echo $wcatTerm->term_id;
                        ?>

                        <li>
                            <input type="checkbox" id="<?php echo $wcatTerm->name; ?>" name="vehicle1" value="<?php echo $wcatTerm->slug; ?>">
                            <label for="<?php echo $wcatTerm->name; ?>"><?php echo $wcatTerm->name; ?></label>
                        </li>				
                        <?php
                    }
                    ?>
                </ul>
            </div>

            <div class="attr-filter-block cap-voltage">
                <h5>Voltage</h5>
                <ul>
                    <?php 
                    $wcatTerms = get_terms('pa_voltage', array('hide_empty' => true, 'parent' =>0)); 
                    foreach($wcatTerms as $wcatTerm){ 
                        ?>
                        <li>
                            <input type="checkbox" id="<?php echo str_replace(".","",$wcatTerm->name); ?>" name="vehicle1" value="<?php echo $wcatTerm->slug; ?>">
                            <label for="<?php echo $wcatTerm->name; ?>"><?php echo $wcatTerm->name; ?></label>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="attr-filter-block tax-brand">
                <h5>Made By</h5>
                <ul>
                    <?php 
                        $brands = get_terms( 'brand', array( 'orderby'  => 'name', 'hide_empty' => 0, 'parent' =>0 ) );
                        //print_r($brands);
                        foreach ( $brands as $key => $brand ) :
                        ?>
                            <li>
                                <input type="checkbox" id="<?php echo $brand->name; ?>" name="vehicle1" value="<?php echo $brand->slug; ?>">
                                <label for="<?php echo $brand->name; ?>"><?php echo $brand->name; ?></label>
                            </li>
                        <?php
                        endforeach;
                    ?>
                </ul>
            </div>
        </div>

    </div>
</section>


<section class="amp-product-list">
    <div class="container">
        <div class="amp-product-table">
            <table>

                <tr>
                    <th class="amp-thumb">Brand</th>
                    <th class="part-number">Part Number</th>
                    <th>Voltage</th>
                    <th>Capacity</th>
                    <th>Speed</th>
                    <th>Form Factor</th>
                    <th>Price</th>
                    <th>Product Selection</th>
                </tr>

            <?php $query = new WP_Query( array(
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
            global $post;
            $product = new WC_Product( $post->ID );

            ?>

                <tr>
                    <td class="amp-thumb"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" /></td>
                    <td class="amp-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
                    <td>
                        <?php 
                            $voltage = wp_get_post_terms(get_the_ID(),'pa_voltage');
                                foreach($voltage as $vol){
	                                echo $vol->name;
                            } 
                        ?>
                    </td>
                    <td> 
                        <?php 
                            $capacity = get_the_terms( $product->id, 'pa_capacity');
                            foreach ( $capacity as $cap ) {
                               echo $cap->name;
                            }
                        ?>
                    </td>
                    <td>
                    <?php 
                            $pmemroy = get_the_terms( $product->id, 'pa_memory-speed');
                            foreach ( $pmemroy as $speedp ) {
                               echo $speedp->name;
                            }
                        ?>
                    </td>
                    <td>
                    <?php $term_obj_list = get_the_terms( $post->ID, 'product_cat' ); 
					
                    foreach($term_obj_list as $catname){
						if ( $catname->parent != 0 ) {
                            echo $catname->name;
                        }
					}
                    ?>
                    </td>
                    <?php $prodprice = $product->get_price_html(); ?>
					<?php if($product->get_price() == '0'){ ?>
						  <td><?php echo '$ ?'; ?></td>				
					<?php } else { ?>
						  <td> <?php echo $prodprice;?></td>
					<?php } ?>
					
					
					
					
						  <td class="spl-btn-for-price"> <?php echo do_shortcode( '[add_to_cart id=' . $post->ID . ']' ) ?></td>
	
					
					
					
					
					
                    	
                </tr>

            <?php
            endwhile;

            wp_reset_postdata();
            ?>
            </table>
        </div>
    </div>
    <div class="loader-1"> </div>

</section>

<?php
get_footer( 'shop' );

 