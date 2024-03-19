<?php 
// 404 Page template 
$hotelic_prefix = 'travelfic_customizer_settings_';
$hotelic_page_404_title = get_theme_mod($hotelic_prefix.'404_title', 'Oops! page not found');
$hotelic_page_404_sub_title = get_theme_mod($hotelic_prefix.'404_sub_title',  'The page you requested could not found or may be deleted from server.');
$hotelic_page_404_button_label = get_theme_mod($hotelic_prefix.'404_button_label', 'Back to home');
$hotelic_page_404_button_url = get_theme_mod($hotelic_prefix.'404_button_url', get_home_url());
$hotelic_page_404_image = get_theme_mod($hotelic_prefix.'tf_404_img', get_template_directory_uri() . "/assets/img/page-404.png");

?>

<div class="hotelic-404-container">
    <div class="hotelic-404-head">
        <h2 class="font-mdm font-blue"> <?php echo esc_html($hotelic_page_404_title) ?> </h2>
        <p><?php echo esc_html($hotelic_page_404_sub_title); ?></p>
        <a class="bttn hotelic-bttn-primary" href="<?php
            if ($hotelic_page_404_button_url != '') {
                echo esc_url($hotelic_page_404_button_url ); 
            }else{
                echo esc_url(home_url('/'));
            }
            ?>" tabindex="0">
            <div class="hotelic-custom-bttn">
                <span><?php echo esc_html( $hotelic_page_404_button_label ); ?></span>
            </div>
        </a>
    </div>
    <div class="hotelic-404-body">
        <img src="<?php 
            if( $hotelic_page_404_image != '' ){
                echo esc_url($hotelic_page_404_image);
            }else{
                echo esc_url( get_template_directory_uri().'/assets/img/page-404.png' );
            }
        
        ?>" alt="">
    </div>
</div>

