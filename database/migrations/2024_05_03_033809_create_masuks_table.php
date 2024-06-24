<?php

use App\Models\Stok;
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
        Schema::create('masuks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stok_id')->constrained('stoks')->cascadeOnDelete();
            $table->string('operator');
            $table->string('batch');
            $table->string('sku', 10);
            $table->string('produk');
            $table->string('warna');
            $table->string('ukuran');
            $table->string('image')->nullable();
            $table->string('total');
            $table->date('tanggal_masuk');
            $table->date('pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masuks');
    }
};
