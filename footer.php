<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hotelic
 */

    do_action( 'hotelic_before_footer');
    echo apply_filters( 'hotelic_footer', $hotelic_footer = '');
    do_action( 'hotelic_after_footer');

?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
