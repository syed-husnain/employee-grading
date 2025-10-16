<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DayOffSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('day_off_rules')->insert([
      ['grade' => 36, 'operator' => '<', 'days_off' => 0],
      ['grade' => 36, 'operator' => '>', 'days_off' => 1],
      ['grade' => 45, 'operator' => '>', 'days_off' => 2],
      ['grade' => 51, 'operator' => '>', 'days_off' => 3],
    ]);
  }
}
