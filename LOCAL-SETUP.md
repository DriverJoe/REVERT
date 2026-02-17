# Local WordPress Setup - ReVert Theme

## 🚀 Quick Launch

I've set up a Docker-based local WordPress environment for you!

### Launch WordPress Locally

```bash
cd /Users/joe/Desktop/REVERT
./launch-local.sh
```

This will:
- ✅ Start WordPress on http://localhost:8080
- ✅ Automatically mount your ReVert theme
- ✅ Set up MySQL database
- ✅ Everything ready to view!

### Stop WordPress

```bash
./stop-local.sh
```

## 📋 Setup Steps

### 1. Launch WordPress

Run the launch script:
```bash
./launch-local.sh
```

Wait for the message: "🚀 LAUNCH SUCCESSFUL!"

### 2. Install WordPress

1. Open your browser to: **http://localhost:8080**
2. You'll see the WordPress installation screen
3. Fill in:
   - **Site Title:** ReVert
   - **Username:** admin (or your choice)
   - **Password:** Create a strong password
   - **Email:** Your email address
4. Click **Install WordPress**

### 3. Activate ReVert Theme

1. Log in to WordPress admin
2. Go to **Appearance → Themes**
3. Find **ReVert** theme
4. Click **Activate**

### 4. Initial Configuration

#### Create Menus (Appearance → Menus)
- Create "Primary Navigation" menu
- Assign to "Primary Menu" location

#### Set Homepage (Settings → Reading)
- Select "A static page"
- Create and select a "Home" page

#### Configure Permalinks (Settings → Permalinks)
- Select "Post name"
- Click Save Changes

### 5. Add Sample Content

#### Add a Product
1. Go to **Products → Add New**
2. Fill in:
   - Title: "Sample Product"
   - Description: Product details
   - Featured Image: Upload an image
   - Category: Select "Biologicals"
   - Type: Select "Retail"
   - SKU: "PROD-001"
   - Application Rate: "2-5L per hectare"
3. Click **Publish**

#### Add a Reseller
1. Go to **Resellers → Add New**
2. Fill in:
   - Title: "Sample Reseller"
   - Phone: "02 1234 5678"
   - Email: "info@example.com"
   - Region: NSW
3. Click **Publish**

## 🛠️ Useful Commands

### View Logs
```bash
cd /Users/joe/Desktop/REVERT
docker-compose logs -f wordpress
```

### Restart Services
```bash
docker-compose restart
```

### Stop Everything
```bash
./stop-local.sh
```

### Start Again
```bash
./launch-local.sh
```

### Remove Everything (Clean Slate)
```bash
docker-compose down -v
```
Note: This removes all data! You'll need to reinstall WordPress.

## 📍 Access Points

- **WordPress Site:** http://localhost:8080
- **WordPress Admin:** http://localhost:8080/wp-admin

## 🔧 Database Access (if needed)

- **Host:** localhost
- **Port:** 3306 (inside Docker network)
- **Database:** revert_wordpress
- **Username:** revert_user
- **Password:** revert_password

## 📁 File Structure

Your theme files are automatically synced:
- **Theme Location:** `/Users/joe/Desktop/REVERT/revert-theme/`
- **Live Updates:** Changes to theme files reflect immediately!

## 💡 Tips

1. **Live Editing:** Edit theme files in `/revert-theme/` and refresh browser to see changes

2. **Sample Images:** Use free images from:
   - https://unsplash.com
   - https://pexels.com

3. **Test Data:** Use the WordPress importer to add sample posts

4. **Mobile Testing:** Access from phone on same network:
   - Find your computer's IP: `ifconfig | grep "inet "`
   - Access: `http://YOUR-IP:8080`

## ❓ Troubleshooting

### "Port already in use"
If port 8080 is busy, edit `docker-compose.yml`:
```yaml
ports:
  - "8081:80"  # Change 8080 to 8081
```

### "Cannot connect to Docker"
- Make sure Docker Desktop is running
- Try restarting Docker Desktop

### "WordPress shows errors"
```bash
docker-compose restart
```

### "Theme not appearing"
The theme is mounted at:
```
/var/www/html/wp-content/themes/revert-theme
```

Check it's there:
```bash
docker-compose exec wordpress ls -la /var/www/html/wp-content/themes/
```

## 🎨 What You'll See

After activation, you'll see:
- ✅ Dark modern design
- ✅ Custom product catalog
- ✅ Reseller locator
- ✅ Mobile responsive layout
- ✅ All features from the proposal

## 🚀 Next Steps

1. **Launch** with `./launch-local.sh`
2. **Install WordPress** at http://localhost:8080
3. **Activate theme** (Appearance → Themes)
4. **Add content** (Products, Resellers)
5. **Customize** (Logo, Menus, Pages)
6. **Test** all features

---

**Happy developing! 🎉**
