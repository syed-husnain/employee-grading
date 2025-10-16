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
    Schema::create('multipliers', function (Blueprint $table) {
      $table->id();
      $table->string('category'); // education, tech_certificate etc.
      $table->string('type');     // Verified, Unverified, Relevant, Irrelevant
      $table->decimal('value', 5, 2); // percentage e.g. 100, 50
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('multipliers');
  }
};
