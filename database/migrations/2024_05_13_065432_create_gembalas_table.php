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
    Schema::create('gembalas', function (Blueprint $table) {
      $table->id();
      $table->string('nama_lengkap');
      $table->string('foto');
      $table->date('tanggal_mulai_jabatan');
      $table->date('tanggal_akhir_jabatan');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('gembalas');
  }
};
