<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hotelic
 */

?>

<aside id="secondary" class="widget-area hotelic-sidebar hotelic-customizer-typography">
	<?php 
		if( is_active_sidebar( 'hotelic-sidebar' ) ){
			dynamic_sidebar( 'hotelic-sidebar' );
		}
	?>
	
</aside><!-- #secondary -->
