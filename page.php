<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hotelic
 */

get_header();

$hotelic_prefix = 'travelfic_customizer_settings_';
$hotelic_sidebar = get_theme_mod($hotelic_prefix.'page_sidebar', 'right');
$hotelic_disable_sidebar = get_post_meta( get_the_ID(), 'hotelic-pmb-disable-sidebar', true );

if($hotelic_disable_sidebar == 1){
	$hotelic_content_wrap_class = 'hotelic-no-sidebar';
}else{
	if( $hotelic_sidebar == 'none' ){  
		$hotelic_content_wrap_class = 'hotelic-no-sidebar';
	} elseif($hotelic_sidebar == 'left'){ 
		$hotelic_content_wrap_class = 'hotelic-left-sidebar';
	}elseif($hotelic_sidebar == 'right'){
		$hotelic_content_wrap_class = 'hotelic-right-sidebar';
	}else{
		$hotelic_content_wrap_class = 'hotelic-right-sidebar';
	}
}

$hotelic_banner = get_theme_mod($hotelic_prefix . 'page_banner', 'banner');
$hotelic_disable_banner = get_post_meta( get_the_ID(), 'hotelic-pmb-banner', true );

?>
	<div id="site-content" class="hotelic-site-content hotelic-single-page">
		<div class="tf-page-header hotelic-customizer-typography">
			<?php 
				if( $hotelic_disable_banner != 1 && $hotelic_banner == 'banner' ){
					get_template_part( 'template-parts/hotelic', 'banner' );
				}
			?>
		</div>
		<div class="<?php echo esc_attr( apply_filters( 'hotelic_page_tftcontainer', $hotelic_hoteliccontainer = '') ); ?> <?php echo esc_attr( $hotelic_content_wrap_class ); ?>">
				
			<main id="tf-site-content" class="primary site-main">

				<?php
				
				while ( have_posts() ) :

					the_post();

					get_template_part( 'template-parts/content', 'page' );
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				endwhile; // End of the loop.
				?>
			</main><!-- #main -->
			
			<?php 
				if( $hotelic_disable_sidebar != 1){
					if( $hotelic_sidebar == 'left' || $hotelic_sidebar == 'right'){
						get_sidebar();						
					}
				}
			?> 
		</div>
	</div>
	

<?php

get_footer();
