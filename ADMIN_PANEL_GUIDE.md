# 📚 Panduan Admin Panel - Mulia Special Academy

## ✅ Apa yang Sudah Dikerjakan?

Frontend website Anda **SUDAH TERHUBUNG** dengan Admin Panel! Sekarang semua konten dapat dikelola dari dashboard admin.

---

## 🎯 Fitur yang Sudah Terintegrasi

### 1. **Testimoni (Halaman Home)**
- ✅ Tampil di halaman home (section "Apa Kata Mereka")
- ✅ Dapat di-manage dari admin panel
- ✅ Support upload foto narasumber
- ✅ Otomatis menampilkan 3 testimoni terbaru

**Controller Frontend:** `app/Http/Controllers/HomeController.php`
**View Frontend:** `resources/views/home.blade.php`
**Admin Controller:** `app/Http/Controllers/Admin/TestimoniController.php`

### 2. **FAQ (Halaman Home)**
- ✅ Tampil di halaman home (section "Pertanyaan yang Sering Diajukan")
- ✅ Dapat di-manage dari admin panel
- ✅ Accordion interaktif
- ✅ Otomatis menampilkan 6 FAQ terbaru

**Controller Frontend:** `app/Http/Controllers/HomeController.php`
**View Frontend:** `resources/views/home.blade.php`
**Admin Controller:** `app/Http/Controllers/Admin/FaqController.php`

### 3. **Program Pembelajaran**
- ✅ Tampil di halaman `/program`
- ✅ Dapat di-manage dari admin panel
- ✅ Support upload gambar program
- ✅ Menampilkan nama, deskripsi, dan tujuan program

**Controller Frontend:** `app/Http/Controllers/ProgramController.php`
**View Frontend:** `resources/views/program.blade.php`
**Admin Controller:** `app/Http/Controllers/Admin/ProgramController.php`

### 4. **Fasilitas**
- ✅ Tampil di halaman `/fasilitas`
- ✅ Dapat di-manage dari admin panel
- ✅ Support upload gambar fasilitas
- ✅ Otomatis menggunakan placeholder jika gambar belum ada

**Controller Frontend:** `app/Http/Controllers/FasilitasController.php`
**View Frontend:** `resources/views/fasilitas.blade.php`
**Admin Controller:** `app/Http/Controllers/Admin/FasilitasController.php`

---

## 🚀 Cara Mengakses Admin Panel

### URL Login Admin:
```
http://localhost/admin
atau
https://yourdomain.com/admin
```

### Default Credentials:
Anda perlu membuat admin user terlebih dahulu melalui database seeder atau manual.

---

## 📝 Cara Mengelola Konten

### A. Mengelola Testimoni

1. Login ke admin panel
2. Klik menu **"Testimoni"**
3. Klik tombol **"Tambah Testimoni"**
4. Isi form:
   - Nama Narasumber (contoh: "Ibu Sarah")
   - Jabatan (contoh: "Orang Tua Siswa")
   - Deskripsi/Testimoni
   - Upload Foto (opsional)
5. Klik **"Simpan"**

**Hasil:** Testimoni otomatis muncul di halaman home (section "Apa Kata Mereka")

---

### B. Mengelola FAQ

1. Login ke admin panel
2. Klik menu **"FAQ"**
3. Klik tombol **"Tambah FAQ"**
4. Isi form:
   - Pertanyaan
   - Jawaban
5. Klik **"Simpan"**

**Hasil:** FAQ otomatis muncul di halaman home dengan accordion

---

### C. Mengelola Program Pembelajaran

1. Login ke admin panel
2. Klik menu **"Program"**
3. Klik tombol **"Tambah Program"**
4. Isi form:
   - Nama Program (contoh: "Toilet Training Program")
   - Deskripsi Singkat
   - Tujuan Program
   - Upload Gambar (opsional)
5. Klik **"Simpan"**

**Hasil:** Program otomatis muncul di halaman `/program`

---

### D. Mengelola Fasilitas

1. Login ke admin panel
2. Klik menu **"Fasilitas"**
3. Klik tombol **"Tambah Fasilitas"**
4. Isi form:
   - Nama Fasilitas (contoh: "Ruang Belajar One-on-One")
   - Upload Gambar (opsional)
5. Klik **"Simpan"**

**Hasil:** Fasilitas otomatis muncul di halaman `/fasilitas`

---

## 🗂️ Struktur Database

### Tabel: `testimoni`
```sql
- id
- gambar (nama file)
- deskripsi (TEXT)
- nama_narasumber (VARCHAR)
- jabatan (VARCHAR)
- created_at
- updated_at
```

### Tabel: `faq`
```sql
- id
- pertanyaan (TEXT)
- jawaban (TEXT)
- created_at
- updated_at
```

