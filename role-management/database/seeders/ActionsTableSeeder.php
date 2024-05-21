<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Action;

class ActionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Action::create(['name' => 'Insert', 'submodule_id' => 1]);
        Action::create(['name' => 'Edit', 'submodule_id' => 1]);
        Action::create(['name' => 'Delete', 'submodule_id' => 1]);
        Action::create(['name' => 'Read', 'submodule_id' => 1]);
    }
}
