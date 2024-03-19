<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hotelic
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php hotelic_post_thumbnail(); ?>
    <header class="entry-header">
        <?php
		if (is_singular()) :


			the_title('<h1 class="entry-title">', '</h1>');

		else :
			the_title('<a href="' . esc_url(get_permalink()) . '" rel="bookmark"><h2 class="entry-title">', '</h2></a>');
		endif;
		?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
		$hotelic_post_content = get_the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					esc_html__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'hotelic'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post(get_the_title())
			)
		);
		if (!is_single()) {
			$hotelic_trimmed_content = wp_trim_words($hotelic_post_content, 40, '<a href="' . get_permalink() . '"> ...[ read more ]</a>');
			echo '<p>' . wp_kses_post( $hotelic_trimmed_content ) . '</p>';
		} else {
			echo '<p>' . wp_kses_post( $hotelic_post_content ) . '</p>';
		}
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'hotelic'),
				'after' => '</div>',
			)
		);
		?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <div class="hotelic-entry-footer-meta-outter tft-flex hotelic-f-sb">
            <div class="entry-footer-meta tft-flex hotelic-f-cg-20">
                <div class="hotelic-entry-footer-meta">
                    <?php if ('post' === get_post_type()) : ?>
                    <div class="entry-meta">
                        <i class="fas fa-calendar-alt"></i>
                        <?php hotelic_posted_on();
							hotelic_posted_by(); ?>
                    </div><!-- .entry-meta -->
                    <?php endif; ?>
                </div>
                <div class="hotelic-entry-footer-meta">
                    <i class="far fa-comment"></i> <?php //hotelic_entry_footer(); ?>
					<a href="<?php comments_link(); ?>"><?php comments_number( 'Leave a Comment', '1 Comment', '% Comments' ); ?></a>
                </div>
            </div>
        </div>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->