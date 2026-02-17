<?php
/**
 * The template for displaying all single posts
 *
 * @package ReVert
 */

get_header();
?>

<div class="container">
    <?php
    while ( have_posts() ) :
        the_post();
        get_template_part( 'template-parts/content', 'single' );

        // If comments are open or we have at least one comment, load the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

    endwhile;
    ?>
</div>

<?php
get_footer();
