<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $user = User::create([
      'name' => 'Administrator',
      'email' => 'admin@gmail.com',
      'password' => bcrypt('12345678'),
    ]);

    $role = Role::create(['name' => 'Super Admin']);

    $permissions = Permission::pluck('id', 'id')->all();
    $role->syncPermissions($permissions);

    $user->assignRole($role);


    // $user2 = User::create([
    //     'name' => 'Muhammad Junaid Mohsin',
    //     'email' => 'MuhammadJunaid.Mohsin@abacus-global.com',
    //     'password' => bcrypt('password'),
    // ]);

    // $role2 = Role::create(['name' => 'Admin']);

    // $permissions2 = Permission::pluck('id', 'id')->all();

    // $role2->syncPermissions($permissions2);

    // $user2->assignRole($role2);
  }
}
