<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Drop tables yang tidak digunakan (urutan penting karena foreign key)
        Schema::dropIfExists('berita');
        Schema::dropIfExists('galeri_program');
        Schema::dropIfExists('galeri_sistem');
        Schema::dropIfExists('galeri_fasilitas');
        Schema::dropIfExists('sistems');
        Schema::dropIfExists('syarat_pendaftaran');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Ini hanya placeholder, data tidak bisa dikembalikan setelah di-drop
        // Jika ingin rollback, harus restore dari backup database
    }
};
