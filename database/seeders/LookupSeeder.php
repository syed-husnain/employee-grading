<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LookupSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('lookups')->insert([
      // Education
      ['category' => 'education', 'name' => 'Basics', 'grade' => 1],
      ['category' => 'education', 'name' => 'Diploma', 'grade' => 2.5],
      ['category' => 'education', 'name' => 'Bachelors', 'grade' => 4],
      ['category' => 'education', 'name' => 'Masters', 'grade' => 5],
      ['category' => 'education', 'name' => 'Ph.D', 'grade' => 7],

      // Tech Certificates
      ['category' => 'tech_certificate', 'name' => 'None', 'grade' => 0],
      ['category' => 'tech_certificate', 'name' => 'Less than 1 Year', 'grade' => 1],
      ['category' => 'tech_certificate', 'name' => '1 Year', 'grade' => 2],
      ['category' => 'tech_certificate', 'name' => '2 Year', 'grade' => 3],
      ['category' => 'tech_certificate', 'name' => '3 Year', 'grade' => 4],
      ['category' => 'tech_certificate', 'name' => '4 Year', 'grade' => 5],
      ['category' => 'tech_certificate', 'name' => '5 Year', 'grade' => 7],

      // Online Certificates
      ['category' => 'online_certificate', 'name' => 'None', 'grade' => 0],
      ['category' => 'online_certificate', 'name' => 'Less Than 2 Months', 'grade' => 1],
      ['category' => 'online_certificate', 'name' => '2-4 Months', 'grade' => 2],
      ['category' => 'online_certificate', 'name' => '4-8 Months', 'grade' => 4],
      ['category' => 'online_certificate', 'name' => ' 8 - 12  Months', 'grade' => 5],
      ['category' => 'online_certificate', 'name' => 'More than 12 Months', 'grade' => 7],

      // External Experience
      ['category' => 'experience_external', 'name' => 'None', 'grade' => 0],
      ['category' => 'experience_external', 'name' => 'Less than 1 year', 'grade' => 0],
      ['category' => 'experience_external', 'name' => '1 Year', 'grade' => 0.5],
      ['category' => 'experience_external', 'name' => '2 Year', 'grade' => 1],
      ['category' => 'experience_external', 'name' => '3 Year', 'grade' => 2.5],
      ['category' => 'experience_external', 'name' => '4 Year', 'grade' => 3],
      ['category' => 'experience_external', 'name' => '5 Year', 'grade' => 3.5],
      ['category' => 'experience_external', 'name' => '6 Year', 'grade' => 4],
      ['category' => 'experience_external', 'name' => '7 Year', 'grade' => 4.5],
      ['category' => 'experience_external', 'name' => '8 Year', 'grade' => 5],
      ['category' => 'experience_external', 'name' => '9 Year ', 'grade' => 5.5],
      ['category' => 'experience_external', 'name' => '10 Year', 'grade' => 6],
      ['category' => 'experience_external', 'name' => 'More than 10 Year', 'grade' => 7],

      // Internal Experience
      ['category' => 'experience_internal', 'name' => 'None', 'grade' => 0],
      ['category' => 'experience_internal', 'name' => 'Less than 1 year', 'grade' => 0],
      ['category' => 'experience_internal', 'name' => '1 Year', 'grade' => 0.5],
      ['category' => 'experience_internal', 'name' => '2 Year', 'grade' => 1],
      ['category' => 'experience_internal', 'name' => '3 Year', 'grade' => 2.5],
      ['category' => 'experience_internal', 'name' => '4 Year', 'grade' => 3],
      ['category' => 'experience_internal', 'name' => '5 Year', 'grade' => 3.5],
      ['category' => 'experience_internal', 'name' => '6 Year', 'grade' => 4],
      ['category' => 'experience_internal', 'name' => '7 Year', 'grade' => 4.5],
      ['category' => 'experience_internal', 'name' => '8 Year', 'grade' => 5],
      ['category' => 'experience_internal', 'name' => '9 Year ', 'grade' => 5.5],
      ['category' => 'experience_internal', 'name' => '10 Year', 'grade' => 6],
      ['category' => 'experience_internal', 'name' => 'More than 10 Year', 'grade' => 8],



      // English
      ['category' => 'english', 'name' => 'None', 'grade' => 0],
      ['category' => 'english', 'name' => 'Basic', 'grade' => 2],
      ['category' => 'english', 'name' => 'Average', 'grade' => 4],
      ['category' => 'english', 'name' => 'Good', 'grade' => 5],
      ['category' => 'english', 'name' => 'Excellent', 'grade' => 7],


      // Management Exp
      ['category' => 'experience_management', 'name' => 'None', 'grade' => 0],
      ['category' => 'experience_management', 'name' => 'Less than 1 year', 'grade' => 0],
      ['category' => 'experience_management', 'name' => '1 Year', 'grade' => 0.5],
      ['category' => 'experience_management', 'name' => '2 Year', 'grade' => 1],
      ['category' => 'experience_management', 'name' => '3 Year', 'grade' => 2.5],
      ['category' => 'experience_management', 'name' => '4 Year', 'grade' => 3],
      ['category' => 'experience_management', 'name' => '5 Year', 'grade' => 3.5],
      ['category' => 'experience_management', 'name' => '6 Year', 'grade' => 4],
      ['category' => 'experience_management', 'name' => '7 Year', 'grade' => 4.5],
      ['category' => 'experience_management', 'name' => '8 Year', 'grade' => 5],
      ['category' => 'experience_management', 'name' => '9 Year ', 'grade' => 5.5],
      ['category' => 'experience_management', 'name' => '10 Year', 'grade' => 6],
      ['category' => 'experience_management', 'name' => 'More than 10 Year', 'grade' => 7],

    ]);
  }
}
