<?php
/**
 * AJAX Handlers
 *
 * @package ReVert
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Filter products by category (AJAX)
 */
function revert_filter_products() {
    check_ajax_referer( 'revert-nonce', 'nonce' );

    $category = isset( $_POST['category'] ) ? sanitize_text_field( $_POST['category'] ) : '';
    $type = isset( $_POST['type'] ) ? sanitize_text_field( $_POST['type'] ) : '';
    $search = isset( $_POST['search'] ) ? sanitize_text_field( $_POST['search'] ) : '';

    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'post_status' => 'publish',
    );

    if ( ! empty( $search ) ) {
        $args['s'] = $search;
    }

    $tax_query = array();

    if ( ! empty( $category ) && $category !== 'all' ) {
        $tax_query[] = array(
            'taxonomy' => 'product_category',
            'field'    => 'slug',
            'terms'    => $category,
        );
    }

    if ( ! empty( $type ) && $type !== 'all' ) {
        $tax_query[] = array(
            'taxonomy' => 'product_type',
            'field'    => 'slug',
            'terms'    => $type,
        );
    }

    if ( count( $tax_query ) > 0 ) {
        $args['tax_query'] = $tax_query;
    }

    $query = new WP_Query( $args );

    ob_start();

    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            get_template_part( 'template-parts/content', 'product-card' );
        }
    } else {
        echo '<div class="no-products-found"><p>No products found matching your criteria.</p></div>';
    }

    wp_reset_postdata();

    $output = ob_get_clean();

    wp_send_json_success( array( 'html' => $output ) );
}
add_action( 'wp_ajax_filter_products', 'revert_filter_products' );
add_action( 'wp_ajax_nopriv_filter_products', 'revert_filter_products' );

/**
 * Filter resellers by region (AJAX)
 */
function revert_filter_resellers() {
    check_ajax_referer( 'revert-nonce', 'nonce' );

    $region = isset( $_POST['region'] ) ? sanitize_text_field( $_POST['region'] ) : '';
    $search = isset( $_POST['search'] ) ? sanitize_text_field( $_POST['search'] ) : '';

    $args = array(
        'post_type' => 'reseller',
        'posts_per_page' => -1,
        'post_status' => 'publish',
    );

    if ( ! empty( $search ) ) {
        $args['s'] = $search;
    }

    if ( ! empty( $region ) && $region !== 'all' ) {
        $args['meta_query'] = array(
            array(
                'key'     => '_reseller_region',
                'value'   => $region,
                'compare' => '=',
            ),
        );
    }

    $query = new WP_Query( $args );

    ob_start();

    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            echo revert_get_reseller_card( get_the_ID() );
        }
    } else {
        echo '<div class="no-resellers-found"><p>No resellers found in this region.</p></div>';
    }

    wp_reset_postdata();

    $output = ob_get_clean();

    wp_send_json_success( array( 'html' => $output ) );
}
add_action( 'wp_ajax_filter_resellers', 'revert_filter_resellers' );
add_action( 'wp_ajax_nopriv_filter_resellers', 'revert_filter_resellers' );

/**
 * Newsletter signup (AJAX)
 */
function revert_newsletter_signup() {
    check_ajax_referer( 'revert-nonce', 'nonce' );

    $email = isset( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : '';

    if ( ! is_email( $email ) ) {
        wp_send_json_error( array( 'message' => 'Please enter a valid email address.' ) );
    }

    // Here you would integrate with your email service provider (Mailchimp, SendGrid, etc.)
    // For now, we'll just save it as a custom post type or option

    $subscriber_id = wp_insert_post( array(
        'post_type' => 'subscriber',
        'post_title' => $email,
        'post_status' => 'publish',
        'meta_input' => array(
            '_subscriber_email' => $email,
            '_subscriber_date' => current_time( 'mysql' ),
        ),
    ) );

    if ( $subscriber_id ) {
        wp_send_json_success( array( 'message' => 'Thank you for subscribing to our newsletter!' ) );
    } else {
        wp_send_json_error( array( 'message' => 'An error occurred. Please try again later.' ) );
    }
}
add_action( 'wp_ajax_newsletter_signup', 'revert_newsletter_signup' );
add_action( 'wp_ajax_nopriv_newsletter_signup', 'revert_newsletter_signup' );

/**
 * Contact form submission (AJAX)
 */
function revert_contact_form_submit() {
    check_ajax_referer( 'revert-nonce', 'nonce' );

    $name = isset( $_POST['name'] ) ? sanitize_text_field( $_POST['name'] ) : '';
    $email = isset( $_POST['email'] ) ? sanitize_email( $_POST['email'] ) : '';
    $subject = isset( $_POST['subject'] ) ? sanitize_text_field( $_POST['subject'] ) : '';
    $message = isset( $_POST['message'] ) ? sanitize_textarea_field( $_POST['message'] ) : '';

    // Validate inputs
    if ( empty( $name ) || empty( $email ) || empty( $message ) ) {
        wp_send_json_error( array( 'message' => 'Please fill in all required fields.' ) );
    }

    if ( ! is_email( $email ) ) {
        wp_send_json_error( array( 'message' => 'Please enter a valid email address.' ) );
    }

    // Send email
    $to = get_option( 'admin_email' );
    $email_subject = 'Contact Form: ' . $subject;
    $email_body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = array( 'Content-Type: text/plain; charset=UTF-8', "From: $name <$email>" );

    $sent = wp_mail( $to, $email_subject, $email_body, $headers );

    if ( $sent ) {
        // Save submission to database
        wp_insert_post( array(
            'post_type' => 'contact_submission',
            'post_title' => $name . ' - ' . current_time( 'mysql' ),
            'post_status' => 'publish',
            'meta_input' => array(
                '_contact_name' => $name,
                '_contact_email' => $email,
                '_contact_subject' => $subject,
                '_contact_message' => $message,
                '_contact_date' => current_time( 'mysql' ),
            ),
        ) );

        wp_send_json_success( array( 'message' => 'Thank you for contacting us! We will get back to you soon.' ) );
    } else {
        wp_send_json_error( array( 'message' => 'An error occurred. Please try again later.' ) );
    }
}
add_action( 'wp_ajax_contact_form_submit', 'revert_contact_form_submit' );
add_action( 'wp_ajax_nopriv_contact_form_submit', 'revert_contact_form_submit' );
