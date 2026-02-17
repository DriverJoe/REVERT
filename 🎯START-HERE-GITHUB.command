#!/bin/bash

cd "$(dirname "$0")"

# Color codes
GREEN='\033[0;32m'
BLUE='\033[0;34m'
YELLOW='\033[1;33m'
NC='\033[0m'

clear
echo ""
echo -e "${BLUE}╔════════════════════════════════════════╗${NC}"
echo -e "${BLUE}║   ReVert Theme - GitHub Publisher     ║${NC}"
echo -e "${BLUE}╚════════════════════════════════════════╝${NC}"
echo ""
echo -e "${GREEN}Your theme is ready to publish to GitHub!${NC}"
echo ""
echo -e "${YELLOW}Step 1: Create GitHub Repository${NC}"
echo "  → Go to: https://github.com/new"
echo "  → Repository name: revert-theme"
echo "  → DO NOT add README, .gitignore, or license"
echo "  → Click: Create repository"
echo ""
echo -e "${YELLOW}Step 2: Copy your repository URL${NC}"
echo "  → Example: https://github.com/YOUR-USERNAME/revert-theme.git"
echo ""
echo -e "${YELLOW}Step 3: Run the push script${NC}"
echo "  → Open Terminal in: /Users/joe/Desktop/REVERT/revert-theme"
echo "  → Run: ./push-to-github.sh"
echo "  → Paste your repository URL when asked"
echo ""
echo -e "${GREEN}That's it! Your theme will be live on GitHub!${NC}"
echo ""
echo -e "${BLUE}Documentation:${NC}"
echo "  → Full guide: 📦 READY-TO-PUBLISH.md"
echo "  → Detailed steps: PUSH-TO-GITHUB.md"
echo ""
echo "Press 'o' to open GitHub in browser, or Enter to close..."
read -n 1 -s choice

if [ "$choice" = "o" ] || [ "$choice" = "O" ]; then
    open "https://github.com/new"
fi
