<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up() : void
  {
    Schema::create('umums', function (Blueprint $table) {
      $table->id();
      $table->string('nama_tagihan');
      $table->unsignedBigInteger('periode_id')->nullable();
      $table->unsignedBigInteger('warga_id')->nullable();
      $table->unsignedBigInteger('nominal');
      $table->enum('status', ['belum_lunas', 'lunas'])->default('belum_lunas');

      $table->string('created_by')->default('unknown');
      $table->string('updated_by')->default('unknown');
      $table->string('deleted_by')->nullable();
      $table->softDeletes();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down() : void
  {
    Schema::dropIfExists('umums');
  }
};
