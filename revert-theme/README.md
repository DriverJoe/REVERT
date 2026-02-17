# ReVert WordPress Theme

A custom WordPress theme for ReVert - Agricultural biologicals, stimulants, and nutrients.

## Features

- 🎨 Modern dark design aesthetic
- 📱 Fully responsive and mobile-friendly
- 🛍️ Custom product catalog with categories
- 📍 Reseller locator with regional filtering
- 📄 Document management system
- 📰 Blog/News system
- 📧 Newsletter signup integration
- 📞 Contact form with AJAX submission
- 🔍 Advanced search and filtering
- ♿ Accessibility-ready
- 🚀 Performance optimized
- 🔒 Security hardened

## Requirements

- WordPress 5.9 or higher
- PHP 7.4 or higher
- MySQL 5.7 or higher

## Installation

### Method 1: Upload via WordPress Admin

1. Download the theme as a ZIP file
2. Log in to your WordPress admin panel
3. Navigate to **Appearance → Themes**
4. Click **Add New** then **Upload Theme**
5. Choose the ZIP file and click **Install Now**
6. Click **Activate** once installed

### Method 2: Manual Installation

1. Download or clone this repository
2. Upload the `revert-theme` folder to `/wp-content/themes/`
3. Log in to your WordPress admin panel
4. Navigate to **Appearance → Themes**
5. Find "ReVert" and click **Activate**

### Method 3: GitHub Deployment

```bash
cd /path/to/wordpress/wp-content/themes/
git clone https://github.com/yourusername/revert-theme.git
```

## Initial Setup

### 1. Configure Menus

Navigate to **Appearance → Menus** and create menus for:

- **Primary Menu** - Main navigation
- **Retail Menu** - Retail-specific navigation
- **Commercial Menu** - Commercial-specific navigation
- **Footer Menu** - Footer links

### 2. Add Logo

1. Go to **Appearance → Customize → Site Identity**
2. Upload your logo
3. Adjust logo size if needed

### 3. Configure Widgets

Navigate to **Appearance → Widgets** and add widgets to:

- Footer Widget Area 1
- Footer Widget Area 2
- Footer Widget Area 3
- Footer Widget Area 4

### 4. Create Pages

Create the following pages:

- Home (set as front page)
- About
- Contact
- Retail
- Commercial

Set **Home** as your front page:
1. Go to **Settings → Reading**
2. Select "A static page" under "Your homepage displays"
3. Choose "Home" for Homepage

### 5. Add Products

1. Navigate to **Products → Add New**
2. Fill in product details:
   - Title
   - Description
   - Featured image
   - Category (Biologicals, Stimulants, Nutrients, etc.)
   - Type (Retail/Commercial)
   - SKU
   - Application Rate
   - Active Ingredients
   - Technical Sheet URL
   - SDS Sheet URL

### 6. Add Resellers

1. Navigate to **Resellers → Add New**
2. Fill in reseller information:
   - Business name
   - Description
   - Phone
   - Email
   - Website
   - Address
   - Region

## Custom Post Types

### Products

Custom post type for managing agricultural products.

**Fields:**
- SKU
- Application Rate
- Active Ingredients
- Technical Sheet (PDF link)
- SDS Sheet (PDF link)

**Taxonomies:**
- Product Categories (Biologicals, Stimulants, Nutrients, etc.)
- Product Types (Retail, Commercial)

### Resellers

Custom post type for managing authorized resellers.

**Fields:**
- Phone
- Email
- Website
- Address
- Region (NSW, VIC, QLD, WA, SA, TAS, NT, ACT)

### Documents

Custom post type for managing technical documents, brochures, and guides.

**Taxonomies:**
- Document Categories (Technical Sheets, SDS Sheets, Brochures, Guidelines)

## Customization

### Theme Colors

Edit colors in `style.css`:

```css
:root {
  --color-primary: #575ECF;
  --color-bg-dark: #1b1b1b;
  --color-text: #c5c1b9;
  /* ... */
}
```

### Adding Custom CSS

Navigate to **Appearance → Customize → Additional CSS** and add your custom styles.

### JavaScript Customization

Edit `assets/js/main.js` to customize functionality.

## File Structure

```
revert-theme/
├── assets/
│   ├── css/
│   │   └── custom.css
│   ├── js/
│   │   └── main.js
│   └── images/
├── inc/
│   ├── custom-post-types.php
│   ├── custom-taxonomies.php
│   ├── template-functions.php
│   └── ajax-handlers.php
├── template-parts/
│   ├── content-product-card.php
│   ├── content-post-card.php
│   ├── content-single.php
│   └── content-none.php
├── templates/
├── archive-product.php
├── archive-reseller.php
├── footer.php
├── front-page.php
├── functions.php
├── header.php
├── index.php
├── single.php
├── single-product.php
├── style.css
└── README.md
```

## GitHub Management

### Version Control Workflow

1. **Clone the repository:**
   ```bash
   git clone https://github.com/yourusername/revert-theme.git
   ```

2. **Create a feature branch:**
   ```bash
   git checkout -b feature/your-feature-name
   ```

3. **Make changes and commit:**
   ```bash
   git add .
   git commit -m "Description of changes"
   ```

4. **Push to GitHub:**
   ```bash
   git push origin feature/your-feature-name
   ```

5. **Create a Pull Request** on GitHub

6. **Merge to main** after review

### Deployment

#### Manual Deployment
```bash
# On your server
cd /path/to/wordpress/wp-content/themes/revert-theme
git pull origin main
```

#### Automated Deployment

Set up GitHub Actions or a deployment hook to automatically pull changes when you push to the main branch.

## AJAX Features

### Product Filtering

Products can be filtered by:
- Category
- Type (Retail/Commercial)
- Search query

### Reseller Filtering

Resellers can be filtered by:
- Region
- Search query

### Newsletter Signup

AJAX-powered newsletter signup form with email validation.

### Contact Form

AJAX-powered contact form with spam protection.

## Performance Optimization

- Minified CSS and JavaScript
- Lazy loading images
- Optimized database queries
- Caching-ready
- CDN-compatible

## Security Features

- Nonce verification on all AJAX requests
- Input sanitization and validation
- XSS protection
- SQL injection prevention
- CSRF protection
- XML-RPC disabled
- WordPress version hidden

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Support

For support, please contact:
- Email: support@yourcompany.com
- Website: https://yourwebsite.com

## Changelog

### Version 1.0.0
- Initial release
- Custom product catalog
- Reseller locator
- Document management
- Blog system
- Newsletter integration
- Contact form

## License

This theme is licensed under the GPL v2 or later.

## Credits

- Theme developed for ReVert
- Built with WordPress best practices
- Modern CSS Grid and Flexbox layout
- jQuery for enhanced interactivity

## Development

### Setup Development Environment

```bash
# Clone the repository
git clone https://github.com/yourusername/revert-theme.git

# Navigate to theme directory
cd revert-theme

# If using build tools (optional)
npm install
npm run dev
```

### Build for Production

```bash
npm run build
```

## Contributing

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Create a Pull Request

## Future Enhancements

- [ ] WooCommerce integration
- [ ] Advanced product filtering
- [ ] User account system
- [ ] Product comparison feature
- [ ] Multi-language support (WPML)
- [ ] Enhanced SEO features
- [ ] Analytics integration

---

**Version:** 1.0.0
**Last Updated:** 2024
**Author:** Your Name
