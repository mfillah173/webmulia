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
        // Hapus kolom meta dari tabel programs
        Schema::table('programs', function (Blueprint $table) {
            if (Schema::hasColumn('programs', 'meta_description')) {
                $table->dropColumn('meta_description');
            }
            if (Schema::hasColumn('programs', 'meta_keywords')) {
                $table->dropColumn('meta_keywords');
            }
        });

        // Hapus kolom meta dari tabel sistems
        Schema::table('sistems', function (Blueprint $table) {
            if (Schema::hasColumn('sistems', 'meta_description')) {
                $table->dropColumn('meta_description');
            }
            if (Schema::hasColumn('sistems', 'meta_keywords')) {
                $table->dropColumn('meta_keywords');
            }
        });

        // Hapus kolom meta dari tabel fasilitas
        Schema::table('fasilitas', function (Blueprint $table) {
            if (Schema::hasColumn('fasilitas', 'meta_description')) {
                $table->dropColumn('meta_description');
            }
            if (Schema::hasColumn('fasilitas', 'meta_keywords')) {
                $table->dropColumn('meta_keywords');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Tambahkan kembali kolom meta ke tabel programs
        Schema::table('programs', function (Blueprint $table) {
            $table->string('meta_description', 160)->nullable();
            $table->json('meta_keywords')->nullable();
        });

        // Tambahkan kembali kolom meta ke tabel sistems
        Schema::table('sistems', function (Blueprint $table) {
            $table->string('meta_description', 160)->nullable();
            $table->json('meta_keywords')->nullable();
        });

        // Tambahkan kembali kolom meta ke tabel fasilitas
        Schema::table('fasilitas', function (Blueprint $table) {
            $table->string('meta_description', 160)->nullable();
            $table->json('meta_keywords')->nullable();
        });
    }
};
