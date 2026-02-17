<?php
/**
 * The template for displaying search results
 *
 * @package ReVert
 */

get_header();
?>

<div class="container">
    <header class="page-header">
        <h1 class="page-title">
            <?php
            printf(
                esc_html__( 'Search Results for: %s', 'revert' ),
                '<span>' . get_search_query() . '</span>'
            );
            ?>
        </h1>
    </header>

    <?php if ( have_posts() ) : ?>

        <div class="search-results">
            <?php
            while ( have_posts() ) :
                the_post();

                if ( get_post_type() === 'product' ) {
                    get_template_part( 'template-parts/content', 'product-card' );
                } else {
                    get_template_part( 'template-parts/content', 'post-card' );
                }

            endwhile;

            revert_pagination();
            ?>
        </div>

    <?php else : ?>

        <div class="no-results">
            <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'revert' ); ?></p>
            <?php get_search_form(); ?>
        </div>

    <?php endif; ?>
</div>

<?php
get_footer();
