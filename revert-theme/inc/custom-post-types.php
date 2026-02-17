<?php
/**
 * Custom Post Types
 *
 * @package ReVert
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Products Custom Post Type
 */
function revert_register_products_post_type() {
    $labels = array(
        'name'                  => _x( 'Products', 'Post type general name', 'revert' ),
        'singular_name'         => _x( 'Product', 'Post type singular name', 'revert' ),
        'menu_name'             => _x( 'Products', 'Admin Menu text', 'revert' ),
        'name_admin_bar'        => _x( 'Product', 'Add New on Toolbar', 'revert' ),
        'add_new'               => __( 'Add New', 'revert' ),
        'add_new_item'          => __( 'Add New Product', 'revert' ),
        'new_item'              => __( 'New Product', 'revert' ),
        'edit_item'             => __( 'Edit Product', 'revert' ),
        'view_item'             => __( 'View Product', 'revert' ),
        'all_items'             => __( 'All Products', 'revert' ),
        'search_items'          => __( 'Search Products', 'revert' ),
        'parent_item_colon'     => __( 'Parent Products:', 'revert' ),
        'not_found'             => __( 'No products found.', 'revert' ),
        'not_found_in_trash'    => __( 'No products found in Trash.', 'revert' ),
        'featured_image'        => _x( 'Product Cover Image', 'Overrides the "Featured Image" phrase', 'revert' ),
        'set_featured_image'    => _x( 'Set product image', 'Overrides the "Set featured image" phrase', 'revert' ),
        'remove_featured_image' => _x( 'Remove product image', 'Overrides the "Remove featured image" phrase', 'revert' ),
        'use_featured_image'    => _x( 'Use as product image', 'Overrides the "Use as featured image" phrase', 'revert' ),
        'archives'              => _x( 'Product archives', 'The post type archive label used in nav menus', 'revert' ),
        'insert_into_item'      => _x( 'Insert into product', 'Overrides the "Insert into post" phrase', 'revert' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this product', 'Overrides the "Uploaded to this post" phrase', 'revert' ),
        'filter_items_list'     => _x( 'Filter products list', 'Screen reader text for the filter links', 'revert' ),
        'items_list_navigation' => _x( 'Products list navigation', 'Screen reader text for the pagination', 'revert' ),
        'items_list'            => _x( 'Products list', 'Screen reader text for the items list', 'revert' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'products' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-products',
        'show_in_rest'       => true,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
    );

    register_post_type( 'product', $args );
}
add_action( 'init', 'revert_register_products_post_type' );

/**
 * Register Resellers Custom Post Type
 */
function revert_register_resellers_post_type() {
    $labels = array(
        'name'                  => _x( 'Resellers', 'Post type general name', 'revert' ),
        'singular_name'         => _x( 'Reseller', 'Post type singular name', 'revert' ),
        'menu_name'             => _x( 'Resellers', 'Admin Menu text', 'revert' ),
        'name_admin_bar'        => _x( 'Reseller', 'Add New on Toolbar', 'revert' ),
        'add_new'               => __( 'Add New', 'revert' ),
        'add_new_item'          => __( 'Add New Reseller', 'revert' ),
        'new_item'              => __( 'New Reseller', 'revert' ),
        'edit_item'             => __( 'Edit Reseller', 'revert' ),
        'view_item'             => __( 'View Reseller', 'revert' ),
        'all_items'             => __( 'All Resellers', 'revert' ),
        'search_items'          => __( 'Search Resellers', 'revert' ),
        'not_found'             => __( 'No resellers found.', 'revert' ),
        'not_found_in_trash'    => __( 'No resellers found in Trash.', 'revert' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'resellers' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-store',
        'show_in_rest'       => true,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
    );

    register_post_type( 'reseller', $args );
}
add_action( 'init', 'revert_register_resellers_post_type' );

/**
 * Register Documents Custom Post Type
 */
function revert_register_documents_post_type() {
    $labels = array(
        'name'                  => _x( 'Documents', 'Post type general name', 'revert' ),
        'singular_name'         => _x( 'Document', 'Post type singular name', 'revert' ),
        'menu_name'             => _x( 'Documents', 'Admin Menu text', 'revert' ),
        'name_admin_bar'        => _x( 'Document', 'Add New on Toolbar', 'revert' ),
        'add_new'               => __( 'Add New', 'revert' ),
        'add_new_item'          => __( 'Add New Document', 'revert' ),
        'new_item'              => __( 'New Document', 'revert' ),
        'edit_item'             => __( 'Edit Document', 'revert' ),
        'view_item'             => __( 'View Document', 'revert' ),
        'all_items'             => __( 'All Documents', 'revert' ),
        'search_items'          => __( 'Search Documents', 'revert' ),
        'not_found'             => __( 'No documents found.', 'revert' ),
        'not_found_in_trash'    => __( 'No documents found in Trash.', 'revert' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'documents' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-media-document',
        'show_in_rest'       => true,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
    );

    register_post_type( 'document', $args );
}
add_action( 'init', 'revert_register_documents_post_type' );

/**
 * Add custom meta boxes for Products
 */
function revert_add_product_meta_boxes() {
    add_meta_box(
        'product_details',
        __( 'Product Details', 'revert' ),
        'revert_product_details_callback',
        'product',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'revert_add_product_meta_boxes' );

/**
 * Product details meta box callback
 */
function revert_product_details_callback( $post ) {
    wp_nonce_field( 'revert_product_details', 'revert_product_details_nonce' );

    $sku = get_post_meta( $post->ID, '_product_sku', true );
    $tech_sheet = get_post_meta( $post->ID, '_product_tech_sheet', true );
    $sds_sheet = get_post_meta( $post->ID, '_product_sds_sheet', true );
    $application_rate = get_post_meta( $post->ID, '_product_application_rate', true );
    $active_ingredients = get_post_meta( $post->ID, '_product_active_ingredients', true );
    ?>
    <table class="form-table">
        <tr>
            <th><label for="product_sku"><?php _e( 'SKU', 'revert' ); ?></label></th>
            <td><input type="text" id="product_sku" name="product_sku" value="<?php echo esc_attr( $sku ); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="product_application_rate"><?php _e( 'Application Rate', 'revert' ); ?></label></th>
            <td><input type="text" id="product_application_rate" name="product_application_rate" value="<?php echo esc_attr( $application_rate ); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="product_active_ingredients"><?php _e( 'Active Ingredients', 'revert' ); ?></label></th>
            <td><textarea id="product_active_ingredients" name="product_active_ingredients" rows="3" class="large-text"><?php echo esc_textarea( $active_ingredients ); ?></textarea></td>
        </tr>
        <tr>
            <th><label for="product_tech_sheet"><?php _e( 'Technical Sheet URL', 'revert' ); ?></label></th>
            <td><input type="url" id="product_tech_sheet" name="product_tech_sheet" value="<?php echo esc_url( $tech_sheet ); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="product_sds_sheet"><?php _e( 'SDS Sheet URL', 'revert' ); ?></label></th>
            <td><input type="url" id="product_sds_sheet" name="product_sds_sheet" value="<?php echo esc_url( $sds_sheet ); ?>" class="regular-text" /></td>
        </tr>
    </table>
    <?php
}

/**
 * Save product meta data
 */
function revert_save_product_meta( $post_id ) {
    if ( ! isset( $_POST['revert_product_details_nonce'] ) ) {
        return;
    }

    if ( ! wp_verify_nonce( $_POST['revert_product_details_nonce'], 'revert_product_details' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['product_sku'] ) ) {
        update_post_meta( $post_id, '_product_sku', sanitize_text_field( $_POST['product_sku'] ) );
    }

    if ( isset( $_POST['product_application_rate'] ) ) {
        update_post_meta( $post_id, '_product_application_rate', sanitize_text_field( $_POST['product_application_rate'] ) );
    }

    if ( isset( $_POST['product_active_ingredients'] ) ) {
        update_post_meta( $post_id, '_product_active_ingredients', sanitize_textarea_field( $_POST['product_active_ingredients'] ) );
    }

    if ( isset( $_POST['product_tech_sheet'] ) ) {
        update_post_meta( $post_id, '_product_tech_sheet', esc_url_raw( $_POST['product_tech_sheet'] ) );
    }

    if ( isset( $_POST['product_sds_sheet'] ) ) {
        update_post_meta( $post_id, '_product_sds_sheet', esc_url_raw( $_POST['product_sds_sheet'] ) );
    }
}
add_action( 'save_post_product', 'revert_save_product_meta' );

/**
 * Add custom meta boxes for Resellers
 */
function revert_add_reseller_meta_boxes() {
    add_meta_box(
        'reseller_details',
        __( 'Reseller Details', 'revert' ),
        'revert_reseller_details_callback',
        'reseller',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'revert_add_reseller_meta_boxes' );

/**
 * Reseller details meta box callback
 */
function revert_reseller_details_callback( $post ) {
    wp_nonce_field( 'revert_reseller_details', 'revert_reseller_details_nonce' );

    $phone = get_post_meta( $post->ID, '_reseller_phone', true );
    $email = get_post_meta( $post->ID, '_reseller_email', true );
    $website = get_post_meta( $post->ID, '_reseller_website', true );
    $address = get_post_meta( $post->ID, '_reseller_address', true );
    $region = get_post_meta( $post->ID, '_reseller_region', true );
    ?>
    <table class="form-table">
        <tr>
            <th><label for="reseller_phone"><?php _e( 'Phone', 'revert' ); ?></label></th>
            <td><input type="tel" id="reseller_phone" name="reseller_phone" value="<?php echo esc_attr( $phone ); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="reseller_email"><?php _e( 'Email', 'revert' ); ?></label></th>
            <td><input type="email" id="reseller_email" name="reseller_email" value="<?php echo esc_attr( $email ); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="reseller_website"><?php _e( 'Website', 'revert' ); ?></label></th>
            <td><input type="url" id="reseller_website" name="reseller_website" value="<?php echo esc_url( $website ); ?>" class="regular-text" /></td>
        </tr>
        <tr>
            <th><label for="reseller_address"><?php _e( 'Address', 'revert' ); ?></label></th>
            <td><textarea id="reseller_address" name="reseller_address" rows="3" class="large-text"><?php echo esc_textarea( $address ); ?></textarea></td>
        </tr>
        <tr>
            <th><label for="reseller_region"><?php _e( 'Region', 'revert' ); ?></label></th>
            <td>
                <select id="reseller_region" name="reseller_region">
                    <option value=""><?php _e( 'Select Region', 'revert' ); ?></option>
                    <option value="nsw" <?php selected( $region, 'nsw' ); ?>>NSW</option>
                    <option value="vic" <?php selected( $region, 'vic' ); ?>>VIC</option>
                    <option value="qld" <?php selected( $region, 'qld' ); ?>>QLD</option>
                    <option value="wa" <?php selected( $region, 'wa' ); ?>>WA</option>
                    <option value="sa" <?php selected( $region, 'sa' ); ?>>SA</option>
                    <option value="tas" <?php selected( $region, 'tas' ); ?>>TAS</option>
                    <option value="nt" <?php selected( $region, 'nt' ); ?>>NT</option>
                    <option value="act" <?php selected( $region, 'act' ); ?>>ACT</option>
                </select>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Save reseller meta data
 */
function revert_save_reseller_meta( $post_id ) {
    if ( ! isset( $_POST['revert_reseller_details_nonce'] ) ) {
        return;
    }

    if ( ! wp_verify_nonce( $_POST['revert_reseller_details_nonce'], 'revert_reseller_details' ) ) {
        return;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['reseller_phone'] ) ) {
        update_post_meta( $post_id, '_reseller_phone', sanitize_text_field( $_POST['reseller_phone'] ) );
    }

    if ( isset( $_POST['reseller_email'] ) ) {
        update_post_meta( $post_id, '_reseller_email', sanitize_email( $_POST['reseller_email'] ) );
    }

    if ( isset( $_POST['reseller_website'] ) ) {
        update_post_meta( $post_id, '_reseller_website', esc_url_raw( $_POST['reseller_website'] ) );
    }

    if ( isset( $_POST['reseller_address'] ) ) {
        update_post_meta( $post_id, '_reseller_address', sanitize_textarea_field( $_POST['reseller_address'] ) );
    }

    if ( isset( $_POST['reseller_region'] ) ) {
        update_post_meta( $post_id, '_reseller_region', sanitize_text_field( $_POST['reseller_region'] ) );
    }
}
add_action( 'save_post_reseller', 'revert_save_reseller_meta' );
