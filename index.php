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
 * @package hotelic
 */

get_header();

$hotelic_prefix = 'travelfic_customizer_settings_';

$hotelic_sidebar = get_theme_mod($hotelic_prefix.'blog_sidebar', 'none');
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



?>  

<div id="site-content" class="hotelic-site-content hotelic-single-page hotelic-blog-archive hotelic-customizer-typography">
    <div class="tf-page-header">
        <?php hotelic_blog_page_banner(); ?>
    </div>

    <div class="<?php echo esc_attr( apply_filters( 'hotelic_page_tftcontainer', $hotelic_hoteliccontainer = '') ); ?> <?php echo esc_attr( $hotelic_content_wrap_class ); ?>">
		<?php get_template_part('template-parts/blog', 'list'); ?>
    <?php 
      if( $hotelic_disable_sidebar != 1 ){
        if( $hotelic_sidebar != 'none'){
          get_sidebar();						
        }
      }
    ?> 

    </div>
</div>

<?php

get_footer();