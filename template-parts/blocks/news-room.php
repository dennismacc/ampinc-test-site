<?php
    $title = get_field('title');
?>
<section class="news-room-section">
    <div class="container">
        <?php if($title) { ?>
           <h2 class="sec-ttl white-color center-line"><?php echo $title; ?></h2>
        <?php } ?>
        <div class="featured-news">
        <?php
            
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 3,
                'order' => 'DESC',
                'orderby' => 'date',
            );
            $loop = new WP_Query( $args );
                
            while ( $loop->have_posts() ) { $loop->the_post(); ?>   
                <div class="featured-single-news">
                            <?php if ( has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                    <div class="featured-news-image">									
                                        <?php the_post_thumbnail('thumb-square-m'); ?>				
                                    </div>
                                </a>
                            <?php endif; ?>
                            <div class="featured-news-details">
                                <div class="news-title">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                        <h4 class="featured-news-title"><?php the_title(); ?></h4>
                                    </a>
                                </div>
                                <div class="news-desciption">
                                    <p><?php echo wp_trim_words(get_the_content(), 25,''); ?></p>
                                </div>
                                <div class="read-more-link">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">read more</a>
                                </div>
                            </div>
                        </div>
                
            <?php } ?>
        <?php wp_reset_postdata(); ?>

           
        </div>  
    </div>    
</section>