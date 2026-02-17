<?php
/**
 * Template Functions
 *
 * @package ReVert
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Get product category badge
 */
function revert_get_product_category_badge( $post_id = null ) {
    if ( ! $post_id ) {
        $post_id = get_the_ID();
    }

    $categories = get_the_terms( $post_id, 'product_category' );

    if ( $categories && ! is_wp_error( $categories ) ) {
        $category = array_shift( $categories );
        return '<span class="product-category">' . esc_html( $category->name ) . '</span>';
    }

    return '';
}

/**
 * Get product download links
 */
function revert_get_product_downloads( $post_id = null ) {
    if ( ! $post_id ) {
        $post_id = get_the_ID();
    }

    $tech_sheet = get_post_meta( $post_id, '_product_tech_sheet', true );
    $sds_sheet = get_post_meta( $post_id, '_product_sds_sheet', true );

    $output = '<div class="product-downloads">';

    if ( $tech_sheet ) {
        $output .= '<a href="' . esc_url( $tech_sheet ) . '" class="btn btn-secondary" target="_blank" rel="noopener">';
        $output .= '<span class="dashicons dashicons-media-document"></span> Technical Sheet</a>';
    }

    if ( $sds_sheet ) {
        $output .= '<a href="' . esc_url( $sds_sheet ) . '" class="btn btn-secondary" target="_blank" rel="noopener">';
        $output .= '<span class="dashicons dashicons-media-document"></span> SDS Sheet</a>';
    }

    $output .= '</div>';

    return $output;
}

/**
 * Get reseller card
 */
function revert_get_reseller_card( $post_id ) {
    $phone = get_post_meta( $post_id, '_reseller_phone', true );
    $email = get_post_meta( $post_id, '_reseller_email', true );
    $website = get_post_meta( $post_id, '_reseller_website', true );
    $address = get_post_meta( $post_id, '_reseller_address', true );
    $region = get_post_meta( $post_id, '_reseller_region', true );

    ob_start();
    ?>
    <div class="reseller-card">
        <h3><?php echo get_the_title( $post_id ); ?></h3>

        <?php if ( $region ) : ?>
            <div class="reseller-region">
                <span class="badge"><?php echo esc_html( strtoupper( $region ) ); ?></span>
            </div>
        <?php endif; ?>

        <?php if ( $address ) : ?>
            <div class="reseller-address">
                <strong>Address:</strong><br>
                <?php echo nl2br( esc_html( $address ) ); ?>
            </div>
        <?php endif; ?>

        <div class="reseller-contact">
            <?php if ( $phone ) : ?>
                <div class="contact-item">
                    <span class="dashicons dashicons-phone"></span>
                    <a href="tel:<?php echo esc_attr( $phone ); ?>"><?php echo esc_html( $phone ); ?></a>
                </div>
            <?php endif; ?>

            <?php if ( $email ) : ?>
                <div class="contact-item">
                    <span class="dashicons dashicons-email"></span>
                    <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
                </div>
            <?php endif; ?>

            <?php if ( $website ) : ?>
                <div class="contact-item">
                    <span class="dashicons dashicons-admin-site"></span>
                    <a href="<?php echo esc_url( $website ); ?>" target="_blank" rel="noopener">Visit Website</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php
    return ob_get_clean();
}

/**
 * Get breadcrumbs
 */
function revert_breadcrumbs() {
    if ( is_front_page() ) {
        return;
    }

    $output = '<nav class="breadcrumbs" aria-label="Breadcrumb">';
    $output .= '<ol>';
    $output .= '<li><a href="' . esc_url( home_url( '/' ) ) . '">Home</a></li>';

    if ( is_category() || is_single() ) {
        $category = get_the_category();
        if ( $category ) {
            $output .= '<li><a href="' . esc_url( get_category_link( $category[0]->term_id ) ) . '">' . esc_html( $category[0]->name ) . '</a></li>';
        }
        if ( is_single() ) {
            $output .= '<li aria-current="page">' . get_the_title() . '</li>';
        }
    } elseif ( is_page() ) {
        $output .= '<li aria-current="page">' . get_the_title() . '</li>';
    } elseif ( is_search() ) {
        $output .= '<li aria-current="page">Search Results</li>';
    } elseif ( is_404() ) {
        $output .= '<li aria-current="page">Page Not Found</li>';
    } elseif ( is_archive() ) {
        $output .= '<li aria-current="page">' . get_the_archive_title() . '</li>';
    }

    $output .= '</ol>';
    $output .= '</nav>';

    return $output;
}

/**
 * Social share buttons
 */
function revert_social_share_buttons() {
    $url = urlencode( get_permalink() );
    $title = urlencode( get_the_title() );

    ob_start();
    ?>
    <div class="social-share">
        <span class="share-label">Share:</span>
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>" target="_blank" rel="noopener" class="share-button facebook">
            Facebook
        </a>
        <a href="https://twitter.com/intent/tweet?url=<?php echo $url; ?>&text=<?php echo $title; ?>" target="_blank" rel="noopener" class="share-button twitter">
            Twitter
        </a>
        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url; ?>&title=<?php echo $title; ?>" target="_blank" rel="noopener" class="share-button linkedin">
            LinkedIn
        </a>
        <a href="mailto:?subject=<?php echo $title; ?>&body=<?php echo $url; ?>" class="share-button email">
            Email
        </a>
    </div>
    <?php
    return ob_get_clean();
}
