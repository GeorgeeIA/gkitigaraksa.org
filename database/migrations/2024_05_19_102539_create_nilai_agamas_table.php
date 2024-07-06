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
    Schema::create('nilai_agamas', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('user_id');
      $table->unsignedBigInteger('pengurus_gembala_sidang_id')->nullable();
      $table->unsignedBigInteger('pengurus_guru_sekolah_minggu_id')->nullable();
      $table->string('category');
      $table->string('nama');
      $table->string('kelas')->nullable();
      $table->string('nama_sekolah')->nullable();
      $table->string('periode_ajaran')->nullable();
      $table->string('nilai')->nullable();
      $table->string('status')->default('Proses');
      $table->timestamps();

      $table->foreign('user_id')->references('id')->on('users');
      $table->foreign('pengurus_gembala_sidang_id')->references('id')->on('penguruses');
      $table->foreign('pengurus_guru_sekolah_minggu_id')->references('id')->on('penguruses');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('nilai_agamas');
  }
};
