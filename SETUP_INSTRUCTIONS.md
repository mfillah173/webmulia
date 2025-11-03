# 🚀 Setup Instructions - Admin Panel Integration

## ✅ Yang Sudah Dikerjakan

1. ✅ **Controllers Frontend** - Sudah diupdate untuk mengambil data dari database
2. ✅ **Views Frontend** - Sudah diupdate untuk menampilkan data dinamis
3. ✅ **Routes Admin** - Sudah lengkap dan terintegrasi
4. ✅ **Models** - Sudah ada (Testimoni, Faq, Program, Fasilitas)
5. ✅ **Admin Controllers** - Sudah lengkap dengan CRUD operations
6. ✅ **Seeders** - Sudah dibuat untuk admin user dan demo data

---

## 🛠️ Langkah Setup (PENTING!)

### Step 1: Jalankan Migration
```bash
php artisan migrate
```
**Fungsi:** Membuat tabel di database untuk testimoni, faq, program, fasilitas

---

### Step 2: Buat Storage Link
```bash
php artisan storage:link
```
**Fungsi:** Membuat symbolic link untuk upload gambar agar bisa diakses publik

---

### Step 3: Buat Admin User
```bash
php artisan db:seed --class=AdminSeeder
```
**Output:**
- Email: `admin@msa.com`
- Password: `password123`

**PENTING:** Ganti password ini setelah login pertama kali!

---

### Step 4: (Opsional) Isi Demo Data
```bash
php artisan db:seed --class=DemoDataSeeder
```
**Output:**
- 3 Testimoni
- 6 FAQ
- 5 Program
- 6 Fasilitas

**Gunakan ini untuk testing. Data demo ini nanti bisa dihapus dari admin panel.**

---

### Step 5: Test Website
Buka browser dan akses:
- **Frontend:** `http://localhost` atau `http://your-domain.com`
- **Admin Login:** `http://localhost/admin` atau `http://your-domain.com/admin`

---

## 📂 File-File yang Telah Dimodifikasi

### Frontend Controllers:
- ✅ `app/Http/Controllers/HomeController.php` - Tambah query Testimoni & FAQ
- ✅ `app/Http/Controllers/ProgramController.php` - Tambah query Program
- ✅ `app/Http/Controllers/FasilitasController.php` - Tambah query Fasilitas

### Frontend Views:
- ✅ `resources/views/home.blade.php` - Testimoni & FAQ dinamis
- ✅ `resources/views/program.blade.php` - Program dinamis
- ✅ `resources/views/fasilitas.blade.php` - Fasilitas dinamis

### Files Baru:
- ✅ `database/seeders/AdminSeeder.php` - Seeder untuk admin user
- ✅ `database/seeders/DemoDataSeeder.php` - Seeder untuk demo data
- ✅ `ADMIN_PANEL_GUIDE.md` - Dokumentasi lengkap admin panel
- ✅ `SETUP_INSTRUCTIONS.md` - File ini

---

## 🎯 Cara Login ke Admin Panel

1. Buka: `http://localhost/admin` (atau domain Anda)
2. Login dengan:
   - **Email:** `admin@msa.com`
   - **Password:** `password123`
3. Setelah login, Anda akan diarahkan ke Dashboard

---

## 📊 Menu Admin Panel

| Menu | Fungsi | Tampil di Frontend |
|------|--------|-------------------|
| **Dashboard** | Statistik & overview | - |
| **Testimoni** | Kelola testimoni | Home page - Section "Apa Kata Mereka" |
| **FAQ** | Kelola FAQ | Home page - Section "FAQ" |
| **Program** | Kelola program | Page `/program` |
| **Fasilitas** | Kelola fasilitas | Page `/fasilitas` |

---

## 🔄 Workflow Mengelola Konten

### Contoh: Menambah Testimoni Baru

1. Login ke admin panel
2. Klik menu **"Testimoni"** di sidebar
3. Klik tombol **"Tambah Testimoni"**
4. Isi form:
   ```
   Nama Narasumber: Ibu Siti
   Jabatan: Orang Tua Siswa
   Deskripsi: Testimoni dari Ibu Siti...
   Gambar: [Upload foto] (opsional)
   ```
5. Klik **"Simpan"**
6. Buka homepage → Testimoni baru langsung muncul di section "Apa Kata Mereka"

