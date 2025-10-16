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
    Schema::create('day_off_rules', function (Blueprint $table) {
      $table->id();
      $table->integer('grade');
      $table->enum('operator', ['<', '<=', '=', '>=', '>']);
      $table->integer('days_off');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('day_off_rules');
  }
};
