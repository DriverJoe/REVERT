/**
 * ReVert Theme JavaScript
 *
 * @package ReVert
 */

(function($) {
    'use strict';

    /**
     * Mobile Menu Toggle
     */
    function initMobileMenu() {
        const menuToggle = $('.mobile-menu-toggle');
        const navigation = $('#site-navigation');

        menuToggle.on('click', function() {
            const isExpanded = $(this).attr('aria-expanded') === 'true';
            $(this).attr('aria-expanded', !isExpanded);
            navigation.toggleClass('active');
        });

        // Close menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.site-header').length) {
                navigation.removeClass('active');
                menuToggle.attr('aria-expanded', 'false');
            }
        });
    }

    /**
     * Product Filtering
     */
    function initProductFilters() {
        const categoryFilter = $('#category-filter');
        const typeFilter = $('#type-filter');
        const searchInput = $('#product-search');
        const container = $('#products-container');

        function filterProducts() {
            const category = categoryFilter.val();
            const type = typeFilter.val();
            const search = searchInput.val();

            $.ajax({
                url: revertAjax.ajaxurl,
                type: 'POST',
                data: {
                    action: 'filter_products',
                    nonce: revertAjax.nonce,
                    category: category,
                    type: type,
                    search: search
                },
                beforeSend: function() {
                    container.addClass('loading');
                },
                success: function(response) {
                    if (response.success) {
                        container.html(response.data.html);
                    }
                },
                complete: function() {
                    container.removeClass('loading');
                }
            });
        }

        // Trigger filtering on change
        categoryFilter.on('change', filterProducts);
        typeFilter.on('change', filterProducts);

        // Debounce search input
        let searchTimeout;
        searchInput.on('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(filterProducts, 500);
        });
    }

    /**
     * Reseller Filtering
     */
    function initResellerFilters() {
        const regionFilter = $('#region-filter');
        const searchInput = $('#reseller-search');
        const container = $('#resellers-container');

        function filterResellers() {
            const region = regionFilter.val();
            const search = searchInput.val();

            $.ajax({
                url: revertAjax.ajaxurl,
                type: 'POST',
                data: {
                    action: 'filter_resellers',
                    nonce: revertAjax.nonce,
                    region: region,
                    search: search
                },
                beforeSend: function() {
                    container.addClass('loading');
                },
                success: function(response) {
                    if (response.success) {
                        container.html(response.data.html);
                    }
                },
                complete: function() {
                    container.removeClass('loading');
                }
            });
        }

        // Trigger filtering on change
        regionFilter.on('change', filterResellers);

        // Debounce search input
        let searchTimeout;
        searchInput.on('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(filterResellers, 500);
        });
    }

    /**
     * Newsletter Form Submission
     */
    function initNewsletterForm() {
        const form = $('#newsletter-form');
        const messageContainer = $('#newsletter-message');

        form.on('submit', function(e) {
            e.preventDefault();

            const email = form.find('input[name="email"]').val();

            $.ajax({
                url: revertAjax.ajaxurl,
                type: 'POST',
                data: {
                    action: 'newsletter_signup',
                    nonce: revertAjax.nonce,
                    email: email
                },
                beforeSend: function() {
                    form.find('button').prop('disabled', true).text('Subscribing...');
                    messageContainer.html('');
                },
                success: function(response) {
                    if (response.success) {
                        messageContainer.html('<p class="success-message">' + response.data.message + '</p>');
                        form[0].reset();
                    } else {
                        messageContainer.html('<p class="error-message">' + response.data.message + '</p>');
                    }
                },
                complete: function() {
                    form.find('button').prop('disabled', false).text('Subscribe');
                }
            });
        });
    }

    /**
     * Contact Form Submission
     */
    function initContactForm() {
        const form = $('#contact-form');
        const messageContainer = $('#contact-message');

        form.on('submit', function(e) {
            e.preventDefault();

            const formData = {
                action: 'contact_form_submit',
                nonce: revertAjax.nonce,
                name: form.find('input[name="name"]').val(),
                email: form.find('input[name="email"]').val(),
                subject: form.find('input[name="subject"]').val(),
                message: form.find('textarea[name="message"]').val()
            };

            $.ajax({
                url: revertAjax.ajaxurl,
                type: 'POST',
                data: formData,
                beforeSend: function() {
                    form.find('button').prop('disabled', true).text('Sending...');
                    messageContainer.html('');
                },
                success: function(response) {
                    if (response.success) {
                        messageContainer.html('<p class="success-message">' + response.data.message + '</p>');
                        form[0].reset();
                    } else {
                        messageContainer.html('<p class="error-message">' + response.data.message + '</p>');
                    }
                },
                complete: function() {
                    form.find('button').prop('disabled', false).text('Send Message');
                }
            });
        });
    }

    /**
     * Smooth Scroll for Anchor Links
     */
    function initSmoothScroll() {
        $('a[href*="#"]:not([href="#"])').on('click', function() {
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') &&
                location.hostname === this.hostname) {
                let target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top - 100
                    }, 500);
                    return false;
                }
            }
        });
    }

    /**
     * Sticky Header on Scroll
     */
    function initStickyHeader() {
        const header = $('.site-header');
        const scrollThreshold = 100;

        $(window).on('scroll', function() {
            if ($(this).scrollTop() > scrollThreshold) {
                header.addClass('scrolled');
            } else {
                header.removeClass('scrolled');
            }
        });
    }

    /**
     * Lazy Load Images (if needed)
     */
    function initLazyLoad() {
        if ('loading' in HTMLImageElement.prototype) {
            const images = document.querySelectorAll('img[loading="lazy"]');
            images.forEach(img => {
                img.src = img.dataset.src;
            });
        }
    }

    /**
     * Initialize all functions
     */
    $(document).ready(function() {
        initMobileMenu();
        initProductFilters();
        initResellerFilters();
        initNewsletterForm();
        initContactForm();
        initSmoothScroll();
        initStickyHeader();
        initLazyLoad();
    });

})(jQuery);
