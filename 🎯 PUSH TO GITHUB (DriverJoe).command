#!/bin/bash

cd /Users/joe/Desktop/REVERT

# Color codes
GREEN='\033[0;32m'
BLUE='\033[0;34m'
YELLOW='\033[1;33m'
NC='\033[0m'

clear
echo ""
echo -e "${BLUE}╔════════════════════════════════════════╗${NC}"
echo -e "${BLUE}║   ReVert Theme → GitHub                ║${NC}"
echo -e "${BLUE}║   User: DriverJoe                      ║${NC}"
echo -e "${BLUE}╚════════════════════════════════════════╝${NC}"
echo ""
echo -e "${GREEN}Ready to push your theme to GitHub!${NC}"
echo ""
echo -e "${YELLOW}Your repository will be:${NC}"
echo "  📦 https://github.com/DriverJoe/revert-theme"
echo ""
echo -e "${YELLOW}Press 'g' to open GitHub and create repository${NC}"
echo -e "${YELLOW}Press 'p' to push (after creating repository)${NC}"
echo -e "${YELLOW}Press 'q' to quit${NC}"
echo ""
read -n 1 -s choice

if [ "$choice" = "g" ] || [ "$choice" = "G" ]; then
    echo ""
    echo "Opening GitHub in browser..."
    echo ""
    echo "Create a new repository with these settings:"
    echo "  • Name: ${GREEN}revert-theme${NC}"
    echo "  • Description: ${GREEN}Custom WordPress theme for ReVert${NC}"
    echo "  • Public or Private (your choice)"
    echo "  • ${YELLOW}DO NOT${NC} add README, .gitignore, or license"
    echo ""
    open "https://github.com/new"
    echo ""
    echo "After creating the repository, run this script again and press 'p'"
    echo ""
elif [ "$choice" = "p" ] || [ "$choice" = "P" ]; then
    echo ""
    echo "Running push script..."
    echo ""
    ./PUSH-NOW.sh
else
    echo ""
    echo "Cancelled."
fi

echo ""
read -p "Press Enter to close..."
