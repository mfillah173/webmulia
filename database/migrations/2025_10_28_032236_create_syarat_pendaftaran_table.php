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
        Schema::create('syarat_pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->string('jenjang'); // kindergarten, primary
            $table->string('nama_syarat');
            $table->text('deskripsi')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->integer('urutan')->default(0);
            $table->timestamps();

            $table->index(['jenjang', 'status', 'urutan']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('syarat_pendaftaran');
    }
};
