<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MultiplierSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('multipliers')->insert([
      ['category' => 'education', 'type' => 'Verified', 'value' => 100],
      ['category' => 'education', 'type' => 'Unverified', 'value' => 25],
      ['category' => 'education', 'type' => 'Relevant', 'value' => 100],
      ['category' => 'education', 'type' => 'Irrelevant', 'value' => 20],

      ['category' => 'tech_certificate', 'type' => 'Verified', 'value' => 100],
      ['category' => 'tech_certificate', 'type' => 'Unverified', 'value' => 25],
      ['category' => 'tech_certificate', 'type' => 'Relevant', 'value' => 100],
      ['category' => 'tech_certificate', 'type' => 'Irrelevant', 'value' => 20],

      ['category' => 'online_certificate', 'type' => 'Verified', 'value' => 100],
      ['category' => 'online_certificate', 'type' => 'Unverified', 'value' => 25],
      ['category' => 'online_certificate', 'type' => 'Relevant', 'value' => 100],
      ['category' => 'online_certificate', 'type' => 'Irrelevant', 'value' => 20],


      ['category' => 'experience_external', 'type' => 'Verified', 'value' => 100],
      ['category' => 'experience_external', 'type' => 'Unverified', 'value' => 50],

      ['category' => 'experience_management', 'type' => 'Verified', 'value' => 100],
      ['category' => 'experience_management', 'type' => 'Unverified', 'value' => 50],
    ]);
  }
}
