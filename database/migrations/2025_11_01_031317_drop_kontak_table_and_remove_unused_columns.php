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
        // Hapus tabel kontak karena sudah ada setting
        Schema::dropIfExists('kontak');

        // Hapus kolom slug di tabel fasilitas
        if (Schema::hasTable('fasilitas')) {
            Schema::table('fasilitas', function (Blueprint $table) {
                if (Schema::hasColumn('fasilitas', 'slug')) {
                    $table->dropUnique(['slug']); // Hapus unique index dulu
                    $table->dropColumn('slug');
                }
            });
        }

        // Hapus kolom slug dan deskripsi di tabel programs
        if (Schema::hasTable('programs')) {
            Schema::table('programs', function (Blueprint $table) {
                if (Schema::hasColumn('programs', 'slug')) {
                    $table->dropUnique(['slug']); // Hapus unique index dulu
                    $table->dropColumn('slug');
                }
                if (Schema::hasColumn('programs', 'deskripsi')) {
                    $table->dropColumn('deskripsi');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Tambahkan kembali kolom slug di tabel fasilitas
        if (Schema::hasTable('fasilitas')) {
            Schema::table('fasilitas', function (Blueprint $table) {
                $table->string('slug')->unique()->after('nama');
            });
        }

        // Tambahkan kembali kolom slug dan deskripsi di tabel programs
        if (Schema::hasTable('programs')) {
            Schema::table('programs', function (Blueprint $table) {
                $table->string('slug')->unique()->after('nama');
                $table->text('deskripsi')->after('slug');
            });
        }

        // Note: Tabel kontak tidak bisa dikembalikan karena data akan hilang
    }
};
