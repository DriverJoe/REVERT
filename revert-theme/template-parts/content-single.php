<?php
/**
 * Template part for displaying single posts
 *
 * @package ReVert
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php echo revert_breadcrumbs(); ?>

    <?php if ( has_post_thumbnail() ) : ?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail( 'large' ); ?>
        </div>
    <?php endif; ?>

    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

        <div class="entry-meta">
            <span class="posted-on">
                <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                    <?php echo esc_html( get_the_date() ); ?>
                </time>
            </span>
            <span class="byline">
                by <?php the_author(); ?>
            </span>
            <?php
            $categories = get_the_category();
            if ( $categories ) :
                ?>
                <span class="categories">
                    in <?php the_category( ', ' ); ?>
                </span>
            <?php endif; ?>
        </div>
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

    <footer class="entry-footer">
        <?php
        $tags = get_the_tags();
        if ( $tags ) :
            ?>
            <div class="post-tags">
                <?php the_tags( '<span class="tags-title">Tags:</span> ', ', ' ); ?>
            </div>
        <?php endif; ?>

        <?php echo revert_social_share_buttons(); ?>
    </footer>
</article>
