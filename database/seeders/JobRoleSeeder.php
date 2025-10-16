<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JobRoleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('grades')->insert([
      ['category' => 'CEO', 'sub_category' => '', 'grade' => 'Grade 1', 'min_weight' => 72, 'max_weight' => 72],
      ['category' => 'CFO', 'sub_category' => '', 'grade' => 'Grade 1', 'min_weight' => 63, 'max_weight' => 71],

      ['category' => 'Directors', 'sub_category' => 'Sr. Director', 'grade' => 'Grade 1', 'min_weight' => 54, 'max_weight' => 62],
      ['category' => 'Directors', 'sub_category' => 'Deputy Director', 'grade' => 'Grade 2', 'min_weight' => 51, 'max_weight' => 53],
      ['category' => 'Directors', 'sub_category' => 'Assistant Director', 'grade' => 'Grade 3', 'min_weight' => 48, 'max_weight' => 50],

      ['category' => 'Managers', 'sub_category' => 'General Manager', 'grade' => 'Grade 1', 'min_weight' => 45, 'max_weight' => 47],
      ['category' => 'Managers', 'sub_category' => 'Senior Manager', 'grade' => 'Grade 2', 'min_weight' => 42, 'max_weight' => 44],
      ['category' => 'Managers', 'sub_category' => 'Assistant Manager', 'grade' => 'Grade 3', 'min_weight' => 39, 'max_weight' => 41],

      ['category' => 'Team Lead', 'sub_category' => 'Team Lead I', 'grade' => 'Grade 3', 'min_weight' => 36, 'max_weight' => 38],
      ['category' => 'Team Lead', 'sub_category' => 'Team Lead II', 'grade' => 'Grade 4', 'min_weight' => 33, 'max_weight' => 35],
      ['category' => 'Team Lead', 'sub_category' => 'Team Lead III', 'grade' => 'Grade 5', 'min_weight' => 30, 'max_weight' => 32],

      ['category' => 'Officers', 'sub_category' => 'Officer I', 'grade' => 'Grade 4', 'min_weight' => 27, 'max_weight' => 29],
      ['category' => 'Officers', 'sub_category' => 'Officer II', 'grade' => 'Grade 5', 'min_weight' => 24, 'max_weight' => 26],
      ['category' => 'Officers', 'sub_category' => 'Officer III', 'grade' => 'Grade 6', 'min_weight' => 21, 'max_weight' => 23],

      ['category' => 'Associates/Cordinators', 'sub_category' => 'Associates/Cordinators I', 'grade' => 'Grade 6', 'min_weight' => 18, 'max_weight' => 20],
      ['category' => 'Associates/Cordinators', 'sub_category' => 'Associates/Cordinators II', 'grade' => 'Grade 7', 'min_weight' => 15, 'max_weight' => 17],
      ['category' => 'Associates/Cordinators', 'sub_category' => 'Associates/Cordinators III', 'grade' => 'Grade 8', 'min_weight' => 12, 'max_weight' => 14],

      ['category' => 'Fields Staff', 'sub_category' => 'Fields Staff I', 'grade' => 'Grade 8', 'min_weight' => 9, 'max_weight' => 11],
      ['category' => 'Fields Staff', 'sub_category' => 'Fields Staff II', 'grade' => 'Grade 9', 'min_weight' => 6, 'max_weight' => 8],
      ['category' => 'Fields Staff', 'sub_category' => 'Fields Staff III', 'grade' => 'Grade 10', 'min_weight' => 3, 'max_weight' => 5],
    ]);
  }
}
