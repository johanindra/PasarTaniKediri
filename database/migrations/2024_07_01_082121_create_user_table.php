<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user'); // Auto-incrementing primary key
            $table->string('nama_user');
            $table->string('email_user')->unique();
            $table->string('password_user');
            $table->text('alamat_user')->nullable();
            $table->string('kecamatan_user')->nullable();
            $table->string('notelp_user')->nullable();
            $table->string('foto_user')->nullable();
            $table->string('level_user');
            $table->string('maps_user')->nullable();
            $table->string('instagram_user')->nullable();
            $table->string('facebook_user')->nullable();
            $table->string('link_user')->nullable();
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
