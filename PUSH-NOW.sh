#!/bin/bash

# ReVert Theme - Push to GitHub
# For user: DriverJoe

# Color codes
GREEN='\033[0;32m'
BLUE='\033[0;34m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m'

clear
echo ""
echo -e "${BLUE}╔════════════════════════════════════════╗${NC}"
echo -e "${BLUE}║   Push ReVert Theme to GitHub         ║${NC}"
echo -e "${BLUE}║   User: DriverJoe                      ║${NC}"
echo -e "${BLUE}╚════════════════════════════════════════╝${NC}"
echo ""

cd /Users/joe/Desktop/REVERT/revert-theme

# Check git status
if [ ! -d ".git" ]; then
    echo -e "${RED}Error: Not a git repository${NC}"
    exit 1
fi

echo -e "${YELLOW}Repository will be:${NC}"
echo "  https://github.com/DriverJoe/revert-theme"
echo ""
echo -e "${YELLOW}First, create the repository on GitHub:${NC}"
echo "  1. Go to: https://github.com/new"
echo "  2. Repository name: ${GREEN}revert-theme${NC}"
echo "  3. Description: ${GREEN}Custom WordPress theme for ReVert - Agricultural biologicals${NC}"
echo "  4. Choose Public or Private"
echo "  5. ${RED}DO NOT${NC} add README, .gitignore, or license"
echo "  6. Click: Create repository"
echo ""
read -p "Press Enter when you've created the repository..."

echo ""
echo -e "${YELLOW}Adding GitHub remote...${NC}"

# Remove old remote if exists
git remote remove origin 2>/dev/null

# Add new remote
git remote add origin https://github.com/DriverJoe/revert-theme.git

echo -e "${GREEN}✓ Remote added${NC}"
echo ""

# Check for uncommitted changes
if ! git diff-index --quiet HEAD --; then
    echo -e "${YELLOW}Committing latest changes...${NC}"
    git add .
    git commit -m "Final update before initial GitHub push"
fi

echo -e "${YELLOW}Pushing to GitHub...${NC}"
echo ""

# Push to GitHub
if git push -u origin main; then
    echo ""
    echo -e "${GREEN}╔════════════════════════════════════════╗${NC}"
    echo -e "${GREEN}║          🎉 SUCCESS! 🎉                ║${NC}"
    echo -e "${GREEN}╚════════════════════════════════════════╝${NC}"
    echo ""
    echo -e "${GREEN}Your theme is now live on GitHub!${NC}"
    echo ""
    echo -e "${BLUE}Repository URL:${NC}"
    echo "  https://github.com/DriverJoe/revert-theme"
    echo ""
    echo -e "${BLUE}Clone URL (for Easypanel):${NC}"
    echo "  https://github.com/DriverJoe/revert-theme.git"
    echo ""
    echo -e "${BLUE}SSH URL (alternative):${NC}"
    echo "  git@github.com:DriverJoe/revert-theme.git"
    echo ""
    echo -e "${YELLOW}Next Steps:${NC}"
    echo "  1. Visit: https://github.com/DriverJoe/revert-theme"
    echo "  2. Add description and topics on GitHub"
    echo "  3. Deploy to Easypanel WordPress"
    echo ""
    echo -e "${BLUE}To deploy on Easypanel:${NC}"
    echo "  cd /var/www/html/wp-content/themes/"
    echo "  git clone https://github.com/DriverJoe/revert-theme.git"
    echo "  chown -R www-data:www-data revert-theme"
    echo ""
else
    echo ""
    echo -e "${RED}Push failed!${NC}"
    echo ""
    echo "This is likely because:"
    echo "  1. Repository doesn't exist on GitHub yet"
    echo "  2. You need to authenticate with GitHub"
    echo ""
    echo "Try:"
    echo "  1. Make sure you created the repository at:"
    echo "     https://github.com/new"
    echo "  2. If using HTTPS, you may need a Personal Access Token"
    echo "  3. Run: gh auth login (if you have GitHub CLI)"
    echo ""
    exit 1
fi
