<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);





       // Define the roles and permissions
       $roles = [
            [
                'name' => 'admin',
                'permissions' => [
                    'edit products',
                    'delete products',
                    'access products page',
                    'edit sliders',
                    'delete sliders',
                    'access sliders',
                    'edit categories',
                    'delete categories',
                    'access categories page',
                ],
            ],
            [
                'name' => 'editor',
                'permissions' => [
                    'edit products',
                    'access products page',
                    'edit sliders',
                    'access sliders',
                    'edit categories',
                    'access categories page',
                ],
            ],
        ];

        // Create the permission models for each permission definition
        $permissionNames = [
            'edit products',
            'delete products',
            'access products page',
            'edit sliders',
            'delete sliders',
            'access sliders',
            'edit categories',
            'delete categories',
            'access categories page',
        ];

        // Create the permission models
        foreach ($permissionNames as $name) {
            Permission::create(['name' => $name]);
        }

        // Create the role models for each role definition
        foreach ($roles as $roleDefinition) {
            $role = Role::create(['name' => $roleDefinition['name']]);
            foreach ($roleDefinition['permissions'] as $permissionName) {
                $permission = Permission::where('name', $permissionName)->firstOrFail();
                $role->permissions()->attach($permission);
            }
        }





    }
}
