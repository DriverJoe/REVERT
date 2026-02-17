# 🚀 View Your ReVert Theme Locally

## Quick Start (3 Steps)

### Step 1: Start Docker Desktop
Docker Desktop is starting now. Wait for the Docker icon in your menu bar to stop animating (about 30-60 seconds).

### Step 2: Launch WordPress
Once Docker is running, open Terminal and run:

```bash
cd /Users/joe/Desktop/REVERT
./launch-local.sh
```

### Step 3: View Your Site
Once you see "🚀 LAUNCH SUCCESSFUL!", open your browser to:

**http://localhost:8080**

---

## Complete Setup Guide

### 1️⃣ Install WordPress (First Time Only)

When you visit http://localhost:8080 for the first time:

1. **Select Language:** English
2. **Click:** Let's go!
3. **Fill in the form:**
   - Site Title: **ReVert**
   - Username: **admin**
   - Password: **Create a strong password**
   - Email: **your@email.com**
4. **Click:** Install WordPress
5. **Log in** with your credentials

### 2️⃣ Activate ReVert Theme

1. **In WordPress admin**, go to **Appearance → Themes**
2. **Find:** ReVert theme
3. **Click:** Activate

**🎉 Your theme is now live!**

### 3️⃣ Basic Configuration

#### Set Homepage
1. Go to **Settings → Reading**
2. Select **"A static page"**
3. Click **Save Changes**

#### Fix Permalinks
1. Go to **Settings → Permalinks**
2. Select **"Post name"**
3. Click **Save Changes**

#### Create a Menu
1. Go to **Appearance → Menus**
2. Create a new menu called "Primary Navigation"
3. Check **"Primary Menu"** under Display Location
4. Click **Save Menu**

### 4️⃣ Add Sample Content

#### Create a Product
1. **Products → Add New**
2. **Title:** BioCatalyst Plus
3. **Description:** Premium biological catalyst for enhanced soil health
4. **Category:** Biologicals
5. **Type:** Retail
6. **SKU:** BC-001
7. **Application Rate:** 2-5L per hectare
8. **Featured Image:** Upload any image
9. **Click:** Publish

#### Create a Reseller
1. **Resellers → Add New**
2. **Title:** Sydney Garden Supplies
3. **Phone:** 02 1234 5678
4. **Email:** info@sydneygarden.com.au
5. **Region:** NSW
6. **Click:** Publish

### 5️⃣ Upload Logo (Optional)
1. **Appearance → Customize**
2. **Site Identity → Logo**
3. Upload your ReVert logo
4. Click **Publish**

---

## 🎨 What You'll See

Your theme includes:
- ✅ **Dark modern design** (matching flowfolio-design.lovable.app)
- ✅ **Hero section** with gradient effects
- ✅ **Dual navigation** (Retail/Commercial)
- ✅ **Product catalog** with filtering
- ✅ **Reseller locator** with regional search
- ✅ **Newsletter signup**
- ✅ **Contact forms**
- ✅ **Mobile responsive** design

---

## 🛠️ Useful Commands

### View Your Site
```bash
open http://localhost:8080
```

### View WordPress Admin
```bash
open http://localhost:8080/wp-admin
```

### Stop WordPress
```bash
cd /Users/joe/Desktop/REVERT
./stop-local.sh
```

### Restart WordPress
```bash
./stop-local.sh
./launch-local.sh
```

### View Logs (for debugging)
```bash
docker-compose logs -f
```

---

## 📁 Live Theme Editing

Your theme files are in:
```
/Users/joe/Desktop/REVERT/revert-theme/
```

**Any changes you make are immediately reflected!**
- Edit CSS in `style.css` or `assets/css/custom.css`
- Edit PHP files
- Refresh browser to see changes

---

## 🌐 Test URLs

Once WordPress is running, try these URLs:

| Page | URL |
|------|-----|
| Homepage | http://localhost:8080 |
| Products | http://localhost:8080/products |
| Resellers | http://localhost:8080/resellers |
| Blog | http://localhost:8080/blog |
| Admin | http://localhost:8080/wp-admin |

---

## ❓ Troubleshooting

### Docker isn't starting
- Check if Docker Desktop is installed
- Restart your computer if needed
- Make sure Docker has sufficient permissions

### Port 8080 is in use
Edit `docker-compose.yml` and change:
```yaml
ports:
  - "8081:80"  # Changed from 8080
```

Then access at: http://localhost:8081

### WordPress shows blank page
Wait 30 seconds and refresh - WordPress is still starting up

### Can't see ReVert theme
1. Make sure you're in `/Users/joe/Desktop/REVERT/` directory
2. Run: `docker-compose restart`
3. Check: **Appearance → Themes** in WordPress admin

---

## 🎯 Next Steps

1. ✅ **Launch** WordPress with `./launch-local.sh`
2. ✅ **Install** WordPress (one-time setup)
3. ✅ **Activate** ReVert theme
4. ✅ **Add** sample products and resellers
5. ✅ **Customize** logo, colors, menus
6. ✅ **Test** all features (filters, forms, etc.)
7. ✅ **Review** the design

---

## 📚 Documentation Files

- **START-HERE.md** ← You are here
- **LOCAL-SETUP.md** - Detailed local setup guide
- **INSTALLATION.md** - Production deployment guide
- **README.md** - Complete theme documentation
- **THEME-SUMMARY.md** - Project overview

---

## 🎉 Ready to Launch!

**Wait for Docker to start** (Docker icon in menu bar stops animating)

Then run:
```bash
cd /Users/joe/Desktop/REVERT
./launch-local.sh
```

**Your WordPress site with the ReVert theme will be live at:**
## **http://localhost:8080** 🚀

---

Need help? Check **LOCAL-SETUP.md** for detailed troubleshooting!
