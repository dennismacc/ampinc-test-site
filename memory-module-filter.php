<?php 

function search_by_attributes() {

	$product_cat = $_POST['categoryid'];
    $product_capacity = $_POST['capacity'];
    $voltage = $_POST['voltage'];
    $pbrand = $_POST['brand'];
	$pmemory = $_POST['memory'];


	$args = array(
		'post_type' => 'product',
		'posts_per_page' => -1,
		'post_status' => 'publish',
		'tax_query'      => array( 
			array(
				'taxonomy'   => 'product_cat',
				'field'      => 'slug',
				'terms'      => array('memory-modules'),
				) 
			),	
		);	

		if(isset($product_cat) && !empty($product_cat)){
		$args['tax_query'][] =array(
				'relation' => 'AND',
					array(
						'taxonomy'  => 'product_cat',
						'field'     => 'slug',
						'terms'     => array_values($product_cat),
					)
				);
		}
		if(isset($product_capacity) && !empty($product_capacity)){
			$args['tax_query'][] =array(
					'relation' => 'AND',
						array(
							'taxonomy'  => 'pa_capacity',
							'field'     => 'slug',
							'terms'     => array_values($product_capacity),
						)
					);
			}

		if(isset($voltage) && !empty($voltage)){
			$args['tax_query'][] =array(
					'relation' => 'AND',
						array(
							'taxonomy'  => 'pa_voltage',
							'field'     => 'slug',
							'terms'     => array_values($voltage),
						)
					);
			}

		if(isset($pbrand) && !empty($pbrand)){
			$args['tax_query'][] =array(
					'relation' => 'AND',
						array(
							'taxonomy'  => 'brand',
							'field'     => 'slug',
							'terms'     => array_values($pbrand),
						)
					);
		}
		if(isset($pmemory) && !empty($pmemory)){
			$args['tax_query'][] =array(
					'relation' => 'AND',
						array(
							'taxonomy'  => 'pa_memory-speed',
							'field'     => 'slug',
							'terms'     => array_values($pmemory),
						)
					);
			}
		
		
    
	$productscat = new WP_Query( $args );
    $product = new WC_Product( $post->ID );

 		while ( $productscat->have_posts() ) : $productscat->the_post();
		global $post;
            $product = new WC_Product( $post->ID );
		?>
			<tr id="<?php echo $productscat->id; ?>">
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
					$capacity = get_the_terms( get_the_ID(), 'pa_capacity');
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
						  <td class="1"><?php echo 'Request a Quote'; ?></td>				
					<?php } else { ?>
						  <td class="2"> <?php echo $prodprice;?></td>
					<?php } ?>
				<td class="spl-btn-for-price"> <?php echo do_shortcode( '[add_to_cart id=' . $post->ID . ']' ) ?></td>
			</tr>
			
		<?php 
		endwhile;
		wp_reset_postdata(); 
		
		exit;
}