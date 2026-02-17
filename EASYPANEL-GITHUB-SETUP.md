# Easypanel WordPress + GitHub Theme Setup

## 🎯 How It Works

With Easypanel, you'll have the best of both worlds:
- ✅ WordPress runs as a managed service
- ✅ Theme syncs from GitHub automatically
- ✅ Edit code locally, push to GitHub, auto-updates live site

---

## 🚀 Recommended Setup (Best Practice)

### Architecture:
```
Your Computer (edit code)
    ↓ git push
GitHub Repository
    ↓ auto-sync
Easypanel WordPress (live theme)
```

---

## 📋 Step-by-Step Setup

### Step 1: Push Theme to GitHub (Do This First)

```bash
# Navigate to theme directory
cd /Users/joe/Desktop/REVERT/revert-theme

# Initialize git (if not done)
git init

# Add all files
git add .

# Commit
git commit -m "Initial commit - ReVert WordPress theme"

# Create repo on GitHub (go to github.com)
# Then connect it:
git remote add origin https://github.com/YOUR-USERNAME/revert-theme.git
git branch -M main
git push -u origin main
```

✅ **Your theme is now on GitHub!**

---

### Step 2: Deploy WordPress on Easypanel

In Easypanel:

1. **Create a new service**
   - Choose: **WordPress** from templates
   - Or use custom Docker setup

2. **Configure volumes**
   - Easypanel will create volumes for WordPress files
   - Note the path to `/var/www/html/wp-content/themes/`

---

### Step 3: Connect GitHub Theme to WordPress

**Three Options:**

---

## ✅ **OPTION A: Git Clone on Deploy (Recommended)**

### Set this up once:

1. **SSH into your Easypanel WordPress container**
   ```bash
   # From Easypanel, get SSH/exec access to WordPress container
   # Or use Easypanel terminal
   ```

2. **Navigate to themes directory**
   ```bash
   cd /var/www/html/wp-content/themes/
   ```

3. **Clone your GitHub repo**
   ```bash
   git clone https://github.com/YOUR-USERNAME/revert-theme.git
   ```

4. **Set permissions**
   ```bash
   chown -R www-data:www-data revert-theme
   chmod -R 755 revert-theme
   ```

5. **Activate in WordPress admin**
   - Go to: Appearance → Themes
   - Activate: ReVert theme

### Update theme when you make changes:

```bash
# SSH into container
cd /var/www/html/wp-content/themes/revert-theme
git pull origin main
```

**🎯 Pro Tip:** Set up a webhook to auto-pull on git push!

---

## ✅ **OPTION B: GitHub Volume Mount (Best for Development)**

In Easypanel, when creating WordPress service:

### Add a volume mount:
```yaml
volumes:
  - type: volume
    source: wordpress_data
    target: /var/www/html
  - type: bind
    source: github-repo-path  # Path to cloned repo on server
    target: /var/www/html/wp-content/themes/revert-theme
```

This way, your theme stays in sync with GitHub!

---

## ✅ **OPTION C: Automated Deployment Script**

Create a deployment hook in Easypanel:

1. **Create a deploy script:**

```bash
#!/bin/bash
# /opt/deploy-revert-theme.sh

cd /var/www/html/wp-content/themes/revert-theme
git pull origin main
chown -R www-data:www-data .
chmod -R 755 .
```

2. **Add GitHub webhook:**
   - In GitHub repo → Settings → Webhooks
   - Payload URL: `https://your-easypanel.com/webhook/deploy-theme`
   - Trigger: Push events

3. **On push, theme auto-updates!** 🎉

---

## 🎨 **Complete Workflow Example**

### Initial Setup (Once):

```bash
# 1. Push theme to GitHub
cd /Users/joe/Desktop/REVERT/revert-theme
git init
git add .
git commit -m "Initial commit"
git remote add origin https://github.com/YOUR-USERNAME/revert-theme.git
git push -u origin main

# 2. In Easypanel WordPress container
cd /var/www/html/wp-content/themes/
git clone https://github.com/YOUR-USERNAME/revert-theme.git
chown -R www-data:www-data revert-theme

# 3. Activate in WordPress admin
# Appearance → Themes → ReVert → Activate
```

