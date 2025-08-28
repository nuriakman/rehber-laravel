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
    Schema::create('personeller', function (Blueprint $table) {
      $table->id();
      $table->string('adi_soyadi');
      $table->foreignId('unvan_id')->constrained('unvanlar')->cascadeOnDelete();
      $table->foreignId('birim_id')->constrained('birimler')->cascadeOnDelete();
      $table->text('notlar')->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('personeller');
  }
};
