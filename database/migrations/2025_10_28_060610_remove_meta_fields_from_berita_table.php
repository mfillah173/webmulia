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
        Schema::table('berita', function (Blueprint $table) {
            // Drop meta fields
            $table->dropColumn(['meta_description', 'meta_keywords']);

            // Add urutan field
            $table->integer('urutan')->default(0)->after('kategori');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('berita', function (Blueprint $table) {
            // Add back meta fields
            $table->text('meta_description')->nullable();
            $table->json('meta_keywords')->nullable();

            // Drop urutan field
            $table->dropColumn('urutan');
        });
    }
};