**✨ TANPA PERLU EDIT KODE LAGI!**

---

## 🖼️ Upload Gambar

### Lokasi Penyimpanan:
```
storage/app/public/images/
├── testimoni/     (Foto narasumber)
├── program/       (Foto program)
└── fasilitas/     (Foto fasilitas)
```

### Ukuran Maksimal:
- **2 MB per file**
- Format: JPEG, PNG, JPG, GIF

### Akses Publik:
Setelah `php artisan storage:link`, gambar bisa diakses via:
```
http://localhost/storage/images/testimoni/filename.jpg
```

---

## ⚠️ Troubleshooting

### Problem 1: Gambar tidak muncul
**Solusi:**
```bash
php artisan storage:link
```
Pastikan folder `public/storage` ada dan link ke `storage/app/public`

---

### Problem 2: Error "Class AdminSeeder not found"
**Solusi:**
```bash
composer dump-autoload
php artisan db:seed --class=AdminSeeder
```

---

### Problem 3: Data tidak muncul di frontend
**Solusi:**
1. Cek database, pastikan ada data
   ```bash
   php artisan tinker
   >>> \App\Models\Testimoni::count()
   >>> \App\Models\Faq::count()
   ```
2. Clear cache:
   ```bash
   php artisan cache:clear
   php artisan view:clear
   php artisan config:clear
   ```

---

### Problem 4: Cannot access admin panel (404)
**Solusi:**
Pastikan file `routes/admin.php` sudah di-include di `bootstrap/app.php`:
```php
// Di bootstrap/app.php
then: function () {
    Route::middleware('web')
        ->group(base_path('routes/admin.php'));
},
```

---

## 🔐 Security Best Practices

1. **Ganti Password Default**
   - Login dengan password default
   - Ganti password dari profile admin

2. **Jangan Commit .env ke Git**
   ```bash
   # Pastikan .env ada di .gitignore
   echo ".env" >> .gitignore
   ```

3. **Use Strong Password**
   - Minimal 8 karakter
   - Kombinasi huruf besar, kecil, angka, simbol

4. **Backup Database Rutin**
   ```bash
   # Export database
   php artisan db:backup
   ```

---

## 📝 Testing Checklist

### Frontend Testing:
- [ ] Home page menampilkan testimoni dari database
- [ ] Home page menampilkan FAQ dari database
- [ ] Page `/program` menampilkan program dari database
- [ ] Page `/fasilitas` menampilkan fasilitas dari database
- [ ] Gambar testimoni/program/fasilitas tampil dengan benar

### Admin Panel Testing:
- [ ] Bisa login ke `/admin`
- [ ] Dashboard menampilkan statistik
- [ ] Bisa tambah testimoni baru
- [ ] Bisa edit testimoni
- [ ] Bisa hapus testimoni
- [ ] Bisa tambah FAQ baru
- [ ] Bisa edit FAQ
- [ ] Bisa hapus FAQ
- [ ] Bisa tambah program baru
- [ ] Bisa upload gambar program
- [ ] Bisa edit program
- [ ] Bisa hapus program
- [ ] Bisa tambah fasilitas baru
- [ ] Bisa upload gambar fasilitas
- [ ] Bisa edit fasilitas
- [ ] Bisa hapus fasilitas

---

## 🎉 Selamat!

Website Anda sekarang **FULLY INTEGRATED** dengan admin panel!

### Next Steps:
1. ✅ Jalankan setup instructions di atas
2. ✅ Login ke admin panel
3. ✅ Tambahkan konten real (ganti demo data)
4. ✅ Test semua fitur
5. ✅ Deploy ke hosting

---

## 📞 Need Help?

Jika ada error atau pertanyaan:
1. Check `ADMIN_PANEL_GUIDE.md` untuk dokumentasi lengkap
2. Check Laravel logs: `storage/logs/laravel.log`
3. Tanya ke developer 😊

---

## 🚀 Deployment to Hosting

### Shared Hosting (Recommended):
1. Upload semua file via FTP/cPanel File Manager
2. Import database
3. Update `.env` dengan database credentials
4. Jalankan:
   ```bash
   php artisan migrate
   php artisan storage:link
   php artisan db:seed --class=AdminSeeder
   ```
5. Set document root ke `/public` folder

### VPS (Advanced):
Follow standard Laravel deployment procedures

---

**Happy Managing! 🎊**


