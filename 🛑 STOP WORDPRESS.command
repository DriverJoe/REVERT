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
echo -e "${BLUE}║        Stopping WordPress...           ║${NC}"
echo -e "${BLUE}╚════════════════════════════════════════╝${NC}"
echo ""

docker-compose down

echo ""
echo -e "${GREEN}✓ WordPress stopped successfully${NC}"
echo ""
echo -e "${YELLOW}To start again:${NC}"
echo "  Double-click: 🚀 LAUNCH WORDPRESS.command"
echo ""
read -p "Press Enter to close..."
