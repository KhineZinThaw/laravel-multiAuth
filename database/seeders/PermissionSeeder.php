<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create permissions
        Permission::create(['guard_name' => 'admin', 'name' => 'edit users']);
        Permission::create(['guard_name' => 'admin', 'name' => 'delete users']);

        $role1 = Role::create(['guard_name' => 'admin', 'name' => 'super-admin']);
        $role1->givePermissionTo('edit users');
        $role1->givePermissionTo('delete users');

        $role2 = Role::create(['guard_name' => 'admin', 'name' => 'staff']);
        $role2->givePermissionTo('edit users');

        // create  admin and staff
        $admin = AdminUser::create([
            'name' => 'Super Admin',
            'email' => 'super@admin.com',
            'password' => Hash::make('password')
        ]);
        $admin->assignRole($role1);

        $staff =AdminUser::create([
            'name' => 'Staff',
            'email' => 'staff@gmail.com',
            'password' => Hash::make('password')
        ]);
        $staff->assignRole($role2);
    }
}
