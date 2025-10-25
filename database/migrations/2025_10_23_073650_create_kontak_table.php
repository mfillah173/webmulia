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
        Schema::create('kontak', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email');
            $table->string('telepon');
            $table->string('subjek');
            $table->text('pesan');
            $table->enum('status', ['unread', 'read', 'replied'])->default('unread');
            $table->timestamp('tanggal_kirim');
            $table->timestamp('tanggal_dibalas')->nullable();
            $table->text('balasan')->nullable();
            $table->string('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamps();
            
            $table->index(['status', 'tanggal_kirim']);
            $table->index('subjek');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontak');
    }
};
