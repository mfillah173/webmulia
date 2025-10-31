# 🖼️ Troubleshooting: Gambar Tidak Muncul

## ✅ SUDAH DIPERBAIKI!

Storage link sudah berhasil dibuat dengan command:
```bash
php artisan storage:link
```

---

## 🔍 PENJELASAN MASALAH

### Kenapa Gambar Tidak Muncul?

**Alur Upload Gambar:**
1. Gambar diupload via admin panel
2. File disimpan ke: `storage/app/public/images/fasilitas/nama-file.jpg`
3. Laravel butuh **symbolic link** agar file bisa diakses dari browser
4. Link dari: `public/storage` → `storage/app/public`
5. Browser akses via: `http://localhost/storage/images/fasilitas/nama-file.jpg`

**Tanpa storage link = gambar tidak bisa diakses = 404 error**

---

## ✅ CARA MENGETES APAKAH SUDAH BERFUNGSI

### Test 1: Cek Folder Public
Buka folder: `public/storage`
- ✅ Jika ada folder `storage` → Link berhasil!
- ❌ Jika tidak ada → Jalankan: `php artisan storage:link`

### Test 2: Upload Gambar Baru
1. Login ke admin panel
2. Klik **"Fasilitas"** → **"Tambah Fasilitas"**
3. Isi nama: "Test Upload"
4. Upload gambar (JPG/PNG, maksimal 2MB)
5. Klik **"Simpan"**
6. Buka halaman `/fasilitas` di website
7. ✅ Gambar muncul = Berhasil!
8. ❌ Gambar tidak muncul = Lanjut ke troubleshooting

### Test 3: Cek Database
```bash
php artisan tinker
>>> \App\Models\Fasilitas::latest()->first()
```
Cek kolom `gambar`, pastikan ada nama file (contoh: `1234567890_test.jpg`)

### Test 4: Cek File Fisik
Buka folder: `storage/app/public/images/fasilitas/`
- ✅ Ada file gambar → Upload berhasil
- ❌ Tidak ada file → Ada masalah di upload process

---

## 🛠️ TROUBLESHOOTING LANJUTAN

### Problem 1: Storage Link Gagal (Error pada Windows)

**Solusi A - Via PowerShell (Run as Administrator):**
```powershell
cd C:\Users\asus\OneDrive\Documents\GitHub\webmulia
php artisan storage:link
```

**Solusi B - Manual Symbolic Link (Windows):**
```cmd
mklink /D "C:\Users\asus\OneDrive\Documents\GitHub\webmulia\public\storage" "C:\Users\asus\OneDrive\Documents\GitHub\webmulia\storage\app\public"
```

**Solusi C - Copy Folder (Not Recommended, tapi bisa untuk testing):**
```bash
# Copy folder storage/app/public ke public/storage
# CATATAN: Ini harus diulang setiap kali upload gambar baru
```

---

### Problem 2: Permission Denied (Linux/Mac)

```bash
# Berikan permission ke folder storage
chmod -R 775 storage
chmod -R 775 bootstrap/cache

# Ganti owner (sesuaikan dengan web server user)
chown -R www-data:www-data storage
chown -R www-data:www-data bootstrap/cache
```

---

### Problem 3: Gambar Uploaded Tapi Tidak Muncul

**Cek 1: Path di Database**
```bash
php artisan tinker
>>> $fasilitas = \App\Models\Fasilitas::latest()->first()
>>> dd($fasilitas->gambar)
```
Hasil harus berupa nama file saja: `1234567890_ruang-terapi.jpg`

**Cek 2: Path di View**
Buka `resources/views/fasilitas.blade.php` line 29:
```php
<img src="{{ asset('storage/images/fasilitas/' . $item->gambar) }}" ...>
```
Ini akan menghasilkan URL: `http://localhost/storage/images/fasilitas/nama-file.jpg`

**Cek 3: Akses Manual**
Buka browser, coba akses langsung:
```
http://localhost/storage/images/fasilitas/1234567890_ruang-terapi.jpg
```
- ✅ Gambar muncul = Path benar, masalah di view
- ❌ 404 Not Found = Storage link belum benar

---

### Problem 4: Gambar Broken (Icon Rusak)

**Kemungkinan Penyebab:**
1. File corrupted saat upload
2. Format file tidak didukung
3. File size terlalu besar

**Solusi:**
```php
// Di FasilitasController.php, sudah ada validasi:
'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'

// Max 2MB (2048 KB)
// Format: jpeg, png, jpg, gif
```

