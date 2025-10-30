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
        // Remove status and urutan from programs table
        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn(['status']);
        });

        // Remove status and urutan from fasilitas table
        Schema::table('fasilitas', function (Blueprint $table) {
            $table->dropColumn(['status']);
        });

        // Remove status and urutan from testimoni table
        Schema::table('testimoni', function (Blueprint $table) {
            $table->dropColumn(['status', 'urutan']);
        });

        // Remove status and urutan from faq table
        Schema::table('faq', function (Blueprint $table) {
            $table->dropColumn(['status', 'urutan']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Add back status and urutan to programs table
        Schema::table('programs', function (Blueprint $table) {
            $table->enum('status', ['active', 'inactive'])->default('active');
        });

        // Add back status and urutan to fasilitas table
        Schema::table('fasilitas', function (Blueprint $table) {
            $table->enum('status', ['active', 'inactive'])->default('active');
        });

        // Add back status and urutan to testimoni table
        Schema::table('testimoni', function (Blueprint $table) {
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->integer('urutan')->default(0);
        });

        // Add back status and urutan to faq table
        Schema::table('faq', function (Blueprint $table) {
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->integer('urutan')->default(0);
        });
    }
};
