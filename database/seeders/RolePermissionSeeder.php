<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions if they don't exist
        $permissions = [
            'menu-dashboard',
            'menu-master-data',
            'menu-generate',
            'menu-hasil-generate',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

         // Create roles if they don't exist
         $roles = [
            'admin',
            'dosen',
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Assign permissions to roles
        $roleAdmin = Role::findByName('admin');
        $roleAdmin->syncPermissions($permissions); // Use syncPermissions to ensure only needed permissions are attached

        $roleDosen = Role::findByName('dosen');
        $roleDosen->syncPermissions(['menu-hasil-generate']);

        // Permission::create(['name'=>'menu-dashboard']);
        // Permission::create(['name'=>'menu-master-data']);
        // Permission::create(['name'=>'menu-generate']);
        // Permission::create(['name'=>'menu-hasil-generate']);

        // Role::create(['name'=>'admin']);
        // Role::create(['name'=>'dosen']);
        // // Role::create(['name'=>'participant']);

        // $roleAdmin = Role::findByName('admin');
        // $roleAdmin->givePermissionTo('menu-dashboard');
        // $roleAdmin->givePermissionTo('menu-master-data');
        // $roleAdmin->givePermissionTo('menu-generate');
        // $roleAdmin->givePermissionTo('menu-hasil-generate');

        // $roleAcademicStaff = Role::findByName('dosen');
        // $roleAcademicStaff->givePermissionTo('menu-hasil-generate');

        // $roleParticipant = Role::findByName('participant');
        // $roleParticipant->givePermissionTo('menu-hasil-generate');
    }
}
