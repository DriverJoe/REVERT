#!/bin/bash

# Color codes
GREEN='\033[0;32m'
BLUE='\033[0;34m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

echo ""
echo -e "${BLUE}Stopping WordPress environment...${NC}"
echo ""

cd /Users/joe/Desktop/REVERT

docker-compose down

echo ""
echo -e "${GREEN}✓ WordPress stopped${NC}"
echo ""
echo -e "${YELLOW}To start again, run:${NC} ./launch-local.sh"
echo ""
