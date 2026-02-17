<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package ReVert
 */

get_header();
?>

<div class="container">
    <section class="error-404 not-found">
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e( '404 - Page Not Found', 'revert' ); ?></h1>
        </header>

        <div class="page-content">
            <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try searching?', 'revert' ); ?></p>

            <?php get_search_form(); ?>

            <div class="error-404-links">
                <h2><?php esc_html_e( 'Quick Links', 'revert' ); ?></h2>
                <ul>
                    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'revert' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/products' ) ); ?>"><?php esc_html_e( 'Products', 'revert' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/resellers' ) ); ?>"><?php esc_html_e( 'Resellers', 'revert' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>"><?php esc_html_e( 'About', 'revert' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>"><?php esc_html_e( 'Contact', 'revert' ); ?></a></li>
                </ul>
            </div>
        </div>
    </section>
</div>

<?php
get_footer();
