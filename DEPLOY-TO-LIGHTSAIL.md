# Deploy ReVert Theme to Lightsail WordPress

## ✅ Theme ZIP File Ready!

**Location:** `/Users/joe/Desktop/REVERT/revert-theme.zip`

---

## 🚀 Method 1: Upload via WordPress Admin (EASIEST)

### Steps:

1. **Log in to your Lightsail WordPress site**
   - Go to: `your-site.com/wp-admin`

2. **Navigate to Themes**
   - Click: **Appearance → Themes**

3. **Upload Theme**
   - Click: **Add New** (top of page)
   - Click: **Upload Theme** (top of page)
   - Click: **Choose File**
   - Select: `revert-theme.zip` from `/Users/joe/Desktop/REVERT/`
   - Click: **Install Now**

4. **Activate Theme**
   - After installation completes, click: **Activate**

5. **Done!** 🎉
   - Visit your site to see the ReVert theme live!

---

## 🔧 Method 2: SFTP Upload (If upload fails)

If WordPress upload limit is too small, use SFTP:

### Using FileZilla, Cyberduck, or Transmit:

1. **Connect to your Lightsail instance**
   - Host: Your Lightsail IP address
   - Username: `bitnami` (default for Bitnami WordPress)
   - Auth: Use your SSH key
   - Port: 22

2. **Navigate to themes directory**
   ```
   /opt/bitnami/wordpress/wp-content/themes/
   ```

3. **Upload the unzipped folder**
   - Unzip `revert-theme.zip` on your computer first
   - Upload the entire `revert-theme` folder
   - Make sure permissions are set to 755

4. **Activate in WordPress admin**
   - Go to: **Appearance → Themes**
   - Find: **ReVert**
   - Click: **Activate**

---

## 💻 Method 3: Command Line (SSH)

If you have SSH access to your Lightsail server:

```bash
# On your local machine, copy the ZIP to server
scp /Users/joe/Desktop/REVERT/revert-theme.zip bitnami@YOUR-LIGHTSAIL-IP:/tmp/

# SSH into your server
ssh bitnami@YOUR-LIGHTSAIL-IP

# Navigate to themes directory
cd /opt/bitnami/wordpress/wp-content/themes/

# Unzip the theme
sudo unzip /tmp/revert-theme.zip

# Set proper permissions
sudo chown -R bitnami:daemon revert-theme
sudo chmod -R 755 revert-theme

# Clean up
rm /tmp/revert-theme.zip

# Exit SSH
exit
```

Then activate in WordPress admin: **Appearance → Themes → ReVert → Activate**

---

## 🎨 After Activation

### 1. Configure Permalinks
- Go to: **Settings → Permalinks**
- Select: **Post name**
- Click: **Save Changes**

### 2. Create Menus
- Go to: **Appearance → Menus**
- Create: "Primary Navigation"
- Assign to: "Primary Menu"

### 3. Set Homepage
- Go to: **Settings → Reading**
- Select: "A static page"
- Create and select a "Home" page

### 4. Upload Logo
- Go to: **Appearance → Customize → Site Identity**
- Upload your ReVert logo

### 5. Add Sample Content
- Add a few products: **Products → Add New**
- Add a few resellers: **Resellers → Add New**

---

## 🔍 Troubleshooting

### "File size exceeds upload limit"
Use Method 2 (SFTP) or Method 3 (SSH)

### "Theme is broken"
Check file permissions:
```bash
sudo chmod -R 755 /opt/bitnami/wordpress/wp-content/themes/revert-theme
```

### "Cannot activate theme"
Ensure all theme files uploaded correctly. The `style.css` file must be in the root of the theme folder.

### Need to increase upload limit:
Edit: `/opt/bitnami/php/etc/php.ini`
```
upload_max_filesize = 64M
post_max_size = 64M
```
Then restart: `sudo /opt/bitnami/ctlscript.sh restart apache`

---

## 🎯 What Your Server Needs

The theme requires:
- ✅ PHP 7.4+ (Lightsail usually has this)
- ✅ WordPress 5.9+
- ✅ MySQL (comes with WordPress)
- ✅ mod_rewrite enabled (for pretty URLs)

Lightsail WordPress stacks have all of this by default!

---

## 📍 Quick Commands Reference

### Lightsail Common Paths:
- **WordPress root:** `/opt/bitnami/wordpress/`
- **Themes:** `/opt/bitnami/wordpress/wp-content/themes/`
- **Plugins:** `/opt/bitnami/wordpress/wp-content/plugins/`
- **Uploads:** `/opt/bitnami/wordpress/wp-content/uploads/`

### Common Commands:
```bash
# Restart Apache
sudo /opt/bitnami/ctlscript.sh restart apache

# Check file permissions
ls -la /opt/bitnami/wordpress/wp-content/themes/

# View error logs
sudo tail -f /opt/bitnami/apache2/logs/error_log
```

---

## 🚀 Recommended: Method 1 (WordPress Admin Upload)

**It's the easiest and fastest!**

Just:
1. Log in to WordPress admin
2. Appearance → Themes → Add New → Upload Theme
3. Choose `revert-theme.zip`
4. Click Install Now
5. Activate!

---

## 📞 Need Help?

If you need help with:
- Lightsail SSH access
- Finding your server IP
- SFTP connection details

Let me know and I can help you deploy it via SSH!

---

**File Ready:** `/Users/joe/Desktop/REVERT/revert-theme.zip`

**Size:** ~50KB (very small, will upload quickly!)

**Ready to deploy!** 🎉
