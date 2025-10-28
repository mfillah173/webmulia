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
        Schema::create('galeri_sistem', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sistem_id')->constrained('sistems')->onDelete('cascade');
            $table->string('nama');
            $table->string('gambar');
            $table->text('deskripsi')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->integer('urutan')->default(0);
            $table->timestamps();

            $table->index(['sistem_id', 'status', 'urutan']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeri_sistem');
    }
};
