#!/bin/bash

# Color codes
GREEN='\033[0;32m'
BLUE='\033[0;34m'
YELLOW='\033[1;33m'
RED='\033[0;31m'
NC='\033[0m' # No Color

echo ""
echo -e "${BLUE}╔════════════════════════════════════════╗${NC}"
echo -e "${BLUE}║  ReVert WordPress - Local Launch      ║${NC}"
echo -e "${BLUE}╚════════════════════════════════════════╝${NC}"
echo ""

# Check if Docker is running
if ! docker info > /dev/null 2>&1; then
    echo -e "${RED}✗ Docker is not running!${NC}"
    echo ""
    echo "Please start Docker Desktop and try again."
    echo ""
    exit 1
fi

echo -e "${GREEN}✓ Docker is running${NC}"
echo ""

# Navigate to project directory
cd /Users/joe/Desktop/REVERT

echo -e "${YELLOW}Starting WordPress environment...${NC}"
echo ""

# Start Docker containers
docker-compose up -d

echo ""
echo -e "${YELLOW}Waiting for WordPress to be ready...${NC}"
echo ""

# Wait for WordPress to be ready
sleep 15

# Check if WordPress is responding
max_attempts=30
attempt=0
while [ $attempt -lt $max_attempts ]; do
    if curl -s http://localhost:8080 > /dev/null; then
        echo -e "${GREEN}✓ WordPress is ready!${NC}"
        break
    fi
    echo -n "."
    sleep 2
    attempt=$((attempt + 1))
done

echo ""
echo ""
echo -e "${GREEN}╔════════════════════════════════════════╗${NC}"
echo -e "${GREEN}║          🚀 LAUNCH SUCCESSFUL!         ║${NC}"
echo -e "${GREEN}╚════════════════════════════════════════╝${NC}"
echo ""
echo -e "${BLUE}WordPress Admin:${NC}"
echo "  → http://localhost:8080"
echo ""
echo -e "${BLUE}Next Steps:${NC}"
echo "  1. Open http://localhost:8080 in your browser"
echo "  2. Complete the WordPress installation wizard"
echo "     - Site Title: ReVert"
echo "     - Username: admin (or your choice)"
echo "     - Password: (create a strong password)"
echo "     - Email: your email"
echo ""
echo "  3. After installation, activate the ReVert theme:"
echo "     → Go to Appearance → Themes"
echo "     → Find 'ReVert' and click Activate"
echo ""
echo -e "${YELLOW}Useful Commands:${NC}"
echo "  Stop:    docker-compose down"
echo "  Restart: docker-compose restart"
echo "  Logs:    docker-compose logs -f wordpress"
echo ""
echo -e "${BLUE}Database Credentials (if needed):${NC}"
echo "  Database: revert_wordpress"
echo "  Username: revert_user"
echo "  Password: revert_password"
echo ""
