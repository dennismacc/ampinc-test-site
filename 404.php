<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ampinc
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
		<h1 class="page-title">4<span>0</span>4</h1>
			<div class="container">
			<header class="page-header">
				
				<h2 class="page-title-h2"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'ampinc' ); ?></h2>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'ampinc' ); ?></p>

					<div class="form-and-home-link">
						<?php
						get_search_form();
						?>
						<div class="site-btn-home">
							<a href="https://ampincdev.wpengine.com/" class="btn">Back To Home</a>
						</div>
					</div>

			</div><!-- .page-content -->
			</div><!-- container -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
