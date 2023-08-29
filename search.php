<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package ampinc
 */

get_header();

$background_image = get_field('background_image','option');

?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<div class="blog-banner-section"  style="background-image: url('<?php echo $background_image; ?>');">
				<div class="container">
					<h2 class="text-center white-color center-line">
						<?php
							printf( esc_html__( 'Search Results for: %s', 'ampinc' ), '<span>' . get_search_query() . '</span>' );
						?>
					</h2>
				</div>
			</div>

			<div class="search-container">
				<div class="container">
				<?php
					while ( have_posts() ) : the_post();
				?>
					<div class="search-item-box">
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<?php the_excerpt(); ?>
						<a href="<?php the_permalink(); ?>" class="btn">Read More</a>
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

	</main><!-- #main -->

<?php
get_footer();
