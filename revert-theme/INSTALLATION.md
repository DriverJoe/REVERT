# ReVert Theme - Installation Guide

## Quick Start Guide

This guide will walk you through installing and setting up the ReVert WordPress theme.

## Prerequisites

Before you begin, ensure you have:

- ✅ WordPress 5.9 or higher installed
- ✅ PHP 7.4 or higher
- ✅ MySQL 5.7 or higher
- ✅ FTP/SFTP access or cPanel access to your server
- ✅ Administrator access to WordPress

## Installation Methods

### Method 1: Upload via WordPress Admin (Recommended for Beginners)

1. **Prepare the theme file:**
   - Download the theme folder
   - Compress it into a ZIP file named `revert-theme.zip`

2. **Upload to WordPress:**
   - Log in to your WordPress admin panel (`yoursite.com/wp-admin`)
   - Navigate to **Appearance → Themes**
   - Click **Add New** at the top
   - Click **Upload Theme** button
   - Click **Choose File** and select `revert-theme.zip`
   - Click **Install Now**

3. **Activate the theme:**
   - Once installed, click **Activate**
   - Your theme is now live!

### Method 2: FTP/SFTP Upload

1. **Connect to your server:**
   - Use an FTP client (FileZilla, Cyberduck, etc.)
   - Connect using your hosting credentials

2. **Upload the theme:**
   - Navigate to `/wp-content/themes/`
   - Upload the entire `revert-theme` folder
   - Ensure all files are transferred

3. **Activate the theme:**
   - Log in to WordPress admin
   - Go to **Appearance → Themes**
   - Find "ReVert" and click **Activate**

### Method 3: GitHub Direct Deployment (Advanced)

1. **SSH into your server:**
   ```bash
   ssh username@your-server.com
   ```

2. **Navigate to themes directory:**
   ```bash
   cd /path/to/wordpress/wp-content/themes/
   ```

3. **Clone the repository:**
   ```bash
   git clone https://github.com/yourusername/revert-theme.git
   ```

4. **Set proper permissions:**
   ```bash
   chmod 755 revert-theme
   find revert-theme -type f -exec chmod 644 {} \;
   ```

5. **Activate via WordPress admin**

## Post-Installation Setup

### Step 1: Configure Site Identity

1. Go to **Appearance → Customize → Site Identity**
2. **Site Title:** "ReVert"
3. **Tagline:** "Agricultural biologicals, stimulants, and nutrients"
4. **Upload Logo:** Upload your ReVert logo
5. Click **Publish**

### Step 2: Create Navigation Menus

1. Go to **Appearance → Menus**

2. **Create Primary Menu:**
   - Menu Name: "Primary Navigation"
   - Add pages: Home, About, Products, Resellers, Blog, Contact
   - Check "Primary Menu" under Display Location
   - Click **Save Menu**

3. **Create Footer Menu:**
   - Menu Name: "Footer Navigation"
   - Add pages: Privacy Policy, Terms of Service, Sitemap
   - Check "Footer Menu" under Display Location
   - Click **Save Menu**

4. **Create Retail Menu:**
   - Menu Name: "Retail Navigation"
   - Add retail-specific product categories
   - Check "Retail Menu" under Display Location
   - Click **Save Menu**

5. **Create Commercial Menu:**
   - Menu Name: "Commercial Navigation"
   - Add commercial-specific product categories
   - Check "Commercial Menu" under Display Location
   - Click **Save Menu**

### Step 3: Configure Reading Settings

1. Go to **Settings → Reading**
2. Under "Your homepage displays":
   - Select **A static page**
   - Homepage: Select "Home" page
   - Posts page: Select "Blog" page
3. Click **Save Changes**

### Step 4: Create Essential Pages

Create the following pages (Pages → Add New):

#### 1. Home Page
- **Title:** Home
- **Template:** Default Template
- **Content:** Add hero section content

#### 2. About Page
- **Title:** About
- **Content:** Add company information, mission, values

#### 3. Contact Page
- **Title:** Contact
- **Template:** Contact Page
- **Content:** Add contact information

#### 4. Retail Page
- **Title:** Retail
- **Content:** Information for home gardeners

#### 5. Commercial Page
- **Title:** Commercial
- **Content:** Information for commercial agriculture

#### 6. Blog Page
- **Title:** Blog
- **Content:** Leave empty (this will display blog posts)

### Step 5: Configure Widgets

1. Go to **Appearance → Widgets**

2. **Footer Widget Area 1 - Quick Links:**
   - Add Navigation Menu widget
   - Select your footer menu

3. **Footer Widget Area 2 - Products:**
   - Add Custom HTML widget
   - Add links to product categories

4. **Footer Widget Area 3 - Resources:**
   - Add Custom HTML widget
   - Add links to documents and guides

5. **Footer Widget Area 4 - Newsletter:**
   - Add Text widget
   - Add newsletter signup form

### Step 6: Add Products

1. Navigate to **Products → Add New**

2. **Example Product Entry:**
   - **Title:** BioCatalyst Plus
   - **Description:** Full product description
   - **Featured Image:** Upload product image
   - **Category:** Select "Biologicals"
   - **Type:** Select "Retail" or "Commercial"
   - **SKU:** BC-001
   - **Application Rate:** 2-5L per hectare
   - **Active Ingredients:** List ingredients
   - **Technical Sheet URL:** Link to PDF
   - **SDS Sheet URL:** Link to PDF
   - Click **Publish**

