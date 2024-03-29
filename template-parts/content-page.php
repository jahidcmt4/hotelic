<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hotelic
 */

 $hotelic_prefix = 'travelfic_customizer_settings_';
 $hotelic_banner = get_theme_mod($hotelic_prefix . 'page_banner', 'banner');
 $hotelic_disable_banner = get_post_meta( get_the_ID(), 'hotelic-pmb-banner', true );
 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if( $hotelic_disable_banner == 1 || $hotelic_banner == 'title' ):?>
		<header class="entry-header">
			<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
		</header><!-- .entry-header -->
	<?php endif; ?>

    <?php hotelic_post_thumbnail(); ?>

    <div class="entry-content">
        <?php
		the_content();
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'hotelic'),
				'after'  => '</div>',
			)
		);
		?>
    </div><!-- .entry-content -->

    <?php if (get_edit_post_link()) : ?>
    <footer class="entry-footer">
        <?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						esc_html__('Edit <span class="screen-reader-text">%s</span>', 'hotelic'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post(get_the_title())
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
    </footer><!-- .entry-footer -->
    <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->