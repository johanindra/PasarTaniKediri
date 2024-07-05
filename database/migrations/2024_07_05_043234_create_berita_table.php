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
        Schema::create('berita', function (Blueprint $table) {
            $table->id('id_berita'); // Auto-incrementing primary key
            $table->string('judul_berita');
            $table->date('tanggal_berita');
            $table->string('foto_berita')->nullable();
            $table->text('deskripsi_berita');
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
        Schema::dropIfExists('berita');
    }
};