3. **Repeat for all products** (30+ products mentioned in your proposal)

### Step 7: Add Resellers

1. Navigate to **Resellers → Add New**

2. **Example Reseller Entry:**
   - **Title:** Green Thumb Supplies
   - **Description:** Authorized ReVert reseller
   - **Phone:** 02 1234 5678
   - **Email:** info@greenthumb.com.au
   - **Website:** https://greenthumb.com.au
   - **Address:** 123 Main St, Sydney NSW 2000
   - **Region:** NSW
   - Click **Publish**

3. **Repeat for all resellers**

### Step 8: Configure Permalinks

1. Go to **Settings → Permalinks**
2. Select **Post name** structure
3. **Custom structure for products:**
   - Products will appear as: `yoursite.com/products/product-name`
4. Click **Save Changes**

### Step 9: Install Recommended Plugins

Install these plugins for enhanced functionality:

1. **Contact Form 7** (alternative to built-in form)
   - Or use the built-in AJAX contact form

2. **Yoast SEO** or **Rank Math**
   - For SEO optimization

3. **Wordfence Security**
   - For additional security

4. **WP Super Cache** or **W3 Total Cache**
   - For performance optimization

5. **Mailchimp for WordPress** (optional)
   - For newsletter management
   - Or use built-in newsletter functionality

### Step 10: Theme Customization

1. Go to **Appearance → Customize**

2. **Colors (if using Customizer):**
   - Set brand colors to match ReVert branding

3. **Typography:**
   - Configure heading and body fonts

4. **Additional CSS:**
   - Add any custom CSS overrides

## GitHub Integration Setup

### Initialize Git Repository (if not already done)

```bash
cd /path/to/wordpress/wp-content/themes/revert-theme
git init
git add .
git commit -m "Initial commit - ReVert theme"
```

### Connect to GitHub

```bash
# Create a new repository on GitHub first, then:
git remote add origin https://github.com/yourusername/revert-theme.git
git branch -M main
git push -u origin main
```

### Set Up Automatic Deployments

#### Option 1: Using GitHub Webhooks

1. On your server, create a deployment script:

```bash
# /var/www/scripts/deploy-revert-theme.sh
#!/bin/bash
cd /path/to/wordpress/wp-content/themes/revert-theme
git pull origin main
```

2. Make it executable:
```bash
chmod +x /var/www/scripts/deploy-revert-theme.sh
```

3. Set up webhook in GitHub:
   - Go to repository Settings → Webhooks
   - Add webhook
   - Payload URL: Your deployment endpoint
   - Content type: application/json
   - Events: Just the push event

#### Option 2: Manual Deployment

```bash
# SSH into server
ssh user@your-server.com

# Navigate to theme directory
cd /path/to/wordpress/wp-content/themes/revert-theme

# Pull latest changes
git pull origin main

# Set permissions
chmod 755 .
find . -type f -exec chmod 644 {} \;
```

## Troubleshooting

### Theme doesn't appear in theme list
- Check file permissions (755 for directories, 644 for files)
- Ensure `style.css` has proper header comment
- Verify theme folder is directly in `/wp-content/themes/`

### Custom post types don't show
- Go to **Settings → Permalinks** and click **Save Changes**
- This flushes rewrite rules

### AJAX features not working
- Ensure jQuery is loaded
- Check browser console for JavaScript errors
- Verify AJAX URL is correct in browser console

### Images not displaying
- Check file permissions on uploads directory
- Regenerate thumbnails using plugin like "Regenerate Thumbnails"

### Menu not displaying
- Ensure menu is created and assigned to location
- Check if menu items have been added

## Security Checklist

- [ ] Change default "admin" username
- [ ] Use strong passwords
- [ ] Install security plugin (Wordfence/iThemes Security)
- [ ] Enable SSL certificate (HTTPS)
- [ ] Disable file editing in wp-config.php
- [ ] Keep WordPress and plugins updated
- [ ] Regular backups configured

## Performance Optimization

1. **Install caching plugin**
2. **Optimize images** (use TinyPNG or similar)
3. **Use CDN** (CloudFlare, etc.)
4. **Enable GZIP compression**
5. **Minify CSS/JS**
6. **Set up lazy loading for images**

## Next Steps

1. ✅ Add all products and categorize them
2. ✅ Add all resellers with location data
3. ✅ Create blog posts
4. ✅ Set up analytics (Google Analytics)
5. ✅ Configure backup system
6. ✅ Test contact forms
7. ✅ Test on mobile devices
8. ✅ Submit sitemap to Google Search Console

## Support

For issues or questions:
- **Email:** support@yourcompany.com
- **Documentation:** Check README.md
- **GitHub Issues:** https://github.com/yourusername/revert-theme/issues

## Updating the Theme

### Via GitHub (Recommended)

```bash
cd /path/to/wordpress/wp-content/themes/revert-theme
git pull origin main
```

### Via FTP

1. Backup current theme
2. Download latest version
3. Upload to server (overwrite existing files)
4. Clear cache

---

**Installation Complete!** 🎉

Your ReVert theme is now installed and ready to use. Continue customizing and adding content to match your brand.
