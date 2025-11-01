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
        // Hapus kolom yang tidak digunakan di tabel kontak
        Schema::table('kontak', function (Blueprint $table) {
            if (Schema::hasColumn('kontak', 'tanggal_dibalas')) {
                $table->dropColumn('tanggal_dibalas');
            }
            if (Schema::hasColumn('kontak', 'balasan')) {
                $table->dropColumn('balasan');
            }
        });

        // Hapus kolom meta yang mungkin masih ada (jika belum terhapus)
        if (Schema::hasTable('programs')) {
            Schema::table('programs', function (Blueprint $table) {
                if (Schema::hasColumn('programs', 'meta_description')) {
                    $table->dropColumn('meta_description');
                }
                if (Schema::hasColumn('programs', 'meta_keywords')) {
                    $table->dropColumn('meta_keywords');
                }
            });
        }

        if (Schema::hasTable('fasilitas')) {
            Schema::table('fasilitas', function (Blueprint $table) {
                if (Schema::hasColumn('fasilitas', 'meta_description')) {
                    $table->dropColumn('meta_description');
                }
                if (Schema::hasColumn('fasilitas', 'meta_keywords')) {
                    $table->dropColumn('meta_keywords');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Tambahkan kembali kolom ke tabel kontak
        Schema::table('kontak', function (Blueprint $table) {
            $table->timestamp('tanggal_dibalas')->nullable()->after('tanggal_kirim');
            $table->text('balasan')->nullable()->after('tanggal_dibalas');
        });

        // Tambahkan kembali kolom meta ke tabel programs
        if (Schema::hasTable('programs')) {
            Schema::table('programs', function (Blueprint $table) {
                $table->text('meta_description')->nullable()->after('metode');
                $table->json('meta_keywords')->nullable()->after('meta_description');
            });
        }

        // Tambahkan kembali kolom meta ke tabel fasilitas
        if (Schema::hasTable('fasilitas')) {
            Schema::table('fasilitas', function (Blueprint $table) {
                $table->text('meta_description')->nullable()->after('gambar');
                $table->json('meta_keywords')->nullable()->after('meta_description');
            });
        }
    }
};
