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
    Schema::create('employee_certificates', function (Blueprint $table) {
      $table->id();
      // Foreign key for employee
      $table->unsignedBigInteger('employee_id');
      $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');

      // Certificate details
      $table->string('certificate_name');        // e.g., “AWS Cloud Practitioner”
      $table->string('file_path');               // file path in storage (e.g. certificates/abc.pdf)
      $table->string('file_type', 20)->nullable(); // e.g. pdf, jpg, docx
      $table->date('uploaded_at')->nullable();   // upload date
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('employee_certificates');
  }
};
