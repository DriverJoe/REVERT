<?php
/**
 * The template for displaying reseller archives
 *
 * @package ReVert
 */

get_header();
?>

<div class="container">
    <header class="page-header">
        <h1 class="page-title">Find a Reseller</h1>
        <p>Locate authorized ReVert resellers in your area</p>
    </header>

    <!-- Reseller Filters -->
    <div class="reseller-filters">
        <div class="filter-group">
            <label for="region-filter">Region:</label>
            <select id="region-filter" name="region">
                <option value="all">All Regions</option>
                <option value="nsw">NSW</option>
                <option value="vic">VIC</option>
                <option value="qld">QLD</option>
                <option value="wa">WA</option>
                <option value="sa">SA</option>
                <option value="tas">TAS</option>
                <option value="nt">NT</option>
                <option value="act">ACT</option>
            </select>
        </div>

        <div class="filter-group">
            <label for="reseller-search">Search:</label>
            <input type="text" id="reseller-search" name="search" placeholder="Search resellers...">
        </div>
    </div>

    <div id="resellers-container" class="resellers-grid">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                echo revert_get_reseller_card( get_the_ID() );
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