### Daily Workflow:

```bash
# On your computer
cd /Users/joe/Desktop/REVERT/revert-theme

# Make changes to theme files
# Edit style.css, functions.php, etc.

# Commit and push
git add .
git commit -m "Updated hero section styling"
git push

# On server (manual update)
# SSH into Easypanel WordPress container
cd /var/www/html/wp-content/themes/revert-theme
git pull

# Done! Changes are live!
```

---

## 🤖 **Auto-Deploy Setup (Advanced)**

### Create webhook endpoint in Easypanel:

```bash
# Create webhook script
#!/bin/bash
# /opt/scripts/update-theme.sh

cd /var/www/html/wp-content/themes/revert-theme
git pull origin main
chown -R www-data:www-data .

# Clear WordPress cache (if using cache plugin)
wp cache flush --allow-root
```

### Add to GitHub:
- Repo → Settings → Webhooks → Add webhook
- URL: Your webhook endpoint
- Events: Just push events

**Now every time you push to GitHub, theme auto-updates!** 🚀

---

## 📦 **Easypanel-Specific Configuration**

### Docker Compose for Easypanel:

```yaml
version: '3.8'

services:
  wordpress:
    image: wordpress:latest
    volumes:
      - wordpress_data:/var/www/html
      - theme_repo:/var/www/html/wp-content/themes/revert-theme
    environment:
      WORDPRESS_DB_HOST: ${DB_HOST}
      WORDPRESS_DB_NAME: ${DB_NAME}
      WORDPRESS_DB_USER: ${DB_USER}
      WORDPRESS_DB_PASSWORD: ${DB_PASSWORD}

  theme-sync:
    image: alpine/git
    volumes:
      - theme_repo:/git/revert-theme
    command: >
      sh -c "cd /git/revert-theme &&
             git clone https://github.com/YOUR-USERNAME/revert-theme.git . ||
             git pull origin main"
    restart: "no"

volumes:
  wordpress_data:
  theme_repo:
```

---

## 🎯 **Recommended Quick Start**

### For You Right Now:

1. **Push to GitHub:**
   ```bash
   cd /Users/joe/Desktop/REVERT/revert-theme
   git init
   git add .
   git commit -m "Initial commit"
   # Create repo on GitHub, then:
   git remote add origin https://github.com/YOUR-USERNAME/revert-theme.git
   git push -u origin main
   ```

2. **Deploy WordPress on Easypanel:**
   - Use WordPress template
   - Note the container name

3. **SSH into Easypanel WordPress:**
   ```bash
   cd /var/www/html/wp-content/themes/
   git clone https://github.com/YOUR-USERNAME/revert-theme.git
   chown -R www-data:www-data revert-theme
   ```

4. **Activate theme in WordPress admin**

5. **When you make changes:**
   ```bash
   # On your computer
   git add .
   git commit -m "Changes"
   git push

   # On server
   git pull
   ```

---

## ⚡ **Super Simple Alternative**

If you don't want to deal with git on the server:

1. **Push theme to GitHub** (for version control)
2. **Upload ZIP to WordPress** (via admin)
3. **Update by re-uploading ZIP when needed**

Less "professional" but works fine for small projects!

---

## 🔐 **Security Note**

For private repos, use deploy keys:

```bash
# On Easypanel server
ssh-keygen -t ed25519 -C "easypanel-deploy"
cat ~/.ssh/id_ed25519.pub
# Add this key to GitHub repo → Settings → Deploy Keys
```

---

## ❓ **Which Method Should You Use?**

**For Development/Testing:**
- Use Option A (git clone + manual pull)
- Simple, works great

**For Production/Client Sites:**
- Use Option C (automated deployment)
- Professional, hands-off updates

**For Quick Demo:**
- Just upload ZIP via WordPress admin
- Fast, no git needed

---

## 🎉 **Summary**

**Yes, the GitHub workflow works perfectly with Easypanel!**

1. Push theme to GitHub
2. Clone into WordPress themes directory
3. Pull updates when you push changes

**Want me to help you set this up?**

I can:
- Help you push to GitHub
- Create the deploy script
- Set up webhooks

Just let me know! 🚀
