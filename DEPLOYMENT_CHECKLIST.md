# 📋 Deployment Checklist - Mulia Special Academy

## Status Kesiapan: ⚠️ **HAMPIR SIAP** (Perlu beberapa persiapan)

---

## ✅ Yang Sudah Siap

### 1. **Konfigurasi Dasar**
- ✅ Laravel 12 framework terinstall
- ✅ Dependencies terdefinisi di `composer.json` dan `package.json`
- ✅ Routes sudah dikonfigurasi (web.php dan admin.php)
- ✅ Middleware sudah dikonfigurasi
- ✅ Database migrations lengkap
- ✅ Models sudah dibuat
- ✅ Controllers lengkap untuk frontend dan admin

### 2. **Security**
- ✅ `.gitignore` sudah dikonfigurasi dengan benar
- ✅ File `.env` tidak akan ter-commit
- ✅ CSRF protection aktif (default Laravel)
- ✅ Admin middleware sudah ada
- ✅ Password hashing menggunakan bcrypt

### 3. **File Structure**
- ✅ `.htaccess` sudah ada untuk Apache
- ✅ Storage configuration sudah benar
- ✅ Logging configuration sudah ada
- ✅ Error handling sudah dikonfigurasi

### 4. **Dokumentasi**
- ✅ README.md ada
- ✅ INSTALLATION.md ada
- ✅ SETUP_INSTRUCTIONS.md ada
- ✅ ADMIN_PANEL_GUIDE.md ada

---

## ⚠️ Yang Perlu Diperbaiki Sebelum Deployment

### 1. **File .env.example** ✅ SUDAH DIBUAT
- ✅ File `.env.example` sudah dibuat
- ⚠️ **Action Required:** Pastikan file ini di-commit ke repository

### 2. **Perubahan yang Belum Di-commit**
- ⚠️ `resources/views/kontak.blade.php` - Modified
- ⚠️ `resources/views/layouts/app.blade.php` - Modified
- **Action Required:** Commit atau discard perubahan ini

### 3. **Assets Build**
- ⚠️ **Action Required:** Pastikan assets sudah di-build untuk production:
  ```bash
  npm install
  npm run build
  ```

### 4. **Storage Link**
- ⚠️ **Action Required:** Pastikan storage link dibuat di server:
  ```bash
  php artisan storage:link
  ```

---

## 📝 Checklist Pre-Deployment

### A. Persiapan Kode
- [ ] Commit semua perubahan yang diperlukan
- [ ] Pastikan `.env.example` sudah ada dan lengkap
- [ ] Build assets untuk production (`npm run build`)
- [ ] Test aplikasi di local environment
- [ ] Pastikan tidak ada error di log

### B. Konfigurasi Server
- [ ] PHP 8.2+ terinstall
- [ ] Composer terinstall
- [ ] Node.js & NPM terinstall (untuk build assets)
- [ ] Web server (Apache/Nginx) dikonfigurasi
- [ ] Database (MySQL/PostgreSQL) sudah dibuat
- [ ] File permissions sudah benar:
  ```bash
  chmod -R 755 storage bootstrap/cache
  ```

### C. Environment Variables
- [ ] Buat file `.env` dari `.env.example`
- [ ] Set `APP_ENV=production`
- [ ] Set `APP_DEBUG=false`
- [ ] Generate `APP_KEY` dengan `php artisan key:generate`
- [ ] Konfigurasi database credentials
- [ ] Konfigurasi `APP_URL` dengan domain yang benar
- [ ] Konfigurasi email (jika diperlukan)

### D. Database Setup
- [ ] Jalankan migrations:
  ```bash
  php artisan migrate
  ```
- [ ] Buat admin user:
  ```bash
  php artisan db:seed --class=AdminSeeder
  ```
- [ ] (Opsional) Seed demo data:
  ```bash
  php artisan db:seed --class=DemoDataSeeder
  ```

### E. Optimasi Production
- [ ] Cache configuration:
  ```bash
  php artisan config:cache
  ```
- [ ] Cache routes:
  ```bash
  php artisan route:cache
  ```
- [ ] Cache views:
  ```bash
  php artisan view:cache
  ```
- [ ] Optimize autoloader:
  ```bash
  composer install --optimize-autoloader --no-dev
  ```

### F. Storage & Media
- [ ] Buat storage link:
  ```bash
  php artisan storage:link
  ```
- [ ] Pastikan folder `storage/app/public` writable
- [ ] Test upload gambar (jika ada)

