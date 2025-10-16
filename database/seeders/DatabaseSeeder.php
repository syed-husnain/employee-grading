<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    $this->call([
      LookupSeeder::class,
      MultiplierSeeder::class,
      WeightSeeder::class,
      BonusRuleSeeder::class,
      DayOffSeeder::class,
      InsuranceSeeder::class,
      JobRoleSeeder::class,
      EmployeeSeeder::class,
    ]);
  }
}
