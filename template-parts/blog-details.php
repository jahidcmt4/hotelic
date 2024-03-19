<?php

$hotelic_prefix = 'travelfic_customizer_settings_';


?>
<main id="tf-site-content" class="primary site-main">
    <?php
        while ( have_posts() ) :
            the_post();

            get_template_part( 'template-parts/content', get_post_type() );
            ?>
            <div class="hotelic-tags-single-posts">
                <?php 
                    echo wp_kses_post( get_the_tag_list( sprintf( '<div class="hotelic-tags">%s: ', esc_html__( 'Tags', 'hotelic' ) ), ', ', '</div>' ) );
                ?>
            </div>

            <?php
            the_post_navigation(
                array(
                    'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'hotelic' ) . '</span> <span class="nav-title">%title</span>',
                    'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'hotelic' ) . '</span> <span class="nav-title">%title</span>',
                )
            );

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

        endwhile; // End of the loop.
        ?>
</main><!-- #main -->