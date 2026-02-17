<?php
/**
 * The template for displaying all pages
 *
 * @package ReVert
 */

get_header();
?>

<div class="container">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php if ( has_post_thumbnail() && ! is_front_page() ) : ?>
                <div class="page-thumbnail">
                    <?php the_post_thumbnail( 'large' ); ?>
                </div>
            <?php endif; ?>

            <header class="entry-header">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </header>

            <div class="entry-content">
                <?php
                the_content();

                wp_link_pages(
                    array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'revert' ),
                        'after'  => '</div>',
                    )
                );
                ?>
            </div>
        </article>

        <?php
        // If comments are open or we have at least one comment, load the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

    endwhile;
    ?>
</div>

<?php
get_footer();
