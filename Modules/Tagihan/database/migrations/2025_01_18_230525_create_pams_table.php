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
    Schema::create('pams', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('warga_id'); // Relasi ke tabel warga

      $table->integer('parameter_terakhir')->default(0); // Parameter sebelumnya
      $table->integer('parameter_sekarang'); // Parameter saat ini
      $table->integer('parameter'); // Selisih parameter (sekarang - terakhir)

      $table->date('tanggal_input'); // Tanggal input
      $table->decimal('tarif_per_unit', 10); // Tarif per unit
      $table->decimal('nominal', 15); // Total nominal (parameter * tarif_per_unit)

      $table->string('deskripsi')->nullable(); // Keterangan opsional

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
    Schema::dropIfExists('pams');
  }
};
