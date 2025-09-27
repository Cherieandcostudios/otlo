<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Create permissions
        $permissions = [
            'view menu-categories',
            'create menu-categories', 
            'edit menu-categories',
            'delete menu-categories',
            'view menu-sub-categories',
            'create menu-sub-categories',
            'edit menu-sub-categories', 
            'delete menu-sub-categories',
            'view menu-items',
            'create menu-items',
            'edit menu-items',
            'delete menu-items',
            'view users',
            'create users',
            'edit users',
            'delete users',
            'view roles',
            'create roles',
            'edit roles',
            'delete roles',
            'view permissions',
            'create permissions',
            'edit permissions',
            'delete permissions',
            'view customers',
            'edit customers',
            'delete customers'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $managerRole = Role::firstOrCreate(['name' => 'manager']);
        $staffRole = Role::firstOrCreate(['name' => 'staff']);

        // Assign all permissions to admin
        $adminRole->syncPermissions(Permission::all());

        // Assign limited permissions to manager
        $managerPermissions = [
            'view menu-categories',
            'create menu-categories',
            'edit menu-categories',
            'view menu-sub-categories', 
            'create menu-sub-categories',
            'edit menu-sub-categories',
            'view menu-items',
            'create menu-items',
            'edit menu-items'
        ];
        $managerRole->syncPermissions($managerPermissions);

        // Assign basic permissions to staff
        $staffPermissions = [
            'view menu-categories',
            'view menu-sub-categories',
            'view menu-items'
        ];
        $staffRole->syncPermissions($staffPermissions);

        // Create admin user if doesn't exist
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@otlo.com'],
            [
                'name' => 'Admin User',
                'password' => bcrypt('password123'),
                'email_verified_at' => now()
            ]
        );

        $adminUser->assignRole('admin');
    }
}