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
        Schema::create('produk', function (Blueprint $table) {
            $table->id('id_produk'); // Auto-incrementing primary key
            $table->string('nama_produk');
            $table->decimal('harga_produk', 10, 2); // Assuming decimal type for price
            $table->string('kategori_produk');
            $table->text('deskripsi_produk')->nullable();
            $table->string('gambar1_produk')->nullable();
            $table->string('gambar2_produk')->nullable();
            $table->string('gambar3_produk')->nullable();
            $table->string('shopee_produk')->nullable();
            $table->timestamps(); // Adds created_at and updated_at columns
            $table->unsignedBigInteger('id_user'); // Column for foreign key

            // Define foreign key constraint
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
