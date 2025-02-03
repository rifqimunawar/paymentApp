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
    Schema::create('pembayarans', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('warga_id');
      $table->unsignedBigInteger('tagihan_id');
      $table->unsignedBigInteger('periode_id')->nullable();
      $table->unsignedBigInteger('nominal_dibayar')->default(0);
      $table->smallInteger('status');
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
    Schema::dropIfExists('pembayarans');
  }
};
