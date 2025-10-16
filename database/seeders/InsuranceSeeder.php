<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InsuranceSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('insurance_rules')->insert([
      ['grade' => 27, 'operator' => '>', 'insurance_bracket' => 'Basic'],
      ['grade' => 36, 'operator' => '>', 'insurance_bracket' => 'Standard'],
      ['grade' => 45, 'operator' => '>', 'insurance_bracket' => 'Enhanced'],
      ['grade' => 72, 'operator' => '>', 'insurance_bracket' => 'Premium'],
    ]);
  }
}
