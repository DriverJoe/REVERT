#!/bin/bash

echo "========================================="
echo "ReVert WordPress Theme - Quick Start"
echo "========================================="
echo ""

# Color codes
GREEN='\033[0;32m'
BLUE='\033[0;34m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

echo -e "${BLUE}Choose your deployment method:${NC}"
echo ""
echo "1) Create ZIP file for WordPress upload"
echo "2) Initialize Git repository for GitHub"
echo "3) Show theme information"
echo "4) Exit"
echo ""
read -p "Enter your choice (1-4): " choice

case $choice in
    1)
        echo ""
        echo -e "${YELLOW}Creating ZIP file...${NC}"
        cd /Users/joe/Desktop/REVERT
        zip -r revert-theme.zip revert-theme/ -x "*.DS_Store" "*/node_modules/*"
        echo ""
        echo -e "${GREEN}✓ ZIP file created: revert-theme.zip${NC}"
        echo ""
        echo "Next steps:"
        echo "1. Log in to your WordPress admin"
        echo "2. Go to Appearance → Themes → Add New"
        echo "3. Click 'Upload Theme'"
        echo "4. Upload revert-theme.zip"
        echo "5. Activate the theme"
        echo ""
        ;;
    2)
        echo ""
        echo -e "${YELLOW}Initializing Git repository...${NC}"
        cd /Users/joe/Desktop/REVERT/revert-theme
        
        if [ -d .git ]; then
            echo -e "${YELLOW}Git repository already exists!${NC}"
        else
            git init
            git add .
            git commit -m "Initial commit - ReVert WordPress theme v1.0.0"
            echo ""
            echo -e "${GREEN}✓ Git repository initialized${NC}"
        fi
        
        echo ""
        echo "Next steps:"
        echo "1. Create a new repository on GitHub"
        echo "2. Run these commands:"
        echo ""
        echo "   cd /Users/joe/Desktop/REVERT/revert-theme"
        echo "   git remote add origin https://github.com/YOUR-USERNAME/revert-theme.git"
        echo "   git branch -M main"
        echo "   git push -u origin main"
        echo ""
        ;;
    3)
        echo ""
        echo -e "${BLUE}Theme Information:${NC}"
        echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
        echo "Theme Name: ReVert"
        echo "Version: 1.0.0"
        echo "Type: Custom WordPress Theme"
        echo "Location: /Users/joe/Desktop/REVERT/revert-theme/"
        echo ""
        echo -e "${BLUE}Features:${NC}"
        echo "✓ Custom Product Catalog"
        echo "✓ Reseller Locator"
        echo "✓ Document Management"
        echo "✓ AJAX Filtering"
        echo "✓ Newsletter Integration"
        echo "✓ Contact Forms"
        echo "✓ Dark Modern Design"
        echo "✓ Mobile Responsive"
        echo "✓ GitHub Ready"
        echo ""
        echo -e "${BLUE}Files Created:${NC}"
        cd /Users/joe/Desktop/REVERT/revert-theme
        find . -type f \( -name "*.php" -o -name "*.css" -o -name "*.js" -o -name "*.md" \) | wc -l | xargs echo "Total files:"
        echo ""
        echo -e "${BLUE}Documentation:${NC}"
        echo "→ README.md - Full theme documentation"
        echo "→ INSTALLATION.md - Installation guide"
        echo "→ THEME-SUMMARY.md - Project summary"
        echo ""
        ;;
    4)
        echo ""
        echo "Goodbye!"
        exit 0
        ;;
    *)
        echo ""
        echo -e "${YELLOW}Invalid choice. Please run the script again.${NC}"
        exit 1
        ;;
esac

echo "========================================="
