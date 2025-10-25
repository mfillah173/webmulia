# Panduan Instalasi Website Mulia Special Academy

## Langkah-langkah Instalasi

### 1. Prasyarat Sistem
- PHP 8.1 atau lebih tinggi
- Composer
- Node.js dan NPM (opsional, untuk asset compilation)
- Web server (Apache/Nginx) atau gunakan `php artisan serve`

### 2. Setup Project

```bash
# Masuk ke direktori project
cd "D:\web saim terbaru\webmulia"

# Install dependencies PHP
composer install

# Copy file environment
cp .env.example .env

# Generate application key
php artisan key:generate

# Setup database (SQLite sudah dikonfigurasi)
php artisan migrate

# Seed data sample
php artisan db:seed --class=BeritaSeeder
```

### 3. Konfigurasi Database

Website ini menggunakan SQLite sebagai database default. File database sudah tersedia di `database/database.sqlite`.

Jika ingin menggunakan MySQL atau PostgreSQL, edit file `.env`:

```env
# Untuk MySQL
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mulia_academy
DB_USERNAME=root
DB_PASSWORD=

# Untuk PostgreSQL
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=mulia_academy
DB_USERNAME=postgres
DB_PASSWORD=
```

### 4. Konfigurasi Email (Opsional)

Untuk mengirim email dari form kontak, edit bagian MAIL di file `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="Mulia Special Academy"
```

### 5. Menjalankan Website

```bash
# Development server
php artisan serve

# Website akan tersedia di: http://localhost:8000
```

### 6. Production Deployment

Untuk production, pastikan:

1. Set `APP_ENV=production` dan `APP_DEBUG=false` di `.env`
2. Optimize aplikasi:
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```
3. Setup web server (Apache/Nginx) untuk pointing ke folder `public/`

## Struktur File Penting

```
webmulia/
├── app/
│   ├── Http/Controllers/     # Controllers untuk semua halaman
│   └── Models/              # Models untuk Berita dan Kontak
├── database/
│   ├── migrations/          # Database migrations
│   ├── seeders/            # Data sample
│   └── database.sqlite     # Database SQLite
├── public/
│   ├── css/style.css       # Custom CSS
│   ├── js/app.js          # Custom JavaScript
│   └── index.php          # Entry point
├── resources/
│   └── views/             # Blade templates
│       ├── layouts/       # Layout utama
│       ├── home.blade.php # Halaman beranda
│       ├── fasilitas.blade.php
│       ├── program.blade.php
│       ├── sistem.blade.php
│       ├── berita.blade.php
│       ├── berita-detail.blade.php
│       └── kontak.blade.php
└── routes/
    └── web.php            # Routes aplikasi
```

## Troubleshooting

### Error "Class not found"
```bash
composer dump-autoload
```

### Error database
```bash
php artisan migrate:fresh --seed
```

### Error permission (Linux/Mac)
```bash
chmod -R 755 storage bootstrap/cache
```

### Clear cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

## Kontak Support

Jika mengalami masalah dalam instalasi, silakan hubungi:
- Email: info@muliaspecialacademy.com
- Telepon: +62 812-3456-7890
