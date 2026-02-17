<?php
/**
 * Custom Taxonomies
 *
 * @package ReVert
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Product Categories Taxonomy
 */
function revert_register_product_categories() {
    $labels = array(
        'name'              => _x( 'Product Categories', 'taxonomy general name', 'revert' ),
        'singular_name'     => _x( 'Product Category', 'taxonomy singular name', 'revert' ),
        'search_items'      => __( 'Search Product Categories', 'revert' ),
        'all_items'         => __( 'All Product Categories', 'revert' ),
        'parent_item'       => __( 'Parent Product Category', 'revert' ),
        'parent_item_colon' => __( 'Parent Product Category:', 'revert' ),
        'edit_item'         => __( 'Edit Product Category', 'revert' ),
        'update_item'       => __( 'Update Product Category', 'revert' ),
        'add_new_item'      => __( 'Add New Product Category', 'revert' ),
        'new_item_name'     => __( 'New Product Category Name', 'revert' ),
        'menu_name'         => __( 'Categories', 'revert' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'product-category' ),
        'show_in_rest'      => true,
    );

    register_taxonomy( 'product_category', array( 'product' ), $args );
}
add_action( 'init', 'revert_register_product_categories' );

/**
 * Register Product Types Taxonomy
 */
function revert_register_product_types() {
    $labels = array(
        'name'              => _x( 'Product Types', 'taxonomy general name', 'revert' ),
        'singular_name'     => _x( 'Product Type', 'taxonomy singular name', 'revert' ),
        'search_items'      => __( 'Search Product Types', 'revert' ),
        'all_items'         => __( 'All Product Types', 'revert' ),
        'edit_item'         => __( 'Edit Product Type', 'revert' ),
        'update_item'       => __( 'Update Product Type', 'revert' ),
        'add_new_item'      => __( 'Add New Product Type', 'revert' ),
        'new_item_name'     => __( 'New Product Type Name', 'revert' ),
        'menu_name'         => __( 'Types', 'revert' ),
    );

    $args = array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'product-type' ),
        'show_in_rest'      => true,
    );

    register_taxonomy( 'product_type', array( 'product' ), $args );
}
add_action( 'init', 'revert_register_product_types' );

/**
 * Register Document Categories Taxonomy
 */
function revert_register_document_categories() {
    $labels = array(
        'name'              => _x( 'Document Categories', 'taxonomy general name', 'revert' ),
        'singular_name'     => _x( 'Document Category', 'taxonomy singular name', 'revert' ),
        'search_items'      => __( 'Search Document Categories', 'revert' ),
        'all_items'         => __( 'All Document Categories', 'revert' ),
        'parent_item'       => __( 'Parent Document Category', 'revert' ),
        'parent_item_colon' => __( 'Parent Document Category:', 'revert' ),
        'edit_item'         => __( 'Edit Document Category', 'revert' ),
        'update_item'       => __( 'Update Document Category', 'revert' ),
        'add_new_item'      => __( 'Add New Document Category', 'revert' ),
        'new_item_name'     => __( 'New Document Category Name', 'revert' ),
        'menu_name'         => __( 'Categories', 'revert' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'document-category' ),
        'show_in_rest'      => true,
    );

    register_taxonomy( 'document_category', array( 'document' ), $args );
}
add_action( 'init', 'revert_register_document_categories' );

/**
 * Add default product categories on theme activation
 */
function revert_add_default_product_categories() {
    $categories = array(
        'Biologicals',
        'Stimulants',
        'Nutrients',
        'Soil Amendments',
        'Pest Control',
    );

    foreach ( $categories as $category ) {
        if ( ! term_exists( $category, 'product_category' ) ) {
            wp_insert_term( $category, 'product_category' );
        }
    }

    $types = array(
        'Retail',
        'Commercial',
    );

    foreach ( $types as $type ) {
        if ( ! term_exists( $type, 'product_type' ) ) {
            wp_insert_term( $type, 'product_type' );
        }
    }

    $doc_categories = array(
        'Technical Sheets',
        'SDS Sheets',
        'Brochures',
        'Guidelines',
    );

    foreach ( $doc_categories as $category ) {
        if ( ! term_exists( $category, 'document_category' ) ) {
            wp_insert_term( $category, 'document_category' );
        }
    }
}
add_action( 'after_switch_theme', 'revert_add_default_product_categories' );
