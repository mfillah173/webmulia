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
        Schema::table('galeri_fasilitas', function (Blueprint $table) {
            // Tambahkan kolom fasilitas_id jika belum ada
            if (!Schema::hasColumn('galeri_fasilitas', 'fasilitas_id')) {
                $table->unsignedBigInteger('fasilitas_id')->nullable()->after('id');
                $table->foreign('fasilitas_id')->references('id')->on('fasilitas')->onDelete('cascade');
            }

            // Hapus kolom nama dan deskripsi jika ada (karena galeri hanya untuk gambar)
            if (Schema::hasColumn('galeri_fasilitas', 'nama')) {
                $table->dropColumn('nama');
            }
            if (Schema::hasColumn('galeri_fasilitas', 'deskripsi')) {
                $table->dropColumn('deskripsi');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('galeri_fasilitas', function (Blueprint $table) {
            // Hapus foreign key dan kolom fasilitas_id
            $table->dropForeign(['fasilitas_id']);
            $table->dropColumn('fasilitas_id');

            // Tambahkan kembali kolom nama dan deskripsi jika diperlukan
            $table->string('nama')->nullable();
            $table->text('deskripsi')->nullable();
        });
    }
};
