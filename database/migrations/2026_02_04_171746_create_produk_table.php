<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->integer('id_produk')->primary();
            $table->string('nama_produk');
            $table->decimal('harga', 12, 2);
            $table->foreignId('kategori_id')->constrained('kategori', 'id_kategori');
            $table->foreignId('status_id')->constrained('status', 'id_status');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};