<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package hotelic
 */

get_header();
$hotelic_prefix = 'travelfic_customizer_settings_';
$hotelic_sidebar = get_theme_mod($hotelic_prefix.'single_sidebar', 'right');

if( $hotelic_sidebar == 'none' ){  
	$hotelic_content_wrap_class = 'hotelic-no-sidebar';
} elseif($hotelic_sidebar == 'left'){ 
	$hotelic_content_wrap_class = 'hotelic-left-sidebar';
}elseif($hotelic_sidebar == 'right'){
	$hotelic_content_wrap_class = 'hotelic-right-sidebar';
}else{
	$hotelic_content_wrap_class = 'hotelic-right-sidebar';
}


?>

<div id="site-content" class="hotelic-site-content hotelic-single-post ">
	<div class="<?php echo esc_attr( apply_filters( 'hotelic_page_tftcontainer', $hotelic_hoteliccontainer = '') ); ?> <?php echo esc_attr( $hotelic_content_wrap_class ); ?>">		
		<?php get_template_part('template-parts/blog', 'details'); ?>
		<?php         
			if( $hotelic_sidebar != 'none'){
				get_sidebar();						
			} 
		?>
		</div>
	</div>

<?php

get_footer();
