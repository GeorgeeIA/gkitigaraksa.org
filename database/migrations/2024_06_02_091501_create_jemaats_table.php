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
    Schema::create('jemaats', function (Blueprint $table) {
      $table->id();
      $table->string('nama');
      $table->string('alamat');
      $table->string('tempat_lahir');
      $table->date('tanggal_lahir');
      $table->string('pekerjaan');
      $table->string('nomor_hp');
      $table->text('surat_baptis');
      $table->text('surat_atestasi');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('jemaats');
  }
};
