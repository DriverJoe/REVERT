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
 * Get SVG icon by name
 *
 * @param string $icon_name Icon identifier.
 * @param string $classes   CSS classes for the SVG.
 * @return string SVG markup
 */
function revert_get_icon($icon_name, $classes = '') {
    $icons = array(
        'sprout' => '<svg xmlns="http://www.w3.org/2000/svg" class="' . esc_attr($classes) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 20h10"/><path d="M10 20c5.5-2.5.8-6.4 3-10"/><path d="M9.5 9.4c1.1.8 1.8 2.2 2.3 3.7-2 .4-3.5.4-4.8-.3-1.2-.6-2.3-1.9-3-4.2 2.8-.5 4.4 0 5.5.8z"/><path d="M14.1 6a7 7 0 0 0-1.1 4c1.9-.1 3.3-.6 4.3-1.4 1-1 1.6-2.3 1.7-4.6-2.7.1-4 1-4.9 2z"/></svg>',
        'leaf' => '<svg xmlns="http://www.w3.org/2000/svg" class="' . esc_attr($classes) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/></svg>',
        'heart' => '<svg xmlns="http://www.w3.org/2000/svg" class="' . esc_attr($classes) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>',
        'microscope' => '<svg xmlns="http://www.w3.org/2000/svg" class="' . esc_attr($classes) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 18h8"/><path d="M3 22h18"/><path d="M14 22a7 7 0 1 0 0-14h-1"/><path d="M9 14h2"/><path d="M9 12a2 2 0 0 1-2-2V6h6v4a2 2 0 0 1-2 2Z"/><path d="M12 6V3a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v3"/></svg>',
        'shield' => '<svg xmlns="http://www.w3.org/2000/svg" class="' . esc_attr($classes) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/></svg>',
        'droplet' => '<svg xmlns="http://www.w3.org/2000/svg" class="' . esc_attr($classes) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"/></svg>',
        'trending-up' => '<svg xmlns="http://www.w3.org/2000/svg" class="' . esc_attr($classes) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>',
        'mail' => '<svg xmlns="http://www.w3.org/2000/svg" class="' . esc_attr($classes) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>',
        'phone' => '<svg xmlns="http://www.w3.org/2000/svg" class="' . esc_attr($classes) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>',
        'map-pin' => '<svg xmlns="http://www.w3.org/2000/svg" class="' . esc_attr($classes) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>',
        'menu' => '<svg xmlns="http://www.w3.org/2000/svg" class="' . esc_attr($classes) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>',
        'x' => '<svg xmlns="http://www.w3.org/2000/svg" class="' . esc_attr($classes) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>',
        'arrow-right' => '<svg xmlns="http://www.w3.org/2000/svg" class="' . esc_attr($classes) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>',
        'arrow-left' => '<svg xmlns="http://www.w3.org/2000/svg" class="' . esc_attr($classes) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>',
        'chevron-down' => '<svg xmlns="http://www.w3.org/2000/svg" class="' . esc_attr($classes) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m6 9 6 6 6-6"/></svg>',
        'calendar' => '<svg xmlns="http://www.w3.org/2000/svg" class="' . esc_attr($classes) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/></svg>',
        'folder' => '<svg xmlns="http://www.w3.org/2000/svg" class="' . esc_attr($classes) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"/></svg>',
        'tag' => '<svg xmlns="http://www.w3.org/2000/svg" class="' . esc_attr($classes) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12.586 2.586A2 2 0 0 0 11.172 2H4a2 2 0 0 0-2 2v7.172a2 2 0 0 0 .586 1.414l8.704 8.704a2.426 2.426 0 0 0 3.42 0l6.58-6.58a2.426 2.426 0 0 0 0-3.42z"/><circle cx="7.5" cy="7.5" r=".5" fill="currentColor"/></svg>',
        'file-text' => '<svg xmlns="http://www.w3.org/2000/svg" class="' . esc_attr($classes) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><path d="M10 9H8"/><path d="M16 13H8"/><path d="M16 17H8"/></svg>',
        'download' => '<svg xmlns="http://www.w3.org/2000/svg" class="' . esc_attr($classes) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>',
        'external-link' => '<svg xmlns="http://www.w3.org/2000/svg" class="' . esc_attr($classes) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 3h6v6"/><path d="M10 14 21 3"/><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/></svg>',
        'hard-drive' => '<svg xmlns="http://www.w3.org/2000/svg" class="' . esc_attr($classes) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" x2="2" y1="12" y2="12"/><path d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"/><line x1="6" x2="6.01" y1="16" y2="16"/><line x1="10" x2="10.01" y1="16" y2="16"/></svg>',
    );

    return isset($icons[$icon_name]) ? $icons[$icon_name] : '';
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
