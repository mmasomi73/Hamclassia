<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //--------------= Roles
        $admin = Role::create(['name'=>'admin']);
        Role::create(['name'=>'teacher']);
        Role::create(['name'=>'student']);
        Role::create(['name'=>'user']);

        //--------------= Roles
        $permissions = [];
        $permissions[] = Permission::create(['name' => 'create users']);
        $permissions[] = Permission::create(['name' => 'update users']);
        $permissions[] = Permission::create(['name' => 'read users']);
        $permissions[] = Permission::create(['name' => 'delete users']);

        $admin->syncPermissions($permissions);
    }
}
