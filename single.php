<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ampinc
 */

get_header();
?>

	<?php 
		if ( has_post_thumbnail()) {
			$background_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
			$background_image = $background_image[0];
		} else {
			$background_image = get_field('background_image','option');
		}
	?>
	<div class="blog-banner-section"  style="background-image: url('<?php echo $background_image; ?>');">
		<div class="container">
			<h2 class="text-center white-color center-line"><?php the_title(); ?></h2>
		</div>
	</div>

	<main id="primary" class="site-main blogs-page">

		<div class="single-container">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-lg-8">
						<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', get_post_type() );

						endwhile; // End of the loop.
						?>
					</div>
					<div class="col-md-5 col-lg-4">
						<?php if ( is_active_sidebar( 'sidebar' ) ) { ?>
							<div class="recent-posts-sidebar">
								<?php dynamic_sidebar('sidebar'); ?>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>

	</main><!-- #main -->

<?php
get_footer();
