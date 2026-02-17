<?php
/**
 * Template for displaying the front page
 *
 * @package ReVert
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <h1 class="hero-title">ReVert</h1>
        <p class="hero-description">
            Premium agricultural biologicals, stimulants, and nutrients for sustainable farming
        </p>
        <div class="hero-cta">
            <a href="<?php echo esc_url( home_url( '/products' ) ); ?>" class="btn btn-primary">
                View Products
            </a>
            <a href="<?php echo esc_url( home_url( '/resellers' ) ); ?>" class="btn btn-secondary">
                Find a Reseller
            </a>
        </div>
    </div>
</section>

<!-- Dual Navigation -->
<section class="dual-navigation">
    <div class="container">
        <div class="nav-cards">
            <a href="<?php echo esc_url( home_url( '/retail' ) ); ?>" class="nav-card">
                <h2>Retail</h2>
                <p>Solutions for home gardeners and small-scale growers</p>
            </a>
            <a href="<?php echo esc_url( home_url( '/commercial' ) ); ?>" class="nav-card">
                <h2>Commercial</h2>
                <p>Professional solutions for commercial agriculture</p>
            </a>
        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="featured-products">
    <div class="container">
        <header class="section-header">
            <h2>Featured Products</h2>
            <a href="<?php echo esc_url( home_url( '/products' ) ); ?>" class="view-all">
                View All Products &rarr;
            </a>
        </header>

        <?php
        $featured_products = new WP_Query( array(
            'post_type' => 'product',
            'posts_per_page' => 6,
            'meta_key' => '_featured',
            'meta_value' => '1',
        ) );

        if ( $featured_products->have_posts() ) :
            echo '<div class="product-grid">';
            while ( $featured_products->have_posts() ) :
                $featured_products->the_post();
                get_template_part( 'template-parts/content', 'product-card' );
            endwhile;
            echo '</div>';
            wp_reset_postdata();
        endif;
        ?>
    </div>
</section>

<!-- About Section -->
<section class="about-section">
    <div class="container">
        <div class="about-content">
            <div class="about-text">
                <h2>Sustainable Agriculture Solutions</h2>
                <p>
                    ReVert is committed to providing innovative, sustainable agricultural products
                    that enhance soil health, improve crop yields, and reduce environmental impact.
                </p>
                <p>
                    Our range of biologicals, stimulants, and nutrients are designed to work in
                    harmony with nature, supporting regenerative farming practices.
                </p>
                <a href="<?php echo esc_url( home_url( '/about' ) ); ?>" class="btn">
                    Learn More About Us
                </a>
            </div>
            <div class="about-image">
                <!-- Add your about image here -->
            </div>
        </div>
    </div>
</section>

<!-- Latest News -->
<?php
$latest_posts = new WP_Query( array(
    'post_type' => 'post',
    'posts_per_page' => 3,
) );

if ( $latest_posts->have_posts() ) :
?>
<section class="latest-news">
    <div class="container">
        <header class="section-header">
            <h2>Latest News</h2>
            <a href="<?php echo esc_url( home_url( '/blog' ) ); ?>" class="view-all">
                View All Posts &rarr;
            </a>
        </header>

        <div class="posts-grid">
            <?php
            while ( $latest_posts->have_posts() ) :
                $latest_posts->the_post();
                get_template_part( 'template-parts/content', 'post-card' );
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Newsletter Signup -->
<section class="newsletter-signup">
    <div class="container">
        <div class="newsletter-content">
            <h2>Stay Updated</h2>
            <p>Subscribe to our newsletter for the latest products, tips, and industry news.</p>
            <form id="newsletter-form" class="newsletter-form">
                <input type="email" name="email" placeholder="Enter your email" required>
                <button type="submit" class="btn">Subscribe</button>
            </form>
            <div id="newsletter-message"></div>
        </div>
    </div>
</section>

<?php
get_footer();
