<?php

use App\Menu;
use App\MenuRole;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin Role
        $admin = Role::create([
            'role' => 'admin',
        ]);
        // Admin Role
        $user = Role::create([
            'role' => 'user',
        ]);
        $admin->createMenu([
            'code' => 'users',
            'name' => 'Users',
            'path' => '/users',
            'icon' => 'fas fa-users',
            'variant' => 'info',
        ]);
        $admin->createMenu([
            'code' => 'roles',
            'name' => 'Roles',
            'path' => '/roles',
            'icon' => 'fas fa-user-tie',
            'variant' => 'info',
        ]);
    }
}
