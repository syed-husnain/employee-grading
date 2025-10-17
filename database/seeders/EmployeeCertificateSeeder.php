<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\EmployeeCertificate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeeCertificateSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    EmployeeCertificate::create([
      'employee_id' => 1,
      'certificate_name' => 'AWS Cloud Practitioner',
      'file_path' => 'certificates/aws_certificate.pdf',
      'file_type' => 'pdf',
      'uploaded_at' => Carbon::now(),
    ]);
  }
}
