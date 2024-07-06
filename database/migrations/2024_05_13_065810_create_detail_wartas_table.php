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
    Schema::create('detail_wartas', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('warta_id');
      $table->string('worship_leader');
      $table->string('pelayan_firman');
      $table->string('singer');
      $table->string('multimedia');
      $table->string('kolektan');
      $table->string('pemerhatian');
      $table->string('pembaca_warta');
      $table->text('notes')->nullable();
      $table->timestamps();
      $table->foreign('warta_id')->references('id')->on('wartas');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('detail_wartas');
  }
};
