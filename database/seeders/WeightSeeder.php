<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WeightSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('weights')->insert([
      ['name' => 'Education', 'weight' => 1.50],
      ['name' => 'Tech Certificate', 'weight' => 1.25],
      ['name' => 'Online Certificate', 'weight' => 0.50],
      ['name' => 'Experience - External', 'weight' => 1.25],
      ['name' => 'Experience - Management', 'weight' => 1.75],
      ['name' => 'Experience - Internal', 'weight' => 2.50],
      ['name' => 'English', 'weight' => 1.25],
    ]);
  }
}
