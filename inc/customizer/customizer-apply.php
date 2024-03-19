<?php
// hotelic Customizer Options
function hotelic_customizer_style()
{
$prefix = 'travelfic_customizer_settings_';
$stiky_bg_color = get_theme_mod($prefix.'stiky_header_bg_color', '#fff');
$stiky_bg_blur = get_theme_mod($prefix.'stiky_header_blur', '24');
$stiky_menu_color = get_theme_mod($prefix.'stiky_header_menu_text_color', '#000');
$primary_color = get_theme_mod($prefix.'primary_color', '#F15D30');

$footer_bg = get_theme_mod($prefix.'footer_bg_color', '#fff');
$footer_text_color = get_theme_mod($prefix.'footer_text_color', '#222');
// Fonts Family
$hotelic_heading_font_family = !empty(get_theme_mod($prefix.'heading_font_family', '')) ? str_replace('_', ' ', get_theme_mod($prefix.'heading_font_family', '')) : '';
$hotelic_body_font_family = !empty(get_theme_mod($prefix.'body_font_family', '')) ? str_replace('_', ' ', get_theme_mod($prefix.'body_font_family', '')) : '';
?>

<style>

    /* Default Background Color  */
    .hotelic-theme-bg,
    .hotelic-footer-social-link ul li a,
    .single-form-inner .hotelic-form-title,
    .tf-sidebar .wp-block-search__button,
    .hotelic-pagination .page-numbers.current, 
    .hotelic-fields-subscriptions .wpcf7-submit,
    .hotelic-sidebar .wp-block-search__button,
    .wpcf7-form .wpcf7-submit {
        background: <?php echo !empty($primary_color) ? esc_attr( $primary_color ): '#F15D30'; ?> !important;
    }

    /* Default Font Color  */
    .hotelic-footer-contact ul li i,
    .hotelic-search-box .hotelic-tour-serach-fields-wrap .tf_input-inner *,
    .hotelic-tour-serach-fields-wrap .tf_input-inner,
    .hotelic-hero-slider-selector .slider__counter,
    .hotelic-meta-info i,
    .hotelic-single-tour-info .important-single-info i,
    article i,
    .hotelic-pagination .nav-links>a ,
    .tft-site-navigation ul li a:hover,
    .hotelic-header-search a:hover,
    .widget_nav_menu ul li a:hover,
    .hotelic-destination-wrapper .hotelic-destination-details ul li a:hover{
        color: <?php echo !empty($primary_color) ? esc_attr( $primary_color ) : '#F15D30';
        ?> !important;
    }

    .navbar-shrink {
        background-color: <?php echo !empty($stiky_bg_color) ? esc_attr( $stiky_bg_color ) : '#ffff'; ?>;
        backdrop-filter: blur(<?php echo !empty($stiky_bg_blur.'px') ? esc_attr( $stiky_bg_blur ).'px' : '24px'; ?>);
    }

    .navbar-shrink .tft-site-navigation ul li a, .navbar-shrink a i {
        color: <?php echo !empty($stiky_menu_color) ? esc_attr( $stiky_menu_color ) : '#000'; ?>;
    }

    .hotelic-site-footer {
        background-color: <?php echo !empty($footer_bg) ? esc_attr( $footer_bg ) : '#fff'; ?>;
    }
    .hotelic-site-footer p{
        color: <?php echo !empty($footer_text_color) ? esc_attr( $footer_text_color ) : '#222'; ?>;
    }
    .hotelic-full-width {
        width: 100% !important;
    }
    #hotelic-site-main-body{
        <?php if(!empty($hotelic_body_font_family)){  ?>
		font-family: "<?php echo $hotelic_body_font_family; ?>", sans-serif !important;
        <?php } ?>
    }
    #hotelic-site-main-body h1,
    #hotelic-site-main-body h2,
    #hotelic-site-main-body h3,
    #hotelic-site-main-body h4,
    #hotelic-site-main-body h5,
    #hotelic-site-main-body h6,
    .tft-design-2 .tft-menus-section .tft-flex .hotelic-logo a{
        <?php if(!empty($hotelic_heading_font_family)){  ?>
		font-family: "<?php echo $hotelic_heading_font_family; ?>", sans-serif !important;
        <?php } ?>
    }
</style>

<?php
}
add_action('wp_head', 'hotelic_customizer_style');
