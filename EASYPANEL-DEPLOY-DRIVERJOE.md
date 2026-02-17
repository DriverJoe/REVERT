# Deploy ReVert Theme to Easypanel
## For GitHub User: DriverJoe

---

## 🚀 Quick Deploy Guide

### Your GitHub Repository:
**URL:** `https://github.com/DriverJoe/revert-theme`

---

## Step 1: Push to GitHub (Do This First)

### Easy Method - Run the script:

```bash
cd /Users/joe/Desktop/REVERT
./PUSH-NOW.sh
```

This will:
1. Guide you to create the repository on GitHub
2. Push your theme automatically
3. Give you the clone URL

### Manual Method:

```bash
cd /Users/joe/Desktop/REVERT/revert-theme

# Add remote
git remote add origin https://github.com/DriverJoe/revert-theme.git

# Push
git push -u origin main
```

---

## Step 2: Deploy to Easypanel WordPress

### A. Access your Easypanel WordPress container

In Easypanel:
- Find your WordPress service
- Click **Terminal** or use **SSH**

### B. Clone the theme from GitHub

```bash
# Navigate to themes directory
cd /var/www/html/wp-content/themes/

# Clone your theme
git clone https://github.com/DriverJoe/revert-theme.git

# Set proper permissions
chown -R www-data:www-data revert-theme
chmod -R 755 revert-theme
```

### C. Activate in WordPress

1. Log in to WordPress admin
2. Go to: **Appearance → Themes**
3. Find: **ReVert**
4. Click: **Activate**

**Done! Your theme is live!** 🎉

---

## Step 3: Making Updates

### When you edit the theme locally:

```bash
cd /Users/joe/Desktop/REVERT/revert-theme

# Make your edits...

# Commit and push
git add .
git commit -m "Updated hero section"
git push
```

### Update on Easypanel:

```bash
# In Easypanel WordPress terminal
cd /var/www/html/wp-content/themes/revert-theme
git pull
```

**Changes are live!** ✅

---

## 🔧 Create Update Script (Optional)

Make updates even easier:

```bash
# In Easypanel, create this script:
cat > /usr/local/bin/update-theme << 'EOF'
#!/bin/bash
cd /var/www/html/wp-content/themes/revert-theme
git pull origin main
chown -R www-data:www-data .
echo "✓ Theme updated!"
EOF

chmod +x /usr/local/bin/update-theme
```

Now just run: `update-theme` to update! 🚀

---

## 🤖 Auto-Deploy (Advanced)

Want automatic deployment when you push to GitHub?

### 1. In your theme, rename the workflow file:

```bash
cd /Users/joe/Desktop/REVERT/revert-theme
mv .github/workflows/deploy.yml.example .github/workflows/deploy.yml
```

### 2. Edit `.github/workflows/deploy.yml`:

Already configured! Just add your server secrets to GitHub.

### 3. Add secrets to GitHub:

Go to: `https://github.com/DriverJoe/revert-theme/settings/secrets/actions`

Add these secrets:
- `SERVER_HOST` - Your Easypanel server IP or domain
- `SERVER_USER` - Usually `root` or your SSH user
- `SSH_PRIVATE_KEY` - Your SSH private key

### 4. Push the workflow:

```bash
git add .github/workflows/deploy.yml
git commit -m "Enable auto-deployment"
git push
```

**Now every push auto-deploys!** 🎉

---

## 📋 Your URLs

| Item | URL |
|------|-----|
| **GitHub Repo** | https://github.com/DriverJoe/revert-theme |
| **Clone URL (HTTPS)** | https://github.com/DriverJoe/revert-theme.git |
| **Clone URL (SSH)** | git@github.com:DriverJoe/revert-theme.git |

---

## 🎯 Quick Reference Commands

### First time setup:
```bash
# On Easypanel
cd /var/www/html/wp-content/themes/
git clone https://github.com/DriverJoe/revert-theme.git
chown -R www-data:www-data revert-theme
```

### Daily updates:
```bash
# On your computer
git add .
git commit -m "Changes"
git push

# On Easypanel
cd /var/www/html/wp-content/themes/revert-theme
git pull
```

---

## ✅ Checklist

- [ ] Create repository on GitHub: https://github.com/new
- [ ] Run `./PUSH-NOW.sh` to push theme
- [ ] Deploy WordPress on Easypanel
- [ ] SSH into Easypanel WordPress container
- [ ] Clone theme: `git clone https://github.com/DriverJoe/revert-theme.git`
- [ ] Set permissions
- [ ] Activate theme in WordPress admin
- [ ] Test the site!
- [ ] Configure menus and pages
- [ ] Add products and resellers

---

## 🚨 Troubleshooting

### "Permission denied" on git push
You need to authenticate with GitHub:
```bash
# Use GitHub CLI (recommended)
gh auth login

# Or use SSH key instead of HTTPS
git remote set-url origin git@github.com:DriverJoe/revert-theme.git
```

### "Repository not found"
- Make sure you created the repo on GitHub first
- Check the repository name is exactly: `revert-theme`

### Can't clone on Easypanel
- Check if it's a private repo (need authentication)
- Use HTTPS URL for public repos
- Use SSH URL + deploy key for private repos

---

**Ready to deploy?** 🚀

1. Run: `./PUSH-NOW.sh`
2. Deploy to Easypanel
3. Activate theme
4. Enjoy! 🎉
