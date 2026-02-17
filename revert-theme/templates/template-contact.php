<?php
/**
 * Template Name: Contact Page
 *
 * @package ReVert
 */

get_header();
?>

<div class="container">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </header>

        <div class="contact-layout">
            <div class="contact-content">
                <?php the_content(); ?>

                <form id="contact-form" class="contact-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="contact-name">Name *</label>
                            <input type="text" id="contact-name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="contact-email">Email *</label>
                            <input type="email" id="contact-email" name="email" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="contact-subject">Subject</label>
                        <input type="text" id="contact-subject" name="subject">
                    </div>

                    <div class="form-group">
                        <label for="contact-message">Message *</label>
                        <textarea id="contact-message" name="message" rows="6" required></textarea>
                    </div>

                    <button type="submit" class="btn">Send Message</button>
                </form>

                <div id="contact-message"></div>
            </div>

            <div class="contact-info">
                <div class="info-box">
                    <h3>Get in Touch</h3>
                    <p>Have questions about our products? We're here to help.</p>

                    <div class="contact-details">
                        <div class="detail-item">
                            <strong>Email:</strong><br>
                            <a href="mailto:info@revert.com.au">info@revert.com.au</a>
                        </div>

                        <div class="detail-item">
                            <strong>Phone:</strong><br>
                            <a href="tel:+61123456789">+61 1 2345 6789</a>
                        </div>

                        <div class="detail-item">
                            <strong>Hours:</strong><br>
                            Monday - Friday: 9am - 5pm<br>
                            Saturday: 9am - 1pm<br>
                            Sunday: Closed
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
</div>

<?php
get_footer();
