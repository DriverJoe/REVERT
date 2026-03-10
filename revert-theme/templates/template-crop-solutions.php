<?php
/**
 * Template Name: Crop Solutions
 *
 * @package ReVert
 */

get_header();
?>

<!-- Page Hero -->
<section class="page-hero">
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="hero-bg" style="background-image: url('<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>');">
        </div>
    <?php endif; ?>
    <div class="hero-overlay"></div>
    <div class="container">
        <h1 class="animate-fade-in">Crop Solutions</h1>
        <p class="animate-fade-in">Advanced protection and nutrition for healthy, productive crops</p>
    </div>
</section>

<!-- Solutions Grid -->
<section class="section">
    <div class="container">
        <div class="grid-4">
            <!-- Crop Protection -->
            <div class="card animate-fade-in">
                <div class="card-header">
                    <svg class="card-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/></svg>
                    <h3 class="card-title">Crop Protection</h3>
                    <p class="card-description">Advanced protection against diseases, pests, and environmental stress</p>
                </div>
            </div>

            <!-- Nutrition Management -->
            <div class="card animate-fade-in">
                <div class="card-header">
                    <svg class="card-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5 2.5-2 4.9-4 6.5C6 11.1 5 13 5 15a7 7 0 0 0 7 7z"/></svg>
                    <h3 class="card-title">Nutrition Management</h3>
                    <p class="card-description">Optimized nutrient delivery systems for maximum yield and quality</p>
                </div>
            </div>

            <!-- Growth Enhancement -->
            <div class="card animate-fade-in">
                <div class="card-header">
                    <svg class="card-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 20h10"/><path d="M10 20c5.5-2.5.8-6.4 3-10"/><path d="M9.5 9.4c1.1.8 1.8 2.2 2.3 3.7-2 .4-3.5.4-4.8-.3-1.2-.6-2.3-1.9-3-4.2 2.8-.5 4.4 0 5.5.8z"/><path d="M14.1 6a7 7 0 0 0-1.1 4c1.9-.1 3.3-.6 4.3-1.4 1-1 1.6-2.3 1.7-4.6-2.7.1-4 1-4.9 2z"/></svg>
                    <h3 class="card-title">Growth Enhancement</h3>
                    <p class="card-description">Biological stimulants that promote healthy root and plant development</p>
                </div>
            </div>

            <!-- Yield Optimization -->
            <div class="card animate-fade-in">
                <div class="card-header">
                    <svg class="card-icon" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
                    <h3 class="card-title">Yield Optimization</h3>
                    <p class="card-description">Proven solutions to maximize crop productivity sustainably</p>
                </div>
            </div>
        </div>

        <!-- Content Section -->
        <div class="crop-content-section">
            <h2>Comprehensive Crop Care</h2>
            <div class="prose">
                <p>
                    Our crop solutions are designed to meet the diverse needs of modern agriculture. From seed to harvest, we provide scientifically-proven products that enhance crop health, protect against threats, and optimize yields while maintaining environmental sustainability.
                </p>
                <p>
                    Our integrated approach combines the latest in biotechnology with traditional agricultural wisdom, ensuring your crops receive exactly what they need at every growth stage.
                </p>
            </div>

            <?php
            // Display any additional content from the WordPress editor
            while ( have_posts() ) :
                the_post();
                if ( get_the_content() ) :
                    ?>
                    <div class="prose" style="margin-top: 2rem;">
                        <?php the_content(); ?>
                    </div>
                    <?php
                endif;
            endwhile;
            ?>

            <div class="crop-cta-buttons">
                <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn btn-lg">
                    Request Information
                </a>
                <a href="<?php echo esc_url( home_url( '/technical-sheets' ) ); ?>" class="btn btn-outline btn-lg">
                    View Technical Sheets
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Related Products -->
<?php
$crop_products = new WP_Query( array(
    'post_type' => 'product',
    'posts_per_page' => 4,
    'tax_query' => array(
        array(
            'taxonomy' => 'product_category',
            'field' => 'slug',
            'terms' => array( 'crop-solutions', 'biologicals', 'nutrients', 'stimulants' ),
        ),
    ),
) );

if ( $crop_products->have_posts() ) :
?>
<section class="section-alt">
    <div class="container">
        <div class="section-header">
            <h2>Our Crop Products</h2>
            <p>Explore our range of crop protection and nutrition products</p>
        </div>

        <div class="grid-4">
            <?php
            while ( $crop_products->have_posts() ) :
                $crop_products->the_post();
                get_template_part( 'template-parts/content', 'product-card' );
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h2>Ready to Transform Your Agriculture?</h2>
        <p style="max-width: 600px; margin: 0 auto var(--spacing-xl);">
            Contact us today to learn how our crop solutions can help improve your yields sustainably.
        </p>
        <div class="crop-cta-buttons" style="justify-content: center;">
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="btn" style="background-color: var(--color-accent); color: #fff;">
                Get In Touch
            </a>
            <a href="<?php echo esc_url( home_url( '/distributor' ) ); ?>" class="btn btn-outline" style="border-color: var(--color-primary-fg); color: var(--color-primary-fg);">
                Find A Distributor
            </a>
        </div>
    </div>
</section>

<?php
get_footer();
