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
        Schema::table('fasilitas', function (Blueprint $table) {
            // Hapus kolom yang tidak diperlukan
            $table->dropColumn(['deskripsi', 'fitur', 'urutan']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fasilitas', function (Blueprint $table) {
            // Kembalikan kolom yang dihapus
            $table->text('deskripsi')->nullable();
            $table->text('fitur')->nullable();
            $table->integer('urutan')->default(0);
        });
    }
};
