<section class="explore-products">
    <div class="container-slider">
        
        <div class="explore">
            <?php if(get_field('explore_heading')): ?>
                <h2 class="sec-ttl text-center white-color center-line"><?php echo get_field('explore_heading'); ?></h2>
            <?php endif;?>
            <?php
            $product_cat = get_field('explore_products_categories'); ?>
                <div class="product-list-slider"> 
                <?php if($product_cat): 
                    foreach( $product_cat as $term ): ?>
                    <div class="product-taxonomies">
                        <?php $termurl = get_term( $term ); ?>
                        <a href="<?php echo get_term_link($termurl->term_id);?>">
                        <div class="explore-productsimg">
                            <?php $thumbnail_id = get_woocommerce_term_meta( $term, 'thumbnail_id', true );
                            $image = wp_get_attachment_url( $thumbnail_id ); ?>
                            <img src="<?php echo $image; ?>" alt="">
                        </div>
                        <div class="explore-product-title">
                            <?php $termname = get_term( $term ); ?>
                            <h2 class="text-center"><?php echo $termname->name;  ?></h2>
                        </div>
                        </a>
                    </div>
                <?php endforeach; endif; ?>
            </div>
        </div>
    </div>

</section>


