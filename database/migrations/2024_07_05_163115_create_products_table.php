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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Kolom id dengan tipe data integer dan otomatis bertambah
            $table->string('name'); // Kolom name dengan tipe data string
            $table->integer('price'); // Kolom price dengan tipe data integer
            $table->integer('stock'); // Kolom stock dengan tipe data integer
            $table->timestamps(); // Kolom created_at dan updated_at untuk menyimpan waktu pembuatan dan pembaruan record
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
