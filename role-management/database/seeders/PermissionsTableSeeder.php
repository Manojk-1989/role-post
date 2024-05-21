<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['role_id' => 1, 'action_id' => 1]); // User1 Insert
        Permission::create(['role_id' => 1, 'action_id' => 3]); // User1 Read
        Permission::create(['role_id' => 2, 'action_id' => 2]); // User2 Edit
        Permission::create(['role_id' => 2, 'action_id' => 4]); // User2 Read
    }
}
