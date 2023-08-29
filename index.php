<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ampinc
 */

get_header();

$background_image = get_field('background_image','option');
$title = get_field('title','option');
$content = get_field('page_content','option');
?>

	<main id="primary" class="site-main blogs-page">
		<div class="blog-banner-section"  style="background-image: url('<?php echo $background_image; ?>');">
			<div class="container">
				<h2 class="text-center white-color center-line"><?php echo $title ?></h2>
			</div>
		</div>

		<?php if($content) : ?>
			<section class="blog-content">
				<div class="container">
					<?php echo $content; ?>
				</div>
			</section>
			<div class="container"><hr></div>
		<?php endif; ?>

		<div class="container">
		<div class="blogs-page-section">
			<div class="all-blogs-left">
				<div class="featured-news">
						<?php 
							if ( have_posts() ) :

								/* Start the Loop */
								while ( have_posts() ) :
									the_post();

								$pdf = get_field('pdf');
								$pdf_url = $pdf['url'];

								$link = $pdf_url ? $pdf_url : get_the_permalink();
								$link_target = $pdf ? '_blank' : '_self';

						?>
							<div class="featured-single-news">
								<?php if ( has_post_thumbnail()) : ?>

									<a href="<?php echo $link; ?>" target="<?php echo $link_target; ?>" title="<?php the_title_attribute(); ?>">
										<div class="featured-news-image">									
											<?php the_post_thumbnail('thumb-square-m'); ?>				
										</div>
									</a>

								<?php endif; ?>
								<div class="featured-news-details">
									<span class="feature-date"><?php the_time('F j, Y' ); ?></span>
									<div class="news-title">
										<a href="<?php echo $link; ?>" target="<?php echo $link_target; ?>" title="<?php the_title_attribute(); ?>">
											<h4 class="featured-news-title"><?php the_title(); ?></h4>
										</a>
									</div>
									<div class="news-desciption">
										<p><?php echo wp_trim_words(get_the_content(), 25,''); ?></p>
									</div>
									<div class="read-more-link">
										<a href="<?php echo $link; ?>" target="<?php echo $link_target; ?>" title="<?php the_title_attribute(); ?>">read more</a>
									</div>
								</div>
							</div>
							
						<?php
							endwhile;
							wpex_pagination(); 
							else :
							get_template_part( 'template-parts/content', 'none' );
							endif;
						?>
				</div>  
			</div>
			<div class="all-blogs-right">
				<?php if ( is_active_sidebar( 'sidebar' ) ) { ?>
					<div class="recent-posts-sidebar">
						<?php dynamic_sidebar('sidebar'); ?>
					</div>
				<?php } ?>
			</div>

		</div>
		</div>
		
		

	</main><!-- #main -->

<?php

get_footer();
