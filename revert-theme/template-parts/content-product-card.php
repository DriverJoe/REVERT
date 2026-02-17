<?php
/**
 * Template part for displaying product cards
 *
 * @package ReVert
 */
?>

<div class="product-card">
    <?php if ( has_post_thumbnail() ) : ?>
        <a href="<?php the_permalink(); ?>" class="product-image">
            <?php the_post_thumbnail( 'revert-product-thumb' ); ?>
        </a>
    <?php endif; ?>

    <div class="product-content">
        <?php echo revert_get_product_category_badge(); ?>

        <h3 class="product-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>

        <?php if ( has_excerpt() ) : ?>
            <div class="product-excerpt">
                <?php the_excerpt(); ?>
            </div>
        <?php endif; ?>

        <a href="<?php the_permalink(); ?>" class="btn btn-secondary">
            View Details
        </a>
    </div>
</div>
