<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            "name" => "Aziz",
            "email" => "admin@gmail.com",
            "password" => bcrypt("password")
        ]);

        $this->createPermissionsAndRoles();

        $user->assignRole('Admin');
        $permissions = Permission::all();
        $user->syncPermissions($permissions);
    }

    /**
     * Create permissions and roles if they do not exist.
     */
    private function createPermissionsAndRoles()
    {
        // Permissions
        $permissions = [
            'permission.show',
            'permission.edit',
            'permission.add',
            'permission.delete',
            'roles.show',
            'roles.edit',
            'roles.add',
            'roles.delete',
            'user.show',
            'user.edit',
            'user.add',
            'user.delete',
            'super.admin',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Role
        Role::firstOrCreate(['name' => 'Admin', 'guard_name' => 'web']);
    }
}
