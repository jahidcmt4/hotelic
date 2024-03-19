<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="hotelic-site-main-body">
<?php wp_body_open(); ?>
<div id="page" class="site">
<a class="skip-link screen-reader-text" href="#tf-site-content"><?php _e('Skip to content', 'hotelic'); ?></a>
<!-- Header Section start -->
<?php 
    do_action( 'hotelic_before_header');
    echo apply_filters( 'hotelic_header', $hotelic_header = '');
    do_action( 'hotelic_after_header');
?>
<!-- Header Section End -->