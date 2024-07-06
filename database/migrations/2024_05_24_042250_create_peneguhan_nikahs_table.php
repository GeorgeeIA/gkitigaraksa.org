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
    Schema::create('peneguhan_nikahs', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('user_id');
      $table->unsignedBigInteger('pengurus_ketua_id')->nullable();
      $table->unsignedBigInteger('pengurus_gembala_sidang_id')->nullable();

      $table->string('nama_pria');
      $table->string('kewarganegaraan_pria');
      $table->text('alamat_pria');
      $table->string('nomor_hp_pria');
      $table->string('tempat_lahir_pria');
      $table->date('tanggal_lahir_pria');
      $table->text('sidi_pria')->nullable();
      $table->string('anggota_gereja_pria');
      $table->string('nama_ayah_pria');
      $table->string('nama_ibu_pria');
      $table->text('foto_pria');

      $table->string('nama_wanita');
      $table->string('kewarganegaraan_wanita');
      $table->text('alamat_wanita');
      $table->string('nomor_hp_wanita');
      $table->string('tempat_lahir_wanita');
      $table->date('tanggal_lahir_wanita');
      $table->text('sidi_wanita')->nullable();
      $table->string('anggota_gereja_wanita');
      $table->string('nama_ayah_wanita');
      $table->string('nama_ibu_wanita');
      $table->text('foto_wanita');

      $table->date('tanggal_peneguhan');
      $table->string('jam_peneguhan');
      $table->string('tempat_peneguhan');

      $table->text('ttd_pria');
      $table->text('ttd_wanita');


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
    Schema::dropIfExists('peneguhan_nikahs');
  }
};
