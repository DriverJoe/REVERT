# ReVert WordPress Theme - Architecture Guide

## Two Themes in This Repo

**IMPORTANT:** There are two separate WordPress themes in this project. They are NOT interchangeable.

| | `revert-theme/` (repo root) | `revert` (active on server) |
|---|---|---|
| **Location (local)** | `/revert-theme/` | `/flowfolio-design/revert-wordpress-theme/wp-content/themes/revert/` |
| **Location (server)** | `/var/www/html/wp-content/themes/revert-theme/` (git clone) | `/var/www/html/wp-content/themes/revert/` (active theme) |
| **CSS Framework** | Custom CSS (`style.css`) | Tailwind CSS (`tailwind.min.css`) |
| **JS Framework** | jQuery | Alpine.js 3.14.8 |
| **Functions.php** | Requires `inc/custom-taxonomies.php`, `inc/template-functions.php` | Requires `inc/taxonomies.php`, `inc/theme-setup.php`, `inc/enqueue-scripts.php` |
| **Status** | Legacy / development reference | **Active on production server** |

### DO NOT copy `revert-theme/functions.php` to the server's `revert` theme — the file paths and dependencies are completely different and will crash the site.

---

## Active Theme Structure (`revert`)

```
wp-content/themes/revert/
├── assets/
│   ├── css/tailwind.min.css          # Compiled Tailwind
│   ├── images/                        # Hero & product images
│   └── js/
│       ├── components.js              # Contact form, newsletter, search
│       └── navigation.js              # Menu interactions
├── inc/
│   ├── theme-setup.php                # Theme supports, menus, image sizes, revert_get_icon()
│   ├── enqueue-scripts.php            # CSS/JS asset loading
│   ├── custom-post-types.php          # revert_product, revert_reseller, revert_tech_sheet
│   ├── taxonomies.php                 # product_category, application_area, reseller_region, tech_sheet_category
│   ├── acf-fields.php                 # ACF field groups for products, resellers, tech sheets
│   └── ajax-handlers.php              # Distributor search, contact form, newsletter
├── page-templates/
│   ├── template-home.php              # Homepage (hero, solutions grid, sustainability, testimonials, CTA)
│   ├── template-about.php             # About page (mission, timeline, values)
│   ├── template-contact.php           # Contact form
│   ├── template-distributor.php       # Distributor locator with search
│   ├── template-products-overview.php # Product categories + featured products
│   └── template-crop-solutions.php    # Crop Solutions page (copied from revert-theme)
├── template-parts/
│   ├── header/navigation.php          # Desktop nav with Products dropdown
│   ├── header/mobile-menu.php         # Mobile slide-in menu
│   └── footer/footer-content.php      # Footer with links, newsletter, social
├── header.php                         # HTML head, Open Graph, sticky header
├── footer.php                         # Loads footer-content template part
├── functions.php                      # Loads all inc/ modules (6 requires)
├── index.php                          # Fallback template
├── single.php                         # Blog post template
├── archive.php                        # Blog archive (3-col grid)
├── single-revert_product.php          # Single product page
├── archive-revert_product.php         # Product archive
├── single-revert_tech_sheet.php       # Single tech sheet
├── archive-revert_tech_sheet.php      # Tech sheet archive
├── style.css                          # Theme metadata only
└── tailwind.config.js                 # Tailwind config (Sofia Sans font, custom colors)
```

---

## Key Functions

### `revert_get_icon($icon_name, $classes)`
Defined in: `inc/theme-setup.php`

Returns inline SVG markup. Available icons: `sprout`, `leaf`, `heart`, `microscope`, `shield`, `droplet`, `trending-up`, `mail`, `phone`, `map-pin`, `menu`, `x`, `arrow-right`, `arrow-left`, `chevron-down`, `calendar`, `folder`, `tag`, `file-text`, `download`, `external-link`, `hard-drive`

---

## Custom Post Types

| Post Type | Slug | Archive | Notes |
|---|---|---|---|
| `revert_product` | `/products` | Yes | Gutenberg disabled, uses ACF fields |
| `revert_reseller` | — | No | Private, REST API enabled |
| `revert_tech_sheet` | `/technical-sheets` | Yes | PDF document management |

---

## Homepage Content

The homepage uses **template-home.php** but also has **Gutenberg block editor content** stored in the WordPress database. The "Our Solutions" section with the 4 product cards (Crop Solutions, Horticulture, Livestock, Research) is block editor content, not hardcoded in the template.

### Current link issue
The Crop Solutions tile in the block editor links to `/products/crop-solutions` but the actual Crop Solutions page lives at `/crop-solutions/`. Fix by either:
1. Editing the link in WordPress admin (Pages > Home > Edit block)
2. Adding a redirect in the server's `functions.php` (append, don't replace):

```php
// Redirect /products/crop-solutions to /crop-solutions
function revert_redirects() {
    $request = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '';
    if (preg_match('#^/products/crop-solutions/?$#', $request)) {
        wp_redirect(home_url('/crop-solutions/'), 301);
        exit;
    }
}
add_action('template_redirect', 'revert_redirects');
```

---

## Deployment Workflow

The server at `joe-githheme.zm6fwn.easypanel.host` runs WordPress in Docker.

### To deploy changes to the active theme:

1. **Git repo** is cloned on server at `/var/www/html/wp-content/themes/revert-theme/`
2. The active theme lives at `/var/www/html/wp-content/themes/revert/`
3. Files must be **copied** from the git clone to the active theme

```bash
# Pull latest from GitHub
cd /var/www/html/wp-content/themes/revert-theme && git pull origin main

# Copy specific files (adjust path as needed)
cp revert-theme/templates/template-crop-solutions-tailwind.php \
   /var/www/html/wp-content/themes/revert/page-templates/template-crop-solutions.php

# Fix ownership
chown -R www-data:www-data /var/www/html/wp-content/themes/revert/
```

### Critical rules:
- **NEVER** replace the server's `functions.php` with `revert-theme/functions.php` — they have incompatible `require` paths
- **ALWAYS** set `www-data:www-data` ownership after copying files
- The git repo has a nested structure: `revert-theme/revert-theme/` contains the actual theme files

---

## Design System

| Token | Value | Usage |
|---|---|---|
| Primary | `#3a4f3f` (dark green) | Header, footer, buttons |
| Font | Sofia Sans | All text |
| Framework | Tailwind CSS 3.x | Utility-first styling |
| Interactivity | Alpine.js 3.14.8 | Dropdowns, mobile menu, forms |
| Icons | Inline SVG via `revert_get_icon()` | 24 Lucide-style icons |

---

## Dependencies

- **WordPress 6.0+** with PHP 8.0+
- **Advanced Custom Fields (ACF)** — product details, reseller info, tech sheet metadata
- **Alpine.js** — loaded from CDN
- **Tailwind CSS** — pre-compiled, config in `tailwind.config.js`
