#!/bin/bash

cd "$(dirname "$0")"

# Color codes
GREEN='\033[0;32m'
BLUE='\033[0;34m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m'

clear

echo ""
echo -e "${BLUE}╔════════════════════════════════════════╗${NC}"
echo -e "${BLUE}║     ReVert Theme - Local Viewer       ║${NC}"
echo -e "${BLUE}╚════════════════════════════════════════╝${NC}"
echo ""

# Check if Docker is running
echo -e "${YELLOW}Checking Docker...${NC}"
if ! docker info > /dev/null 2>&1; then
    echo -e "${RED}✗ Docker is not running${NC}"
    echo ""
    echo "Starting Docker Desktop..."
    open -a Docker
    echo ""
    echo "⏳ Waiting for Docker to start (this may take 30-60 seconds)..."

    # Wait for Docker with countdown
    max_wait=60
    elapsed=0
    while [ $elapsed -lt $max_wait ]; do
        if docker info > /dev/null 2>&1; then
            echo ""
            echo -e "${GREEN}✓ Docker is ready!${NC}"
            break
        fi
        printf "."
        sleep 2
        elapsed=$((elapsed + 2))
    done

    if ! docker info > /dev/null 2>&1; then
        echo ""
        echo -e "${RED}Docker is taking longer than expected.${NC}"
        echo "Please wait for Docker to fully start, then double-click this file again."
        echo ""
        read -p "Press Enter to exit..."
        exit 1
    fi
else
    echo -e "${GREEN}✓ Docker is running${NC}"
fi

echo ""
echo -e "${YELLOW}Starting WordPress...${NC}"
echo ""

# Start containers
docker-compose up -d

echo ""
echo -e "${YELLOW}Waiting for WordPress to be ready...${NC}"
sleep 15

# Wait for WordPress
max_attempts=30
attempt=0
while [ $attempt -lt $max_attempts ]; do
    if curl -s http://localhost:8080 > /dev/null 2>&1; then
        break
    fi
    printf "."
    sleep 2
    attempt=$((attempt + 1))
done

echo ""
echo ""
echo -e "${GREEN}╔════════════════════════════════════════╗${NC}"
echo -e "${GREEN}║       ✓ WORDPRESS IS READY! ✓         ║${NC}"
echo -e "${GREEN}╚════════════════════════════════════════╝${NC}"
echo ""
echo -e "${BLUE}Opening WordPress in your browser...${NC}"
echo ""

# Open browser
sleep 2
open http://localhost:8080

echo ""
echo -e "${GREEN}WordPress is running at:${NC} http://localhost:8080"
echo ""
echo -e "${YELLOW}First Time Setup:${NC}"
echo "  1. Complete WordPress installation"
echo "  2. Go to Appearance → Themes"
echo "  3. Activate 'ReVert' theme"
echo ""
echo -e "${YELLOW}To stop WordPress:${NC}"
echo "  Double-click: 🛑 STOP WORDPRESS.command"
echo ""
echo -e "${BLUE}This window will stay open. You can close it after setup.${NC}"
echo ""
read -p "Press Enter to close this window..."
