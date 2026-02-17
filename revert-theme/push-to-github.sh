#!/bin/bash

# ReVert Theme - Push to GitHub Script
# This script will help you push your theme to GitHub

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
echo -e "${BLUE}╚════════════════════════════════════════╝${NC}"
echo ""

# Check if we're in the right directory
if [ ! -f "style.css" ]; then
    echo -e "${RED}Error: Not in theme directory${NC}"
    echo "Please run this script from the revert-theme directory"
    exit 1
fi

# Check if git is initialized
if [ ! -d ".git" ]; then
    echo -e "${RED}Error: Git not initialized${NC}"
    exit 1
fi

# Check if remote already exists
if git remote -v | grep -q "origin"; then
    echo -e "${GREEN}✓ Remote 'origin' already configured${NC}"
    echo ""
    git remote -v
    echo ""
    echo -e "${YELLOW}Do you want to push to existing remote? (y/n)${NC}"
    read -p "> " confirm
    if [ "$confirm" != "y" ]; then
        echo "Cancelled."
        exit 0
    fi
else
    echo -e "${YELLOW}No remote configured yet.${NC}"
    echo ""
    echo "Please enter your GitHub repository URL:"
    echo "Example: https://github.com/yourusername/revert-theme.git"
    echo "        or git@github.com:yourusername/revert-theme.git"
    echo ""
    read -p "Repository URL: " repo_url

    if [ -z "$repo_url" ]; then
        echo -e "${RED}No URL provided. Cancelled.${NC}"
        exit 1
    fi

    echo ""
    echo -e "${YELLOW}Adding remote 'origin'...${NC}"
    git remote add origin "$repo_url"
    echo -e "${GREEN}✓ Remote added${NC}"
fi

echo ""
echo -e "${YELLOW}Checking for uncommitted changes...${NC}"

if ! git diff-index --quiet HEAD --; then
    echo -e "${YELLOW}⚠ You have uncommitted changes${NC}"
    echo ""
    git status --short
    echo ""
    echo -e "${YELLOW}Do you want to commit these changes? (y/n)${NC}"
    read -p "> " commit_confirm

    if [ "$commit_confirm" = "y" ]; then
        echo ""
        echo "Enter commit message:"
        read -p "> " commit_msg

        if [ -z "$commit_msg" ]; then
            commit_msg="Update theme files"
        fi

        git add .
        git commit -m "$commit_msg"
        echo -e "${GREEN}✓ Changes committed${NC}"
    fi
fi

echo ""
echo -e "${YELLOW}Pushing to GitHub...${NC}"
echo ""

# Try to push
if git push -u origin main; then
    echo ""
    echo -e "${GREEN}╔════════════════════════════════════════╗${NC}"
    echo -e "${GREEN}║        🎉 SUCCESS! 🎉                 ║${NC}"
    echo -e "${GREEN}╚════════════════════════════════════════╝${NC}"
    echo ""
    echo -e "${GREEN}Your theme has been pushed to GitHub!${NC}"
    echo ""

    # Try to extract repo URL and show it
    repo_url=$(git remote get-url origin)
    if [[ $repo_url == git@* ]]; then
        # Convert SSH to HTTPS for display
        repo_url=$(echo $repo_url | sed 's/git@github.com:/https:\/\/github.com\//' | sed 's/\.git$//')
    else
        repo_url=$(echo $repo_url | sed 's/\.git$//')
    fi

    echo -e "${BLUE}View your repository:${NC}"
    echo "$repo_url"
    echo ""
else
    echo ""
    echo -e "${RED}Push failed!${NC}"
    echo ""
    echo "Common solutions:"
    echo "1. Make sure the repository exists on GitHub"
    echo "2. Check your GitHub credentials"
    echo "3. If using SSH, make sure your SSH key is added to GitHub"
    echo "4. Try: git pull origin main --rebase"
    echo "   Then run this script again"
    echo ""
    exit 1
fi
