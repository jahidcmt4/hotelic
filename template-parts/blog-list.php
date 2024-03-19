<?php

$hotelic_prefix = 'travelfic_customizer_settings_';
$hotelic_sitebar = get_theme_mod($hotelic_prefix.'blog_sidebar', true);
$hotelic_main_class = $hotelic_sitebar == true ? '' : ' hotelic-full-width';

?>
<main id="tf-site-content" class="<?php if($hotelic_sitebar == true){echo "primary"; }?> site-main<?php echo esc_attr( $hotelic_main_class ); ?>">

    <?php if (have_posts()) :

        if (is_home() && !is_front_page()) :
            ?>
            <header>
                <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
            </header>
            <?php
        endif;

        /* Start the Loop */
        while (have_posts()) :
            the_post();

            /*
            * Include the Post-Type-specific template for the content.
            * If you want to override this in a child theme, then include a file
            * called content-___.php (where ___ is the Post Type name) and that will be used instead.
            */
            get_template_part('template-parts/content', get_post_type());

        endwhile; ?>

        <div class="hotelic-pagination">
            <?php hotelic_posts_pagination(); ?>
        </div>

    <?php else :
        get_template_part('template-parts/content', 'none');
    endif; ?>

</main><!-- #main -->