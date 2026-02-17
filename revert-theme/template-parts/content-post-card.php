<?php
/**
 * Template part for displaying post cards
 *
 * @package ReVert
 */
?>

<article <?php post_class( 'post-card' ); ?>>
    <?php if ( has_post_thumbnail() ) : ?>
        <a href="<?php the_permalink(); ?>" class="post-image">
            <?php the_post_thumbnail( 'medium' ); ?>
        </a>
    <?php endif; ?>

    <div class="post-content">
        <div class="post-meta">
            <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                <?php echo esc_html( get_the_date() ); ?>
            </time>
            <?php
            $categories = get_the_category();
            if ( $categories ) :
                echo ' &bull; <span class="category">' . esc_html( $categories[0]->name ) . '</span>';
            endif;
            ?>
        </div>

        <h3 class="post-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>

        <div class="post-excerpt">
            <?php the_excerpt(); ?>
        </div>

        <a href="<?php the_permalink(); ?>" class="read-more">
            Read More &rarr;
        </a>
    </div>
</article>
