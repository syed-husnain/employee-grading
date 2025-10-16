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
    Schema::create('job_roles', function (Blueprint $table) {
      $table->id();
      $table->string('category');          // e.g. Directors, Managers
      $table->string('sub_category')->nullable();  // e.g. Assistant Manager
      $table->string('grade');       // e.g. Grade 1, Grade 2, Grade 3
      $table->integer('min_weight');       // lower bound
      $table->integer('max_weight');       // upper bound
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('job_roles');
  }
};
