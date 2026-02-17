# Deploy ReVert Theme Without Git

## 🚀 Quick Solutions (Choose One)

---

## ✅ Option 1: Install Git in Container (RECOMMENDED)

Since you're already in the container as root:

```bash
# Install git
apt-get update && apt-get install -y git

# Now clone your theme
cd /var/www/html/wp-content/themes/
git clone https://github.com/DriverJoe/revert-theme.git

# Set permissions
chown -R www-data:www-data revert-theme
chmod -R 755 revert-theme
```

**Done!** ✅

---

## ✅ Option 2: Download ZIP from GitHub (NO GIT NEEDED)

```bash
# Still in container as root
cd /var/www/html/wp-content/themes/

# Download theme as ZIP from GitHub
curl -L https://github.com/DriverJoe/revert-theme/archive/refs/heads/main.zip -o revert-theme.zip

# Install unzip if needed
apt-get update && apt-get install -y unzip

# Unzip the theme
unzip revert-theme.zip

# GitHub adds -main to folder name, so rename it
mv revert-theme-main revert-theme

# Set permissions
chown -R www-data:www-data revert-theme
chmod -R 755 revert-theme

# Clean up
rm revert-theme.zip
```

**Done!** ✅

---

## ✅ Option 3: Upload via WordPress Admin (EASIEST)

Since git isn't available, just use WordPress:

### On your computer:
The ZIP is ready at: `/Users/joe/Desktop/REVERT/revert-theme.zip`

### In WordPress admin:
1. Go to: **Appearance → Themes**
2. Click: **Add New → Upload Theme**
3. Choose: `revert-theme.zip`
4. Click: **Install Now**
5. Click: **Activate**

**Done!** ✅

---

## 🎯 QUICK COPY-PASTE COMMAND

**Just run this in your container (you're already root):**

```bash
cd /var/www/html/wp-content/themes/ && \
apt-get update && apt-get install -y git curl unzip && \
curl -L https://github.com/DriverJoe/revert-theme/archive/refs/heads/main.zip -o revert-theme.zip && \
unzip -q revert-theme.zip && \
mv revert-theme-main revert-theme && \
chown -R www-data:www-data revert-theme && \
chmod -R 755 revert-theme && \
rm revert-theme.zip && \
echo "✓ Theme installed successfully!"
```

**Copy and paste this whole block!** 🚀

---

## 🔧 After Installation

1. **Activate theme in WordPress:**
   - Go to: **Appearance → Themes**
   - Find: **ReVert**
   - Click: **Activate**

2. **Configure permalinks:**
   - Go to: **Settings → Permalinks**
   - Select: **Post name**
   - Click: **Save Changes**

3. **Create menus:**
   - Go to: **Appearance → Menus**

---

## 🔄 Updating Theme Later

### If you installed git (Option 1):
```bash
cd /var/www/html/wp-content/themes/revert-theme
git pull
```

### If you used ZIP (Option 2):
```bash
cd /var/www/html/wp-content/themes/
rm -rf revert-theme
curl -L https://github.com/DriverJoe/revert-theme/archive/refs/heads/main.zip -o revert-theme.zip
unzip -q revert-theme.zip
mv revert-theme-main revert-theme
chown -R www-data:www-data revert-theme
rm revert-theme.zip
```

### If you used WordPress upload (Option 3):
- Just re-upload the new ZIP file

---

## 💡 Why Git Wasn't Installed

WordPress Docker containers are minimal and don't include git by default to keep them lightweight. You can either:
- Install git (Option 1) - best for development
- Use curl/wget (Option 2) - works everywhere
- Upload via WordPress (Option 3) - easiest for non-technical users

---

**Choose the method that works best for you!** 🚀
