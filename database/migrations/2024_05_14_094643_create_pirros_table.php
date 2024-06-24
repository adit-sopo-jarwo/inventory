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
        Schema::create('pirros', function (Blueprint $table) {
            $table->id(); $table->foreignId('stok_id')->constrained('stoks')->cascadeOnDelete();
            $table->string('SKU', 10);
            $table->string('image')->nullable();
            $table->string('warna');
            $table->integer('S');
            $table->integer('Total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pirros');
    }
};
