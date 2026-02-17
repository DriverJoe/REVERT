#!/bin/bash

# ReVert Theme Update Script for Easypanel
# Run this inside your WordPress container

echo "=========================================="
echo "  ReVert Theme Update Script"
echo "=========================================="
echo ""

# Navigate to theme directory
cd /var/www/html/wp-content/themes/revert-theme

# Add safe directory (fix git permissions)
git config --global --add safe.directory /var/www/html/wp-content/themes/revert-theme

# Pull latest changes
echo "Pulling latest changes from GitHub..."
git pull origin main

# Fix permissions
echo "Setting correct permissions..."
chown -R www-data:www-data .
chmod -R 755 .

echo ""
echo "=========================================="
echo "✓ Theme updated successfully!"
echo "=========================================="
echo ""
echo "Refresh your WordPress site to see changes!"
echo ""
