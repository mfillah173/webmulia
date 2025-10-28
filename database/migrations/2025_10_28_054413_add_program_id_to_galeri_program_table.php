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
        Schema::table('galeri_program', function (Blueprint $table) {
            // Tambahkan kolom program_id jika belum ada
            if (!Schema::hasColumn('galeri_program', 'program_id')) {
                $table->unsignedBigInteger('program_id')->nullable()->after('id');
                $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
            }

            // Hapus kolom nama dan deskripsi jika ada (karena galeri hanya untuk gambar)
            if (Schema::hasColumn('galeri_program', 'nama')) {
                $table->dropColumn('nama');
            }
            if (Schema::hasColumn('galeri_program', 'deskripsi')) {
                $table->dropColumn('deskripsi');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('galeri_program', function (Blueprint $table) {
            // Hapus foreign key dan kolom program_id
            $table->dropForeign(['program_id']);
            $table->dropColumn('program_id');

            // Tambahkan kembali kolom nama dan deskripsi jika diperlukan
            $table->string('nama')->nullable();
            $table->text('deskripsi')->nullable();
        });
    }
};
