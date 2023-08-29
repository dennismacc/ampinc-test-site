<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ampinc
 */

$background_image = get_field('background_image','option');

?>

<section class="no-results not-found grey-bg">

	<div class="blog-banner-section"  style="background-image: url('<?php echo $background_image; ?>');">
		<div class="container">
			<h2 class="text-center white-color center-line"><?php esc_html_e( 'Nothing Found', 'ampinc' ); ?></h2>
		</div>
	</div>

	<div class="page-content text-center pad-50">
		<div class="container">
			<?php
			if ( is_home() && current_user_can( 'publish_posts' ) ) :

				printf(
					'<p>' . wp_kses(
						/* translators: 1: link to WP admin new post page. */
						__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'ampinc' ),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					) . '</p>',
					esc_url( admin_url( 'post-new.php' ) )
				);

			elseif ( is_search() ) :
				?>

				<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ampinc' ); ?></p>
				<a href="<?php echo home_url('/'); ?>" class="btn"><?php esc_html_e( 'Back To Home', 'ampinc' ); ?></a>
				<?php
				//get_search_form();

			else :
				?>

				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ampinc' ); ?></p>
				<a href="<?php echo home_url('/'); ?>" class="btn"><?php esc_html_e( 'Back To Home', 'ampinc' ); ?></a>
				<?php
				//get_search_form();

			endif;
			?>
		</div>
	</div><!-- .page-content -->
</section><!-- .no-results -->
