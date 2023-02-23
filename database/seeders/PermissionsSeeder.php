<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name'=>'show products']);
        Permission::create(['name'=>'add products']);
        Permission::create(['name'=>'edit products']);
        Permission::create(['name'=>'delete products']);

        Permission::create(['name'=>'show categories']);
        Permission::create(['name'=>'add categories']);
        Permission::create(['name'=>'edit categories']);
        Permission::create(['name'=>'delete categories']);

        Permission::create(['name'=>'show users']);
        Permission::create(['name'=>'add users']);
        Permission::create(['name'=>'edit users']);
        Permission::create(['name'=>'delete users']);
    }
}
