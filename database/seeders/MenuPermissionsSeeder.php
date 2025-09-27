<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class MenuPermissionsSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            // Menu Categories
            'view menu-categories',
            'create menu-categories',
            'edit menu-categories',
            'delete menu-categories',
            
            // Menu Sub Categories
            'view menu-sub-categories',
            'create menu-sub-categories',
            'edit menu-sub-categories',
            'delete menu-sub-categories',
            
            // Menu Items
            'view menu-items',
            'create menu-items',
            'edit menu-items',
            'delete menu-items',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}