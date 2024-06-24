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
        Schema::create('new_carlos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stok_id')->constrained('stoks')->cascadeOnDelete();
            $table->string('SKU', 10);
            $table->string('image')->nullable();
            $table->string('warna');
            $table->integer('M')->default(0);
            $table->integer('L')->default(0);
            $table->integer('XL')->default(0);
            $table->integer('XXL')->default(0);
            $table->integer('XXXL')->default(0);
            $table->integer('Total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_carlos');
    }
};