### Tabel: `programs`
```sql
- id
- nama (VARCHAR)
- slug (VARCHAR)
- deskripsi (TEXT)
- tujuan_program (TEXT)
- gambar (VARCHAR)
- created_at
- updated_at
```

### Tabel: `fasilitas`
```sql
- id
- nama (VARCHAR)
- slug (VARCHAR)
- gambar (VARCHAR)
- created_at
- updated_at
```

---

## 📁 Lokasi File Penting

### Controllers (Frontend)
- `app/Http/Controllers/HomeController.php` - Mengambil data Testimoni & FAQ
- `app/Http/Controllers/ProgramController.php` - Mengambil data Program
- `app/Http/Controllers/FasilitasController.php` - Mengambil data Fasilitas

### Controllers (Admin)
- `app/Http/Controllers/Admin/TestimoniController.php`
- `app/Http/Controllers/Admin/FaqController.php`
- `app/Http/Controllers/Admin/ProgramController.php`
- `app/Http/Controllers/Admin/FasilitasController.php`

### Views (Frontend)
- `resources/views/home.blade.php` - Halaman home (Testimoni & FAQ)
- `resources/views/program.blade.php` - Halaman program
- `resources/views/fasilitas.blade.php` - Halaman fasilitas

### Models
- `app/Models/Testimoni.php`
- `app/Models/Faq.php`
- `app/Models/Program.php`
- `app/Models/Fasilitas.php`

### Routes
- `routes/web.php` - Routes frontend
- `routes/admin.php` - Routes admin panel

---

## 🔧 Setup Awal

### 1. Jalankan Migration
```bash
php artisan migrate
```

### 2. Buat Storage Link (untuk upload gambar)
```bash
php artisan storage:link
```

### 3. Buat Admin User (Manual via Tinker)
```bash
php artisan tinker
```

Kemudian jalankan:
```php
$admin = new App\Models\Admin();
$admin->name = 'Admin MSA';
$admin->email = 'admin@msa.com';
$admin->password = bcrypt('password123');
$admin->is_active = true;
$admin->save();
```

Atau buat seeder file jika diperlukan.

---

## 🎨 Fitur Khusus

### 1. **Fallback Content**
Jika database kosong, website akan menampilkan pesan default:
- **Testimoni:** Menampilkan placeholder dengan pesan "Belum ada testimoni"
- **FAQ:** Menampilkan 1 FAQ default
- **Program:** Menampilkan card kosong dengan pesan
- **Fasilitas:** Menampilkan card kosong dengan pesan

### 2. **Image Handling**
- Upload gambar disimpan di: `storage/app/public/images/`
  - `testimoni/` - Foto narasumber
  - `program/` - Foto program
  - `fasilitas/` - Foto fasilitas
- Jika gambar tidak ada, sistem otomatis menggunakan placeholder

### 3. **Auto Slug**
Program dan Fasilitas otomatis generate slug dari nama untuk URL-friendly

---

## 🔐 Security

- Admin panel dilindungi middleware `AdminMiddleware`
- Login menggunakan guard `admin` (terpisah dari user biasa)
- Session management untuk admin
- Check status `is_active` untuk admin

---

## 📊 Admin Panel URLs

| Menu | URL | Method |
|------|-----|--------|
| Login | `/admin` | GET, POST |
| Dashboard | `/admin/dashboard` | GET |
| Testimoni | `/admin/testimoni` | GET, POST, PUT, DELETE |
| FAQ | `/admin/faq` | GET, POST, PUT, DELETE |
| Program | `/admin/program` | GET, POST, PUT, DELETE |
| Fasilitas | `/admin/fasilitas` | GET, POST, PUT, DELETE |

---

## ✨ Apa Selanjutnya?

1. **Buat Admin User** - Untuk login pertama kali
2. **Tambahkan Konten** - Isi testimoni, FAQ, program, dan fasilitas
3. **Test Website** - Pastikan semua konten tampil di frontend
4. **Setup Hosting** - Deploy ke shared hosting (sudah cukup untuk website ini)

---

## ❓ Troubleshooting

### Gambar tidak muncul?
```bash
php artisan storage:link
```

### Error 404 saat akses admin?
Pastikan file `routes/admin.php` sudah di-include di `bootstrap/app.php`

### Data tidak muncul di frontend?
1. Cek database, pastikan ada data
2. Clear cache: `php artisan cache:clear`
3. Clear view: `php artisan view:clear`

---

## 🎉 Selesai!

Website Anda sekarang sudah **FULLY DYNAMIC** dan dapat dikelola dari admin panel tanpa perlu edit kode lagi!

Jika ada pertanyaan, silakan tanyakan! 🚀


