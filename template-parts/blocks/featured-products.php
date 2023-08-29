<?php
    $featured_product = get_field('select_products');
    $section_title = get_field('section_title');
    //print_r($featured_product);
    if($featured_product):
?>
<section class="amp-featured-product">
    <div class="container">
        <?php if($section_title) : ?>
        <h2><?php echo $section_title; ?></h2>
        <?php endif; ?>
        <div class="amp-featured-slider">
        <?php 
            foreach($featured_product as $pro) : 
            $product_id = $pro->ID;
            $product = wc_get_product($product_id);
            $thumbnail_url = get_the_post_thumbnail_url( $product_id , 'thumbnail' );
        ?>
            <div class="amp-feature-slide ff">
                <div class="amp-img">
                    <a href="<?php echo get_permalink( $product_id ); ?>">
                        <img src="<?php echo $thumbnail_url; ?>" class="common-image no-lazy" alt="" />
                    </a>
                </div>
                <h4><a href="<?php echo get_permalink( $product_id ); ?>"><?php echo get_the_title($product_id); ?></a></h4>
                <div class="af-price"><?php echo $product->get_price_html(); ?></div>
                <div class="af-status"><?php echo $product->get_stock_status(); ?></div>
                <?php echo do_shortcode( '[add_to_cart id=' . $product_id . ']' ) ?>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>