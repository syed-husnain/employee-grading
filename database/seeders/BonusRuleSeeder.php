<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BonusRuleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('bonus_rules')->insert([
      ['grade' => 10, 'operator' => '<', 'bonus_name' => 'Not Eligible'],
      ['grade' => 10, 'operator' => '>', 'bonus_name' => 'Basic Bonus'],
      ['grade' => 27, 'operator' => '>', 'bonus_name' => 'Performance based'],
      ['grade' => 45, 'operator' => '>', 'bonus_name' => 'Executive Bonus'],
    ]);
  }
}
