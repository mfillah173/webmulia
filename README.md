# Website Mulia Special Academy

Website resmi untuk Mulia Special Academy - Sekolah Berbasis Stimulasi for Children with Special Needs di Surabaya.

## Deskripsi

Website ini dibangun menggunakan Laravel framework dan menyediakan informasi lengkap tentang:

- **Beranda**: Halaman utama dengan informasi sekolah dan program unggulan
- **Fasilitas**: Informasi lengkap tentang fasilitas sekolah yang tersedia
- **Program Pembelajaran**: Detail program untuk Kindergarten dan Primary School
- **Sistem Pembelajaran**: Penjelasan tentang pendekatan pembelajaran yang digunakan
- **Berita**: Informasi terkini tentang kegiatan dan program sekolah
- **Kontak**: Form kontak dan informasi lengkap untuk menghubungi sekolah

## Fitur

### Frontend
- ✅ Responsive design dengan Bootstrap 5
- ✅ Modern UI/UX dengan custom CSS
- ✅ Navigation yang user-friendly
- ✅ Form kontak dengan validasi
- ✅ Halaman berita dengan detail artikel
- ✅ FAQ section
- ✅ Social media integration

### Backend
- ✅ Laravel 11 framework
- ✅ Database SQLite (dapat diganti dengan MySQL/PostgreSQL)
- ✅ Model dan Migration untuk Berita dan Kontak
- ✅ Seeder untuk data sample
- ✅ Form validation
- ✅ CSRF protection

## Instalasi

### Prasyarat
- PHP 8.1 atau lebih tinggi
- Composer
- Node.js dan NPM (untuk asset compilation)

### Langkah Instalasi

1. **Clone atau download project**
   ```bash
   cd "D:\web saim terbaru\webmulia"
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Setup environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Setup database**
   ```bash
   php artisan migrate
   php artisan db:seed --class=BeritaSeeder
   ```

5. **Compile assets (opsional)**
   ```bash
   npm install
   npm run build
   ```

6. **Jalankan server**
   ```bash
   php artisan serve
   ```

7. **Akses website**
   Buka browser dan kunjungi: `http://localhost:8000`

## Struktur Database

### Tabel `berita`
- `id` - Primary key
- `judul` - Judul berita
- `slug` - URL slug untuk berita
- `konten` - Isi berita (HTML)
- `gambar` - Nama file gambar (nullable)
- `tanggal` - Tanggal publikasi
- `status` - Status berita (draft/active/inactive)
- `kategori` - Kategori berita
- `meta_description` - Meta description untuk SEO
- `meta_keywords` - Meta keywords (JSON)
- `created_at`, `updated_at` - Timestamps

### Tabel `kontak`
- `id` - Primary key
- `nama` - Nama pengirim
- `email` - Email pengirim
- `telepon` - Nomor telepon
- `subjek` - Subjek pesan
- `pesan` - Isi pesan
- `status` - Status pesan (unread/read/replied)
- `tanggal_kirim` - Tanggal pengiriman
- `tanggal_dibalas` - Tanggal balasan (nullable)
- `balasan` - Isi balasan (nullable)
- `ip_address` - IP address pengirim
- `user_agent` - User agent browser
- `created_at`, `updated_at` - Timestamps

## Customization

### Mengubah Informasi Sekolah
Edit file `resources/views/layouts/app.blade.php` untuk mengubah:
- Nama sekolah
- Alamat
- Nomor telepon
- Email
- Link pendaftaran

### Menambah Berita
1. Akses database dan insert data ke tabel `berita`
2. Atau buat admin panel untuk mengelola berita

### Mengubah Styling
Edit file `public/css/style.css` untuk mengubah:
- Warna tema
- Font
- Layout
- Animasi

## Teknologi yang Digunakan

- **Backend**: Laravel 11, PHP 8.1+
- **Frontend**: HTML5, CSS3, JavaScript, Bootstrap 5
- **Database**: SQLite (default), MySQL/PostgreSQL (opsional)
- **Icons**: Font Awesome 6
- **Fonts**: Google Fonts (Segoe UI)

## Kontribusi

Untuk berkontribusi pada project ini:
1. Fork repository
2. Buat branch untuk fitur baru
3. Commit perubahan
4. Push ke branch
5. Buat Pull Request

## Lisensi

Project ini dibuat untuk Mulia Special Academy. Semua hak cipta dilindungi.

## Kontak

Untuk pertanyaan atau dukungan teknis, silakan hubungi:
- Email: info@muliaspecialacademy.com
- Telepon: +62 812-3456-7890
- Website: www.muliaspecialacademy.com

---

**Mulia Special Academy** - Nurturing Special Child Potentials