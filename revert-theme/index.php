<?php
/**
 * The main template file
 *
 * @package ReVert
 */

get_header();
?>

<div class="container">
    <?php
    if ( have_posts() ) :

        if ( is_home() && ! is_front_page() ) :
            ?>
            <header class="page-header">
                <h1 class="page-title"><?php single_post_title(); ?></h1>
            </header>
            <?php
        endif;

        echo '<div class="posts-grid">';

        while ( have_posts() ) :
            the_post();
            get_template_part( 'template-parts/content', get_post_type() );
        endwhile;

        echo '</div>';

        revert_pagination();

    else :

        get_template_part( 'template-parts/content', 'none' );

    endif;
    ?>
</div>

<?php
get_footer();
