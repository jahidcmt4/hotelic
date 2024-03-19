<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package hotelic
 */

get_header();
?>
	<div id="site-content" class="hotelic-site-content hotelic-single-page hotelic-404">	
		<div class="<?php echo esc_attr( apply_filters( 'hotelic_page_tftcontainer', $hotelic_hoteliccontainer = '') ); ?>">
			<main id="tf-site-content" class="primary site-main">
				<?php get_template_part( 'template-parts/hotelic', '404' ); ?>
			</main> 
		</div>
	</div>

<?php
get_footer();