### G. Security
- [ ] Ganti password admin default
- [ ] Pastikan `.env` tidak ter-commit
- [ ] Review file permissions
- [ ] Setup SSL/HTTPS (recommended)

---

## 🚀 Langkah Deployment

### Untuk Shared Hosting (cPanel/dll):

1. **Upload Files**
   ```bash
   # Upload semua file kecuali:
   # - node_modules/
   # - vendor/ (atau upload dan jalankan composer install di server)
   # - .env (buat manual di server)
   ```

2. **Setup di Server**
   ```bash
   # SSH ke server atau gunakan Terminal di cPanel
   cd /path/to/your/project
   
   # Install dependencies
   composer install --optimize-autoloader --no-dev
   
   # Copy .env.example ke .env
   cp .env.example .env
   
   # Edit .env dengan credentials server
   nano .env
   
   # Generate key
   php artisan key:generate
   
   # Run migrations
   php artisan migrate --force
   
   # Create storage link
   php artisan storage:link
   
   # Create admin user
   php artisan db:seed --class=AdminSeeder
   
   # Optimize
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

3. **Set Document Root**
   - Point document root ke folder `public/`
   - Contoh: `/home/username/public_html/public` atau `/home/username/public_html/webmulia/public`

4. **Build Assets** (jika belum di-build lokal)
   ```bash
   npm install
   npm run build
   ```

### Untuk VPS/Dedicated Server:

1. **Clone Repository**
   ```bash
   git clone your-repo-url /var/www/webmulia
   cd /var/www/webmulia
   ```

2. **Install Dependencies**
   ```bash
   composer install --optimize-autoloader --no-dev
   npm install
   npm run build
   ```

3. **Setup Environment**
   ```bash
   cp .env.example .env
   nano .env  # Edit dengan credentials
   php artisan key:generate
   ```

4. **Database & Permissions**
   ```bash
   php artisan migrate --force
   php artisan storage:link
   php artisan db:seed --class=AdminSeeder
   
   chown -R www-data:www-data storage bootstrap/cache
   chmod -R 755 storage bootstrap/cache
   ```

5. **Optimize**
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

6. **Configure Web Server**
   - **Nginx:** Point root ke `/var/www/webmulia/public`
   - **Apache:** Set document root ke `/var/www/webmulia/public`

---

## 🔍 Post-Deployment Testing

### Frontend Testing:
- [ ] Homepage bisa diakses
- [ ] Semua halaman (fasilitas, program, kontak) bisa diakses
- [ ] Gambar tampil dengan benar
- [ ] Form kontak berfungsi
- [ ] Responsive design bekerja di mobile

### Admin Panel Testing:
- [ ] Bisa login ke `/admin`
- [ ] Dashboard menampilkan data
- [ ] CRUD operations bekerja (Testimoni, FAQ, Program, Fasilitas)
- [ ] Upload gambar berfungsi
- [ ] Logout berfungsi

### Security Testing:
- [ ] Tidak ada error stack trace di production
- [ ] File `.env` tidak bisa diakses via browser
- [ ] Admin routes protected dengan middleware

---

## ⚠️ Catatan Penting

1. **Jangan lupa:**
   - Set `APP_DEBUG=false` di production
   - Ganti password admin default
   - Backup database sebelum deployment

2. **Performance:**
   - Enable OPcache di PHP
   - Setup caching (Redis/Memcached) jika diperlukan
   - Optimize database queries jika ada

3. **Monitoring:**
   - Setup error logging
   - Monitor `storage/logs/laravel.log`
   - Setup backup rutin untuk database

---

## 📞 Troubleshooting

### Error: "No application encryption key has been specified"
```bash
php artisan key:generate
```

### Error: "Storage link not found"
```bash
php artisan storage:link
```

### Error: "Class not found"
```bash
composer dump-autoload
composer install --optimize-autoloader
```

### Error: "Permission denied"
```bash
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

### Error: "Route not found"
```bash
php artisan route:clear
php artisan route:cache
```

---

## ✅ Final Checklist

Sebelum go-live, pastikan:
- [ ] Semua checklist di atas sudah ditandai
- [ ] Website sudah di-test di production environment
- [ ] Admin panel berfungsi dengan baik
- [ ] Backup database sudah dibuat
- [ ] SSL/HTTPS sudah diaktifkan (recommended)
- [ ] Monitoring sudah di-setup

---

**Status:** Website ini **HAMPIR SIAP** untuk deployment. Ikuti checklist di atas untuk memastikan deployment berjalan lancar.

**Estimasi Waktu Setup:** 30-60 menit (tergantung pengalaman dan jenis hosting)

---

*Last Updated: $(date)*


