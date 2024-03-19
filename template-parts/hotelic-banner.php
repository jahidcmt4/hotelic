<?php
/**
 * Page Banner 
 */
if (!empty( get_post_meta( get_the_ID(), 'hotelic-pmb-background-img', true ) ) ) {
    $hotelic_bannerImageUrl = get_post_meta( get_the_ID(), 'hotelic-pmb-background-img', true );
} else {
    $hotelic_bannerImageUrl = get_template_directory_uri() . '/assets/img/page_header.png';
}

// Page Subtitle
$hotelic_page_sub_title =  get_post_meta( get_the_ID(), 'hotelic-pmb-subtitle', true ) ? get_post_meta( get_the_ID(), 'hotelic-pmb-subtitle', true ) : '';  


?>
<?php if ( class_exists( 'WooCommerce' ) &&  ( is_checkout() || is_cart() ) ) : ?>    
    <div class="tf-page-header-inner hotelic-page-banner woo-page-header woocommerce_check">
        <div class="<?php echo esc_attr( apply_filters( 'hotelic_page_tftcontainer', $hotelic_hoteliccontainer = '') ); ?>">
            <div class="hotelic-page-banner">
                <?php 
                    the_title('<h1 class="entry-title">', '</h1>'); 
                ?>
                <?php 
                if( !empty($hotelic_page_sub_title) ){
                ?>
                <p><?php echo esc_html( $hotelic_page_sub_title ); ?></p>
                <?php } ?>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="tf-page-header-inner hotelic-page-banner" style="background-image:url('<?php echo esc_url( $hotelic_bannerImageUrl ); ?>');">
        <div class="<?php echo esc_attr( apply_filters( 'hotelic_page_tftcontainer', $hotelic_hoteliccontainer = '') ); ?>">
            <div class="hotelic-page-banner">
                <?php 
                    the_title('<h1 class="entry-title">', '</h1>');
                ?>
                <?php 
                if( !empty($hotelic_page_sub_title) ){
                ?>
                <p><?php echo esc_html( $hotelic_page_sub_title ); ?></p>
                <?php } ?>
            </div>
        </div>
    </div>
<?php endif; ?>



