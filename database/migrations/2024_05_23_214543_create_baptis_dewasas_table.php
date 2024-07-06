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
        Schema::create('baptis_dewasas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pengurus_ketua_id')->nullable();
            $table->unsignedBigInteger('pengurus_gembala_sidang_id')->nullable();

            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->string('nomor_hp');
            $table->text('akte_kelahiran');
            $table->text('pas_foto');
            $table->string('status')->default('Proses');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pengurus_ketua_id')->references('id')->on('penguruses');
            $table->foreign('pengurus_gembala_sidang_id')->references('id')->on('penguruses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baptis_dewasas');
    }
};
