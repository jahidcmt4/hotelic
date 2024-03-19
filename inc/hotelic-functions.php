<?php

/**
 * Update Elementor Options
 */
function hotelic_load_elementor_options() {  
    update_option( 'elementor_disable_color_schemes', 'yes' );
    update_option( 'elementor_disable_typography_schemes', 'yes' );
    update_option( 'elementor_global_image_lightbox', '' );
}
add_action( 'elementor/loaded', 'hotelic_load_elementor_options' );

/**
 * Disable Getting Start - Elementor 
 */
function hotelic_elementor_loaded_function() {
    if ( did_action( 'elementor/loaded' ) ) {
        remove_action( 'admin_init', [ \Elementor\Plugin::$instance->admin, 'maybe_redirect_to_getting_started' ] );
    }
};
add_action( 'admin_init', 'hotelic_elementor_loaded_function', 1 );

/**
 * Posts Paginations
 */
if ( !function_exists('hotelic_posts_pagination') ) {
    function hotelic_posts_pagination(){
        the_posts_pagination( array(
            'mid_size'  => 1,
            'prev_text'          => '<i class="fas fa-arrow-left"></i>',
            'next_text'          => '<i class="fas fa-arrow-right"></i>',
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'hotelic' ) . ' </span>',
        ) );
    } 
}

if ( ! function_exists( 'hotelic_archive_page_banner' ) ) {
    function hotelic_archive_page_banner(){
        $hotelic_prefix = 'travelfic_customizer_settings_';
        $hotelic_ImageUrl = get_theme_mod($hotelic_prefix.'tf_archive_header_img' , get_template_directory_uri() . '/assets/img/page_header.png');
        
        $hotelic_banner = get_theme_mod($hotelic_prefix . 'archive_banner', 'banner');
        $hotelic_disable_banner = get_post_meta( get_the_ID(), 'hotelic-pmb-banner', true );
        
        if( $hotelic_disable_banner != 1 && $hotelic_banner == 'banner' ){
            ?>
                <div class="tf-page-header-inner hotelic-page-banner blog" style="background-image:url('<?php echo esc_url( $hotelic_ImageUrl ); ?>');">
                    <div class="<?php echo esc_attr( apply_filters( 'hotelic_page_tftcontainer', $hotelic_hoteliccontainer = '') ); ?>">
                        <?php  
                            the_archive_title( '<h1 class="page-title">', '</h1>' );
                            the_archive_description( '<div class="archive-description">', '</div>' );
                        ?>
                    </div>
                </div>
            <?php
        }elseif( $hotelic_banner == 'title'){
            ?>
                <div class="<?php echo esc_attr( apply_filters( 'hotelic_page_tftcontainer', $hotelic_hoteliccontainer = '') ); ?>">
                    <div class="hotelic-blog-header">
                        <header class="entry-header">
                            <?php  
                                the_archive_title( '<h1 class="page-title">', '</h1>' );
                                the_archive_description( '<div class="archive-description">', '</div>' );
                            ?>
                        </header><!-- .entry-header -->
                    </div>
                </div>
            <?php
        }
    }
}

if ( ! function_exists( 'hotelic_blog_page_banner' ) ) {
    function hotelic_blog_page_banner(){
        $hotelic_prefix = 'travelfic_customizer_settings_';
        $hotelic_ImageUrl = get_theme_mod($hotelic_prefix.'tf_archive_header_img' , get_template_directory_uri() . '/assets/img/page_header.png');
        
        $hotelic_banner = get_theme_mod($hotelic_prefix . 'blog_banner', 'banner');
        $hotelic_disable_banner = get_post_meta( get_the_ID(), 'hotelic-pmb-banner', true );
        
        if( $hotelic_disable_banner != 1 && $hotelic_banner == 'banner' ){
            ?>
                <div class="tf-page-header-inner hotelic-page-banner blog" style="background-image:url('<?php echo esc_url( $hotelic_ImageUrl ); ?>');">
                    <h1 class="entry-title"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h1>
                </div>
            <?php
        }elseif( $hotelic_banner == 'title' || $hotelic_banner != 'empty' ){
            ?>
                <div class="<?php echo esc_attr( apply_filters( 'hotelic_page_tftcontainer', $hotelic_hoteliccontainer = '') ); ?>">
                    <div class="hotelic-blog-header">
                        <header class="entry-header">
                            <h1 class="entry-title"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h1>
                        </header><!-- .entry-header -->
                    </div>
                </div>
            <?php
        }
    }
}