**Test upload dengan:**
- File size < 2MB
- Format: JPG atau PNG
- Nama file: tanpa karakter spesial

---

### Problem 5: Gambar Lama Tidak Muncul

Jika data sudah ada sebelum storage link dibuat:

**Solusi:**
1. Cek folder `storage/app/public/images/fasilitas/`
2. Pastikan file gambar ada di sana
3. Jalankan `php artisan storage:link` lagi
4. Refresh browser (Ctrl + F5 untuk hard refresh)

---

## 🔧 DEBUGGING TIPS

### Debug 1: Tampilkan Path Lengkap

Edit `resources/views/fasilitas.blade.php` untuk debugging:
```blade
@if($item->gambar)
    <!-- DEBUG: Tampilkan path -->
    <p>Path: {{ asset('storage/images/fasilitas/' . $item->gambar) }}</p>
    <p>Filename: {{ $item->gambar }}</p>
    
    <img src="{{ asset('storage/images/fasilitas/' . $item->gambar) }}" alt="{{ $item->nama }}" class="img-fluid">
@endif
```

### Debug 2: Cek Error Log

Buka file: `storage/logs/laravel.log`
Cari error terkait file upload

### Debug 3: Browser Console

Buka browser:
1. Klik kanan pada gambar broken
2. Pilih **"Inspect"** atau **"Inspect Element"**
3. Cek URL gambar di tab **"Console"**
4. Lihat error 404 atau 403

---

## 📝 CHECKLIST FINAL

Setelah `php artisan storage:link`:

- [ ] Folder `public/storage` ada
- [ ] Folder `storage/app/public/images/fasilitas` ada
- [ ] Upload gambar baru via admin panel berhasil
- [ ] File gambar tersimpan di `storage/app/public/images/fasilitas/`
- [ ] Gambar muncul di halaman `/fasilitas`
- [ ] Gambar muncul di admin panel (list fasilitas)
- [ ] Bisa edit & ganti gambar
- [ ] Bisa hapus fasilitas (gambar ikut terhapus)

---

## 🎯 CARA MENGETES ULANG

### Test Complete Flow:

1. **Upload Gambar Baru**
   ```
   Admin Panel → Fasilitas → Tambah Fasilitas
   - Nama: "Test Gambar"
   - Upload gambar (pilih file JPG/PNG)
   - Klik "Simpan"
   ```

2. **Cek di Frontend**
   ```
   Buka: http://localhost/fasilitas
   Gambar "Test Gambar" harus muncul
   ```

3. **Cek di Admin List**
   ```
   Admin Panel → Fasilitas
   Gambar thumbnail harus muncul di list
   ```

4. **Edit & Ganti Gambar**
   ```
   Admin Panel → Fasilitas → Edit "Test Gambar"
   Upload gambar baru
   Klik "Update"
   Gambar lama otomatis terhapus, gambar baru muncul
   ```

5. **Hapus Fasilitas**
   ```
   Admin Panel → Fasilitas → Hapus "Test Gambar"
   File gambar di storage juga ikut terhapus
   ```

---

## 🚀 PREVENTION (Agar Tidak Terjadi Lagi)

### Saat Deploy ke Hosting:

**Jangan Lupa:**
1. Upload semua file via FTP
2. Jalankan: `php artisan storage:link`
3. Set permission folder `storage/` → 755 atau 775
4. Test upload gambar

### Saat Clone Project Baru:

```bash
# After clone
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate

# JANGAN LUPA INI:
php artisan storage:link

# Test upload
```

### Saat Development:

```bash
# Setiap kali ada perubahan storage structure
php artisan storage:link

# Clear cache jika gambar tidak update
php artisan cache:clear
```

---

## 📞 MASIH BERMASALAH?

### Quick Check:

1. Restart web server (XAMPP/Laragon)
2. Clear browser cache (Ctrl + Shift + Delete)
3. Hard refresh (Ctrl + F5)
4. Coba browser lain (Chrome/Firefox)

### Jika masih error, kirim info ini:

```bash
# Jalankan command ini dan copy hasilnya
php artisan --version
php -v

# Check storage structure
dir storage\app\public
dir public\storage

# Check permissions (Linux/Mac)
ls -la storage/
ls -la public/
```

---

## ✅ KESIMPULAN

**Masalah:** Gambar tidak muncul karena storage link belum dibuat

**Solusi:** Sudah dijalankan `php artisan storage:link`

**Status:** ✅ **SELESAI!**

Sekarang gambar seharusnya **SUDAH BISA MUNCUL**! 

Silakan test dengan upload gambar baru. 🎉

