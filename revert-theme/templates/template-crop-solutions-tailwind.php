<?php
/**
 * Template Name: Crop Solutions
 *
 * @package ReVert
 */

get_header();
?>

<!-- Page Hero -->
<section class="relative h-[400px] flex items-center justify-center overflow-hidden">
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('<?php echo get_the_post_thumbnail_url( get_the_ID(), 'hero' ); ?>');">
            <div class="absolute inset-0 bg-gradient-to-r from-primary/90 to-primary/60"></div>
        </div>
    <?php else : ?>
        <div class="absolute inset-0 bg-primary">
            <div class="absolute inset-0 bg-gradient-to-r from-primary/90 to-primary/70"></div>
        </div>
    <?php endif; ?>
    <div class="container relative z-10 text-center text-primary-foreground">
        <h1 class="text-5xl md:text-6xl font-bold mb-4 animate-fade-in">Crop Solutions</h1>
        <p class="text-xl md:text-2xl max-w-3xl mx-auto opacity-90 animate-fade-in">
            Advanced protection and nutrition for healthy, productive crops
        </p>
    </div>
</section>

<!-- Solutions Grid -->
<section class="py-16 md:py-20 bg-background">
    <div class="container">
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">

            <!-- Crop Protection -->
            <div class="bg-card rounded-lg border p-6 flex flex-col h-full hover:shadow-lg transition-all duration-300">
                <?php echo revert_get_icon( 'shield', 'h-12 w-12 text-accent mb-4' ); ?>
                <h3 class="text-xl font-semibold mb-2">Crop Protection</h3>
                <p class="text-muted-foreground">Advanced protection against diseases, pests, and environmental stress</p>
            </div>

            <!-- Nutrition Management -->
            <div class="bg-card rounded-lg border p-6 flex flex-col h-full hover:shadow-lg transition-all duration-300">
                <?php echo revert_get_icon( 'droplet', 'h-12 w-12 text-accent mb-4' ); ?>
                <h3 class="text-xl font-semibold mb-2">Nutrition Management</h3>
                <p class="text-muted-foreground">Optimized nutrient delivery systems for maximum yield and quality</p>
            </div>

            <!-- Growth Enhancement -->
            <div class="bg-card rounded-lg border p-6 flex flex-col h-full hover:shadow-lg transition-all duration-300">
                <?php echo revert_get_icon( 'sprout', 'h-12 w-12 text-accent mb-4' ); ?>
                <h3 class="text-xl font-semibold mb-2">Growth Enhancement</h3>
                <p class="text-muted-foreground">Biological stimulants that promote healthy root and plant development</p>
            </div>

            <!-- Yield Optimization -->
            <div class="bg-card rounded-lg border p-6 flex flex-col h-full hover:shadow-lg transition-all duration-300">
                <?php echo revert_get_icon( 'trending-up', 'h-12 w-12 text-accent mb-4' ); ?>
                <h3 class="text-xl font-semibold mb-2">Yield Optimization</h3>
                <p class="text-muted-foreground">Proven solutions to maximize crop productivity sustainably</p>
            </div>

        </div>

        <!-- Content Section -->
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold mb-6">Comprehensive Crop Care</h2>
            <div class="space-y-4 text-lg text-muted-foreground">
                <p>
                    Our crop solutions are designed to meet the diverse needs of modern agriculture. From seed to harvest, we provide scientifically-proven products that enhance crop health, protect against threats, and optimize yields while maintaining environmental sustainability.
                </p>
                <p>
                    Our integrated approach combines the latest in biotechnology with traditional agricultural wisdom, ensuring your crops receive exactly what they need at every growth stage.
                </p>
            </div>

            <?php
            // Display any additional content from the WordPress editor
            while ( have_posts() ) :
                the_post();
                if ( get_the_content() ) :
                    ?>
                    <div class="mt-8 text-lg text-muted-foreground space-y-4">
                        <?php the_content(); ?>
                    </div>
                    <?php
                endif;
            endwhile;
            ?>

            <div class="mt-8 flex flex-wrap gap-4">
                <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="inline-flex h-11 items-center justify-center rounded-md px-8 bg-primary text-primary-foreground hover:bg-primary/90 transition-colors font-medium">
                    Request Information
                </a>
                <a href="<?php echo esc_url( home_url( '/technical-sheets' ) ); ?>" class="inline-flex h-11 items-center justify-center rounded-md px-8 border border-border bg-background hover:bg-accent hover:text-accent-foreground transition-colors font-medium">
                    View Technical Sheets
                </a>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="bg-primary text-primary-foreground py-16 md:py-20">
    <div class="container text-center">
        <h2 class="text-4xl font-bold mb-4">Ready to Transform Your Agriculture?</h2>
        <p class="text-xl max-w-2xl mx-auto mb-8 opacity-90">
            Contact us today to learn how our crop solutions can help improve your yields sustainably.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="inline-flex h-11 items-center justify-center rounded-md px-8 bg-accent text-accent-foreground hover:bg-accent/90 transition-colors font-medium">
                Get In Touch
            </a>
            <a href="<?php echo esc_url( home_url( '/distributor' ) ); ?>" class="inline-flex h-11 items-center justify-center rounded-md px-8 border border-primary-foreground/30 text-primary-foreground hover:bg-primary-foreground/10 transition-colors font-medium">
                Find A Distributor
            </a>
        </div>
    </div>
</section>

<?php
get_footer();
