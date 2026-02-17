<?php
/**
 * The template for displaying product archives
 *
 * @package ReVert
 */

get_header();
?>

<div class="container">
    <header class="page-header">
        <h1 class="page-title">Products</h1>
        <p>Browse our complete range of agricultural solutions</p>
    </header>

    <!-- Product Filters -->
    <div class="product-filters">
        <div class="filter-group">
            <label for="category-filter">Category:</label>
            <select id="category-filter" name="category">
                <option value="all">All Categories</option>
                <?php
                $categories = get_terms( array(
                    'taxonomy' => 'product_category',
                    'hide_empty' => true,
                ) );

                foreach ( $categories as $category ) {
                    echo '<option value="' . esc_attr( $category->slug ) . '">' . esc_html( $category->name ) . '</option>';
                }
                ?>
            </select>
        </div>

        <div class="filter-group">
            <label for="type-filter">Type:</label>
            <select id="type-filter" name="type">
                <option value="all">All Types</option>
                <?php
                $types = get_terms( array(
                    'taxonomy' => 'product_type',
                    'hide_empty' => true,
                ) );

                foreach ( $types as $type ) {
                    echo '<option value="' . esc_attr( $type->slug ) . '">' . esc_html( $type->name ) . '</option>';
                }
                ?>
            </select>
        </div>

        <div class="filter-group">
            <label for="product-search">Search:</label>
            <input type="text" id="product-search" name="search" placeholder="Search products...">
        </div>
    </div>

    <div id="products-container" class="product-grid">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                get_template_part( 'template-parts/content', 'product-card' );
            endwhile;

            revert_pagination();
        else :
            get_template_part( 'template-parts/content', 'none' );
        endif;
        ?>
    </div>
</div>

<?php
get_footer();
