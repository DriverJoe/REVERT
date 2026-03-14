<?php
/**
 * Template for displaying the front page
 *
 * @package ReVert
 */

get_header();

// Hero fields
$hero_image = has_post_thumbnail()
    ? get_the_post_thumbnail_url( get_the_ID(), 'full' )
    : get_template_directory_uri() . '/assets/images/hero-agriculture.jpg';

// Solution cards
$solutions = array(
    array(
        'title'       => 'Crop Solutions',
        'description' => 'Advanced crop protection and nutrition',
        'image'       => get_template_directory_uri() . '/assets/images/crop-solutions.jpg',
        'link'        => home_url( '/crop-solutions' ),
    ),
    array(
        'title'       => 'Horticulture',
        'description' => 'Specialized horticultural solutions',
        'image'       => get_template_directory_uri() . '/assets/images/horticulture.jpg',
        'link'        => home_url( '/products/horticulture' ),
    ),
    array(
        'title'       => 'Livestock',
        'description' => 'Comprehensive livestock care',
        'image'       => get_template_directory_uri() . '/assets/images/livestock.jpg',
        'link'        => home_url( '/products/livestock' ),
    ),
    array(
        'title'       => 'Research',
        'description' => 'Innovation and case studies',
        'image'       => get_template_directory_uri() . '/assets/images/research.jpg',
        'link'        => home_url( '/research/innovation' ),
    ),
);
?>

<!-- Hero Section -->
<section class="hero">
    <div class="hero-bg" style="background-image: url('<?php echo esc_url( $hero_image ); ?>');"></div>
    <div class="hero-overlay"></div>
    <div class="container">
        <h1 class="hero-title">Innovating Agriculture for a Sustainable Future</h1>
        <p class="hero-description">
            Leading the way in sustainable agricultural solutions
        </p>
        <div class="hero-cta">
            <a href="<?php echo esc_url( home_url( '/products' ) ); ?>" class="btn btn-primary">
                Explore Products
            </a>
            <a href="<?php echo esc_url( home_url( '/about' ) ); ?>" class="btn btn-outline hero-btn-outline">
                Learn More
            </a>
        </div>
    </div>
</section>

<!-- Our Solutions -->
<section class="solutions-section">
    <div class="container">
        <div class="section-header solutions-header">
            <h2>Our Solutions</h2>
            <p>Comprehensive agricultural solutions designed for every aspect of modern farming</p>
        </div>
        <div class="solutions-grid">
            <?php foreach ( $solutions as $solution ) : ?>
                <a href="<?php echo esc_url( $solution['link'] ); ?>" class="solution-card">
                    <div class="solution-card-image">
                        <img src="<?php echo esc_url( $solution['image'] ); ?>"
                             alt="<?php echo esc_attr( $solution['title'] ); ?>"
                             loading="lazy">
                    </div>
                    <div class="solution-card-content">
                        <h3><?php echo esc_html( $solution['title'] ); ?></h3>
                        <p><?php echo esc_html( $solution['description'] ); ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
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
