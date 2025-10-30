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
        Schema::table('programs', function (Blueprint $table) {
            // Hapus kolom yang tidak diperlukan (metode dan urutan)
            $table->dropColumn(['metode', 'urutan']);

            // Rename kolom 'tujuan' menjadi 'tujuan_program' untuk lebih jelas
            $table->renameColumn('tujuan', 'tujuan_program');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            // Kembalikan kolom yang dihapus
            $table->text('metode')->nullable();
            $table->integer('urutan')->default(0);

            // Rename kembali tujuan_program menjadi tujuan
            $table->renameColumn('tujuan_program', 'tujuan');
        });
    }
};
