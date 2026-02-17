<?php
/**
 * The template for displaying single products
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

        <article id="post-<?php the_ID(); ?>" <?php post_class( 'single-product' ); ?>>
            <?php echo revert_breadcrumbs(); ?>

            <div class="product-layout">
                <div class="product-image-section">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="product-featured-image">
                            <?php the_post_thumbnail( 'large' ); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="product-details-section">
                    <?php echo revert_get_product_category_badge(); ?>

                    <header class="entry-header">
                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    </header>

                    <div class="product-meta">
                        <?php
                        $sku = get_post_meta( get_the_ID(), '_product_sku', true );
                        $application_rate = get_post_meta( get_the_ID(), '_product_application_rate', true );
                        $active_ingredients = get_post_meta( get_the_ID(), '_product_active_ingredients', true );

                        if ( $sku ) :
                            echo '<div class="meta-item"><strong>SKU:</strong> ' . esc_html( $sku ) . '</div>';
                        endif;

                        if ( $application_rate ) :
                            echo '<div class="meta-item"><strong>Application Rate:</strong> ' . esc_html( $application_rate ) . '</div>';
                        endif;
                        ?>
                    </div>

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>

                    <?php if ( $active_ingredients ) : ?>
                        <div class="active-ingredients">
                            <h3>Active Ingredients</h3>
                            <p><?php echo nl2br( esc_html( $active_ingredients ) ); ?></p>
                        </div>
                    <?php endif; ?>

                    <?php echo revert_get_product_downloads(); ?>
                </div>
            </div>

            <?php
            // Related Products
            $categories = get_the_terms( get_the_ID(), 'product_category' );
            if ( $categories && ! is_wp_error( $categories ) ) {
                $category_ids = wp_list_pluck( $categories, 'term_id' );

                $related = new WP_Query( array(
                    'post_type' => 'product',
                    'posts_per_page' => 4,
                    'post__not_in' => array( get_the_ID() ),
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_category',
                            'field' => 'term_id',
                            'terms' => $category_ids,
                        ),
                    ),
                ) );

                if ( $related->have_posts() ) :
                    ?>
                    <section class="related-products">
                        <h2>Related Products</h2>
                        <div class="product-grid">
                            <?php
                            while ( $related->have_posts() ) :
                                $related->the_post();
                                get_template_part( 'template-parts/content', 'product-card' );
                            endwhile;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </section>
                    <?php
                endif;
            }
            ?>
        </article>

        <?php
    endwhile;
    ?>
</div>

<?php
get_footer();
