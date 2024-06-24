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
        Schema::create('keluars', function (Blueprint $table) {
            $table->id();
            $table->string('id_pesanan');
            $table->foreignId('stok_id')->constrained('stoks')->cascadeOnDelete();
            $table->string('nama_penerima');
            $table->string('id_ecommerce');
            $table->string('SKU');
            $table->string('alamat');
            $table->string('no_tlp');
            $table->string('nama');
            $table->string('warna');
            $table->string('size');
            $table->string('media');
            $table->integer('total');
            $table->string('status')->default('Proses');
            $table->datetime('first_success_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keluars');
    }
};
