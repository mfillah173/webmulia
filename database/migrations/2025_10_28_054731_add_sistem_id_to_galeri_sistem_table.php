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
        Schema::table('galeri_sistem', function (Blueprint $table) {
            // Tambahkan kolom sistem_id jika belum ada
            if (!Schema::hasColumn('galeri_sistem', 'sistem_id')) {
                $table->unsignedBigInteger('sistem_id')->nullable()->after('id');
                $table->foreign('sistem_id')->references('id')->on('sistems')->onDelete('cascade');
            }

            // Hapus kolom nama dan deskripsi jika ada (karena galeri hanya untuk gambar)
            if (Schema::hasColumn('galeri_sistem', 'nama')) {
                $table->dropColumn('nama');
            }
            if (Schema::hasColumn('galeri_sistem', 'deskripsi')) {
                $table->dropColumn('deskripsi');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('galeri_sistem', function (Blueprint $table) {
            // Hapus foreign key dan kolom sistem_id
            $table->dropForeign(['sistem_id']);
            $table->dropColumn('sistem_id');

            // Tambahkan kembali kolom nama dan deskripsi jika diperlukan
            $table->string('nama')->nullable();
            $table->text('deskripsi')->nullable();
        });
    }
};
